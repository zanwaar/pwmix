<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;
use App\Models\Withdrawal;

class WithdrawLink extends Component
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
        if (request()->routeIs('admin.withdraw')) {
            $status = 'true';

        } else {
            $status = 'false';
        }
        $pending = Withdrawal::whereStatus('pending')->count();
        return view('components.hrace009.admin.withdraw-link', [
            'status' => $status,
            'pending' => $pending
        ]);
    }
}