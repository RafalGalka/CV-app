<?php

declare(strict_types=1);

namespace App\Http\Controllers\Protocol;

use App\Model\Client;
use App\Model\Invest;
use App\Model\ProtocolOD;
use Illuminate\Http\Request;
use App\Model\ProtocolNumber;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PODBController extends Controller
{
    public function newPODB()
    {
        // Protocol::create($request->all());

        $newProtocol = ProtocolOD::all();
        $user = Auth::user();
        $today = Carbon::today()->toDateString();
        $protocolNumber = ProtocolNumber::all();
        $nrProt = ProtocolNumber::max('protocol_number');
        $client = Client::where('activ', true)->orderBy('short_name')->get();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        $prot = "OD";

        return view('protocols.newPODB', ['user' => $user, 'newProtocol' => $newProtocol, 'today' => $today, 'protocolNumber' => $protocolNumber, 'nrProt' => $nrProt, 'client' => $client, 'invest' => $invest, 'prot' => $prot]);
    }


    public function newOD(Request $request)
    {
        $user = Auth::user();
        $protocolOD = new ProtocolOD();

        $protocolOD->protocol_number = $request->protocol_number;
        $protocolOD->drive = $request->drive;
        $protocolOD->date = $request->date;
        $protocolOD->client_id = $request->client_id;
        $protocolOD->invest_id = $request->invest_id;
        $protocolOD->number_of_sample = $request->number_of_sample;
        $protocolOD->sample_type = $request->sample_type;
        $protocolOD->collection = $request->collection;
        $protocolOD->my_comment = $request->my_comment;
        $protocolOD->lab_id = "$user->id";
        $protocolOD->user_id = $request->user_id;
        $protocolOD->client_comment = $request->client_comment;

        $protocolOD->save();

        return redirect()->route('home.mainPage');
    }
}
