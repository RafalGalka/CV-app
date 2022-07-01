<?php

declare(strict_types=1);

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Recipe;
use App\Model\Client;
use App\Model\Invest;
use Illuminate\View\View;
use App\Repository\RecipeRepository;
use App\Model\StrenghtClass;
use App\Http\Requests\UpdatesRecipe;

class RecipeController extends Controller
{
    private RecipeRepository $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function recipeList(): View
    {
        $recipe = Recipe::paginate(10);
        $user = Auth::user();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        return view('recipes.list', ['user' => $user, 'recipe' => $recipe, 'invest' => $invest]);
    }

    public function recipeAdd(): View
    {
        $class = StrenghtClass::where('activ', true)->where('material_types', 'beton')->orderBy('short_name')->get();
        $invest = Invest::where('activ', true)->orderBy('short_name')->get();
        $client = Client::all()->where('activ', 1)->sortBy('short_name');
        $prot = "REC";
        return view('recipes.add', ['client' => $client, 'class' => $class, 'invest' => $invest, 'prot' => $prot]);
    }

    public function recipeSave(Request $request)
    {
        $user = Auth::user();
        $recipe = new Recipe();

        $recipe->investment_id = $request->invest_id;
        $recipe->recipe_number = $request->recipe_number;
        $recipe->strenght_class = $request->strenght_class;
        $recipe->rate_time = $request->rate_time;
        $recipe->waterproof = $request->waterproof;
        $recipe->w_days = $request->w_days;
        $recipe->properties = $request->properties;
        $recipe->comment = $request->comment;
        $recipe->activ = $request->activ;

        $recipe->save();

        return redirect()->route('recipes.recipe');
    }

    public function recipeShow(int $recipeId): View
    {
        return view('recipes.recipeShow', [
            'recipeID' => $this->recipeRepository->get($recipeId),
        ]);
    }

    public function recipeEdit(int $recipeId): View
    {
        $class = StrenghtClass::where('activ', true)->where('material_types', 'beton')->orderBy('short_name')->get();
        return view('recipes.recipeEdit', [
            'recipeID' => $this->recipeRepository->get($recipeId), 'class' => $class
        ]);
    }

    public function recipeUpdate(int $recipeId, UpdatesRecipe $request)
    {
        $data = $request->validated();
        $this->recipeRepository->updateModel(
            Recipe::find($recipeId),
            $data
        );

        return redirect()->route('recipes.recipe')->with('status', 'Aktualizacja pomyślna');
    }
}
