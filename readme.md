# Paymob

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require plan-a23/paymob
```

## Main Setup
### Config
```bush
$ php artisan vendor:publish --tag=config --force
```
### env
```dotenv
PAYMOB_API_KEY: xxxxxxx
PAYMOB_HMAC: xxxxxxxx
```
## Card
### env
```dotenv
PAYMOB_CARD_INTEGRATION:xxxxx
PAYMOB_CARD_IFRAME_ID:xxxxx
```
### Payment
```php
use PlanA23\Paymob\Classes\CardPay;

$pay = new CardPay();
$pay->setItems([
    [
        "name"=>"ASC1515",
        "amount_cents"=> "500000",
        "description"=>"Smart Watch",
        "quantity"=> "1"
    ],
    [
        "name"=> "ERT6565",
        "amount_cents"=> "200000",
        "description"=> "Power Bank",
        "quantity"=> "1"
    ]
]);
$pay->setAmountCents(700000);
$pay->setPayOrderId(2); // don't duplicate this id
// can enter shipping data only or shipping and billing
$pay->setShippingData(
    first_name: 'test',
    last_name:'test',
    email: 'test@domain.com',
    phone_number:'+201xxxxxxxx',
    country:'EG',
    state:'giza',
    city: '6 october',
    street: '123 elhosry' ,
    postal_code: 34546
);
$pay->setBillingData( 
    first_name: 'test',
    last_name:'test',
    email: 'test@domain.com',
    phone_number:'+201xxxxxxxx',
    country:'EG',
    state:'giza',
    city: '6 october',
    street: '123' ,
    postal_code: 34546);
return $pay->payment();
```

## Wallet
### env
```dotenv
PAYMOB_WALLETS_INTEGRATION:xxxxxxx
```
### payment
```php
use PlanA23\Paymob\Classes\WalletPay;
$pay = new WalletPay();
$pay->setItems([
    [
        "name"=>"ASC1515",
        "amount_cents"=> "500000",
        "description"=>"Smart Watch",
        "quantity"=> "1"
    ],
    [
        "name"=> "ERT6565",
        "amount_cents"=> "200000",
        "description"=> "Power Bank",
        "quantity"=> "1"
    ]
]);
$pay->setAmountCents(700000);
$pay->setPayOrderId(2); // don't duplicate this id
// can enter shipping data only or shipping and billing
$pay->setShippingData(
    first_name: 'test',
    last_name:'test',
    email: 'test@domain.com',
    phone_number:'+201xxxxxxxx',
    country:'EG',
    state:'giza',
    city: '6 october',
    street: '123 elhosry' ,
    postal_code: 34546
);
$pay->setBillingData(
    first_name: 'test',
    last_name:'test',
    email: 'test@domain.com',
    phone_number:'+201xxxxxxxx',
    country:'EG',
    state:'giza',
    city: '6 october',
    street: '123 elhosry' ,
    postal_code: 34546);
$pay->setPhoneNumber('+201xxxxxxxxx'); // for wallet
return $pay->payment(); //this is link for payment

```
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author@email.com instead of using the issue tracker.

## Credits

- [Author Name][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/plan-a23/paymob.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/plan-a23/paymob.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/plan-a23/paymob/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/plan-a23/paymob
[link-downloads]: https://packagist.org/packages/plan-a23/paymob
[link-travis]: https://travis-ci.org/plan-a23/paymob
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/plan-a23
[link-contributors]: ../../contributors
