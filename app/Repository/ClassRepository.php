<?php

declare(strict_types=1);

namespace App\Repository;

interface ClassRepository

{
    public const TYPE_DEFAULT = 'beton';
    public const TYPE_ALL = 'all';

    public function get(int $id);

    public function filterBy(?string $material_types = self::TYPE_DEFAULT);
}
