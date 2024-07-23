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
        //
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
        $className=request()->className;
        $capacity=request()->capacity;
        $isFulled=isset($request->isFulled);
          //or
          //if(isset(request->isFulled)){
          // $isfulled = true;
          //}else{
         //  $isfulled = false;
         //}
          
        $price=request()->price;
        $timeFrom=request()->timeFrom;
        $timeTo=request()->timeTo;
       
        $timeFrom= Carbon::parse($timeFrom)->format('H:i:s');
        $timeTo = Carbon::parse($timeTo)->format('H:i:s');
        Classroom::create([
            'className' => $className ,
            'capacity' => $capacity,
            'isFulled'=> $isFulled,
            'price' => $price,
            'timeFrom' => $timeFrom,
            'timeTo' => $timeTo,
           ]);
        

         return "added successfuly";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
