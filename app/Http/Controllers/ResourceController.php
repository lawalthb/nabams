<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('resources.index', compact('resources'));
    }


    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'required|file',
            'type' => 'required|string',
            'price' => 'nullable|numeric',
        ]);

        $resource = new Resource();
        $resource->title = $request->title;
        $resource->description = $request->description;
        $resource->file_path = $request->file('file_path')->store('resources');
        $resource->type = $request->type;
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
