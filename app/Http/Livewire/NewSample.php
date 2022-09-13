<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Recipe;

class NewSample extends Component
{
    public $number_of_samples;
    public $samples_150;
    public $samples_100;
    public $samples_other;

    protected $changeWateproof = null;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.new-samples');
    }

    public function updatedSelectedRecipe($recipe)
    {
        if (!empty($this->selectedRecipe)) {
            $this->dataRecipe = Recipe::where('recipe_number', $recipe)->first();
        };
    }
}
