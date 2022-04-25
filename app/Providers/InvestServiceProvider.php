<?php

declare(strict_types=1);

namespace App\Providers;

use App\Model\Invest;
use App\Repository\InvestRepository as InvestRepositoryInterface;
use App\Repository\Eloquent\InvestRepository;
use Illuminate\Support\ServiceProvider;

class InvestServiceProvider extends ServiceProvider

{
    public function register()
    {
        $this->app->singleton(InvestRepositoryInterface::class, function ($app) {
            return new InvestRepository(
                $app->make(Invest::class)
            );
        });
    }
}
