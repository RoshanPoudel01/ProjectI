<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carbrand;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;



class FrontController extends Controller{

    public function display_car(){
        $cars = [];

        // $cars['rows'] =$this->model->latest()->get();
        $cars['rows'] =Car::latest()->get();


        return view('frontend.car',compact('cars'));
    }
    public function view_details($id){
        $cars_details = [];

        $cars_details = Car::where('id',$id)->first();
        return view('frontend.booking',compact('cars_details'));

    }
    // public function view_new_cars(){
    //     $new_cars=[];
    //  $new_cars['rows'] =$this->model->latest()->take(3)->get();
    //  return view('frontend.car',compact('cars'));

    // }
    public function myprofile(){

        $id = Auth::user()->id;
        $data = [];

        // $data['rooms'] = Room::get();
        $data['row'] = User::where('id',$id)->first();
        return view('frontend.user',compact('data'));

    }

    public function myprofile_edit($id){

        $id = Auth::user()->id;
        $data = [];
        $data['row'] = User::where('id',$id)->first();
        return view('frontend.useredit',compact('data'));
    }

    public function myprofile_update(Request $request,$id){
        $user = User::find($id);
        // $request = request();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move('images/', $image_name);
            $user->update(['images' => $image_name]);


        }

        try{

            $data['row'] = User::where('id',$id)->first();

            $data['row']->update($request->all());
            session()->flash('success_message','Profile Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong!!');

        }
        return redirect()->route('myprofile');

    }
}
