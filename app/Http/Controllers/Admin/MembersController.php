<?php



/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Http\Helper\RandomStringGenerator;
use App\Mail\ResetPasswordPinMail;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MembersController extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        /*
        $users = User::paginate(15);
        return view('admin.members.members', [
            'users' => $users,
        ]);
        */
        return view('admin.members.members');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Search form Controller
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'searchInput' => 'alpha_num|regex:/^[a-z0-9]+$/'
        ]);

        $searchUsers = User::where('name', 'LIKE', '%' . $request->searchInput . '%')->get();
        return view('admin.members.members', ['searchUsers' => $searchUsers]);
    }

    /**
     * Add balance to user account
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function addBalance(Request $request, User $user): RedirectResponse
    {
        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);

        $user->money += $request->amount;
        $user->save();
        return redirect()->back()->with('success', __('members.actions.add'));
    }

    /**
     * Force reset password and pin
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function forceResetPasswordPin(Request $request, User $user): RedirectResponse
    {
        $confirm = $request->has('resetPassPin');
        if ($confirm) {
            $RandPass = RandomStringGenerator::getRandomAlphaNum(6);
            $RandPin = RandomStringGenerator::getRandomNum(6);

            $user->forceFill([
                'passwd' => Hash::make($user->name . $RandPass),
                'passwd2' => Hash::make($user->name . $RandPass),
                'qq' => $RandPin,
                'answer' => config('app.debug') ? $RandPass : '',
            ])->save();

            $pwusers = [
                'login' => $user->name,
                'password' => $RandPass,
                'email' => $user->email,
                'pin' => $RandPin,
                'fullname' => $user->truename
            ];
            Mail::to($pwusers['email'])->locale($user->language)->send(new ResetPasswordPinMail($pwusers));

            return redirect()->back()->with('success', __('members.actions.PassPinReset'));
        }

        return redirect()->back()->with('error', __('members.actions.mustConfirm'));
    }

    /**
     * Force change email
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function changeEmail(Request $request, User $user): RedirectResponse
    {
        $this->validate($request, [
            'chEmail' => 'required|email'
        ]);

        $user->email = $request->chEmail;
        $user->save();
        return redirect()->back()->with('success', __('members.actions.successEMail'));
    }
}
