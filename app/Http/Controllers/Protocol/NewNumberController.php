<?php

declare(strict_types=1);

namespace App\Http\Controllers\Protocol;

use Illuminate\Http\Request;
use App\Model\ProtocolNumber;
use App\Http\Controllers\Controller;

class NewNumberController extends Controller
{
    public function newSave(Request $request)
    {
        $max = ProtocolNumber::max('protocol_number');

        $protocolNumber = new ProtocolNumber();
        $letters = ["A", "B", "C", "D", "E", "F", "G", "H", "K", "L", "M", "N", "P", "R", "S", "T", "W", "X", "Y", "Z"];

        $protocolNumber->check_key = $letters[array_rand($letters, 1)];
        $protocolNumber->protocol_number = $max + 1;
        $protocolNumber->activ = true;
        $protocolNumber->veryfication_key = rand(100000, 999999);

        //   dd($request);

        $protocolNumber->save();

        $name = $request->name;
        if ($name === "PO") {
            return redirect()->route('protocols.protocolFPPOB');
        } elseif ($request->name === "OD") {
            return redirect()->route('protocols.protocolFPODB');
        } elseif ($request->name === "ZS") {
            return redirect()->route('protocols.protocolFPZS');
        } elseif ($request->name === "Ot") {
            return redirect()->route('protocols.protocolOther');
        } else dd("błąd");
    }
}
