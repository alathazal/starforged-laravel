<?php

namespace Alathazal\StarforgedLaravel\Assets;

use Alathazal\StarforgedLaravel\Shared\BaseRepository;
use Alathazal\StarforgedLaravel\Assets\Data\AssetData;
use Alathazal\StarforgedPhp\StarforgedPhp;
use InvalidArgumentException;

/**
 * @extends BaseRepository<AssetData>
 */
class AssetRepository extends BaseRepository
{
    public function __construct(
        protected StarforgedPhp $Starforged,
    ) {}

    protected function dto(array $record): AssetData
    {
        return AssetData::from($record);
    }

    /**
     * @return AssetData|null
     */
    public function findByName(string $name): ?AssetData
    {
        return $this->findIndexed('Name', $name);
    }

    /**
     * @return AssetData
     * 
     * @throws InvalidArgumentException if the asset with the given name is not found.
     */
    public function findByNameOrFail(string $name): AssetData
    {
        return $this->findByName($name)
            ?? throw new InvalidArgumentException(
                static::class . " could not find record by name [{$name}]."
            );
    }

    protected function dataset(): array
    {
        return $this->Starforged->assets();
    }

    /**
     * @return AssetData[]
     */
    public function byType(AssetTypes $type): array
    {
        return ($this->groupBy('Asset Type')[$type->value] ?? collect())
            ->map(fn (array $record) => $this->dto($record))
            ->all();
    }

    /**
     * @return AssetData[]
     */
    public function paths(): array
    {
        return $this->byType(AssetTypes::PATH);
    }
    
    /**
     * @return AssetData[]
     */
    public function commandVehicles(): array
    {
        return $this->byType(AssetTypes::COMMAND_VEHICLE);
    }

    /**
     * @return AssetData[]
     */
    public function supportVehicles(): array
    {
        return $this->byType(AssetTypes::SUPPORT_VEHICLE);
    }

    /**
     * @return AssetData[]
     */
    public function modules(): array
    {
        return $this->byType(AssetTypes::MODULE);
    }
    
    /**
     * @return AssetData[]
     */
    public function companions(): array
    {
        return $this->byType(AssetTypes::COMPANION);
    }

    /**
     * @return AssetData[]
     */
    public function deeds(): array
    {
        return $this->byType(AssetTypes::DEED);
    }
}
