<?php

declare(strict_types=1);

namespace App\Http\Controllers\Protocol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\ProtocolOther;
use App\Model\ProtocolNumber;
use App\Model\Invest;
use App\Model\Client;
use Illuminate\Support\Carbon;
use App\Model\ResearchType;

class OtherController extends Controller
{
    public function newOther()
    {
        // Protocol::create($request->all());
        $newProtocol = ProtocolOther::all();
        $user = Auth::user();
        $today = Carbon::today()->toDateString();
        $protocolNumber = ProtocolNumber::all();
        $types = ResearchType::all();
        $nrProt = ProtocolNumber::max('protocol_number');
        $client = Client::where('activ', true)->orderBy('short_name')->get();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        $prot = "Ot";

        return view('protocols.newOther', ['user' => $user, 'newProtocol' => $newProtocol, 'today' => $today, 'protocolNumber' => $protocolNumber, 'nrProt' => $nrProt, 'client' => $client, 'invest' => $invest, 'prot' => $prot, 'types' => $types]);
    }


    public function newOtherSave(Request $request)

    {
        $user = Auth::user();
        $protocolOther = new ProtocolOther();

        $protocolOther->protocol_number = $request->protocol_number;
        $protocolOther->date = $request->date;
        $protocolOther->drive = $request->drive;
        $protocolOther->invest_id = $request->invest_id;
        $protocolOther->client_id = 0;
        $protocolOther->test_type = $request->test_type;
        $protocolOther->my_comment = $request->my_comment;
        $protocolOther->number_of_sample = $request->number_of_sample;
        $protocolOther->lab_id = "$user->id";

        $protocolOther->save();

        return redirect()->route('home.mainPage');
    }
}
