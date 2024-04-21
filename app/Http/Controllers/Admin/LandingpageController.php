<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebAbouts;
use App\Models\WebBenefits;
use App\Models\WebColours;
use App\Models\WebContacts;
use App\Models\WebCounters;
use App\Models\WebCta;
use App\Models\WebEvents;
use App\Models\WebExcos;
use App\Models\WebGalleries;
use App\Models\WebHeaders;
use App\Models\WebRegistrations;
use App\Models\WebResources;
use App\Models\WebSliders;
use App\Models\WebTestimonials;
use App\Models\WebTopbars;
use App\Models\WebVissions;
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
        //redirect to page to update website
        $page = $request->page_to_edit;
        if ($page == "Edit Colour") {
            $fill = WebColours::where('id', 1)->select('colour', 'id')->first();
            $main = WebColours::where('id', 2)->select('colour', 'id')->first();
            $text = WebColours::where('id', 3)->select('colour', 'id')->first();
            return  view('admin.landingpage.edit_colour', compact('fill', 'main', 'text'));
        } 
        elseif ($page == "Edit Topbar") {
            $topbar = WebTopbars::where('id', 1)->select('current_session', 'support_phone')->first();

            return view('admin.landingpage.edit_topbar', compact('topbar'));
        } elseif ($page == "Edit Header") {
            $header = WebHeaders::where('id', 1)->first();
            return  view('admin.landingpage.edit_header' , compact('header'));
        } elseif ($page == "Edit Slider") {
            $sliders = WebSliders::get();
            return  view('admin.landingpage.edit_slider' , compact('sliders'));
        } elseif ($page == "Edit Mission_Vission") {
            $vissions = WebVissions::get();
            return  view('admin.landingpage.edit_vission' , compact('vissions'));
        } elseif ($page == "Edit Call To Action") {
            $cta= WebCta::where('id', 1)->first();

            return view('admin.landingpage.edit_ctas', compact('cta'));
        } elseif ($page == "Edit About") {
            $about= WebAbouts::where('id', 1)->first();

            return view('admin.landingpage.edit_about', compact('about'));
        } elseif ($page == "Edit Counter") {
            $counters = WebCounters::get();
            return  view('admin.landingpage.edit_counters' , compact('counters'));
        } elseif ($page ==  "Edit Benefit") {
            $benefits = WebBenefits::get();
            return  view('admin.landingpage.edit_benefits' , compact('benefits'));
        } elseif ($page ==  "Edit Resources") {
            $resources = WebResources::get();
            return  view('admin.landingpage.edit_resources' , compact('resources'));
        } elseif ($page == "Edit Registration") {
            $reg= WebRegistrations::where('id', 1)->first();

            return view('admin.landingpage.edit_registration', compact('reg'));
        } elseif ($page == "Edit Events") {
            $events = WebEvents::get();
            return  view('admin.landingpage.edit_events' , compact('events'));
        } elseif ($page == "Edit Testimonial") {
            $testys = WebTestimonials::get();
            return  view('admin.landingpage.edit_testys' , compact('testys'));
        } elseif ($page == "Edit Excos") {
            $excos = WebExcos::get();
            return  view('admin.landingpage.edit_excos' , compact('excos'));
        } elseif ($page == "Edit Gallery") {
            $galleries = WebGalleries::get();
            return  view('admin.landingpage.edit_gallery' , compact('galleries'));
        } elseif ($page ==  "Edit Contact") {
            $contact = WebContacts::where('id', 1)->first();
            return  view('admin.landingpage.edit_contact' , compact('contact'));
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


    public function UpdateSlider(Request $request)
    {
        
        $validatedData = $request->validate([
            'text' => 'string|max:150',
            'caption' => 'string|max:100',
        ]);

        if ($request->image != "") {
            //dd('yes');
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(1920, 1152);
            $img->toJpeg(80)->save(base_path('public/website/slide/' .   $name_gen));
            $save_url = 'website/slide/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }
        WebSliders::findOrFail($request->id)->update([
            'image' => $save_url,
            'caption' => $validatedData['caption'],
            'text' => $validatedData['text'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Slider Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateVission(Request $request)
    {
        
        $validatedData = $request->validate([
            'text' => 'string|max:150',
            'name' => 'required|string|max:50',
        ]);

        
        WebVissions::findOrFail($request->id)->update([
            'icon' =>$request->icon,
            'name' => $validatedData['name'],
            'text' => $validatedData['text'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Vission Mission Updated Successfully.');
        return view('admin.landingpage.index');
    }

    
    public function UpdateCta(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'button_text' => 'required|string|max:50',
            'text' => 'required|string|max:255',


        ]);

        WebCta::findOrFail(1)->update([
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'button_text' => $validatedData['button_text'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website CTA Updated Successfully.');
        return view('admin.landingpage.index');
    }

    public function UpdateAbout(Request $request)
    {
        
        $validatedData = $request->validate([
          
            'text' => 'string|max:500',
            'body' => 'max:5000',
            // 'custom' => ['required', 'string', function ($attribute, $value, $fail) {
              
            //     if ($value !== strip_tags($value)) {
            //         $fail('The :attribute field contains disallowed HTML tags.');
            //     }
            // }],
        ]);

            
        if ($request->image != "") {
           
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(1024, 768);
            $img->toJpeg(80)->save(base_path('public/website/about/' .   $name_gen));
            $save_url = 'website/about/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }
        WebAbouts::findOrFail(1)->update([
            'image' => $save_url,
            'text' => $validatedData['text'],
            'body' => $validatedData['body'],
            'custom' => $request->custom,
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website About Updated Successfully.');
        return view('admin.landingpage.index');
    }

    public function UpdateCounter(Request $request)
    {
        
        $validatedData = $request->validate([
            'text' => 'string|max:150',
            'count' => 'required|string|max:50',
            'position' => 'required|integer|max:50',
        ]);

        
        WebCounters::findOrFail($request->id)->update([
            'icon' =>$request->icon,
            'count' => $validatedData['count'],
            'text' => $validatedData['text'],
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Counter  Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateBenefit(Request $request)
    {
        
        $validatedData = $request->validate([
            'text' => 'string|max:150',
            'title' => 'required|string|max:50',
            'position' => 'required|integer|max:50',
        ]);

        if ($request->image != "") {
           
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(640, 640);
            $img->toJpeg(80)->save(base_path('public/website/benefit/' .   $name_gen));
            $save_url = 'website/benefit/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }


        
        WebBenefits::findOrFail($request->id)->update([
            'icon' =>$request->icon,
            'image' =>$save_url,
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Benefit Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateResources(Request $request)
    {
        
        $validatedData = $request->validate([
            'text' => 'string|max:150',
            'title' => 'required|string|max:100',
            'position' => 'required|integer|max:50',
        ]);

    
        WebResources::findOrFail($request->id)->update([
            'icon' =>$request->icon,
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Resources Updated Successfully.');
        return view('admin.landingpage.index');
    }

    public function UpdateRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            
            'text' => 'required|string|max:255',


        ]);

        WebRegistrations::findOrFail(1)->update([
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
           
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Registration Updated Successfully.');
        return view('admin.landingpage.index');
    }




    public function UpdateEvents(Request $request)
    {
        
        $validatedData = $request->validate([
            'short_text' => 'string|max:250',
            'long_text' => 'string|max:1000',
            'title' => 'required|string|max:100',
            'position' => 'required|integer|max:50',
        ]);

        if ($request->image != "") {
           
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(600, 525);
            $img->toJpeg(80)->save(base_path('public/website/events/' .   $name_gen));
            $save_url = 'website/events/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }


        
        WebEvents::findOrFail($request->id)->update([
            'short_text' =>$validatedData['short_text'],
            'image' =>$save_url,
            'long_text' => $validatedData['long_text'],
            'title' => $validatedData['title'],
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Event Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateTesty(Request $request)
    {
        
        $validatedData = $request->validate([
            'testimony' => 'string|max:1050',
            'name' => 'string|max:200',
           
            'position' => 'required|integer|max:50',
        ]);

        if ($request->image != "") {
           
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(200, 200);
            $img->toJpeg(80)->save(base_path('public/website/testy/' .   $name_gen));
            $save_url = 'website/testy/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }

        WebTestimonials::findOrFail($request->id)->update([
            'testimony' =>$validatedData['testimony'],
            'picture' =>$save_url,
            'name' => $validatedData['name'],
           
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Testimony Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateExcos(Request $request)
    {
        
        $validatedData = $request->validate([
            'post' => 'string|max:1050',
            'name' => 'string|max:200',
           
            'position' => 'required|integer|max:50',
        ]);

        if ($request->image != "") {
           
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(600, 600);
            $img->toJpeg(80)->save(base_path('public/website/excos/' .   $name_gen));
            $save_url = 'website/excos/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }

        WebExcos::findOrFail($request->id)->update([
            'post' =>$validatedData['post'],
            'image' =>$save_url,
            'name' => $validatedData['name'],
           
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Excos Updated Successfully.');
        return view('admin.landingpage.index');
    }



    public function UpdateGallery(Request $request)
    {
        
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'position' => 'required|integer|max:50',
        ]);

        if ($request->image != "") {
           
            $new_image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' .  $new_image->getClientOriginalExtension();
            $img = $manager->read($new_image);
            $img = $img->resize(800, 600);
            $img->toJpeg(80)->save(base_path('public/website/gallery/' .   $name_gen));
            $save_url = 'website/gallery/' .   $name_gen;
        } else {
            $save_url = $request->old_image;
        }

        WebGalleries::findOrFail($request->id)->update([
           
            'images' =>$save_url,
            'position' => $validatedData['position'],
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Gallery Updated Successfully.');
        return view('admin.landingpage.index');
    }


    public function UpdateContact(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:1000',
            'email1' => 'required|string|max:50',
            'email2' => 'required|string|max:50',
            'phone1' => 'required|string|max:50',
            'phone2' => 'required|string|max:50',
            'address' => 'required|string|max:200',


        ]);

        WebContacts::findOrFail(1)->update([
            'email1' => $validatedData['email1'],
            'email2' => $validatedData['email2'],
            'phone1' => $validatedData['phone1'],
            'phone2' => $validatedData['phone2'],
            'text' => $validatedData['text'],
            'address' => $validatedData['address'],
            
            'updated_by' => auth()->user()->id,
        ]);



        session()->flash('success', 'Website Contact Updated Successfully.');
        return view('admin.landingpage.index');
    }



}
