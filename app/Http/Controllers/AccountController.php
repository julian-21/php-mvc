<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:accounts|max:45',
            'password' => 'required|max:250',
            'name' => 'required|max:45',
            'role' => 'required|max:45',
        ]);

        Account::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('accounts.index');
    }

    public function edit($username)
    {
        $account = Account::findOrFail($username);
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $username)
    {
        $account = Account::findOrFail($username);
        $account->update($request->all());
        return redirect()->route('accounts.index');
    }

    public function destroy($username)
    {
        $account = Account::findOrFail($username);
        $account->delete();
        return redirect()->route('accounts.index');
    }
}
