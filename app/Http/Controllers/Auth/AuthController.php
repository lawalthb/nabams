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

  
//nomba payment function
    public function nomba_checkout($customerId, $email, $amount,  $callback_url){
        $NOMBA_CLIENT_ID = env('NOMBA_CLIENT_ID');
        $NOMBA_CLIENT_SECRET = env('NOMBA_CLIENT_SECRET');
        $NOMBA_ACCOUNT_ID = env('NOMBA_ACCOUNT_ID');
        
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/auth/token/issue",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"grant_type\": \"client_credentials\",\n  \"client_id\": \"$NOMBA_CLIENT_ID\",\n  \"client_secret\": \"$NOMBA_CLIENT_SECRET\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        // dd($response);
        $auth_data = json_decode($response, true);
         $access_token = $auth_data['data']['access_token'];
       
         $reference = 'REF' . uniqid();
        

          
            //dd($access_token);
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.nomba.com/v1/checkout/order",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n  \"order\": {\n    \"orderReference\": \"$reference\",\n    \"customerId\": \"$customerId\",\n    \"callbackUrl\": \"$callback_url\",\n    \"customerEmail\": \"$email\",\n    \"amount\": \"$amount\",\n    \"currency\": \"NGN\"\n  },\n  \"tokenizeCard\": \"false\"\n}",
                
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer $access_token",
                    "Content-Type: application/json",
                    "Cache-Control: no-cache",
                    "accountId: $NOMBA_ACCOUNT_ID",
                ],
            ]);

            $result  = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
               
                $result;
            }
            
          return  $data = json_decode($result, true);
    }

    public function register(Request $request)
    {
       
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
        
        $data = $this->nomba_checkout($user->id, $validatedData['email'], $reg_fee,  $callback_url );
      
        Transactions::create([
            'user_id' => $user->id,
            'purpose' => 'registration fee',
            'email' =>  $validatedData['email'],
            'amount' => $reg_fee,
            'fullname' =>   $validatedData['lastname'] . " " . $validatedData['firstname'],
            'phone_number' =>  $validatedData['phone'],
            'callback_url' => $callback_url,
            'reference' => $data['data']['orderReference'],
            'authorization_url' => $data['data']['checkoutLink'],
        ]);
        $payment_link = $data['data']['checkoutLink'];

        event(new UserRegistered($user, $payment_link, $request->password ));



        return redirect($data['data']['checkoutLink']);
    }

    public function PaymentCallback(Request $request)
    {

        $reference = $request->orderReference;
        $orderId = $request->orderId;
        //dd($reference);
        $reference = $request->input('reference');
        $NOMBA_CLIENT_ID = env('NOMBA_CLIENT_ID');
        $NOMBA_CLIENT_SECRET = env('NOMBA_CLIENT_SECRET');
        $NOMBA_ACCOUNT_ID = env('NOMBA_ACCOUNT_ID');


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/auth/token/issue",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"grant_type\": \"client_credentials\",\n  \"client_id\": \"$NOMBA_CLIENT_ID\",\n  \"client_secret\": \"$NOMBA_CLIENT_SECRET\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

       
        $auth_data = json_decode($response, true);
        $access_token = $auth_data['data']['access_token'];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/checkout/transaction?idType=ORDER_ID&id=$orderId",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
          // dd($response);
            $data = json_decode($response, true);
            if ($data) {
               
                if($data['data']['message'] == 'PAYMENT SUCCESSFUL'){
                    $status  = 'Success';
                }else{
                    $status  = 'Pending';
                }
               // dd($status);
                $updatedRecord =  Transactions::where('reference', $orderId)->update([

                    'gateway_response' => '',
                    'channel' => '',
                    'paid_at' => now(),
                    'other_info' => $response,
                    'status' =>  $status,
                    'message' => $data['data']['message'],


                ]);
            }
        }
        $user_id = Transactions::where('reference', $orderId)->value('user_id');
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
$reg_pay = Transactions::where('email',$request->email )->where('purpose', 'registration fee')->where('status', 'Success')->count();
//dd($reg_pay );
        // Attempt to authenticate the user
        if($reg_pay >= 1){
                if (Auth::attempt($credentials)) {

                    return redirect('/home');
                }else{
  // Authentication failed
  return back()->withErrors(['email' => 'Invalid credentials ']);
                }
        }else{
  
  return back()->withErrors(['email' => 'You have not make payment ']);
        }
      
    }

    public function Logout_new()
    {
        //dd("i will logout out pls wait");
        Auth::logout();
        return redirect('/');
    }
}
