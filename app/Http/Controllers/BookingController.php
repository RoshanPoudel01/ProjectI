<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
public function user_bookings(){
    $id = Auth::user()->id;
    $data = [];

    // $data['rooms'] = Room::get();
    $data['books'] = Booking::where('booking_by',$id)->get();
    $data['books'] = Booking::where('status','booked')->get();

     return view('frontend.mybooking',compact('data'));
        }

public function book_car(Request $request){

        $start=Carbon::parse($request['start_date']);
        $end=Carbon::parse($request['end_date']);
        $result = $start->diffInDays($end);

                // Booking::create([
                //     'booking_for'    => $request['car_id'],
                //     'amount'         => $car_details->minimum_charge,
                //     'start_date'=>$request['book_date'],
                //     'end_date'=>$request['end_date'],
                //     // 'grand_total'   => $product->price * $request['quantity'],
                //     'booking_by'       => auth()->id(),
                // ]);
             $request->validate([
                'start_date'=>'required|date|after_or_equal:today',
                'end_date'=>'required|date|after:start_date',
                'address'=>'required|string',

             ],[
                'start_date.required'=>'Please Enter the Start Date for your Booking.',
                'start_date.after_or_equal'=>'Booking Start Date Cannot be in the past.',
                'end_date.required'=>'Please Enter the Date you Will Return the car.',
                'end_date.after'=>'Please choose date after your booking date.',
                'address.required'=>'Please Provide Location for Pick Up',


             ]);
                $request->request->add(['booking_by' => auth()->user()->id]);
                $request->request->add(['booking_for' => $request['car_id']]);
                $request->request->add(['amount' => $request['amount']*$result]);
              Booking::create($request->all());

                return redirect()->route('car.booking');

         }
         public function total_booking(){
            $data = [];

        $data['rows'] = Booking::all();

        return  view('admin.booking.viewbookings',compact('data'));
         }
         public function delete($id){
            die('hi');

            $data['books'] = Booking::where('id',$id);

            $data['books']->update(['status'=>'cancelled']);

            session()->flash('success_message','Data Deleted Successfully');

            return redirect()->route('car.booking');

        }
}
