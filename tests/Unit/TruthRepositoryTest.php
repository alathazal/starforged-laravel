<?php

use Alathazal\StarforgedLaravel\Truths\TruthRepository;
use Alathazal\StarforgedLaravel\Truths\Data\TruthData;
use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;
use Alathazal\StarforgedLaravel\Shared\Data\SuggestionsData;
use Spatie\LaravelData\DataCollection;

beforeEach(function () {
    $this->repository = app(TruthRepository::class);
});

describe('Fetch', function () {
    it('can fetch all truths', function () {
        $truths = $this->repository->all();

        expect($truths)
            ->toBeArray()
            ->not->toBeEmpty()
            ->and($truths[0])->toBeInstanceOf(TruthData::class);
    });

    describe('by id', function () {
        it('finds a truth by id', function () {
            $truth = $this->repository->find(
                'Starforged/Setting_Truths/Cataclysm'
            );

            expect($truth)
                ->toBeInstanceOf(TruthData::class)
                ->and($truth->name)->toBe('Cataclysm');
        });

        it('returns null for an unknown id', function () {
            expect(
                $this->repository->find('missing-truth')
            )->toBeNull();
        });

        it('returns a truth using findOrFail', function () {
            $truth = $this->repository->findOrFail(
                'Starforged/Setting_Truths/Cataclysm'
            );

            expect($truth)
                ->toBeInstanceOf(TruthData::class);
        });
    });

    describe('by name', function () {
        it('finds a truth by name', function () {
            $truth = $this->repository->findByName(
                'Cataclysm'
            );

            expect($truth)
                ->toBeInstanceOf(TruthData::class)
                ->and($truth->id)->toBe('Starforged/Setting_Truths/Cataclysm');
        });

        it('returns null when name does not exist', function () {
            expect(
                $this->repository->findByName(
                    'Not A Real Truth'
                )
            )->toBeNull();
        });
    });
});

describe('DTO Hydration', function () {
    it('hydrates Truth DTO correctly', function () {
        $truth = $this->repository->find(
            'Starforged/Setting_Truths/Cataclysm'
        );

        expect($truth)
            ->toBeInstanceOf(TruthData::class)
            ->and($truth->id)->toBeString()
            ->and($truth->name)->toBeString()
            ->and($truth->table)->toBeInstanceOf(DataCollection::class)
            ->and($truth->character)->toBeString()
            ->and($truth->suggestions)->toBeInstanceOf(SuggestionsData::class)
            ->and($truth->display)->toBeInstanceOf(DisplayData::class)
            ->and($truth->source)->toBeInstanceOf(SourceData::class);
    });

    it('hydrates Truth->Source DTO correctly', function () {
        $truth = $this->repository->find(
            'Starforged/Setting_Truths/Cataclysm'
        );

        expect($truth->source)
            ->toBeInstanceOf(SourceData::class)
            ->and($truth->source->title)->toBeString()
            ->and($truth->source->authors)->toBeArray()
            ->and($truth->source->date)->toBeString();
    });

    it('hydrates Truth->Display DTO correctly', function () {
        $truth = $this->repository->find(
            'Starforged/Setting_Truths/Cataclysm'
        );

        expect($truth->display)
            ->toBeInstanceOf(DisplayData::class)
            ->and($truth->display->title)->toBeString()
            ->and($truth->display->icon)->toBeString();
    });
});
