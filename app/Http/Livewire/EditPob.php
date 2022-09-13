<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Recipe;

class EditPob extends Component
{
    public $recipes = [];
    public $dataRecipe = [];
    public $selectedRecipe = null;

    protected $changeWateproof = null;

    public function mount($pobID)
    {
        $this->recipes = Recipe::where('investment_id', $pobID->invest_id)->where('activ', true)->orderBy('recipe_number')->get();
        $this->selectedRecipe = $pobID->recipe;
        $this->dataRecipe = Recipe::where('recipe_number', $pobID->recipe)->first();
    }

    public function render()
    {
        return view('livewire.edit-pob');
    }

    public function updatedSelectedRecipe($recipe)
    {
        if (!empty($this->selectedRecipe)) {
            $this->dataRecipe = Recipe::where('recipe_number', $recipe)->first();
        };
    }
}
