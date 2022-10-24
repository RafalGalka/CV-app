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
use App\Http\Requests\NewSize;
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
        if ($sample->sample_type == 1) $size = 150;
        elseif ($sample->sample_type == 2) $size = 100;
        else $size = 0;

        return view('ws.size', ['sample' => $sample, 'user' => $user, 'size' => $size]);
    }

    public function saveSize(NewSize $request)
    {
        $user = Auth::user();

        $result = new Size();
        $x = ($request->x1) ?: $request->size - 1;
        $y = ($request->y1) ?: $request->size;
        $z = ($request->z1) ?: $request->size;

        $result->sample_id = $request->sample_id;
        $result->x1 = $request->x1;
        $result->x2 = $request->x2 ?: ($x + (40 - rand(0, 80)) * 0.01);
        $result->x3 = $request->x3 ?: ($x + (40 - rand(0, 80)) * 0.01);
        $result->x4 = $request->x4 ?: ($x + (40 - rand(0, 80)) * 0.01);
        $result->x5 = $request->x5 ?: ($x + (40 - rand(0, 80)) * 0.01);
        $result->x6 = $request->x6 ?: ($x + (40 - rand(0, 80)) * 0.01);
        $result->y1 = $request->y1 ?: ($y + (20 - rand(0, 60)) * 0.01);
        $result->y2 = $request->y2 ?: ($y + (20 - rand(0, 60)) * 0.01);
        $result->y3 = $request->y3 ?: ($y + (20 - rand(0, 60)) * 0.01);
        $result->y4 = $request->y4 ?: ($y + (20 - rand(0, 60)) * 0.01);
        $result->y5 = $request->y5 ?: ($y + (20 - rand(0, 60)) * 0.01);
        $result->y6 = $request->y6 ?: ($y + (20 - rand(0, 60)) * 0.01);
        $result->z1 = $request->z1 ?: ($z + (20 - rand(0, 60)) * 0.01);
        $result->z2 = $request->z2 ?: ($z + (20 - rand(0, 60)) * 0.01);
        $result->z3 = $request->z3 ?: ($z + (20 - rand(0, 60)) * 0.01);
        $result->z4 = $request->z4 ?: ($z + (20 - rand(0, 60)) * 0.01);
        $result->perpendicularity = $request->perpendicularity;
        $result->flatness = $request->flatness;
        $result->notes = $request->notes;
        $result->lab_id = $user->id;

        $result->save();

        return redirect()->route('wsTests.test', ['id' => $request->sample_id]);
    }

    public function test($id): View
    {
        $today = Carbon::today()->toDateString();

        $sample = Size::where('sample_id', $id)->first();
        $user = Auth::user();
        $time = Carbon::now()->format('H:i');

        $x = round(($sample->x1 + $sample->x2 + $sample->x3 + $sample->x4 + $sample->x5 + $sample->x6) / 6, 2);
        $y = round(($sample->y1 + $sample->y2 + $sample->y3 + $sample->y4 + $sample->y5 + $sample->y6) / 6, 2);
        $z = round(($sample->z1 + $sample->z2 + $sample->z3 + $sample->z4) / 4, 2);

        $area = round($x * $y, 2);
        $volume = round($x * $y * $z, 2);

        return view('ws.test', ['sample' => $sample, 'today' => $today, 'user' => $user, 'time' => $time, 'x' => $x, 'y' => $y, 'z' => $z, 'area' => $area, 'volume' => $volume]);
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
        $result->area = $user->area;
        $result->volume = $user->volume;

        $result->save();

        return redirect()->route('wsTests.list');
    }
}
