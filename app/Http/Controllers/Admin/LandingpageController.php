<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebColours;
use Illuminate\Http\Request;

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
            $topbar = WebTopbar::where('id', 1)->select('colour', 'id')->first();

            return view('admin.landingpage.edit_topbar');
        } elseif ($page == "Edit Header") {
            return  view('admin.landingpage.edit_colour');
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
}
