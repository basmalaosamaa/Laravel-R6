<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->validate([
            'carTitle' => 'requierd|string',
            'description' => 'requierd|string|max:1000',
            'price' => 'requierd|numeric|max:6',
        ]);
        $data['published'] = isset($request->published);
        Car::create($data);
        return "Data added successfuly";
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('edit_car', compact('car'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request , $id);
        $data = [
            'carTitle' => $request->carTitle,
            'price' => $request->price,
            'description' => $request->description,
            'published' => isset($request->published),
        ];
        Car::where('id', $id)->update($data);
        return redirect()->route('cars.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars.index');

    }
    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect()->route('cars.showDeleted');

    }

    public function showDeleted()
    {

        $cars = Car::onlyTrashed()->get();
        return view('trashedCars', compact('cars'));
    }
    public function restore(string $id)
    {

        Car::where('id', $id)->restore();
        return redirect()->route('cars.showDeleted');
    }
}
