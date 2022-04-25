<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Invest;
use Illuminate\Support\Collection;

interface InvestRepository
{
    public const TYPE_DEFAULT = 'invest';
    public const TYPE_ALL = 'all';

    public function get(int $id);
    public function allPaginated(int $limit);

    public function filterBy(?string $phrase, int $size = 20);

    public function updateModel(Invest $invest, array $data): void;

    public function all();
}
