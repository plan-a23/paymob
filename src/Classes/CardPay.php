<?php

namespace PlanA23\Paymob\Classes;

use PlanA23\Paymob\traits\SetIntegrationId;
use PlanA23\Paymob\traits\SetVariables;

class CardPay extends PreparePay
{
    use SetIntegrationId,SetVariables;
    public function __construct()
    {
        parent::__construct();
        $this->setPaymentType('card');
    }

    public function payment()
    {
        $this->order_registration();
        $this->payment_key();
        return 'https://accept.paymobsolutions.com/api/acceptance/iframes/'.$this->iframe_id.'?payment_token='.$this->payment_token;
    }
}
