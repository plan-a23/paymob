<?php

namespace PlanA23\Paymob\traits;

trait SetIntegrationId
{
    private $payment_type;

    private $integration_id;
    private $iframe_id;

    /**
     * @param mixed $payment_type
     */
    public function setPaymentType($payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    public function setIntegrationId(): void
    {
        switch ($this->payment_type){
            case 'card':
                $this->integration_id = config('plana-paymob.Card_Integration_Id');
                $this->iframe_id = config('plana-paymob.Card_IFRAME_id');
                break;
            case 'valu':
                $this->integration_id = config('plana-paymob.Valu_Integration_Id');
                $this->iframe_id = config('plana-paymob.Valu_IFRAME_id');
                break;
            case 'bank':
                $this->integration_id = config('plana-paymob.Bank_Integration_Id');
                $this->iframe_id = config('plana-paymob.Bank_IFRAME_id');
                break;
            case 'premium':
                $this->integration_id = config('plana-paymob.Premium_Integration_Id');
                $this->iframe_id = config('plana-paymob.Premium_IFRAME_id');
                break;
            case 'souhoola':
                $this->integration_id = config('plana-paymob.Souhoola_Integration_Id');
                $this->iframe_id = config('plana-paymob.Souhoola_IFRAME_id');
                break;
            case 'getGo':
                $this->integration_id = config('plana-paymob.GetGo_Integration_Id');
                $this->iframe_id = config('plana-paymob.GetGo_IFRAME_id');
                break;
            case 'sympl':
                $this->integration_id = config('plana-paymob.Sympl_Integration_Id');
                $this->iframe_id = config('plana-paymob.Sympl_IFRAME_id');
                break;
            case 'forsa':
                $this->integration_id = config('plana-paymob.Forsa_Integration_Id');
                $this->iframe_id = config('plana-paymob.Forsa_IFRAME_id');
                break;
            case 'nowPay':
                $this->integration_id = config('plana-paymob.NowPay_Integration_Id');
                $this->iframe_id = config('plana-paymob.NowPay_IFRAME_id');
                break;
            case 'kiosk':
                $this->integration_id = config('plana-paymob.Kiosk_Integration_Id');
                break;
            case 'wallet':
                $this->integration_id = config('plana-paymob.Wallets_Integration_Id');
                break;
            case 'cash':
                $this->integration_id = config('plana-paymob.Cash_Integration_Id');
                break;
        }

    }

}
