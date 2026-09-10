<?php

use Alathazal\DataforgedLaravel\Truths\TruthRepository;
use Alathazal\DataforgedLaravel\Truths\Data\TruthData;
use Spatie\LaravelData\DataCollection;

beforeEach(function () {
    $this->repository = app(TruthRepository::class);
});

it('returns all truths', function () {
    $truths = $this->repository->all();

    expect($truths)
        ->toBeArray()->not->toBeEmpty()
        ->and($truths[0])->toBeInstanceOf(TruthData::class);
});

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

it('hydrates truth dto correctly', function () {
    $truth = $this->repository->find(
        'Starforged/Setting_Truths/Cataclysm'
    );

    expect($truth)
        ->toBeInstanceOf(TruthData::class)
        ->and($truth->id)->toBeString()
        ->and($truth->name)->toBeString()
        ->and($truth->table)->toBeInstanceOf(DataCollection::class);
});