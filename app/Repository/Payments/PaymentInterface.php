<?php

namespace App\Repository\Payments;


interface PaymentInterface {

    public function getData();
    public function storeData($request);
    public function deleteData($id);

}