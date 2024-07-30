<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use carbon\carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes=Classroom::get();
        return view('classes', compact('classes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'className' => 'required|string',
            'capacity' => 'required|Numeric|max:30',
            'price' => 'required|numeric|max:10000',
            'timeFrom' => 'required',
            'timeTo' => 'required',
        ]);
        $data['isFulled'] = isset($request->isFulled);
        // dd($data);
         Classroom::create($data);
         return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $class)
    {
       return view('class_details' , compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $class)
    {
        return view('edit_class' , compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'className' => 'required|string',
            'capacity' => 'required|Numeric|max:30',
            'price' => 'required|numeric|max:10000',
            'timeFrom' => 'required',
            'timeTo' => 'required',
        ]);
        $data['isFulled'] = isset($request->isFulled);
        // dd($data);
         Classroom::create($data);
         return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Classroom::where('id', $id)->delete();
        return redirect()->route('classes.index');
    }
    public function showDeleted(){
       $classes = Classroom::onlyTrashed()->get();
        return view('trashedClasses' , compact('classes'));
    }
    public function restore(string $id){
        Classroom::where('id' , $id)->restore();
        return redirect()->route('classes.showDelete');
    }
    public function forceDelete(string $id){
        Classroom::where('id' , $id)->forceDelete();
        return redirect()->route('classes.showDelete');
    }
}
