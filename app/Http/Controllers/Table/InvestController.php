<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatesInvest;
use Illuminate\Support\Facades\Auth;
use App\Model\Invest;
use Illuminate\View\View;
use App\Repository\InvestRepository;

class InvestController extends Controller
{
    private InvestRepository $investRepository;

    public function __construct(InvestRepository $investRepository)
    {
        $this->investRepository = $investRepository;
    }


    public function investShow(int $investId, Request $request): View
    {
        return view('tables.investShow', [
            'investID' => $this->investRepository->get($investId),
        ]);
    }

    public function investEdit(int $investId): View
    {
        return view('tables.investEdit', [
            'investID' => $this->investRepository->get($investId),
        ]);
    }

    public function investUpdate(int $investId, UpdatesInvest $request)
    {
        $data = $request->validated();
        $this->investRepository->updateModel(
            Invest::find($investId),
            $data
        );

        return redirect()->route('tables.invest')->with('status', 'Aktualizacja pomyślna');
    }
}
