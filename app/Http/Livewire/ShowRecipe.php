<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Recipe;

class ShowRecipe extends Component
{
    public $recipes = [];
    public $compression_class;
    public $other_class;
    // public $selectedInvest;
    public $selectedRecipe;
    public $dataRecipe;

    public function mount()
    {
        $this->recipes = Recipe::where('activ', true)->orderBy('recipe_number')->get();
    }

    public function render()
    {
        return view('livewire.show-recipe');
    }

    public function updateRecipe($selectedInvest)
    {
        if (!empty($this->selectedInvest)) {
            $this->recipes = Recipe::where('investment_id', $selectedInvest)->orderBy('recipe_number')->get();
        }
    }

    public function selectedRecipe($selectedRecipe)
    {
        if (!empty($this->selectedRecipe)) {
            $this->dataRecipe = Recipe::where('recipe_number', $selectedRecipe)->get();
        }
    }
}
