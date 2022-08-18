<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Contact();

    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return  view('admin.contact.index',compact('data'));
    }

    public function create(){

        return  view('frontend.contact');
    }

    public function store(Request $request){
        // die($request->Message);

        //validation
        // $request->validate([
        //     'FullName'=>['required'],
        //     'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'Message'=>['required']

        // ]);
        // ,[
        //     'email.required'=>'Please Enter Your Email.',
        //     'email.email'=>'Email format not valid.',
        // ]);
$contact = new Contact;
$contact->FullName=$request->FullName;
$contact->Email=$request->Email;
$contact->Message=$request->Message;
$contact->save();

        // try{
            // $this->model->create($request->all());
            // session()->flash('success_message','Data Inserted Successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error_message','Something Went Wrong!!');
        // }

        return redirect()->route('home');

    }

    public function show($id){

        $data = [];

        $data['row'] = $this->model->findOrFail($id);

        return  view('admin.contact.show',compact('data'));
    }

    // public function edit($id){

    //     $data = [];

    //     $data['row'] = $this->model->findOrFail($id);

    //     return  view('admin.contact.edit',compact('data'));
    // }

    // public function update(Request $request,$id){

    //     //validation
    //     $request->validate([
    //         'brand' => 'required',
    //     ]);

    //     try{
    //         $data['row'] = $this->model->find($id);
    //         $data['row']->update($request->all());
    //         session()->flash('success_message','Data Updated Successfully');
    //     }
    //     catch(\Exception $e){
    //         session()->flash('error_message','Something Went Wrong!!');
    //     }

    //     return redirect()->route('contact.index');

    // }

    public function delete($id){

        $data['row'] = $this->model->find($id);

        $data['row']->delete();

        session()->flash('success_message','Data Deleted Successfully');

        return redirect()->route('contact.index');

    }
}
