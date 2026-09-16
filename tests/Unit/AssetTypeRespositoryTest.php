<?php

use Alathazal\StarforgedLaravel\AssetTypes\AssetTypeRepository;
use Alathazal\StarforgedLaravel\AssetTypes\AssetTypes;
use Alathazal\StarforgedLaravel\AssetTypes\Data\AssetTypeData;
use Alathazal\StarforgedLaravel\AssetTypes\Data\AssetTypeUsageData;
use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\DataCollection;

beforeEach(function () {
    $this->repository = app(AssetTypeRepository::class);
});

describe('Fetch', function () {
    it('can fetch all asset types', function () {
        $asset_types = $this->repository->all();
       
        expect($asset_types)
            ->toBeArray()->not->toBeEmpty()
            ->each(
                fn(Pest\Expectation $e) => $e
                    ->toBeInstanceOf(AssetTypeData::class)
                    ->and(AssetTypes::tryFrom($e->value->id))->not->toBeNull()
            );
    });

    describe('by id', function () {
        it('can find and return an asset', function () {
            $asset = $this->repository->find(
                'Starforged/Assets/Command_Vehicle'
            );

            expect($asset)
                ->toBeInstanceOf(AssetTypeData::class)
                ->and($asset->name)->toBe('Command Vehicle');
        });

        it('returns null if given an unknown id', function () {
            expect(
                $this->repository->find('missing-asset')
            )->toBeNull();
        });

        it('can return an asset using findOrFail', function () {
            $asset = $this->repository->findOrFail(
                'Starforged/Assets/Command_Vehicle'
            );

            expect($asset)
                ->toBeInstanceOf(AssetTypeData::class)
                ->and($asset->name)->toBe('Command Vehicle');
        });
    });

    describe('by name', function () {
        it('finds a asset by name', function () {
            $asset = $this->repository->findByName(
                'Command Vehicle'
            );

            expect($asset)
                ->toBeInstanceOf(AssetTypeData::class)
                ->and($asset->id)->toBe('Starforged/Assets/Command_Vehicle');
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
                'Command Vehicle'
            );

            expect($asset)
                ->toBeInstanceOf(AssetTypeData::class);
        });
    });
});

describe('DTO Hydration', function () {
    it('hydrates AssetType DTO correctly', function () {
        $asset_type = $this->repository->find(
            'Starforged/Assets/Command_Vehicle'
        );

        expect($asset_type)
            ->toBeInstanceOf(AssetTypeData::class)
            ->and($asset_type->source)->toBeInstanceOf(SourceData::class)
            ->and($asset_type->id)->toBeString()
            ->and(AssetTypes::tryFrom($asset_type->id))->not->toBeNull()
            ->and($asset_type->name)->toBeString()
            ->and($asset_type->description)->toBeString()
            ->and($asset_type->display)->toBeInstanceOf(DisplayData::class)
            ->and($asset_type->usage)->toBeInstanceOf(AssetTypeUsageData::class);
    });

    it('hydrates AssetType->Source DTO correctly', function () {
        $asset_type = $this->repository->find(
            'Starforged/Assets/Command_Vehicle'
        );

        expect($asset_type->source)
            ->toBeInstanceOf(SourceData::class)
            ->and($asset_type->source->title)->toBeString()
            ->and($asset_type->source->authors)->toBeArray()
            ->and($asset_type->source->date)->toBeString();
    });

    it('hydrates AssetType->Display DTO correctly', function () {
        $asset_type = $this->repository->find(
            'Starforged/Assets/Command_Vehicle'
        );

        expect($asset_type->display)
            ->toBeInstanceOf(DisplayData::class)
            ->and($asset_type->display->title)->toBeString()
            ->and($asset_type->display->color)->toBeString();
    });

    it('hydrates AssetType->Usage DTO correctly', function () {
        $asset_type = $this->repository->find(
            'Starforged/Assets/Command_Vehicle'
        );

        expect($asset_type->usage)
            ->toBeInstanceOf(AssetTypeUsageData::class)
            ->and($asset_type->usage->shared)->toBeBool();
    });
});