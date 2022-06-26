<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carbrand;
use App\Models\Car;

use Illuminate\Http\Request;



class FrontController extends Controller{

    public function display_car(){
        $cars = [];

        // $cars['rows'] =$this->model->latest()->get();
        $cars['rows'] =Car::latest()->get();

        // $product = Product::where('slug',$slug)->first();

        // return view($this->view_path . 'product_details',compact('product'));
        return view('frontend.car',compact('cars'));
    }
    public function view_details($id){
        $cars_details = [];

        $cars_details = Car::where('id',$id)->first();
        return view('frontend.booking',compact('cars_details'));

    }

}
