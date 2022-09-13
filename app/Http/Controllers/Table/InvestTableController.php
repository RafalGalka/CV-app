<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use App\Model\Client;
use App\Model\Invest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatesInvest;
use App\Repository\Eloquent\InvestRepository;

class InvestTableController extends Controller
{
    private InvestRepository $investRepository;

    public function __construct(InvestRepository $repository)
    {
        $this->investRepository = $repository;
    }

    public function investList(Request $request): View
    {
        // Protocol::create($request->all());
        //$invest = Invest::sorting()
        //   ->get()
        //   ->sortBy('client.short_name')
        //  ->sortByDesc('activ');

        $phrase = $request->get('phrase');
        $resultPaginator = $this->investRepository->filterBy($phrase);

        return view('tables.investList', ['invests' => $resultPaginator, 'phrase' => $phrase]);
    }

    public function investAdd()
    {
        $client = Client::all()->where('activ', 1)->sortBy('short_name');
        return view('tables.investAdd', ['client' => $client]);
    }

    public function investSave(UpdatesInvest $request)
    {
        //$invest = $request->validated();
        $invest = new Invest();

        $invest->client_id = $request->client_id;
        $invest->short_name = $request->short_name;
        $invest->name = $request->name;
        $invest->detail_picking = $request->detail_picking;
        $invest->comment = $request->comment;
        $invest->activ = $request->activ;

        //   dd($request);

        $invest->save();

        return redirect()->route('tables.invest');
    }
}
