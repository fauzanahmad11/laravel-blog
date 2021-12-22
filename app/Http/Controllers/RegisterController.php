<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Encryp password
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull ! Please Login');
        return redirect("/login")->with('success', 'Registration successfull ! Please Login');
    }

    public function edit($key)
    {
        try {
            $decrypted = Crypt::decryptString($key);
        } catch (DecryptException $e) {
        }
        return view('dashboard.accounts.index', [
            'id' => $key
        ]);
    }

    public function update(User $user, Request $request)
    {
        // dd($request);
        try {
            $decrypted = Crypt::decryptString($request->id);
        } catch (DecryptException $e) {
            echo $e;
        }
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];

        $table = $user->where('id', $decrypted)->first();

        if ($request->username != $table->username) {
            $rules['username'] = ['required', 'min:5', 'max:255', 'unique:users'];
        }
        if ($request->email != $table->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image') || $request->file('image')->getClientOriginalName() != $table->image) {
            if ($table->image) {
                Storage::delete($table->image);
            }
            $validatedData['image'] = $request->file('image')->store('img/profil');
        }

        $table->update($validatedData);

        return redirect()->back()->with('success', 'Account has been update !!');

        // echo 'update';
        // dd($user->where('id', $decrypted)->get());
        // return view('dashboard.accounts.index');
    }
}
