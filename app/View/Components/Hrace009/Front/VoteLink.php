<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use Illuminate\View\Component;

class VoteLink extends Component
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
        if (request()->routeIs('app.vote.index')) {
            $status = 'true';
        } else {
            $status = 'false';
        }
        return view('components.hrace009.front.vote-link', [
            'status' => $status
        ]);
    }
}
