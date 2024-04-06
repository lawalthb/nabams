<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebColours;
use App\Models\WebHeaders;
use App\Models\WebTopbars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Hash;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('admin.landingpage.index');
    }

    public function EditPage(Request $request)
    {

        $page = $request->page_to_edit;
        if ($page == "Edit Colour") {
            $fill = WebColours::where('id', 1)->select('colour', 'id')->first();
            $main = WebColours::where('id', 2)->select('colour', 'id')->first();
            $text = WebColours::where('id', 3)->select('colour', 'id')->first();
            return  view('admin.landingpage.edit_colour', compact('fill', 'main', 'text'));
        } elseif ($page == "Edit Topbar") {
            $topbar = WebTopbars::where('id', 1)->select('current_session', 'support_phone')->first();

            return view('admin.landingpage.edit_topbar', compact('topbar'));
        } elseif ($page == "Edit Header") {
            $header = WebHeaders::where('id', 1)->first();
            return  view('admin.landingpage.edit_header' , compact('header'));
        } elseif ($page == "Edit Slider") {
            dd('go back there!');
        } elseif ($page == "Edit Mission_Vission") {
        } elseif ($page == "Edit Call To Action") {
        } elseif ($page == "Edit About") {
        } elseif ($page == "Edit Counter") {
        } elseif ($page ==  "Edit Benefit") {
        } elseif ($page ==  "Edit Resources") {
        } elseif ($page == "Edit Registration") {
        } elseif ($page == "Edit Events") {
        } elseif ($page == "Edit Testimonial") {
        } elseif ($page == "Edit Excos") {
        } elseif ($page == "Edit Gallery") {
        } elseif ($page ==  "Edit Contact") {
        }
    }


    public function UpdateColour(Request $request)
    {
        $validatedData = $request->validate([
            'fill_colour' => 'required|string|max:50',
            'main_background' => 'required|string|max:50',
            'text' => 'required|string|max:50',

        ]);

        WebColours::findOrFail($request->fill_id)->update([
            'colour' => $validatedData['fill_colour'],
            'updated_by' => auth()->user()->id,
        ]);
        WebColours::findOrFail($request->main_id)->update([
            'colour' => $validatedData['main_background'],
            'updated_by' => auth()->user()->id,
        ]);
        WebColours::findOrFail($request->text_id)->update([
            'colour' => $validatedData['text'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Colours Updated Successfully.');
        return view('admin.landingpage.index');
    }

    public function UpdateTopbar(Request $request)
    {
        $validatedData = $request->validate([
            'support_phone' => 'required|string|max:50',
            'current_session' => 'required|string|max:50',


        ]);


        WebTopbars::findOrFail(1)->update([
            'current_session' => $validatedData['current_session'],
            'support_phone' => $validatedData['support_phone'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Topbar Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateHeader(Request $request)
    {
        
        $validatedData = $request->validate([
          
            'site_name' => 'string|max:100',
]);

if ($request->logo != "") {
    //dd('yes');
    $new_image = $request->file('logo');
    $manager = new ImageManager(new Driver());
    $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
    $img = $manager->read($new_image);
    $img = $img->resize(150, 150);
    $img->toJpeg(80)->save(base_path('public/website/site_logo/' .   $name_gen));
    $save_url = 'website/site_logo/' .   $name_gen;
} else {
    $save_url = $request->old_logo;
}
        WebHeaders::findOrFail(1)->update([
            'logo' => $save_url,
            'site_name' => $validatedData['site_name'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Header Updated Successfully.');
        return view('admin.landingpage.index');
    }
}
