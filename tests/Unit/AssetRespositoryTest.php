<?php

use Alathazal\DataforgedLaravel\Assets\AssetRepository;
use Alathazal\DataforgedLaravel\Assets\AssetTypes;
use Alathazal\DataforgedLaravel\Assets\Data\AssetData;
use Alathazal\DataforgedLaravel\Assets\Data\AssetAttachmentData;
use Alathazal\DataforgedLaravel\Assets\Data\AssetUsageData;
use Alathazal\DataforgedLaravel\Assets\Data\ConditionMeterData;
use Alathazal\DataforgedLaravel\Shared\Data\DisplayData;
use Alathazal\DataforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\DataCollection;

beforeEach(function () {
    $this->repository = app(AssetRepository::class);
});

it('can return all assets', function () {
    $assets = $this->repository->all();

    expect($assets)
        ->toBeArray()->not->toBeEmpty()
        ->and($assets[0])->toBeInstanceOf(AssetData::class);
});

describe('DTO Hydration', function () {
    it('hydrates Asset DTO correctly', function () {
        $asset = $this->repository->find(
            'Starforged/Assets/Command_Vehicle/Starship'
        );

        expect($asset)
            ->toBeInstanceOf(AssetData::class)
            ->and($asset->source)->toBeInstanceOf(SourceData::class)
            ->and($asset->id)->toBeString()
            ->and($asset->name)->toBeString()
            ->and($asset->assetType)->toBeString()
            ->and(AssetTypes::tryFrom($asset->assetType))->not->toBeNull()
            ->and($asset->display)->toBeInstanceOf(DisplayData::class)
            ->and($asset->usage)->toBeInstanceOf(AssetUsageData::class)
            ->and($asset->attachments)->toBeInstanceOf(AssetAttachmentData::class)
            ->and($asset->inputs)->toBeInstanceOf(DataCollection::class)
            ->and($asset->abilities)->toBeInstanceOf(DataCollection::class)
            ->and($asset->conditionMeter)->toBeInstanceOf(ConditionMeterData::class);
    });

    it('hydrates Asset->SourceData DTO correctly', function () {
        $asset = $this->repository->find(
            'Starforged/Assets/Command_Vehicle/Starship'
        );

        expect($asset->source)
            ->toBeInstanceOf(SourceData::class)
            ->and($asset->source->title)->toBeString()
            ->and($asset->source->authors)->toBeArray()
            ->and($asset->source->date)->toBeString();
    });

    it('hydrates Asset->DisplayData DTO correctly', function () {
        $asset = $this->repository->find(
            'Starforged/Assets/Command_Vehicle/Starship'
        );

        expect($asset->display)
            ->toBeInstanceOf(DisplayData::class)
            ->and($asset->display->title)->toBeString()
            ->and($asset->display->color)->toBeString();
    });
});

describe('by id', function () {
    it('can find and return an asset', function () {
        $asset = $this->repository->find(
            'Starforged/Assets/Command_Vehicle/Starship'
        );

        expect($asset)
            ->toBeInstanceOf(AssetData::class)
            ->and($asset->name)->toBe('Starship');
    });

    it('returns null if given an unknown id', function () {
        expect(
            $this->repository->find('missing-asset')
        )->toBeNull();
    });

    it('can return an asset using findOrFail', function () {
        $asset = $this->repository->findOrFail(
            'Starforged/Assets/Command_Vehicle/Starship'
        );

        expect($asset)
            ->toBeInstanceOf(AssetData::class);
    });
});

describe('by name', function () {
    it('finds a asset by name', function () {
        $asset = $this->repository->findByName(
            'Starship'
        );

        expect($asset)
            ->toBeInstanceOf(AssetData::class)
            ->and($asset->id)->toBe('Starforged/Assets/Command_Vehicle/Starship');
    });

    it('returns null when name does not exist', function () {
        expect(
            $this->repository->findByName(
                'Not A Real Asset'
            )
        )->toBeNull();
    });

    it('can return an asset using findByNameOrFail', function () {
        $asset = $this->repository->findByNameOrFail(
            'Starship'
        );

        expect($asset)
            ->toBeInstanceOf(AssetData::class);
    });
});

describe('by asset type', function () {
    it('can return the correct assets using commandVehicles()', function () {
        $assets = $this->repository->commandVehicles();

        expect($assets)
            ->not->toBeEmpty();

        collect($assets)->each(function ($asset) {
            expect($asset)->toBeInstanceOf(AssetData::class);
            expect($asset->assetType)->toBe(AssetTypes::COMMAND_VEHICLE->value);
        });
    });

    it('can return the correct assets using companions()', function () {
        $assets = $this->repository->companions();

        expect($assets)
            ->not->toBeEmpty();

        collect($assets)->each(function ($asset) {
            expect($asset)->toBeInstanceOf(AssetData::class);
            expect($asset->assetType)->toBe(AssetTypes::COMPANION->value);
        });
    });

    it('can return the correct assets using deeds()', function () {
        $assets = $this->repository->deeds();

        expect($assets)
            ->not->toBeEmpty();

        collect($assets)->each(function ($asset) {
            expect($asset)->toBeInstanceOf(AssetData::class);
            expect($asset->assetType)->toBe(AssetTypes::DEED->value);
        });
    });

    it('can return the correct assets using modules()', function () {
        $assets = $this->repository->modules();

        expect($assets)
            ->not->toBeEmpty();

        collect($assets)->each(function ($asset) {
            expect($asset)->toBeInstanceOf(AssetData::class);
            expect($asset->assetType)->toBe(AssetTypes::MODULE->value);
        });
    });

    it('can return the correct assets using paths()', function () {
        $assets = $this->repository->paths();

        expect($assets)
            ->not->toBeEmpty();

        collect($assets)->each(function ($asset) {
            expect($asset)->toBeInstanceOf(AssetData::class);
            expect($asset->assetType)->toBe(AssetTypes::PATH->value);
        });
    });

    it('can return the correct assets using supportVehicles()', function () {
        $assets = $this->repository->supportVehicles();

        expect($assets)
            ->not->toBeEmpty();

        collect($assets)->each(function ($asset) {
            expect($asset)->toBeInstanceOf(AssetData::class);
            expect($asset->assetType)->toBe(AssetTypes::SUPPORT_VEHICLE->value);
        });
    });
});