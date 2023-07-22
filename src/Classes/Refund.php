<?php

namespace PlanA23\Paymob\Classes;

use Illuminate\Support\Facades\Http;

class Refund
{
    public function refund($transaction_id,$amount): array
    {
        $request_new_token = Http::withHeaders(['content-type' => 'application/json'])
            ->post('https://accept.paymobsolutions.com/api/auth/tokens', [
                "api_key" => $this->paymob_api_key
            ])->json();
        $refund_process = Http::withHeaders(['content-type' => 'application/json'])
            ->post('https://accept.paymob.com/api/acceptance/void_refund/refund',['auth_token'=>$request_new_token['token'],'transaction_id'=>$transaction_id,'amount_cents'=>$amount])->json();

        return [
            'transaction_id'=>$transaction_id,
            'amount'=>$amount,
        ];

    }

}
