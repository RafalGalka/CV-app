<?php

namespace App\Http\Controllers\List;

use App\Model\Invest;
use App\Model\Recipe;
use App\Model\ProtocolOD;
use App\Model\ProtocolZS;
use App\Model\TakeSample;
use Illuminate\View\View;
use App\Model\ProtocolPOB;
use App\Model\ProtocolOther;
use App\Model\StrenghtClass;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatesOt;
use App\Http\Requests\UpdatesZS;
use App\Http\Requests\UpdatesODB;
use App\Http\Requests\UpdatesPOB;
use App\Http\Controllers\Controller;
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
        $protocols = ProtocolPOB::where('collection', "<", 8)->orWhere('collection', null)->orderBy('protocol_number', 'DESC')->paginate(20);
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

    public function ODBShow(int $odbID): View
    {
        $protocol = ProtocolOD::where('id', $odbID)->first();
        $save_samples = TakeSample::where('protocol_number', $protocol->protocol_number)->get();
        $nrr = 0;
        $nr = 0;

        foreach ($save_samples as $sample) {
            $nr += $sample->number_of_sample;
        }
        return view('lists.OdbShow', ['protocol' => $protocol, 'save_samples' => $save_samples, 'nrr' => $nrr, 'nr' => $nr]);
    }

    public function ODBEdit(int $odbID): View
    {
        $user = Auth::user();
        $data = ProtocolOD::where('id', $odbID)->first();
        $prot = "ODBedit";
        $save_samples = TakeSample::where('protocol_number', $data->protocol_number)->get();
        $nrr = 0;
        $nr = 0;

        foreach ($save_samples as $sample) {
            $nr += $sample->number_of_sample;
        }

        return view('lists.ODBEdit', [
            'odbID' => $this->pobRepository->get($odbID), 'user' => $user, 'prot' => $prot, 'data' => $data, 'save_samples' => $save_samples, 'nrr' => $nrr, 'nr' => $nr
        ]);
    }

    public function ODBUpdate(int $odbID, UpdatesODB $request)
    {
        $data = $request->validated();
        $edit = ProtocolOD::find($odbID);

        $edit->date = $data['date'] ?? $edit->date;
        $edit->drive = $data['drive'] ?? $edit->drive;
        $edit->sample_type = $data['sample_type'] ?? $edit->sample_type;
        $edit->number_of_sample = $data['number_of_sample'] ?? $edit->number_of_sample;
        $edit->my_comment = $data['my_comment'] ?? $edit->my_comment;

        $edit->update();

        if ($request->btn == 'addSample') {
            return redirect()->route('sample.add', ['nr' => $request->protocol_number]);
        } else {
            return redirect()->route('lists.ODBList')->with('status', 'Aktualizacja pomyślna');
        }
    }

    public function ZSList(): View
    {
        $protocols = ProtocolZS::orderBy('protocol_number', 'DESC')->paginate(20);
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('lists.ZSList', ['protocols' => $protocols, 'invest' => $invest]);
    }

    public function ZSShow(int $zsID): View
    {
        $protocol = ProtocolZS::where('id', $zsID)->first();
        return view('lists.ZSShow', ['protocol' => $protocol]);
    }

    public function ZSEdit(int $zsID): View
    {
        $classB = StrenghtClass::where('activ', true)->where('material_types', 'podkład-zginanie')->orderBy('short_name')->get();
        $classC = StrenghtClass::where('activ', true)->where('material_types', 'podkład-ściskanie')->orWhere('material_types', 'zaprawa')->where('activ', true)->orderBy('short_name')->get();
        $user = Auth::user();
        $data = ProtocolZS::where('id', $zsID)->first();
        $prot = "ZSedit";

        return view('lists.ZSEdit', [
            'zsID' => $this->pobRepository->get($zsID), 'user' => $user, 'prot' => $prot, 'data' => $data, 'classB' => $classB, 'classC' => $classC
        ]);
    }

    public function ZSUpdate(int $zsID, UpdatesZS $request)
    {
        $data = $request->validated();
        $edit = ProtocolZS::find($zsID);

        $edit->date = $data['date'] ?? $edit->date;
        $edit->recipe = $data['recipe'] ?? $edit->recipe;
        $edit->compression_class = $data['compression_class'] ?? $edit->compression_class;
        $edit->bending_class = $data['bending_class'] ?? $edit->bending_class;
        $edit->drive = $data['drive'] ?? $edit->drive;
        $edit->element = $data['element'] ?? $edit->element;
        $edit->days_28 = $data['days_28'] ?? $edit->days_28;
        $edit->days_7 = $data['days_7'] ?? $edit->days_7;
        $edit->days_7 = $data['days_7'] ?? $edit->days_7;
        $edit->volume_A = $data['volume_A'] ?? $edit->volume_A;
        $edit->day_A = $data['day_A'] ?? $edit->day_A;
        $edit->time = $data['time'] ?? $edit->time;
        $edit->my_comment = $data['my_comment'] ?? $edit->my_comment;

        $edit->update();

        return redirect()->route('lists.ZSList')->with('status', 'Aktualizacja pomyślna');
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
