<?php

declare(strict_types=1);

namespace App\Providers;

use App\Model\Recipe;
use App\Repository\RecipeRepository as RecipeRepositoryInterface;
use App\Repository\Eloquent\RecipeRepository;
use Illuminate\Support\ServiceProvider;

class RecipeServiceProvider extends ServiceProvider

{
    public function register()
    {
        $this->app->singleton(RecipeRepositoryInterface::class, function ($app) {
            return new RecipeRepository(
                $app->make(Recipe::class)
            );
        });
    }
}
