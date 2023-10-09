<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\Edit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $user = Auth::user();

        return view('admin.profile.edit', ['user' => $user]);
    }

    public function update(Edit $request): RedirectResponse
    {
        $user = Auth::user();

        if (Hash::check($request->post('password'), $user->password)) {

            $user->fill([
                'name' => $request->post('name'),
                'password' => Hash::make($request->post('newPassword')),
                'email' => $request->post('email'),
            ]);

            if ($user->save()) {
                return redirect()
                    ->route('admin.profile.edit', ['user' => $user])
                    ->with('success', __('update success'));
            }
        }

        return back()->with('error', __('update error'));
    }
}
