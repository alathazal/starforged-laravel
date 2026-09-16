<?php

namespace Alathazal\StarforgedLaravel\MoveCategories;

use Alathazal\StarforgedLaravel\Shared\BaseRepository;
use Alathazal\StarforgedLaravel\MoveCategories\Data\MoveCategoryData;
use Alathazal\StarforgedPhp\StarforgedPhp;
use InvalidArgumentException;

/**
     * @extends BaseRepository<MoveCategoryData>
 */
class MoveCategoryRepository extends BaseRepository
{
    public function __construct(
        protected StarforgedPhp $Starforged,
    ) {}

    protected function dto(array $record): MoveCategoryData
    {
        return MoveCategoryData::from($record);
    }

    /**
     * @return MoveCategoryData|null
     */
    public function findByName(string $name): ?MoveCategoryData
    {
        return $this->findIndexed('Name', $name);
    }

    /**
     * @return MoveCategoryData
     * 
     * @throws InvalidArgumentException if the move category with the given name is not found.
     */
    public function findByNameOrFail(string $name): MoveCategoryData
    {
        return $this->findByName($name)
            ?? throw new InvalidArgumentException(
                static::class . " could not find record by name [{$name}]."
            );
    }

    protected function dataset(): array
    {
        return $this->Starforged->move_categories();
    }
}
