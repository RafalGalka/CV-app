<?php

namespace App\Http\Controllers\List;

use App\Repository\Eloquent\PobRepository;
use App\Model\Invest;
use App\Model\ProtocolOD;
use App\Model\ProtocolZS;
use Illuminate\View\View;
use App\Model\ProtocolPOB;
use App\Model\ProtocolOther;
use Illuminate\Http\Request;
use App\Model\ProtocolNumber;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListController extends Controller
{

    private PobRepository $pobRepository;

    public function __construct(PobRepository $pobRepository)
    {
        $this->pobRepository = $pobRepository;
    }

    public function POBList(): View
    {
        $protocols = ProtocolPOB::all();
        //$protocols = ProtocolNumber::all();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.POBList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function POBShow(int $pobID, Request $request): View
    {
        return view('lists.POBShow', [
            'pobID' => $this->pobRepository->get($pobID),
        ]);
    }

    public function myList(): View
    {
        return view('lists.myList');
    }

    public function ODBList(): View
    {
        $protocols = ProtocolOD::all();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ODBList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function ZSList(): View
    {
        $protocols = ProtocolZS::all();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ZSList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function OtList(): View
    {
        $protocols = ProtocolOther::all();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.OtList', ['protocols' => $protocols, 'invest' => $invest]);
    }
}
