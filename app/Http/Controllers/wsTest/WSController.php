<?php

namespace App\Http\Controllers\wsTest;

use App\Model\Sample;
use App\Model\WSTest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WSController extends Controller
{
    public function select(): View
    {
        $today = Carbon::today()->toDateString();
        return view('ws.select', ["today" => $today]);
    }

    public function list(Request $request): View
    {
        $today = Carbon::today()->toDateString();
        if ($request->btn == "nr")
            $samples = WSTest::where('protocol_number', $request->protocol_nr)->get();
        else
            $samples = WSTest::where('test_age', $request->testDate)->get();
        return view('ws.list', ["samples" => $samples, 'today' => $today]);
    }

    public function test($id): View
    {
        $today = Carbon::today()->toDateString();
        $sample = WSTest::where('id', $id)->first();
        $user = Auth::user();
        $time = Carbon::now()->format('H:i');

        return view('ws.test', ["sample" => $sample, 'today' => $today, 'user' => $user, 'time' => $time]);
    }

    public function save(Request $request)
    {
    }
}
