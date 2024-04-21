<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index2(){
        $users = User::select(
           
       	"id",
           'email',
            "firstname"	,
            "lastname"	,
            "nickname"	,
            "email"	,

            "matno"	,
            "phone"	,
            "level"	,
          

            "role"	,
            "image"	,
        )->get();
        $total_admins = User::where('role', "Admin")->count();
        $total_members = User::where('role', "Member")->count();
        return view("admin.users.index", [
            'users' => $users,
            'total_admins' => $total_admins,
            'total_members' => $total_members
        ]);
        
    }

    public function index(Request $request)
    {
        $total_admins = User::where('role', "Admin")->count();
        $total_members = User::where('role', "Member")->count();

        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            $query->where('firstname', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        })->paginate(10);

        return view('admin.users.index', compact('users', 'search','total_members', 'total_admins'));
    }



    public function EditProfile($id)
    {
        $user = User::findOrFail($id);
        return view('users.member-profile', compact('user'));
    }

    public function UpdateProfile(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phone' => 'nullable|string|max:11',
            'matno' => 'required|string|max:20',
            'level' => 'required|string|max:50',
            'nickname' => 'nullable|string|max:50',
            'dob' => 'nullable|string|max:50',
            'bio' => 'nullable|string|max:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $usera = auth()->user();
        if ($request->hasFile('image')) {
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(500, 600);
            $img->toJpeg(80)->save(base_path('public/profile_images/' .   $name_gen));
            $save_url = 'profile_images/' .   $name_gen;
        } else {
            $save_url = $usera->image;
        }


        // // Handle profile image upload
        // if ($request->hasFile('image')) {
        //     // Delete old profile image if it exists
        //     if ($usera->image) {
        //         Storage::delete($usera->image);
        //     }
        //     $profileImage = $request->file('image')->store('images');
        // } else {
        //     $profileImage = $usera->image;
        // }
        $user =  User::findOrFail($id)->update([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'phone' => $validatedData['phone'],
            'matno' => $validatedData['matno'],
            'level' => $validatedData['level'],
            'dob' => $validatedData['dob'],
            'nickname' => $validatedData['nickname'],
            'bio' => $validatedData['bio'],
            'image' => $save_url,


        ]);

        $notification = array(
            'message' => 'Profile  Updated Successfully',
            'alert-type' => 'success'
        );

        $user = User::findOrFail($id);

        session()->flash('success', 'Profile updated successfully.');
        return view('users.member-profile', compact('user'));
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            session()->flash('success', 'Password incorrect.');
            return redirect()->route('member.edit.profile', ['id' => $user->id])->with('error', 'Current password is incorrect.');
        }



        $userw = User::findOrFail($user->id)->update([

            'password' => Hash::make($request->password),

        ]);
        $usere = auth()->user();
        session()->flash('success', 'Password updated successfully.');
        return redirect()->route('member.edit.profile', ['id' => $usere->id]);
    }
}
