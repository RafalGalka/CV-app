<?php

declare(strict_types=1);

namespace App\Providers;

use App\Model\Client;
use App\Repository\ClientRepository as ClientRepositoryInterface;
use App\Repository\Eloquent\ClientRepository;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider

{
    public function register()
    {
        $this->app->singleton(ClientRepositoryInterface::class, function ($app) {
            return new ClientRepository(
                $app->make(Client::class)
            );
        });
    }
}
