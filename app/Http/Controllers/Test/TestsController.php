<?php

namespace App\Http\Controllers\Test;

use App\Model\Recipe;
use App\Model\Sample;
use App\Model\WSTest;
use Illuminate\View\View;
use App\Model\ProtocolPOB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class TestsController extends Controller
{
    public function select($protocol): View
    {
        $samples = Sample::where('protocol_number', $protocol)->get();
        $protocolPOB = ProtocolPOB::where('protocol_number', $protocol)->first();
        $recipe = Recipe::where('investment_id', $protocolPOB->invest_id)->where('recipe_number', $protocolPOB->recipe)->first();

        $protocol_number = $protocol;
        $nrr = 0;

        return view('tests.select', ['samples' => $samples, 'protocolPOB' => $protocolPOB, 'protocol_number' => $protocol_number, 'nrr' => $nrr, 'recipe' => $recipe]);
    }

    public function save(Request $request)
    {
        for ($i = 1; $i <= $request->max; $i++) {
            if ($request->input('type' . $i)[0] == 1) {

                $sample = new WSTest();
                $testAge = substr($request->input('type' . $i), 1);
                $date = date_create($request->date);
                date_add($date, date_interval_create_from_date_string($testAge . "days"));

                $sample->protocol_number = $request->protocol_nr;
                $sample->sample_nr = $i;
                $sample->test_age = date_format($date, "Y-m-d");

                $sample->save();
            }
        }

        //$data = $request->validated();
        $edit = ProtocolPOB::where('protocol_number', $request->protocol_nr)->firstOrFail();

        $edit->collection = 1;

        $edit->update();

        return redirect()->route('lists.POBList')->with('success', 'próbki przekazane do badań !');
    }

    public function edit($protocol): View
    {
        $samples = Sample::where('protocol_number', $protocol)->get();
        $protocolPOB = ProtocolPOB::where('protocol_number', $protocol)->first();
        $recipe = Recipe::where('investment_id', $protocolPOB->invest_id)->where('recipe_number', $protocolPOB->recipe)->first();
        $select = WSTest::where('protocol_nr', $protocol)->get();
        $today = Carbon::today()->toDateString();

        $protocol_number = $protocol;
        $nrr = 0;

        return view('tests.edit', ['samples' => $samples, 'protocolPOB' => $protocolPOB, 'protocol_number' => $protocol_number, 'nrr' => $nrr, 'recipe' => $recipe, 'select' => $select, 'today' => $today]);
    }
}
