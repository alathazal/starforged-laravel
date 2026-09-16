<?php

use Alathazal\StarforgedLaravel\MoveCategories\MoveCategoryRepository;
use Alathazal\StarforgedLaravel\MoveCategories\MoveCategories;
use Alathazal\StarforgedLaravel\MoveCategories\Data\MoveCategoryData;
use Alathazal\StarforgedLaravel\Shared\Data\DisplayData;
use Alathazal\StarforgedLaravel\Shared\Data\SourceData;

beforeEach(function () {
    $this->repository = app(MoveCategoryRepository::class);
});

describe('Fetch', function () {
    it('can fetch all move categories', function () {
        $move_categories = $this->repository->all();

        expect($move_categories)
            ->toBeArray()->not->toBeEmpty()
            ->each(
                fn(Pest\Expectation $e) => $e
                    ->toBeInstanceOf(MoveCategoryData::class)
                    ->and(MoveCategories::tryFrom($e->value->id))->not->toBeNull()
            );
    });

    describe('by id', function () {
        it('can find and return a move category', function () {
            $category = $this->repository->find(
                'Starforged/Moves/Session'
            );

            expect($category)
                ->toBeInstanceOf(MoveCategoryData::class)
                ->and($category->name)->toBe('Session');
        });

        it('returns null if given an unknown id', function () {
            expect(
                $this->repository->find('missing-category')
            )->toBeNull();
        });

        it('can return an asset using findOrFail', function () {
            $category = $this->repository->findOrFail(
                'Starforged/Moves/Session'
            );

            expect($category)
                ->toBeInstanceOf(MoveCategoryData::class)
                ->and($category->name)->toBe('Session');
        });
    });

    describe('by name', function () {
        it('finds a category by name', function () {
            $asset = $this->repository->findByName(
                'Session'
            );

            expect($asset)
                ->toBeInstanceOf(MoveCategoryData::class)
                ->and($asset->id)->toBe('Starforged/Moves/Session');
        });

        it('returns null when name does not exist', function () {
            expect(
                $this->repository->findByName(
                    'missing-category'
                )
            )->toBeNull();
        });

        it('can return an category using findByNameOrFail', function () {
            $asset = $this->repository->findByNameOrFail(
                'Session'
            );

            expect($asset)
                ->toBeInstanceOf(MoveCategoryData::class);
        });
    });
});

describe('DTO Hydration', function () {
    it('hydrates MoveCategory DTO correctly', function () {
        $category = $this->repository->find(
            'Starforged/Moves/Session'
        );

        expect($category)
            ->toBeInstanceOf(MoveCategoryData::class)
            ->and($category->id)->toBeString()
            ->and(MoveCategories::tryFrom($category->id))->not->toBeNull()
            ->and($category->name)->toBeString()
            ->and($category->source)->toBeInstanceOf(SourceData::class)
            ->and($category->description)->toBeString()
            ->and($category->display)->toBeInstanceOf(DisplayData::class)
            ->and($category->optional)->toBeBool();
    });

    it('hydrates MoveCategory->Source DTO correctly', function () {
        $category = $this->repository->find(
            'Starforged/Moves/Session'
        );

        expect($category->source)
            ->toBeInstanceOf(SourceData::class)
            ->and($category->source->title)->toBeString()
            ->and($category->source->authors)->toBeArray()
            ->and($category->source->date)->toBeString();
    });

    it('hydrates MoveCategory->Display DTO correctly', function () {
        $category = $this->repository->find(
            'Starforged/Moves/Session'
        );

        expect($category->display)
            ->toBeInstanceOf(DisplayData::class)
            ->and($category->display->title)->toBeString()
            ->and($category->display->color)->toBeString();
    });
});
