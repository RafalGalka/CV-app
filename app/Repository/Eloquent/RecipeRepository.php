<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\Recipe;
use App\Repository\RecipeRepository as RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    private Recipe $recipeModel;

    public function __construct(Recipe $recipeModel)
    {
        $this->recipeModel = $recipeModel;
    }

    public function get(int $id)
    {
        return $this->recipeModel->find($id);
    }

    public function filterBy(?int $invest_id = self::TYPE_ALL)
    {
        $query = $this->recipeModel
            ->orderByDesc('activ');

        if ($invest_id !== self::TYPE_ALL) {
            $query->where('invest_id', $invest_id);
        }

        return $query->get();
    }

    public function updateModel(Recipe $recipe, array $data): void
    {
        $recipe->investment_id = $data['investment_id'] ?? $recipe->investment_id;
        $recipe->recipe_number = $data['recipe_number'] ?? $recipe->recipe_number;
        $recipe->strenght_class = $data['strenght_class'] ?? $recipe->strenght_class;
        $recipe->rate_time = $data['rate_time'] ?? $recipe->rate_time;
        $recipe->waterproof = $data['waterproof'] ?? $recipe->waterproof;
        $recipe->w_days = $data['w_days'] ?? $recipe->w_days;
        $recipe->properties = $data['properties'] ?? $recipe->properties;
        $recipe->comment = $data['comment'] ?? $recipe->comment;
        $recipe->activ = $data['activ'] ?? $recipe->activ;

        $recipe->save();
    }
}
