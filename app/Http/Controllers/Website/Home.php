<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Faction;
use App\Models\News;
use App\Models\Point;
use App\Models\User;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Home extends Controller
{
    public function index()
    {

        $guilds = DB::table('pwp_factions')->where('id', '<>', '19')->count();
        $point = new Point();
        $api = new API();
        $gms = [];
        foreach (DB::table('auth')->select('userid')->distinct()->get() as $gm) {
            $gms[] = User::find($gm->userid);
        }
        // $factions = Faction::subtype('level')->paginate(8);
        $factions = DB::table('pwp_factions')
            ->where('id', '<>', '19')
            ->orderBy('level', 'desc')
            ->simplePaginate(6);

        return view('website.index', [
            'ranks' => $factions,
            'news' => News::orderBy('created_at', 'desc')->get(),
            'gmss' => $gms,
            'user' => new User(),
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api,
            'guilds' => $guilds,
        ]);
    }
    public function aboutUs()
    {
        foreach (DB::table('auth')->select('userid')->distinct()->get() as $gm) {
            $gms[] = User::find($gm->userid);
        }
        return view('website.about-us', [
            'title' => "About Us",
            'user' => new User(),
        ]);
    }

    public function indexCategory(string $category)
    {
        $point = new Point();
        $api = new API();
        return view('website.index', [
            'news' => News::whereCategory($category)->paginate(3),
            'user' => new User(),
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api,
        ]);
    }

    public function allPost()
    {
        $cats = DB::table('pwp_news')->distinct()->pluck('category')->all();
        $point = new Point();
        $api = new API();

        return view('website.allpost', [
            'news' => News::orderBy('created_at', 'desc')->get(),
            'cats' => $cats,
            'user' => new User(),
            'title' => "News",
        ]);
    }
    public function showPost(string $slug)
    {
        $point = new Point();
        $api = new API();

        return view('website.article', [
            'article' => News::whereSlug($slug)->firstOrFail(),
            'user' => new User(),
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api,
        ]);
    }

    public function indexTags(string $tag)
    {
        $point = new Point();
        $api = new API();

        return view('website.index', [
            'news' => News::where('keywords', 'LIKE', '%' . $tag . '%')->orderByDesc('created_at')->paginate(3),
            'user' => new User(),
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api,
        ]);
    }
    public function showStart()
    {
        $point = new Point();
        $api = new API();
        return view('website.start-now', [
            'news' => News::orderBy('id', 'desc')->whereNotIn('category', ['download', 'guide'])->paginate(3),
            'user' => new User(),
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api,
        ]);
    }
    public function showDownloadNow()
    {
        $point = new Point();
        $api = new API();
        return view('website.download', [
            'news' => News::orderBy('id', 'desc')->whereNotIn('category', ['download', 'guide'])->paginate(3),
            'user' => new User(),
            'totalUser' => User::count('name'),
            'onlinePlayer' => $point->getOnlinePlayer(),
            'api' => $api,
            'title' => "Downloads Game",
        ]);
    }
}
