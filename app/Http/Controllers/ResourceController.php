<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;

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
        
        // Save file in public/resources directory
        $path = $request->file('file_path')->storeAs('public/resources', $request->file('file_path')->getClientOriginalName());
        $resource->file_path = str_replace('public/', '', $path);
        
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
        $resource = Resource::findOrFail($id);
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'nullable|file',
            'type' => 'required|string',
            'price' => 'nullable|numeric',
        ]);

        $resource = Resource::findOrFail($id);
        $resource->title = $request->title;
        $resource->description = $request->description;
        
        if ($request->hasFile('file_path')) {
            $resource->file_path = $request->file('file_path')->store('resources');
        }
        
        $resource->type = $request->type;
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


}
