<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resource;
use App\Models\ResourcesPaid;
use App\Models\Transactions;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ResourceController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $resources = Resource::with('categories')->get();
        return view('resources.index', compact('resources','categories'));
    }


    public function create()
    {  
         $categories = Category::all();
        return view('resources.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'required|file',
           
            'price' => 'nullable|numeric',
        ]);

        $resource = new Resource();
        $resource->title = $request->title;
        $resource->description = $request->description;
        
       
       $fileName = time().uniqid().".".$request->file('file_path')->getClientOriginalExtension();
       $request->file('file_path')->move(public_path('resources'), $fileName);
       $resource->file_path = 'resources/' . $fileName;
      
        $resource->category_id = $request->category_id;
        $resource->price = $request->price;
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Resource created successfully!');
    }

    public function show($id)
    {
        $resource = Resource::findOrFail($id);
        return view('resources.show', compact('resource'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $resource = Resource::findOrFail($id);
        return view('resources.edit', compact('resource','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'nullable|file',
            
            'price' => 'nullable|numeric',
        ]);

        $resource = Resource::findOrFail($id);
        $resource->title = $request->title;
        $resource->description = $request->description;
        
        if ($request->hasFile('file_path')) {
            $fileName = time().uniqid().".".$request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move(public_path('resources'), $fileName);
            $resource->file_path = 'resources/' . $fileName;
        }
        
        $resource->category_id = $request->category_id;
        $resource->price = $request->price;
        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully!');
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();

        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully!');
    }

    public function list()
    {
        $categories = Category::all();
        $resources = Resource::with('categories')->get();
        return view('resources.index', compact('resources','categories'));
    }

    public function paidfor()
    {
        $categories = Category::all();
        $resources_paids = ResourcesPaid::with('resources')->where('user_id', auth()->user()->id )->get();
      //  dd($resources_paids);
        return view('resources.paidfor', compact('resources_paids','categories'));
    }

    public function purchase(Request $request)
    {
        $id = $request->id;
        $Resource = Resource::where('id',$id)->first();
//dd( $Resource);
        $ResourcesPaid = new ResourcesPaid();
        $ResourcesPaid->amount = $Resource->price;
        $ResourcesPaid->resources_id = $Resource->id;
        $ResourcesPaid->user_id = Auth()->user()->id;
        $ResourcesPaid->payment_status ="pending";
        $token = Str::random(32);
        $ResourcesPaid->token = $token;
        $ResourcesPaid->save();

        $lastInsertedId = $ResourcesPaid->id;
       $callback_url = route('payment_callback');
      
       $client = new Client();
       $response = $client->post('https://api.paystack.co/transaction/initialize', [
           'headers' => [
               'Authorization' => 'Bearer ' .  env('PAYSTACK_SECRET_KEY'),
               'Content-Type' => 'application/json',
           ],
           'json' => [
               'amount' => $Resource->price * 100,
               'email' => Auth()->user()->email,
               'callback_url' => $callback_url,
               

           ],
       ]);
       $data = json_decode($response->getBody(), true);
       Transactions::create([
           'user_id' => Auth()->user()->id,
           'purpose' => 'resource fee',
           'purpose_id' => $lastInsertedId,
           'email' =>  Auth()->user()->email,
           'amount' => $Resource->price,
           'fullname' =>  Auth()->user()->lastname . " " . Auth()->user()->firstname,
           'phone_number' =>  Auth()->user()->phone,
           'callback_url' => $callback_url,
           'reference' => $data['data']['reference'],
           'authorization_url' => $data['data']['authorization_url'],
       ]);
       $payment_link = $data['data']['authorization_url'];

      
       return redirect($payment_link );
    }


    public function download(Request $request)
    {
      
        // Retrieve token from the request query parameters
        $token = $request->token;

        // Find the resource associated with the token
        $ResourcesPaid = ResourcesPaid::with('resources')->where('token', $token)->first();
       
      
        // Validate token and resource ownership
        //dd($ResourcesPaid);
        if (!$ResourcesPaid || $ResourcesPaid->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Increase download count or perform other actions if needed
        $ResourcesPaid->increment('downloads');

        // Get the file path of the ResourcesPaid
        $filePath = public_path($ResourcesPaid->resources->file_path);

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

       // Extract file extension from the file name
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Set headers for the response
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $ResourcesPaid->resources->title . '.' . $extension . '"',
        ];


        // Return the file as a streamed response
        return new BinaryFileResponse($filePath, 200, $headers);
    }

}
