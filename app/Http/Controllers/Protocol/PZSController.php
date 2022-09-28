<?php

declare(strict_types=1);

namespace App\Http\Controllers\Protocol;

use App\Model\Client;
use App\Model\Invest;
use App\Model\StrenghtClass;
use App\Model\ProtocolZS;
use Illuminate\Http\Request;
use App\Model\ProtocolNumber;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PZSController extends Controller
{
    public function newPZS()
    {
        // Protocol::create($request->all());
        $newProtocol = ProtocolZS::all();
        $user = Auth::user();
        $today = Carbon::today()->toDateString();
        $protocolNumber = ProtocolNumber::all();
        $nrProt = ProtocolNumber::max('protocol_number');
        $client = Client::where('activ', true)->orderBy('short_name')->get();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        $classB = StrenghtClass::where('activ', true)->where('material_types', 'podkład-zginanie')->orderBy('short_name')->get();
        $classC = StrenghtClass::where('activ', true)->where('material_types', 'podkład-ściskanie')->orWhere('material_types', 'zaprawa')->where('activ', true)->orderBy('short_name')->get();
        $prot = "ZS";

        return view('protocols.newPZS', ['user' => $user, 'newProtocol' => $newProtocol, 'today' => $today, 'protocolNumber' => $protocolNumber, 'nrProt' => $nrProt, 'client' => $client, 'invest' => $invest, 'classB' => $classB, 'classC' => $classC, 'prot' => $prot]);
    }

    public function newZS(Request $request)

    {
        $user = Auth::user();
        $protocolZS = new ProtocolZS();

        $protocolZS->protocol_number = $request->protocol_number;
        $protocolZS->drive = $request->drive;
        $protocolZS->date = $request->date;
        $protocolZS->time = $request->time;
        $protocolZS->client_id = 0;
        $protocolZS->invest_id = $request->invest_id;
        $protocolZS->recipe = $request->recipe;
        $protocolZS->compression_class = $request->compression_class;
        $protocolZS->bending_class = $request->bending_class;
        $protocolZS->element = $request->element;
        $protocolZS->days_28 = $request->days_28;
        $protocolZS->days_7 = $request->days_7;
        $protocolZS->days_56 = $request->days_56;
        $protocolZS->volume_A = $request->volume_A;
        $protocolZS->day_A = $request->day_A;
        $protocolZS->my_comment = $request->my_comment;
        $protocolZS->lab_id = $user->id;
        $protocolZS->collection = $request->collection;

        $protocolZS->save();

        return redirect()->route('lists.ZSList');
    }

    /*  public function showPZS(int $id)
  {
    $user = Auth::user();

    return view('protocols.newPZS', ['user' => $user]);
  } */
}
