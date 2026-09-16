<?php

namespace Alathazal\StarforgedLaravel\AssetTypes;

use Alathazal\StarforgedLaravel\Shared\BaseRepository;
use Alathazal\StarforgedLaravel\AssetTypes\Data\AssetTypeData;
use Alathazal\StarforgedPhp\StarforgedPhp;
use InvalidArgumentException;

/**
     * @extends BaseRepository<AssetTypeData>
 */
class AssetTypeRepository extends BaseRepository
{
    public function __construct(
        protected StarforgedPhp $Starforged,
    ) {}

    protected function dto(array $record): AssetTypeData
    {
        return AssetTypeData::from($record);
    }

    /**
     * @return AssetTypeData|null
     */
    public function findByName(string $name): ?AssetTypeData
    {
        return $this->findIndexed('Name', $name);
    }

    /**
     * @return AssetTypeData
     * 
     * @throws InvalidArgumentException if the asset with the given name is not found.
     */
    public function findByNameOrFail(string $name): AssetTypeData
    {
        return $this->findByName($name)
            ?? throw new InvalidArgumentException(
                static::class . " could not find record by name [{$name}]."
            );
    }

    protected function dataset(): array
    {
        return $this->Starforged->asset_types();
    }
}
