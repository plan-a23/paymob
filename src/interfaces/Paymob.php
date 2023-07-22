<?php

namespace PlanA23\Paymob\interfaces;

interface Paymob
{
    public function auth ();
    public function order_registration();
    public function payment_key();
    public function payment();
}
