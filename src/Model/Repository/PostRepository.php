<?php
declare(strict_types=1);

namespace App\Model\Repository;

class PostRepository
{
    public function findById(int $id): array
    {
        return ['id' => $id, 'title' => 'Article '. $id .' du blog', 'text' => 'Lorem ipsum'];
    }
}
