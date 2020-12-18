<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeletePaymentRequest;
use App\Http\Requests\PaymentRequest;
use App\Jobs\GenerateDeleteData;
use App\Repository\Payments\PaymentRepository;

class PaymentController extends Controller
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        $payments = $this->paymentRepository->getData();

        return response()->json($payments,200);
    }

    public function store(PaymentRequest $request)
    {
        try{

            $payments = $this->paymentRepository->storeData($request);

            return response()->json([
                'status_code' => 200,
                'message' => 'Payment has been successfully created',
                'data' => $payments['data']
            ]);

        }catch(\Exception $e) {
            return response()->json([
                'status_code' => $e->getCode() == 0 ? 400 : $e->getCode(),
                'data' => $e->getMessage()
            ],$e->getCode() == 0 ? 400 : $e->getCode());
        }

    }

    public function destroy(DeletePaymentRequest $request)
    {
        try{

            if(is_array($request->id)) {
                foreach($request->id as $row) {
                    GenerateDeleteData::dispatch($row);
                }
            }

            return response()->json([
                'status' => 200,
                'message' => 'Payment has been successfully deleted'
            ]);

        }catch(\Exception $e) {
            return response()->json([
                'status_code' => $e->getCode() == 0 ? 400 : $e->getCode(),
                'data' => $e->getMessage()
            ],$e->getCode() == 0 ? 400 : $e->getCode());
        }
    }

    
}