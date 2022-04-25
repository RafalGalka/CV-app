<?php

declare(strict_types=1);

namespace App\Http\Controllers\Protocol;

use App\Model\Client;
use App\Model\Invest;
use App\Model\ProtocolPOB;
use Illuminate\Http\Request;
use App\Model\ProtocolNumber;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PPOBController extends Controller
{
  public function newPPOB()
  {
    // Protocol::create($request->all());
    $newProtocol = ProtocolPOB::all();
    $user = Auth::user();
    $today = Carbon::today()->toDateString();
    $protocolNumber = ProtocolNumber::all();
    $nrProt = ProtocolNumber::max('protocol_number');
    $id_client = session()->get('cl_id');
    $client = Client::find($id_client);
    $invest = Invest::whereHas('client', function ($query) {
      $id_client = session()->get('cl_id');
      return $query->where('id', '=', $id_client);
    })->orderBy('short_name')->get();

    return view('protocols.newPPOB', ['user' => $user, 'newProtocol' => $newProtocol, 'today' => $today, 'protocolNumber' => $protocolNumber, 'nrProt' => $nrProt, 'client' => $client, 'invest' => $invest]);
  }

  /*  public function showPPOB(int $id)
  {
    $user = Auth::user();

    return view('protocols.newPPOB', ['user' => $user]);
  } */


  public function newPOB(Request $request)
  {
    $user = Auth::user();
    $protocolPOB = new ProtocolPOB();

    $protocolPOB->protocol_number = $request->protocol_number;
    $protocolPOB->date = $request->date;
    $protocolPOB->drive = $request->drive;
    $protocolPOB->client_id = $request->client_id;
    $protocolPOB->invest_id = $request->invest_id;
    $protocolPOB->recipe = $request->recipe;
    $protocolPOB->compression_class = $request->compression_class;
    $protocolPOB->waterproof = $request->waterproof;
    $protocolPOB->air_temp = $request->air_temp;
    $protocolPOB->element = $request->element;
    $protocolPOB->days_28 = $request->days_28;
    $protocolPOB->days_56 = $request->days_56;
    $protocolPOB->days_7 = $request->days_7;
    $protocolPOB->volume_phone = $request->volume_phone;
    $protocolPOB->volume_W = $request->volume_W;
    $protocolPOB->type_A = $request->type_A;
    $protocolPOB->volume_A = $request->volume_A;
    $protocolPOB->day_A = $request->day_A;
    $protocolPOB->type_B = $request->type_B;
    $protocolPOB->volume_B = $request->volume_B;
    $protocolPOB->day_B = $request->day_B;
    $protocolPOB->type_C = $request->type_C;
    $protocolPOB->volume_C = $request->volume_C;
    $protocolPOB->day_C = $request->day_C;
    $protocolPOB->my_comment = $request->my_comment;
    $protocolPOB->lab_id = "$user->id";
    $protocolPOB->client_comment = $request->client_comment;

    $protocolPOB->save();

    return redirect()->route('home.mainPage');
  }
}
