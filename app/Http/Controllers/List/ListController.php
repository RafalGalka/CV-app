<?php

namespace App\Http\Controllers\List;

use App\Repository\Eloquent\PobRepository;
use App\Model\Invest;
use App\Model\ProtocolOD;
use App\Model\ProtocolZS;
use Illuminate\View\View;
use App\Model\ProtocolPOB;
use App\Model\ProtocolOther;
use App\Model\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatesPOB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{

    private PobRepository $pobRepository;

    public function __construct(PobRepository $pobRepository)
    {
        $this->pobRepository = $pobRepository;
    }

    public function POBList(): View
    {
        $protocols = ProtocolPOB::where('collection', null)->orderBy('protocol_number', 'DESC')->paginate(20);
        //$protocols = ProtocolNumber::all();
        $invests = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.POBList', ['protocols' => $protocols, 'invests' => $invests]);
    }

    public function POBShow(int $pobID): View
    {
        return view('lists.POBShow', [
            'pobID' => $this->pobRepository->get($pobID),
        ]);
    }

    public function POBEdit(int $pobID): View
    {
        $user = Auth::user();
        $prot = "POBedit";
        $invest_ID = ProtocolPOB::where('id', $pobID)->first();
        $recipes = Recipe::where('investment_id', $invest_ID->invest_id);

        return view('lists.POBEdit', [
            'pobID' => $this->pobRepository->get($pobID), 'user' => $user, 'recipes' => $recipes, 'prot' => $prot
        ]);
    }

    public function POBUpdate(int $POBId, UpdatesPOB $request)
    {
        $data = $request->validated();
        $this->pobRepository->updateModel(
            ProtocolPOB::find($POBId),
            $data
        );

        return redirect()->route('lists.POBList')->with('status', 'Aktualizacja pomyślna');
    }

    public function myList(): View
    {
        return view('lists.myList');
    }

    public function ODBList(): View
    {
        $protocols = ProtocolOD::paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ODBList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function ZSList(): View
    {
        $protocols = ProtocolZS::paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ZSList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function OtList(): View
    {
        $protocols = ProtocolOther::paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.OtList', ['protocols' => $protocols, 'invest' => $invest]);
    }
}
