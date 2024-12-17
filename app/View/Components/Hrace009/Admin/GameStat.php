<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use App\Models\Faction;
use App\Models\Player;
use App\Models\Point;
use App\Models\User;
use Illuminate\View\Component;

class GameStat extends Component
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
        $point = new Point();
        return view('components.hrace009.admin.game-stat', [
            'totalUser' => User::count('name'),
            'totalRoles' => Player::count('name'),
            'totalFaction' => Faction::count('name'),
            'totalOnline' => $point->getOnlinePlayer()
        ]);
    }
}
