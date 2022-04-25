<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\StrenghtClass;
use App\Repository\ClassRepository as ClassRepositoryInterface;

class ClassRepository implements ClassRepositoryInterface
{
    private StrenghtClass $classModel;

    public function __construct(StrenghtClass $classModel)
    {
        $this->classModel = $classModel;
    }

    public function get(int $id)
    {
        return $this->gameModel->find($id);
    }

    public function filterBy(?string $material_types = self::TYPE_ALL)
    {
        $query = $this->classModel
            ->orderByDesc('activ');

        if ($material_types !== self::TYPE_ALL) {
            $query->where('material_types', $material_types);
        }

        return $query->get();
    }
}
