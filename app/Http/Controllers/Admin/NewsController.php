<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::paginate(config('pw-config.news.page'));
        $user = new User();
        return view('admin.news.view', [
            'news' => $news,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $image = $request->file('og_image')->getClientOriginalName();
        $request->file('og_image')->storeAs('og_image', $image, config('filesystems.default'));

        $input = $request->all();
        $input['og_image'] = $image;

        $slug = \Str::slug($request->title);
        $count = News::where('slug', 'LIKE', '%' . $slug . '%')->count();
        $input['slug'] = $count ? "{$slug}-{$count}" : $slug;

        News::create($input);
        return redirect(route('news.index'))->with('success', __('news.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $article = News::findOrFail($id);
        return view('admin.news.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(NewsRequest $request, int $id): RedirectResponse
    {
        $image = $request->file('og_image')->getClientOriginalName();
        $request->file('og_image')->storeAs('og_image', $image, config('filesystems.default'));

        News::whereId($id)->update([
            'title' => $request->get('title'),
            'slug' => \Str::slug($request->title),
            'og_image' => $image,
            'description' => $request->get('description'),
            'keywords' => $request->get('keywords'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'author' => $request->get('author'),
        ]);
        return redirect(route('news.index'))->with('success', __('news.edit_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $article = News::findOrFail($id);
        $article->delete();

        return redirect(route('news.index'))->with('success', __('news.remove_success'));
    }

    /**
     * Control the upload image from Tiny MCE Editor
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('content', $fileName, config('filesystems.default'));
        return response()->json([
            'location' => url('/uploads/' . $path)
        ]);
    }

    /**
     * Show news settings page
     *
     * @return Application|Factory|View
     */
    public function settings()
    {
        return view('admin.news.settings');
    }

    /**
     * Post settings to config file
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function postSettings(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'article_page' => 'required|numeric'
        ]);
        Config::write('pw-config.news.page', $validate['article_page']);
        return redirect()->back()->with('success', __('admin.configSaved'));
    }
}
