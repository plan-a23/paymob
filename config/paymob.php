<?php

return [
    //Main Config
    "API_Key"=>env("PAYMOB_API_KEY",''),
    "HMAC"=>env("PAYMOB_HMAC",''),

    // Config for pay by card
    "Card_Integration_Id"=>env("PAYMOB_CARD_INTEGRATION",''),
    "Card_IFRAME_id"=>env("PAYMOB_CARD_IFRAME_ID",''),

    // Config for pay by Valu
    "Valu_Integration_Id"=>env("PAYMOB_Valu_INTEGRATION",''),
    "Valu_IFRAME_id"=>env("PAYMOB_VALU_IFRAME_ID",''),

    // Config for pay by Bank Installments
    "Bank_Integration_Id"=>env("PAYMOB_Bank_INTEGRATION",''),
    "Bank_IFRAME_id"=>env("PAYMOB_Bank_IFRAME_ID",''),

    //Config for pay by Premium Card
    "Premium_Integration_Id"=>env("PAYMOB_PREMIUM_INTEGRATION",''),
    "Premium_IFRAME_id"=>env("PAYMOB_PREMIUM_IFRAME_ID",''),

    //Config for pay by SOUHOOLA
    "Souhoola_Integration_Id"=>env("PAYMOB_SOUHOOLA_INTEGRATION",''),
    "Souhoola_IFRAME_id"=>env("PAYMOB_SOIHOOLA_IFRAME_ID",''),

    //Config for pay by GET GO Payments
    "GetGo_Integration_Id"=>env("PAYMOB_GETGO_INTEGRATION",''),
    "GetGo_IFRAME_id"=>env("PAYMOB_GETGO_IFRAME_ID",''),

    //Config for pay by Sympl Payments
    "Sympl_Integration_Id"=>env("PAYMOB_SYMPL_INTEGRATION",''),
    "Sympl_IFRAME_id"=>env("PAYMOB_SYMPL_IFRAME_ID",''),

    //Config for pay by Forsa Payments
    "Forsa_Integration_Id"=>env("PAYMOB_FORSA_INTEGRATION",''),
    "Forsa_IFRAME_id"=>env("PAYMOB_FORSA_IFRAME_ID",''),

    //Config for pay by NowPay Payments
    "NowPay_Integration_Id"=>env("PAYMOB_NOWPAY_INTEGRATION",''),
    "NowPay_IFRAME_id"=>env("PAYMOB_NOWPAY_IFRAME_ID",''),

    //Config for pay by Kiosk Payments
    "Kiosk_Integration_Id"=>env("PAYMOB_KIOSK_INTEGRATION",''),

    //Config for pay by Mobile Wallets
    "Wallets_Integration_Id"=>env("PAYMOB_WALLETS_INTEGRATION",''),

    //Config for pay by Cash Collection
    "Cash_Integration_Id"=>env("PAYMOB_CASH_INTEGRATION",''),




];
