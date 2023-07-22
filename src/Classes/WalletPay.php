<?php

namespace PlanA23\Paymob\Classes;

use PlanA23\Paymob\traits\SetIntegrationId;
use PlanA23\Paymob\traits\SetVariables;

class WalletPay extends PreparePay
{
    use SetIntegrationId,SetVariables;
    public function __construct()
    {
        parent::__construct();
        $this->setPaymentType('wallet');
    }

    public function payment()
    {
        $this->order_registration();
        $this->payment_key();

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://accept.paymob.com/api/acceptance/payments/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "source": {
                "identifier": '.$this->phone_number.',
                "subtype": "WALLET"
              },
              "payment_token":"'.$this->payment_token.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response['redirect_url'];
    }
}
