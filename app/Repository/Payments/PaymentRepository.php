<?php

namespace App\Repository\Payments;

use App\Models\Payment;
use App\Notifications\PaymentNotification;
use Notification;

class PaymentRepository implements PaymentInterface
{

    public function getData()
    {
        $response = ['status' => false, 'data' => null, 'message' => null];
        try{

            $payments = Payment::orderBy('id','desc')->paginate(5);
            
            if($payments->isNotEmpty())
                throw new \Exception("data null");

            $response['status'] = true;
            $response['data'] = $payments;

        }catch(\Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function storeData($request)
    {
        $response = ['status' => false,'data' => null,'message' => null];

        try{

            $payment = Payment::create([
                'payment_name' => $request->name
            ]);

            if(!$payment)
                throw new \Exception("cannot create data");

            $response['status'] = true;
            $response['data'] = $payment;

        }catch(\Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function deleteData($id)
    {
        $response = ['status' => false, 'data' => null, 'message' => null];
        try{

            $payment = Payment::find($id);
            if(!$payment)
                throw new \Exception("data with id: $id not found");

            $payment->delete();

            $response['status'] = true;
            $response['message'] = 'Data payment has been deleted';

        }catch(\Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

}