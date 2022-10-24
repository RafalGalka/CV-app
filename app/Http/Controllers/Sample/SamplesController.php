<?php

namespace App\Http\Controllers\sample;

use App\Model\Sample;
use Illuminate\View\View;
use App\Model\ProtocolPOB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\NewSample;
use App\Http\Controllers\Controller;

class SamplesController extends Controller
{
    public function add(): View
    {
        $protocol = ProtocolPOB::where('protocol_number', $_GET['nr'])->first();

        $time = Carbon::now()->format('H:i');

        if ($protocol->type_A == 1) $volA = $protocol->volume_A;
        else $volA = 0;
        if ($protocol->type_B == 1) $volB = $protocol->volume_B;
        else $volB = 0;
        if ($protocol->type_C == 1) $volC = $protocol->volume_C;
        else $volC = 0;

        $strenght_samples = $protocol->volume_phone + $protocol->days_7 + $volA + $volB + $volC;

        if ($protocol->type_A == 2) $volW_A = $protocol->volume_A;
        else $volW_A = 0;
        if ($protocol->type_B == 2) $volW_B = $protocol->volume_B;
        else $volW_B = 0;
        if ($protocol->type_C == 2) $volW_C = $protocol->volume_C;
        else $volW_C = 0;

        $W_samples = $protocol->volume_W  + $volW_A + $volW_B + $volW_C;

        if ($protocol->type_A == 3) $volF_A = $protocol->volume_A;
        else $volF_A = 0;
        if ($protocol->type_B == 3) $volF_B = $protocol->volume_B;
        else $volF_B = 0;
        if ($protocol->type_C == 3) $volF_C = $protocol->volume_C;
        else $volF_C = 0;

        $F_samples = $volF_A + $volF_B + $volF_C;

        if ($protocol->type_A == 4) $volN_A = $protocol->volume_A;
        else $volN_A = 0;
        if ($protocol->type_B == 4) $volN_B = $protocol->volume_B;
        else $volN_B = 0;
        if ($protocol->type_C == 4) $volN_C = $protocol->volume_C;
        else $volN_C = 0;

        $N_samples = $volN_A + $volN_B + $volN_C;

        $save_samples = Sample::where('protocol_number', $_GET['nr'])->get();

        $nr = 0;
        $nrr = 0;

        foreach ($save_samples as $sample) {
            $nr += $sample->number;
        }

        return view('samples.add', ['protocol' => $protocol, 'strenght_samples' => $strenght_samples, 'W_samples' => $W_samples, 'F_samples' => $F_samples, 'N_samples' => $N_samples, 'nr' => $nr, 'save_samples' => $save_samples, 'nrr' => $nrr, 'time' => $time]);
    }

    public function list($protocol): View
    {
        $samples = Sample::where('protocol_number', $protocol)->get();
        $nrr = 0;

        return view('samples.list', ['samples' => $samples, 'protocol' => $protocol, 'nrr' => $nrr]);
    }

    public function save(NewSample $request)
    {
        $sample = new Sample();

        $sample->protocol_number = $request->protocol_number;
        $sample->number = $request->number;
        $sample->wz_number = $request->wz_number;
        $sample->hour = $request->hour;
        $sample->consistency = $request->consistency;
        $sample->temperature = $request->temperature;
        $sample->air_content = $request->air_content;
        $sample->reinforcement_volume = $request->reinforcement_volume;
        $sample->my_comment = $request->my_comment;
        $sample->sample_type = $request->sample_type;

        $sample->save();



        if ($request->add == "next") return back()->with('success', 'próbki dodane !');
        elseif ($request->add == "copy") return redirect()->back()->with('success', 'próbki dodane !');
        elseif ($request->add == "end") return redirect()->route('lists.POBList')->with('success', 'próbki dodane !');
        else dd('błąd');
    }

    public function delete($id)
    {
        Sample::find($id)->delete();

        return back();
    }
}
