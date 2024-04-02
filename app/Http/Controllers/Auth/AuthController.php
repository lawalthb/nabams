<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\PriceSettings;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        dd('you most login first');
        return view('auth.register');
    }

    public function dashboard()
    {

        if (auth()->user()->role == "Admin") {
            return redirect()->route('admin.dashboard');
        }
        return view("analytics");
    }

    public function AdminDashboard()
    {

        return view("index");
    }


    public function register(Request $request)
    {
        // id	firstname	lastname	nickname	email	password	matno	phone	level	member_type	expectation_msg	reg_amount
        // Validation
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phone' => 'nullable|string|max:11',
            'matno' => 'nullable|string|max:20',
            'level' => 'required|string|max:50',
            'member_type' => 'required|string|max:50',
            'expectation_msg' => 'nullable|string|max:200',
            'email' => 'required|string|email|unique:users|max:60',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $reg_fee = PriceSettings::where('name', "registration fee")->value('amount');
        // Create and save the user
        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'phone' => $validatedData['phone'],
            'matno' => $validatedData['matno'],
            'level' => $validatedData['level'],
            'member_type' => $validatedData['member_type'],
            'expectation_msg' => $validatedData['expectation_msg'],
            'email' => $validatedData['email'],
            'reg_fee' => $reg_fee,
            'password' => bcrypt($validatedData['password']),
        ]);
        $callback_url = route('callback_url');
        // send a welcome email to new member

        // store transaction



        //   dd('goto payment gateway');
        $client = new Client();
        $response = $client->post('https://api.paystack.co/transaction/initialize', [
            'headers' => [
                'Authorization' => 'Bearer ' .  env('PAYSTACK_SECRET_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'amount' => $reg_fee * 100,
                'email' => $validatedData['email'],
                'callback_url' => $callback_url,
                'firstname' => 'ade',
                'lastname' => 'oriyomi',
                'phone_no' => '08132712715',

            ],
        ]);
        $data = json_decode($response->getBody(), true);
        Transactions::create([
            'user_id' => $user->id,
            'purpose' => 'registration fee',
            'email' =>  $validatedData['email'],
            'amount' => $reg_fee,
            'fullname' =>   $validatedData['lastname'] . " " . $validatedData['firstname'],
            'phone_number' =>  $validatedData['phone'],
            'callback_url' => $callback_url,
            'reference' => $data['data']['reference'],
            'authorization_url' => $data['data']['authorization_url'],
        ]);
        $payment_link = $data['data']['authorization_url'];

        event(new UserRegistered($user, $payment_link));



        return redirect($data['data']['authorization_url']);
    }

    public function PaymentCallback(Request $request)
    {

        $reference = $request->input('reference');
        $s_key = env('PAYSTACK_SECRET_KEY');
        // Verify payment
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $s_key",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
            $data = json_decode($response, true);
            if ($data) {
                $updatedRecord =  Transactions::where('reference', $reference)->update([

                    'gateway_response' => $data['data']['gateway_response'],
                    'channel' => $data['data']['channel'],
                    'paid_at' => $data['data']['paid_at'],
                    'other_info' => $response,
                    'status' => 'success',


                ]);
            }
        }
        $user_id = Transactions::where('reference', $reference)->value('user_id');
        // Validation
        $user_record = User::where('id', $user_id)->first(['email', 'password']);

        if ($user_record) {
            // Authenticate the user
            Auth::login($user_record);

            // Redirect the user after successful login
            return redirect('/home');
        } else {
            // Handle the case where the user with the specified ID does not exist
        }

        //return redirect()->away(url('/user/order/page#no'));
    }

    public function LoginPage()
    {

        return view("landingpage.login");
    }

    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {

            return redirect('/home');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
