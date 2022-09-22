<?php

namespace App\Http\Controllers\List;

use App\Model\Invest;
use App\Model\Recipe;
use App\Model\ProtocolOD;
use App\Model\ProtocolZS;
use Illuminate\View\View;
use App\Model\ProtocolOther;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatesOt;
use App\Http\Requests\UpdatesPOB;
use App\Http\Controllers\Controller;
use App\Model\ProtocolPOB;
use Illuminate\Support\Facades\Auth;
use App\Repository\Eloquent\PobRepository;

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
        $protocols = ProtocolOD::orderBy('protocol_number', 'DESC')->paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ODBList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function ODBEdit(int $pobID): View
    {
        $user = Auth::user();
        $data = ProtocolOD::where('id', $pobID)->first();
        $prot = "POBedit";

        return view('lists.ODBEdit', [
            'pobID' => $this->pobRepository->get($pobID), 'user' => $user, 'prot' => $prot, 'data' => $data
        ]);
    }

    public function ZSList(): View
    {
        $protocols = ProtocolZS::orderBy('protocol_number', 'DESC')->paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ZSList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function OtList(): View
    {
        $protocols = ProtocolOther::orderBy('protocol_number', 'DESC')->paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.OtList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function OtShow(int $otID): View
    {
        $protocol = ProtocolOther::where('id', $otID)->first();
        return view('lists.OtShow', ['protocol' => $protocol]);
    }

    public function OtEdit(int $otID): View
    {
        $user = Auth::user();
        $data = ProtocolOther::where('id', $otID)->first();
        $prot = "OTedit";

        return view('lists.OtEdit', [
            'otID' => $this->pobRepository->get($otID), 'user' => $user, 'prot' => $prot, 'data' => $data
        ]);
    }

    public function OtUpdate(int $otID, UpdatesOt $request)
    {
        $data = $request->validated();
        $edit = ProtocolOther::find($otID);

        $edit->date = $data['date'] ?? $edit->date;
        $edit->drive = $data['drive'] ?? $edit->drive;
        $edit->test_type = $data['test_type'] ?? $edit->test_type;
        $edit->number_of_sample = $data['number_of_sample'] ?? $edit->number_of_sample;
        $edit->my_comment = $data['my_comment'] ?? $edit->my_comment;

        $edit->update();

        return redirect()->route('lists.OtList')->with('status', 'Aktualizacja pomyślna');
    }
}
