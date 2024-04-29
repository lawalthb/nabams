<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index()  {
        $websettings = WebSetting::where('id', 1)->first();
        return view('admin.landingpage.edit_settings', compact('websettings'));
    }

    public function update(Request $request) {
      
        
        WebSetting::findOrFail(1)->update([
            'top_bar' =>$request->top_bar,
            'header' =>$request->header,
            'slider' =>$request->slider,
            'vission' =>$request->vission,
            'cta' =>$request->cta,
            'about' =>$request->about,
            'count' =>$request->count,
            'benefit' =>$request->benefit,
            'resources' =>$request->resources,
            'registration' =>$request->registration,
            'event' =>$request->event,
            'testimonial' =>$request->testimonial,
            'excos' =>$request->excos,
            'gallery' =>$request->gallery,
            'pricing' =>$request->pricing,
            'contact' =>$request->contact,
            'faq' =>$request->faq,
            'footer' =>$request->footer,
            
            'user_id' => auth()->user()->id,

        ]);

        session()->flash('success', 'Website Section Updated Successfully.');
        $websettings = WebSetting::where('id', 1)->first();
        return view('admin.landingpage.edit_settings', compact('websettings'));

    }

    public function maintenance(){
        $websettings = WebSetting::where('id', 1)->first();
        return view('admin.landingpage.maintenance', compact('websettings'));
    }

    public function maintenance_update(Request $request){
        $request->validate([
            'maintenance_text' => 'required|string|max:255',
           
        ]);

        WebSetting::findOrFail(1)->update([
            'maintenance' =>$request->maintenance,
            'maintenance_text' =>$request->maintenance_text,
            

        ]);

        session()->flash('success', 'Website Maintenance Mode Updated Successfully.');
        $websettings = WebSetting::where('id', 1)->first();
        return view('admin.landingpage.maintenance', compact('websettings'));
    }



}
