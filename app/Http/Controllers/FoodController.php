<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Type;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::join('types', 'foods.typeId', '=', 'types.id')->orderBy('foods.id')
            ->get(['foods.*', 'types.name as type_name']);
        // return $foods;
        return view('foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('foods.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;
        $food->typeId = $request->type;
        $food->name = $request->name;
        $food->price = $request->price;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/foods/', $filename);
            $food->food_image = $filename;
        }
        $food->save();
        return redirect()->route('foods.index')
            ->with('success', 'Food Image has been uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $food = Food::where('foods.id', $id)->join('types', 'foods.typeId', '=', 'types.id')
            ->first(['foods.*', 'types.name as type_name']);
        // return $food;
        return view('foods.edit', compact('food', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);
        $food = Food::findOrFail($id);
        $food->name = $request->name;
        $food->typeId = $request->type;
        $food->price = $request->price;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/foods/', $filename);
            $food->food_image = $filename;
        }
        $food->save();
        return redirect()->route('foods.index')
            ->with('success', 'Food Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->route('foods.index')->with('success', 'Food Data is successfully deleted');
    }
}
