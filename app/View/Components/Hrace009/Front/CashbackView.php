<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CashbackView extends Component
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
        return view('front.streamer.cashback', [
            'promoCounters' => Auth::user()->countPromo(),
            'promoCodes' => Auth::user()->promoCode(),
            'cashback' => Auth::user()->bonuses
        
            
        ]);
    }
}
