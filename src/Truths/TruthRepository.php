<?php

namespace Alathazal\StarforgedLaravel\Truths;

use Alathazal\StarforgedLaravel\Shared\BaseRepository;
use Alathazal\StarforgedLaravel\Truths\Data\TruthData;
use Alathazal\StarforgedPhp\StarforgedPhp;
use InvalidArgumentException;

/**
 * @extends BaseRepository<TruthData>
 */
class TruthRepository extends BaseRepository
{
    public function __construct(
        protected StarforgedPhp $starforged,
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
        return $this->starforged->truths();
    }
}
