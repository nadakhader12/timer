<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Support\Facades\File;

class featurescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = service::orderByDesc('id')->paginate(10);

        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = service::all();
        return view('admin.features.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'content' => 'required',
            'work_id'=>'numeric'
        ]);
        // Upload Images
                $icon_name = null;
                if($request->hasFile('icon')) {
                    $icon = $request->file('icon');
                    $icon_name = rand(). time().$icon->getClientOriginalName();
                    $icon->move(public_path('uploads/features'), $icon_name);
                }
                  // Store To Database
        service::create([
            'title' => $request->title,
            'icon' => $icon_name,
            'content' => $request->content,
            'work_id'=>$request->work_id,
        ]);
         // Redirect
         return redirect()->route('admin.features.index')->with('msg', 'features added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $feature = service::findOrFail($id);
        $features = service::all();

        return view('admin.features.edit', compact('feature', 'features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Validate Data
         $request->validate([
            'title' => 'required',
         'icon' => 'required',
         'content' => 'required',
         'work_id'=>'numeric'
     ]);
        $feature = service::findOrFail($id);

          // Upload Images
          $icon_name = $feature->icon;
          if($request->hasFile('icon')) {
              $icon = $request->file('icon');
              $icon_name = rand(). time().$icon->getClientOriginalName();
              $icon->move(public_path('uploads/features'), $icon_name);
          }

          // Store To Database
          $feature->update([
              'icon' => $icon_name,
              'title' => $request->title,
              'content' => $request->content,
              'work_id' => $request->work_id,
          ]);

          // Redirect
          return redirect()->route('admin.features.index')->with('msg', 'features updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = service::findOrFail($id);

        File::delete(public_path('uploads/features/'.$feature->icon));


        $feature->delete();

        return redirect()->route('admin.features.index')->with('msg', 'feature deleted successfully')->with('type', 'danger');
    }

    public function trash()
    {
        $features = service::onlyTrashed()->orderByDesc('id')->paginate(10);

        return view('admin.features.trash', compact('features'));
    }

    public function restore($id)
    {
        service::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.features.index')->with('msg', 'features restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        service::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.features.index')->with('msg', 'feature deleted permanintly successfully')->with('type', 'danger');
    }
}
