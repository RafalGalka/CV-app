<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Client;
use App\Model\Invest;

class MainPage extends Controller
{
    public function __invoke()
    {

        $invest = Invest::all()->where('activ', 1)->sortBy('short_name');
        $user = Auth::user();
        $client = Client::all()->where('activ', 1)->sortBy('short_name');

        return view('home.main', ['user' => $user, 'client' => $client, 'invest' => $invest]);
    }
}
