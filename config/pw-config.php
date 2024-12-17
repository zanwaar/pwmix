<?php




/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

return [
    'chat_log_path' => '/root/logservice/logs',
    'currency_name' => 'Coin',
    'encryption_type' => 'base64',
    'level_up_cap' => '150',
    'logo' => 'logo-8.png',
    'server_ip' => '127.0.0.1',
    'server_name' => 'Might Development',
    'fbfp' => 'https://www.facebook.com/pwcr.indo',
    'fakeonline' => '150',
    'server_version' => '156',
    'teleport_world_tag' => '1',
    'teleport_x' => '1280.6788',
    'teleport_y' => '219.61784',
    'teleport_z' => '1021.2097',
    'version' => '1.0',
    'ignoreRoles' => '1024,1040,1056,1088,3968',
    'ignoreFaction' => '19',
    'system' => [
        'apps' => [
            'news' => true,
            'shop' => true,
            'donate' => true,
            'voucher' => false,
            'inGameService' => true,
            'ranking' => true,
            'vote' => false,
            'captcha' => false
        ],
    ],
    'news' => [
        'page' => '15',
    ],
    'shop' => [
        'page' => '15'
    ],
    'payment' => [
        'paymentwall' => [
            'status' => false,
            'widget_code' => 'p4_1',
            'widget_width' => '371',
            'widget_high' => '450',
            'project_key' => '',
            'secret_key' => '',
            'pingback_path' => 'pingback/paymentwall'
        ],
        'bank_transfer' => [
            'status' => false,
            'double' => false,
            'accountOwner' => '',
            'bankAccountNo1' => '',
            'bankName1' => '',
            'bankAccountNo2' => '',
            'bankName2' => '',
            'bankAccountNo3' => '',
            'bankName3' => '',
            'multiply' => '100000',
            'limit' => '5000000',
            'CurrencySign' => 'Rp.',
            'payment_price' => '1750',
        ],
        'paypal' => [
            'status' => false,
            'double' => false,
            'client_id' => '',
            'secret' => '',
            'currency' => 'USD',
            'currency_per' => '1',
            'minimum' => '1',
            'maximum' => '50',
            'mingetbonus' => '500',
            'bonusess' => '10',
            'sandbox' => true
        ],
        'ipaymu' => [
            'status' => true,
            'double' => false,
            'va' => '0000002287564411',
            'apikey' => 'SANDBOXCD39B1F6-B8C1-46A4-AEB6-9958B832409A',
            'sandbox' => true
        ],
        'tripay' => [
            'status' => true,
            'double' => false,
            'merchant_code' => 'T18680',
            'api_key' => 'DEV-acKeLiPYSsBJM5U7f47WFebNxjltJsA7rvnU4oKc',
            'private_key' => 'xxdWW-7ywzm-MDwZP-AQzH5-qahNc',
            'sandbox' => true
        ],
    ],
    'discord' => 'https://discord.gg/'
];
