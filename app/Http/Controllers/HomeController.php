<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $new_cars=[];
        $new_cars['rows'] =Car::where('stock',1)->latest()->take(3)->get();
        return view('home',compact('new_cars'));
    }
    public function view_details($id){
        $cars_details = [];

        $cars_details = Car::where('id',$id)->first();
        return view('frontend.booking',compact('cars_details'));

    }
    public function handleAdmin()
    {
        return view('admin.dashboard');
    }
}
