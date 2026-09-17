<?php

use Alathazal\StarforgedLaravel\Assets\AssetRepository;
use Alathazal\StarforgedLaravel\Assets\InputTypes;
use Alathazal\StarforgedLaravel\Assets\Data\AssetData;
use Alathazal\StarforgedLaravel\Assets\Data\AssetAttachmentData;
use Alathazal\StarforgedLaravel\Assets\Data\AssetInputData;
use Alathazal\StarforgedLaravel\Assets\Data\AssetUsageData;
use Alathazal\StarforgedLaravel\Assets\Data\ConditionMeterData;
use Alathazal\StarforgedLaravel\AssetTypes\AssetTypes;
use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

beforeEach(function () {
    $this->repository = app(AssetRepository::class);
});

describe('Fetch', function () {
    it('can return all assets', function () {
        $assets = $this->repository->all();

        expect($assets)
            ->toBeArray()->not->toBeEmpty()
            ->and($assets[0])->toBeInstanceOf(AssetData::class);
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
});

describe('DTO Hydration', function () {
    it('can hydrate all Assets against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            expect($asset)
                ->toBeInstanceOf(AssetData::class)
                ->and($asset->source)->toBeInstanceOf(SourceData::class)
                ->and($asset->id)->toBeString()
                ->and($asset->name)->toBeString()
                ->and($asset->assetType)->toBeString()
                ->and(AssetTypes::tryFrom($asset->assetType))->not->toBeNull()
                ->and($asset->display)->toBeInstanceOf(DisplayData::class)
                ->and($asset->usage)->toBeInstanceOf(AssetUsageData::class)
                ->and(
                    !(isset($asset->attachments) && !($asset->attachments instanceof Optional))
                    || $asset->attachments instanceof AssetAttachmentData
                )->toBeTrue()
                ->and(
                    !(isset($asset->inputs) && !($asset->inputs instanceof Optional))
                    || $asset->inputs instanceof DataCollection
                )->toBeTrue()
                ->and($asset->abilities)->toBeInstanceOf(DataCollection::class)
                ->and(
                    !(isset($asset->conditionMeter) && !($asset->conditionMeter instanceof Optional))
                    || $asset->conditionMeter instanceof ConditionMeterData
                )->toBeTrue();
        }
    });

    it('can hydrate all Asset->SourceData against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            expect($asset->source)
                ->toBeInstanceOf(SourceData::class)
                ->and($asset->source->title)->toBeString()
                ->and($asset->source->authors)->toBeArray()
                ->and($asset->source->date)->toBeString();
        }
    });

    it('can hydrate all Asset->DisplayData against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            expect($asset->display)
                ->toBeInstanceOf(DisplayData::class)
                ->and($asset->display->title)->toBeString()
                ->and($asset->display->color)->toBeString();
        }
    });

    it('can hydrate all Asset->UsageData against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            expect($asset->usage)
                ->toBeInstanceOf(AssetUsageData::class)
                ->and($asset->usage->shared)->toBeBool();
        }
    });

    it('can hydrate all Asset->AttachmentsData against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            if ((isset($asset->attachments) && !($asset->attachments instanceof Optional))
                || $asset->attachments instanceof AssetAttachmentData) {

                expect($asset->attachments)
                    ->toBeInstanceOf(AssetAttachmentData::class)
                    ->and($asset->attachments->assetTypes)->toBeArray()
                    ->and($asset->attachments->max)->toBeIntOrNull();
            }
        }
    });

    it('can hydrate all Asset->InputsData against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            if ((isset($asset->inputs) && !($asset->inputs instanceof Optional))
                || $asset->inputs instanceof DataCollection) {
                    expect($asset->inputs)
                        ->toBeInstanceOf(DataCollection::class)
                        ->each(
                            fn(Pest\Expectation $e) => $e
                                ->toBeInstanceOf(AssetInputData::class)
                                ->and($e->value->id)->toBeString()
                                ->and($e->value->name)->toBeString()
                                ->and($e->value->inputType)->toBeString()
                                ->and(InputTypes::tryFrom($e->value->inputType))->not->toBeNull()
                                ->and($e->value->adjustable)->toBeBool()
                                ->and($e->value->min)->toBeIntOrNull()
                                ->and($e->value->max)->toBeIntOrNull()
                                ->and($e->value->step)->toBeIntOrNull()
                                ->and($e->value->value)->toBeIntOrNull()
                                ->and($e->value->clockType)->toBeStringOrNull()
                                ->and($e->value->segments)->toBeIntOrNull()
                                ->and($e->value->filled)->toBeIntOrNull()
                        );
            }
        }
    });

    it('can hydrate all Asset->ConditionMeterData against DTO correctly', function () {
        $assets = $this->repository->all();

        foreach ($assets as $asset) {
            if ((isset($asset->conditionMeter) && !($asset->conditionMeter instanceof Optional))
                || $asset->conditionMeter instanceof ConditionMeterData) {

                expect($asset->conditionMeter)
                    ->toBeInstanceOf(ConditionMeterData::class);
            }
        }
    });
});
