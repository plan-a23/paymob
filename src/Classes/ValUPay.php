<?php

namespace PlanA23\Paymob\Classes;

use PlanA23\Paymob\traits\SetIntegrationId;
use PlanA23\Paymob\traits\SetVariables;

class ValUPay extends PreparePay
{
    use SetIntegrationId,SetVariables;
    public function __construct()
    {
        parent::__construct();
        $this->setPaymentType('valu');
    }

    public function payment()
    {
        return 'https://accept.paymobsolutions.com/api/acceptance/iframes/'.$this->iframe_id.'?payment_token='.$this->payment_token;
    }
}
