<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Client;

interface ClientRepository
{
    public const TYPE_DEFAULT = 'client';
    public const TYPE_ALL = 'all';

    public function get(int $id);
    public function all();
    public function allPaginated(int $limit);

    public function filterBy(?string $phrase);

    public function updateModel(Client $client, array $data): void;
}
