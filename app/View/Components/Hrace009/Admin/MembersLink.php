<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class MembersLink extends Component
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
        if (request()->routeIs('members.index') or request()->routeIs('admin.manage.search')) {
            $status = 'true';
            $text = '700';
            $light = 'text-light';
        } else {
            $status = 'false';
            $text = '400';
            $light = 'text-gray-400';
        }
        return view('components.hrace009.admin.members-link', [
            'status' => $status,
            'text' => $text,
            'light' => $light,
        ]);
    }
}
