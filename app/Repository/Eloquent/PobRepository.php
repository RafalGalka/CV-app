<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\ProtocolPOB;
use App\Repository\PobRepository as PobRepositoryInterface;

class PobRepository implements PobRepositoryInterface
{
    private ProtocolPOB $investModel;

    public function __construct(ProtocolPOB $protocolPOBModel)
    {
        $this->protocolPOBModel = $protocolPOBModel;
    }

    public function get(int $id)
    {
        return $this->protocolPOBModel->find($id);
    }

    public function all()
    {
        return $this->protocolPOBModel
            ->with('clientName')
            ->orderBy('clientName')
            ->get();
    }

    public function allPaginated(int $limit = 15)
    {
        return $this->protocolPOBModel
            ->with('client')
            ->orderBy('updated_at')
            ->paginate($limit);
    }

    public function filterBy(?string $phrase, int $limit = 20)
    {
        $query = $this->protocolPOBModel
            ->with('client');

        if ($phrase) {
            $query->whereRaw('short_name like ?', ["%$phrase%"]);
        }

        return $query->paginate($limit);
    }

    public function updateModel(ProtocolPOB $protocolPOB, array $data): void
    {
        $protocolPOB->name = $data['name'] ?? $protocolPOB->name;
        $protocolPOB->short_name = $data['short_name'] ?? $protocolPOB->short_name;
        $protocolPOB->detail_picking = $data['detail_picking'] ?? $protocolPOB->detail_picking;
        $protocolPOB->comment = $data['comment'] ?? $protocolPOB->comment;
        $protocolPOB->activ = $data['activ'] ?? $protocolPOB->activ;

        $protocolPOB->save();
    }
}
