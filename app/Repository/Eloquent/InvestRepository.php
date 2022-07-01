<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\Invest;
use App\Repository\InvestRepository as InvestRepositoryInterface;

class InvestRepository implements InvestRepositoryInterface
{
    private Invest $investModel;

    public function __construct(Invest $investModel)
    {
        $this->investModel = $investModel;
    }

    public function get(int $id)
    {
        return $this->investModel->find($id);
    }

    public function all()
    {
        return $this->investModel
            ->with('clientName')
            ->orderBy('clientName')
            ->get();
    }

    public function allPaginated(int $limit = 15)
    {
        return $this->investModel
            ->with('client')
            ->orderBy('updated_at')
            ->paginate($limit);
    }

    public function filterBy(?string $phrase, int $limit = 150)
    {
        $query = $this->investModel
            ->with('client');

        if ($phrase) {
            $query->whereRaw('short_name like ?', ["%$phrase%"]);
        }

        return $query->paginate($limit);
    }

    public function updateModel(Invest $invest, array $data): void
    {
        $invest->name = $data['name'] ?? $invest->name;
        $invest->short_name = $data['short_name'] ?? $invest->short_name;
        $invest->detail_picking = $data['detail_picking'] ?? $invest->detail_picking;
        $invest->comment = $data['comment'] ?? $invest->comment;
        $invest->activ = $data['activ'] ?? $invest->activ;

        $invest->save();
    }
}
