<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

class SystemController extends Controller
{
    /**
     * Show apps page
     *
     * @return Application|Factory|View
     */
    public function getApps()
    {
        $apps = config('pw-config.system.apps');
        return view('admin.system.applications', [
            'apps' => $apps,
        ]);
    }

    /**
     * Show settings page
     *
     * @return Application|Factory|View
     */
    public function getSettings()
    {
        return view('admin.system.settings');
    }

    /**
     * Save configuration
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveApps(Request $request): RedirectResponse
    {
        $apps = config('pw-config.system.apps');

        foreach (array_keys($apps) as $app) {
            if ($request->has($app) === true) {
                Config::write('pw-config.system.apps.' . $app, true);
            } else {
                Config::write('pw-config.system.apps.' . $app, false);
            }
        }
        return redirect()->back()->with('success', __('admin.configSaved'));
    }

    /**
     * Save settings
     *
     * @param Request $request
     * @return RedirectResponse  
     */
    public function saveSettings(Request $request): RedirectResponse
    {
        try {
            $validate = $request->validate([
                'server_name' => 'required|string',
                'discord' => 'required|string',
                'currency_name' => 'required|string',
                'server_ip' => 'required|ipv4',
                'server_version' => 'required|string',
                'encryption_type' => 'required|string',
                'fbfp' => 'required|string',
                'fakeonline' => 'required|numeric',
            ]);

            if ($request->hasFile('logo')) {
                $request->validate([
                    'logo' => [
                        'image',
                        'mimes:png',
                        Rule::dimensions()->ratio(1 / 1)->width(128)->height(128)
                    ]
                ]);
                $logoFile = $request->file('logo');
                if ($logoFile->isValid()) {
                    $logo = $logoFile->getClientOriginalName();
                    Config::write('pw-config.logo', $logo);
                    $logoFile->storeAs('logo', $logo, 'hrace009');
                } else {
                    return back()->withErrors('Uploaded file is invalid.');
                }
            }

            foreach ($validate as $settings => $value) {
                Config::write('pw-config.' . $settings, $value);
            }

            Config::write('app.name', $request->get('server_name'));
            Config::write('app.timezone', $request->get('datetimezone'));
            Config::set('app.timezone', $request->get('datetimezone'));
            Config::set('app.name', $request->get('server_name'));

            return redirect()->back()->with('success', __('admin.configSaved'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }
}
