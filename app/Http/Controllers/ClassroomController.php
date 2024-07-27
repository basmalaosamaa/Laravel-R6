<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use carbon\carbon;

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
        // dd($request);
        // return $data;
        // dd($data);
        // $data = request()->all();
     
        $data = [
            'className' => $request->className,
            'capacity' => $request->capacity,
            'isFulled' => isset($request->isFulled),
            'price' => $request->price,
            'timeFrom' => Carbon::parse($request->timeFrom)->format('H:i:s'),
            'timeTo' => Carbon::parse($request->timeTo)->format('H:i:s'),

        ];
        Classroom::create($data);
        

         return " Data added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classroom::findOrfail($id);
       return view('class_details' , compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classroom::findOrfail($id);
        return view('edit_class' , compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'className' => $request->className,
            'capacity' => $request->capacity,
            'isFulled' => isset($request->isFulled),
            'price' => $request->price,
            'timeFrom' => Carbon::parse($request->timeFrom)->format('H:i:s'),
            'timeTo' => Carbon::parse($request->timeTo)->format('H:i:s'),

        ];
        Classroom::where('id' , $id)->update($data);
        return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Classroom::where('id', $id)->delete();
        return redirect()->route('class.index');
    }
}
