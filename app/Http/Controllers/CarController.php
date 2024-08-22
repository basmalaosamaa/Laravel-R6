<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;
use Illuminate\Http\Request;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('category')->get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();
        return view('add_car', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'published' => 'boolean',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        // $data['published'] = isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assets/images/cars');
        $car = Car::create($data);
        // dd($data);
        return redirect()->route('cars.index')->with('content' , 'Car added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // There two ways to retrieve Category Name :
        //one is === $categoryname = $car->category->category_name;
        $car = Car::with('category')->findOrFail($id); // <- the other
        // dd($car->category->category_name);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $categories = Category::all();
        return view('edit_car', compact('car', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request , $id);
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'published' => 'boolean',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/cars');
        }

        // $data['published'] = isset($request->published);

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
