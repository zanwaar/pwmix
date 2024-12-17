<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use App\Models\IpaymuLog;
use Illuminate\View\Component;

class TopupStat extends Component
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
        return view('components.hrace009.admin.topup-stat', [
            'trxdone' => IpaymuLog::trxDone(),
            'sumtrx' => IpaymuLog::sumTrx(),
            'alltrx' => IpaymuLog::allTrx(),
            'sumalltrx' => IpaymuLog::sumAllTrx(),
            'sumallfailedtrx' => IpaymuLog::sumAllFailedTrx(),
            'allfailedtrx' => IpaymuLog::allFailedTrx(),
        ]);
    }
}
