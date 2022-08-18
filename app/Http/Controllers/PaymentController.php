<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Booking;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function verifyPayment(Request $request){
    $amount=$request->amount;
    $token=$request->token;
    $test_secret_key=config('app.khalti_secret_key');
    $args = http_build_query(array(
        'token' => $token,
        'amount'  => $amount
    ));

    $url = "https://khalti.com/api/v2/payment/verify/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = ["Authorization: Key $test_secret_key"];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Response
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $token = json_decode($response, TRUE);

    if (isset($token['idx'])&& $status_code == 200)
    {
$payment =new Payment;
$payment->transaction_id=$token['idx'];
$payment->amount=$token['amount']/100;
$payment->paid_by=auth()->user()->id;
$payment->paid_for=$token['product_identity'];
$payment->save();

$data['books'] = Booking::where('id',$request->id);
$data['books']->update(['status'=>'paid']);

   }
return $response;
   }
   public function storePayment(Request $request){
//
}
public function all_payments(){
    $data = [];

$data['rows'] = Payment::all();

return  view('admin.payment.allpayments',compact('data'));
 }
}
