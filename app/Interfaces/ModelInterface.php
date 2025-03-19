<?php

namespace App\Interfaces;

interface ModellInterface
{
    function find(int $id): ?static;
    function all($orderBy = []): array;
    function delete();
    public function create();
    public function update();
}
?>