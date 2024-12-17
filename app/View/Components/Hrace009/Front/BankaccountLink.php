<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BankaccountLink extends Component
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
     * @return Application|Factory|View
     */
    public function render()
    {
        if (request()->routeIs('bankaccount.index')) {
            $status = 'true';
            $textba = '700';
            $textwd = '400';
            $textpt = '400';
            $texthwd = '400';
            $lightba = 'text-light';
            $lightwd = 'text-gray-400';
            $lightpt = 'text-gray-400';
            $lighthwd = 'text-gray-400';
        } elseif (request()->routeIs('app.withdraw')) {
            $status = 'true';
            $textba = '400';
            $textwd = '700';
            $textpt = '400';
            $texthwd = '400';
            $lightba = 'text-gray-400';
            $lightwd = 'text-light';
            $lightpt = 'text-gray-400';
            $lighthwd = 'text-gray-400';
        } elseif (request()->routeIs('app.historyplayertopup')) {
            $status = 'true';
            $textba = '400';
            $textwd = '400';
            $textpt = '700';
            $texthwd = '400';
            $lightba = 'text-gray-400';
            $lightwd = 'text-gray-400';
            $lightpt = 'text-light';
            $lighthwd = 'text-gray-400';
        } elseif (request()->routeIs('app.historywd')) {
            $status = 'true';
            $textba = '400';
            $textwd = '400';
            $textpt = '400';
            $texthwd = '700';
            $lightba = 'text-gray-400';
            $lightwd = 'text-gray-400';
            $lightpt = 'text-gray-400';
            $lighthwd = 'text-light';
        } else {
            $status = 'false';
            $textba = '400';
            $textwd = '400';
            $textpt = '400';
            $texthwd = '400';
            $lightba = 'text-gray-400';
            $lightwd = 'text-gray-400';
            $lightpt = 'text-gray-400';
            $lighthwd = 'text-gray-400';
        }

        return view('components.hrace009.front.bankaccount-link', [
            'status' => $status,
            'textba' => $textba,
            'textwd' => $textwd,
            'textpt' => $textpt,
            'texthwd' => $texthwd,
            'lightba' => $lightba,
            'lightwd' => $lightwd,
            'lightpt' => $lightpt,
            'lighthwd' => $lighthwd,
        ]);
    }
}
