<?php

namespace Tests\Unit;

use App\Jobs\GenerateDeleteData;
use Tests\TestCase;

class PaymentTest extends TestCase
{

    public function testIndexPayment()
    {
        $response = $this->get('api/payments');

        $response->assertStatus(200);
    }

    public function testStoreWithInvalidPaymentName()
    {
        $response = $this->post('api/payments',[
            'name' => '',
        ]);

        $response->assertStatus(422);
    }

    public function testStoreWithValidPaymentData()
    {
        $response = $this->post('api/payments',[
            'name' => 'lala',
        ]);

        $response->assertStatus(200);
    }

    public function testSendQueue()
    {

        $id = [3,4];
        foreach($id as $val) {
            GenerateDeleteData::dispatch($val);
        }

        $this->assertTrue(true);
    }
}
