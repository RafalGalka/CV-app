<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Invest;
use App\Model\Client;
use App\Model\Recipe;

class ShowInvest extends Component
{
    public $clients;
    public $invests = [];
    public $recipes = [];
    public $dataRecipe;

    public $selectedClient = null;
    public $selectedInvest = null;
    public $selectedRecipe = null;

    public function mount()
    {
        //dd(session());
        $this->clients = Client::where('activ', true)->orderBy('short_name')->get();
        $this->recipes = Recipe::where('activ', true)->orderBy('recipe_number')->get();
    }

    public function render()
    {
        return view('livewire.show-invest');
    }

    public function updatedSelectedClient($client)
    {
        if (!empty($this->selectedClient)) {
            $this->invests = Invest::where('client_id', $client)->orderBy('short_name')->get();
        } else $this->invests = [];
        $this->recipes = [];
        $this->dataRecipe = [];
    }

    public function updatedSelectedInvest($invest)
    {
        if (!empty($this->selectedInvest)) {
            $this->recipes = Recipe::where('investment_id', $invest)->where('activ', true)->orderBy('recipe_number')->get();
        } else $this->recipes = [];
        $this->dataRecipe = [];
    }

    public function updatedSelectedRecipe($recipe)
    {
        if (!empty($this->selectedRecipe)) {
            $this->dataRecipe = Recipe::where('recipe_number', $recipe)->first();
        } else $this->dataRecipe = [];
    }
}
