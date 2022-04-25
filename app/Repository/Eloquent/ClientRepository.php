<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\Client;
use App\Repository\ClientRepository as ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private Client $clientModel;

    public function __construct(Client $clientModel)
    {
        $this->clientModel = $clientModel;
    }

    public function get(int $id)
    {
        return $this->clientModel->find($id);
    }

    public function all()
    {
        return $this->clientModel
            ->with('clientName')
            ->orderBy('clientName')
            ->get();
    }

    public function allPaginated(int $limit = 15)
    {
        return $this->investModel
            ->with('clientName')
            ->orderBy('clientName')
            ->paginate($limit);
    }

    public function filterBy(?string $phrase)
    {
        $query = $this->investModel
            ->with('clientName')
            ->orderBy('clientName');

        if ($phrase) {
            $query->whereRaw('name like ?', ["$phrase%"]);
        }

        return $query->paginate();
    }

    public function updateModel(Client $client, array $data): void
    {
        $client->short_name = $data['short_name'] ?? $client->short_name;
        $client->address = $data['address'] ?? $client->address;
        $client->comment = $data['comment'] ?? $client->comment;
        $client->activ = $data['activ'] ?? $client->activ;

        $client->save();
    }
}
