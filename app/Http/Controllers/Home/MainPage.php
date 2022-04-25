<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Client;

class MainPage extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $client = Client::all()->where('activ', 1)->sortBy('short_name');

        return view('home.main', ['user' => $user, 'client' => $client]);
    }
}
