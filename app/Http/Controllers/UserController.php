<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Database\QueryException;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function login(Request $request) {
        $credentials = $request->only('name', 'password');

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dash');
            }
        } catch(Exception $e) {
            return 'unknown error, please try again';
        }

        return 'bad';
    }

    public function register(Request $request) {
        $id = Str::uuid();
        $hashed = Hash::make($request->get('password'), [
            'rounds' => 12,
        ]);
        
        try {
            DB::table('users')->insert([
                'name' => $request->get('name'),
                'id' => (string) $id,
                'password' => $hashed,
            ]);
        } catch(QueryException $e) {
            if ($e->getCode() == 23505) {
                return 'user already has that name';
            }
            return 'unknown error, please try again';
        }
        return "registered";
    }
}