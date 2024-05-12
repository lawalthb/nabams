<?php

namespace App\Http\Controllers;

use App\Models\Supervisor as ModelsSupervisor;
use App\Models\SupervisorUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
            $total_lecturers = ModelsSupervisor::where('is_active', "Yes")->count();
           
    
            $search = $request->input('search');
    
            $users = ModelsSupervisor::when($search, function ($query, $search) {
                $query->where('firstname', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })->where('is_active', "Yes")->paginate(10);
    
            return view('admin.supervisor.lecturers', compact('users', 'search','total_lecturers'));
       
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone' => 'nullable|string|max:11',
            'other' => 'nullable|string',
            
        ]);
        // Create and save the user
        $user = ModelsSupervisor::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
           'other' => $validatedData['other'],
        ]);

        session()->flash('success', 'Supervisor Added successfully.');
        return redirect()->route('admin.lecturers.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = ModelsSupervisor::findOrFail($id);
        return view('admin.supervisor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone' => 'nullable|string|max:11',
            'other' => 'nullable|string',
            
        ]);

        $user =  ModelsSupervisor::findOrFail($id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
           'other' => $validatedData['other'],
        ]);

        return redirect()->route('admin.lecturers.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        
        try {

                $user = ModelsSupervisor::find($id);
                $user->delete();
            } catch (QueryException $e) {
                if ($e->errorInfo[1] == 1451) {
       
                    session()->flash('error', 'Cannot delete or update a parent row.');
                    return redirect()->route('admin.lecturers.index');
                } else {
       
                    \Log::error('Database error: ' . $e->getMessage());
                
                    session()->flash('error', 'An error occurred while processing your request');
                    return redirect()->route('admin.lecturers.index');
                }
        
    
            return redirect()->route('admin.lecturers.index');
    }
}

function allocate(Request $request)  {
      
        
    if($request->lecturer_id && $request->level ){
   
        $lecturers = ModelsSupervisor::where('is_active', 'Yes')->get();
        $supervisor = ModelsSupervisor::where('id',$request->lecturer_id )->latest()->first();
    
        $members = User::where('role', 'Member')->where('level', $request->level)->paginate(1000);
     
        return view('admin.supervisor.allocate', compact('lecturers', 'members','supervisor'));
    }else{
        $lecturers = ModelsSupervisor::where('is_active', 'Yes')->get();
        //dd($lecturers);
        return view('admin.supervisor.allocate', compact('lecturers'));
    }
    
}

function allocate_students(Request $request){
   // dd($request);
    $supervisor_id = $request->input('supervisor_id');
    $members = $request->input('members');
        $input = $request->all();
        $data = [];
        if (is_array($input['members'])) {
            foreach ($input['members'] as $item) {
                DB::table('supervisor_users')->where('user_id',$item )->delete();
                array_push($data, [
                    'user_id' => $item,
                    'admin_id' => auth()->id(),
                    'supervisor_id' => $supervisor_id,
                ]);
            }
        }

        SupervisorUser::insert($data);


    session()->flash('success', 'Students allocated to Supervisor successfully.');
    return redirect()->route('admin.lecturers.allocate');
}


}
