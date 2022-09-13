<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\ProtocolPOB;
use App\Model\Recipe;
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
        $dataRecipe = Recipe::where('investment_id', $data['inv_id'])->where('recipe_number', $data['recipe'])->first();

        $protocolPOB->date = $data['date'] ?? $protocolPOB->date;
        $protocolPOB->drive = $data['drive'] ?? $protocolPOB->drive;
        $protocolPOB->air_temp = $data['air_temp'] ?? $protocolPOB->air_temp;
        $protocolPOB->recipe = $data['recipe'] ?? $protocolPOB->recipe;
        $protocolPOB->compression_class = $dataRecipe->strenght_class;
        $protocolPOB->waterproof = $dataRecipe->waterproof;
        $protocolPOB->element = $data['element'] ?? $protocolPOB->element;
        $protocolPOB->days_28 = $data['days_28'] ?? 0;
        $protocolPOB->days_56 = $data['days_56'] ?? 0;
        $protocolPOB->days_7 = $data['days_7'] ?? 0;
        $protocolPOB->volume_phone = $data['volume_phone'] ?? 0;
        $protocolPOB->volume_W = $data['volume_W'] ?? 0;
        $protocolPOB->type_A = $data['type_A'];
        $protocolPOB->volume_A = $data['volume_A'] ?? 0;
        $protocolPOB->day_A = $data['day_A'] ?? 0;
        $protocolPOB->type_B = $data['type_B'] ?? $protocolPOB->type_B;
        $protocolPOB->volume_B = $data['volume_B'] ?? 0;
        $protocolPOB->day_B = $data['day_B'] ?? $protocolPOB->day_B;
        $protocolPOB->type_C = $data['type_C'] ?? $protocolPOB->type_C;
        $protocolPOB->volume_C = $data['volume_C'] ?? $protocolPOB->volume_C;
        $protocolPOB->day_C = $data['day_C'] ?? $protocolPOB->day_C;
        $protocolPOB->my_comment = $data['my_comment'] ?? $protocolPOB->my_comment;
        if ($data['btn'] == "delete") {
            $protocolPOB->collection = 1;
        }

        $protocolPOB->save();
    }
}
