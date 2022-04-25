<?php

declare(strict_types=1);

namespace App\Http\Controllers\Table;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Client;
use Illuminate\View\View;
use App\Repository\Eloquent\ClientRepository;

class AllTableController extends Controller
{

    public function tableList(Request $request)
    {
        // Protocol::create($request->all());
        $user = Auth::user();
        return view('tables.tableList', ['user' => $user]);
    }

    public function clientList()
    {
        $client = Client::all()->sortBy('short_name')->sortByDesc('activ');
        $user = Auth::user();
        return view('tables.clientList', ['client' => $client, 'user' => $user]);
    }


    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function clientShow(int $clientID, Request $request): View
    {
        $user = Auth::user();

        return view('tables.clientShow', [
            'clientID' => $this->clientRepository->get($clientID),
        ]);
    }

    public function clientAdd()
    {
        return view('tables.clientAdd');
    }

    public function clientSave(Request $request)
    {
        $client = new Client();

        $client->short_name = $request->short_name;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->comment = $request->comment;
        $client->activ = $request->activ;

        $client->save();

        return redirect()->route('tables.client');
    }

    public function clientEdit(int $clientId, Request $request): View
    {
        $user = Auth::user();

        return view('tables.clientEdit', [
            'clientID' => $this->clientRepository->get($clientId),
        ]);
    }

    public function clientUpdate(int $clientId, Request $request)
    {
        $data =  $request->validate([
            'short_name' => 'required|max:100',
            'comment' => 'max:400',
            'address' => 'max:400',
            'activ' => 'boolean',
        ]);

        $this->clientRepository->updateModel(
            Client::find($clientId),
            $data
        );

        return redirect()->route('tables.client')->with('status', 'Aktualizacja pomyślna');
    }
}
