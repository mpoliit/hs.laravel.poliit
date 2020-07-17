<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.account', compact('user'));
    }

    public function update(UpdateUserAccountRequest $request)
    {
        auth()->user()->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'balance' => $request->get('balance')

        ]);
        return redirect(route('account.index'))
            ->with(['status' => 'Your user account was successfully updated!']);
    }
}
