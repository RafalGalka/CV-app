<?php

namespace App\Http\Controllers\Sample;

use App\Model\ProtocolOD;
use App\Model\TakeSample;
use Illuminate\View\View;
use App\Model\StrenghtClass;
use App\Http\Requests\NewAddSample;
use App\Http\Controllers\Controller;

class TakeSamplesController extends Controller
{
    public function add(): View
    {
        $protocol = ProtocolOD::where('protocol_number', $_GET['nr'])->first();

        $save_samples = TakeSample::where('protocol_number', $_GET['nr'])->get();

        $classes = StrenghtClass::all();

        $nr = 0;
        $nrr = 0;

        foreach ($save_samples as $sample) {
            $nr += $sample->number_of_sample;
        }

        return view('samples.takeAdd', ['protocol' => $protocol, 'nr' => $nr, 'nrr' => $nrr, 'classes' => $classes, 'save_samples' => $save_samples]);
    }

    public function save(NewAddSample $request)
    {
        $data = $request;

        $sample = new TakeSample();

        if ($request->number > 0) {
            $sample->protocol_number = $request->protocol_number;
            $sample->number = $request->number;
            $sample->mark = $request->mark;
            $sample->picking_date = $request->picking_date;
            $sample->test_type = $request->test_type;
            $sample->element = $request->element;
            $sample->compression_class = $request->compression_class;
            $sample->test_time = $request->test_time;
            $sample->my_comment = $request->my_comment;

            $sample->save();
        };
        if ($request->s28 > 0) {
            $sample->protocol_number = $request->protocol_number;
            $sample->number = $request->s28;
            $sample->mark = $request->mark;
            $sample->picking_date = $request->picking_date;
            $sample->test_type = 1;
            $sample->element = $request->element;
            $sample->compression_class = $request->compression_class;
            $sample->test_time = 28;
            $sample->my_comment = $request->my_comment;

            $sample->save();
        };
        if ($request->s56 > 0) {
            $sample->protocol_number = $request->protocol_number;
            $sample->number = $request->s56;
            $sample->mark = $request->mark;
            $sample->picking_date = $request->picking_date;
            $sample->test_type = 1;
            $sample->element = $request->element;
            $sample->compression_class = $request->compression_class;
            $sample->test_time = 56;
            $sample->my_comment = $request->my_comment;

            $sample->save();
        };

        if ($request->add == "next") return back()->with('success', 'próbki dodane !');
        elseif ($request->add == "copy") return redirect()->back($data)->with('success', 'próbki dodane !');
        elseif ($request->add == "end") return redirect()->route('lists.ODBList')->with('success', 'próbki dodane !');
        else dd('błąd');
    }

    public function delete($id)
    {
        TakeSample::find($id)->delete();

        return back();
    }
}
