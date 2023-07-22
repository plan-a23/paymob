<?php

namespace PlanA23\Paymob\traits;

trait SetVariables
{
    private $auth_token;
    private $amount_cents;
    private $items;
    private $shipping_data;
    private $billing_data;
    private $pay_order_id;
    private $payment_token;
    private $phone_number;
    /**
     * @param mixed $auth_token
     */
    public function setAuthToken($auth_token): void
    {
        $this->auth_token = $auth_token;
    }



    /**
     * @param mixed $ammount_cents
     */
    public function setAmountCents($amount_cents): void
    {
        $this->amount_cents = $amount_cents;
    }
    /**
     * @param mixed $items
     */
    /*
        [
    {
        "name": "ASC1515",
        "amount_cents": "500000",
        "description": "Smart Watch",
        "quantity": "1"
    },
    {
        "name": "ERT6565",
        "amount_cents": "200000",
        "description": "Power Bank",
        "quantity": "1"
    }
    ]
     */
    public function setItems($items): void
    {
        $this->items = json_decode($items);
    }

    /**
     * @param mixed $shipping_data
     */
    public function setShippingData($first_name,$last_name,$email,$phone_number,$country,$state,$city,$street,$postal_code): void
    {
        $this->shipping_data = [
            "email"=>"$email",
            "first_name"=> $first_name,
            "street"=> $street,
            "phone_number"=> $phone_number,
            "postal_code"=> $postal_code,
            "city"=> $city,
            "country"=> $country,
            "last_name"=> $last_name,
            "state"=> $state
        ];
    }

    /**
     * @param mixed $billing_data
     */
    public function setBillingData($first_name,$last_name,$email,$phone_number,$country,$state,$city,$street,$postal_code): void
    {
        $this->shipping_data = [
            "email"=>$email,
            "first_name"=> $first_name,
            "street"=> $street,
            "phone_number"=> $phone_number,
            "postal_code"=> $postal_code,
            "city"=> $city,
            "country"=> $country,
            "last_name"=> $last_name,
            "state"=> $state
        ];
    }

    /**
     * @param mixed $pay_order_id
     */
    public function setPayOrderId($pay_order_id): void
    {
        $this->pay_order_id = $pay_order_id;
    }

    /**
     * @param mixed $payment_token
     */
    public function setPaymentToken($payment_token): void
    {
        $this->payment_token = $payment_token;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number): void
    {
        $this->phone_number = $phone_number;
    }
}
