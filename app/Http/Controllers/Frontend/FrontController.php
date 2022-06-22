<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carbrand;
use App\Models\Car;


class FrontController extends Controller{
    public function __construct()
    {
        $this->model = new Car();

    }

    public function display_car(){
        $cars = [];

        $cars['rows'] = $this->model->latest()->get();
        return view('frontend.car',compact('cars'));
    }
}
