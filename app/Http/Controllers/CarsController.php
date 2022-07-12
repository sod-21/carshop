<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * show all cars
    */
    public $page_count = 15;

    public function index(Request $request) {
        $fields = [
            'make',
            'model',
            'year',
            'condition',
            'price',
            'status',
            'seller'
        ];

        $types = [
            'Sterling',
            'Tesla',
        ];

        $field = $request->query("field");
        $type = $request->query("type");

        $cars = DB::table('cars');

        if ($type) {
            $cars = $cars->where('make', $type);
        }

        if ($field) {        
            $cars = $cars->orderBy($field);
        }

        $cars = $cars->paginate($this->page_count);

        return view('welcome', [
            'cars' => $cars,
            'fields' => $fields,
            'types' => $types,
            'selected_field' => $field,
            'selected_type' => $type
        ]);
    }
}
