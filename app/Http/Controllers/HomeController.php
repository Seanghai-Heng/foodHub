<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::join('types', 'foods.typeId', '=', 'types.id')
            ->get(['foods.*', 'types.name as type_name']);
        return view('index', compact('foods'));
    }
}
