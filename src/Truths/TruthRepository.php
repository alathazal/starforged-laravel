<?php

namespace Alathazal\DataforgedLaravel\Truths;

use Alathazal\DataforgedLaravel\Shared\BaseRepository;
use Alathazal\DataforgedLaravel\Truths\Data\TruthData;
use Alathazal\DataforgedPhp\Dataforged;
use InvalidArgumentException;

/**
 * @extends BaseRepository<TruthData>
 */
class TruthRepository extends BaseRepository
{
    public function __construct(
        protected Dataforged $dataforged,
    ) {}

    protected function dto(array $record): TruthData
    {
        return TruthData::from($record);
    }

    public function findByName(string $name): ?TruthData
    {
        return $this->findIndexed('Name', $name);
    }

    public function findByNameOrFail(string $name): TruthData
    {
        return $this->findByName($name)
            ?? throw new InvalidArgumentException(
                static::class . " could not find record by name [{$name}]."
            );
    }

    protected function dataset(): array
    {
        return $this->dataforged->truths();
    }
}
