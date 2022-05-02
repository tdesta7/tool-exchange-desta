<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function phpinfo(): bool
    {
        return phpinfo();
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $user = self::getUser();
        return view('dashboard', [
            'role' => $user->role->name
        ]);
    }

    private static function getUser(): User {
        return auth()->user();
    }
}
