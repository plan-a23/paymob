<?php

namespace PlanA23\Paymob\Classes;

use PlanA23\Paymob\interfaces\Paymob;
use PlanA23\Paymob\traits\SetIntegrationId;
use PlanA23\Paymob\traits\SetVariables;

abstract class PreparePay implements Paymob
{
    use SetVariables,SetIntegrationId;

    public function __construct()
    {
        $this->auth();
    }

    public function auth()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://accept.paymobsolutions.com/api/auth/tokens',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"api_key": "'.config('API_Key').'"}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        $this->setAuthToken($response['token']);
        return $response;
    }

    public function order_registration()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://accept.paymobsolutions.com/api/ecommerce/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
  "auth_token":  "'.$this->auth_token.'",
  "delivery_needed": "false",
  "amount_cents": "'.$this->amount_cents.'",
  "currency": "EGP",
  "merchant_order_id": '.$this->order_id.',
  "items": '.$this->items.',
  "shipping_data": '.$this->shipping_data.',
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $this->setPayOrderId($response->id);
        return $response;
    }

    public function payment_key()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://accept.paymobsolutions.com/api/acceptance/payment_keys',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
  "auth_token": '.$this->auth_token.',
  "amount_cents": "'.$this->amount_cents.'",
  "expiration": 3600,
  "order_id": "'.$this->pay_order_id.'",
  "billing_data": '.$this->billing_data.',
  "currency": "EGP",
  "integration_id": '.$this->integration_id.',
  "lock_order_when_paid": "false"
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $this->setPaymentToken($response['token']);
        return $response;
    }

    public abstract function payment();
}
