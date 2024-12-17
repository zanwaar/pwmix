<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use Illuminate\View\Component;

class DonateLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (request()->routeIs('app.donate.paymentwall')) {
            $status = 'true';
            $PWIndexText = '700';
            $PWIndexLight = 'text-light';
            $BankIndexText = '400';
            $BankIndexLight = 'text-gray-400';
            $HistoryIndexText = '400';
            $HistoryIndexLight = 'text-gray-400';
            $PaypalText = '400';
            $PaypalLight = 'text-gray-400';
            $IpaymuText = '400';
            $IpaymuLight = 'text-gray-400';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
            
        } elseif (request()->routeIs('app.donate.bank')) {
            $status = 'true';
            $PWIndexText = '400';
            $PWIndexLight = 'text-gray-400';
            $BankIndexText = '700';
            $BankIndexLight = 'text-light';
            $HistoryIndexText = '400';
            $HistoryIndexLight = 'text-gray-400';
            $PaypalText = '400';
            $PaypalLight = 'text-gray-400';
            $IpaymuText = '400';
            $IpaymuLight = 'text-gray-400';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
        } elseif (request()->routeIs('app.donate.history')) {
            $status = 'true';
            $PWIndexText = '400';
            $PWIndexLight = 'text-gray-400';
            $BankIndexText = '400';
            $BankIndexLight = 'text-gray-400';
            $HistoryIndexText = '700';
            $HistoryIndexLight = 'text-light';
            $PaypalText = '400';
            $PaypalLight = 'text-gray-400';
            $IpaymuText = '400';
            $IpaymuLight = 'text-gray-400';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
        } elseif (request()->routeIs('app.donate.paypal')) {
            $status = 'true';
            $PWIndexText = '400';
            $PWIndexLight = 'text-gray-400';
            $BankIndexText = '400';
            $BankIndexLight = 'text-gray-400';
            $HistoryIndexText = '400';
            $HistoryIndexLight = 'text-gray-400';
            $PaypalText = '700';
            $PaypalLight = 'text-light';
            $IpaymuText = '400';
            $IpaymuLight = 'text-gray-400';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
        } elseif (request()->routeIs('app.donate.ipaymu')) {
            $status = 'true';
            $PWIndexText = '400';
            $PWIndexLight = 'text-gray-400';
            $BankIndexText = '400';
            $BankIndexLight = 'text-gray-400';
            $HistoryIndexText = '400';
            $HistoryIndexLight = 'text-gray-400';
            $PaypalText = '400';
            $PaypalLight = 'text-gray-400';
            $IpaymuText = '700';
            $IpaymuLight = 'text-light';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
        } elseif (request()->routeIs('app.donate.tripay')) {
            $status = 'true';
            $PWIndexText = '400';
            $PWIndexLight = 'text-gray-400';
            $BankIndexText = '400';
            $BankIndexLight = 'text-gray-400';
            $HistoryIndexText = '400';
            $HistoryIndexLight = 'text-gray-400';
            $PaypalText = '400';
            $PaypalLight = 'text-gray-400';
            $IpaymuText = '700';
            $IpaymuLight = 'text-light';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
        } else {
            $status = 'false';
            $PWIndexText = '400';
            $PWIndexLight = 'text-gray-400';
            $BankIndexText = '400';
            $BankIndexLight = 'text-gray-400';
            $HistoryIndexText = '400';
            $HistoryIndexLight = 'text-gray-400';
            $PaypalText = '400';
            $PaypalLight = 'text-gray-400';
            $IpaymuText = '400';
            $IpaymuLight = 'text-gray-400';
            $TripayText = '400';
            $TripayLight = 'text-gray-400';
        }

        return view('components.hrace009.front.donate-link', [
            'status' => $status,
            'PWIndexText' => $PWIndexText,
            'PWIndexLight' => $PWIndexLight,
            'BankIndexText' => $BankIndexText,
            'BankIndexLight' => $BankIndexLight,
            'HistoryIndexText' => $HistoryIndexText,
            'HistoryIndexLight' => $HistoryIndexLight,
            'PaypalText' => $PaypalText,
            'PaypalLight' => $PaypalLight,
            'IpaymuText' => $IpaymuText,
            'IpaymuLight' => $IpaymuLight,
            'TripayText' => $TripayText,
            'TripayLight' => $TripayLight,
            
        ]);
    }
}
