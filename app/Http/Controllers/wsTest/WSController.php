<?php

namespace App\Http\Controllers\wsTest;

use App\Model\Size;
use App\Model\Sample;
use App\Model\WSTest;
use App\Model\WSResult;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\NewTest;
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

    public function size($id): View
    {
        $sample = WSTest::where('id', $id)->first();
        $user = Auth::user();

        return view('ws.size', ['sample' => $sample, 'user' => $user]);
    }

    public function saveSize(Request $request)
    {
        return redirect()->route('wsTests.test', ['id' => $request->id]);
    }

    public function test($id): View
    {
        $today = Carbon::today()->toDateString();
        $sample = WSTest::where('id', $id)->first();
        $user = Auth::user();
        $time = Carbon::now()->format('H:i');

        return view('ws.test', ['sample' => $sample, 'today' => $today, 'user' => $user, 'time' => $time]);
    }

    public function save(NewTest $request)
    {
        $user = Auth::user();
        //$size = Size::where('id', $request->id)->first();

        $result = new WSResult();

        $result->protocol_number = $request->protocol_number;
        $result->sample_number = $request->sample_number;
        $result->date = $request->date;
        $result->time = $request->time;
        $result->weight = $request->weight;
        $result->force = $request->force;
        $result->test_type = $request->test_type;
        $result->notes = $request->notes;
        $result->lab_id = $user->id;

        $result->save();

        return redirect()->route('wsTests.list');
    }
}
