<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Recipe;

interface RecipeRepository

{
    public const TYPE_DEFAULT = 1;
    public const TYPE_ALL = 'all';

    public function get(int $id);

    public function filterBy(?int $invest_id = self::TYPE_DEFAULT);

    public function updateModel(Recipe $recipe, array $data): void;
}
