<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class VoucherLink extends Component
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
        if (request()->routeIs('voucher.create')) {
            $status = 'true';
            $textCreate = '700';
            $lightCreate = 'text-light';
            $textIndex = '400';
            $lightIndex = 'text-gray-400';
        } elseif (request()->routeIs('voucher.index')) {
            $status = 'true';
            $textCreate = '400';
            $lightCreate = 'text-gray-400';
            $textIndex = '700';
            $lightIndex = 'text-light';
        } else {
            $status = 'false';
            $textCreate = '400';
            $lightCreate = 'text-gray-400';
            $textIndex = '400';
            $lightIndex = 'text-gray-400';
        }
        return view('components.hrace009.admin.voucher-link', [
            'status' => $status,
            'textCreate' => $textCreate,
            'lightCreate' => $lightCreate,
            'textIndex' => $textIndex,
            'lightIndex' => $lightIndex
        ]);
    }
}
