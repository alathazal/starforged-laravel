<?php

namespace Alathazal\StarforgedLaravel\Shared;

use InvalidArgumentException;

/**
 * @template TData
 */
abstract class BaseRepository
{
    protected array $indexes = [];

    protected array $groupedIndexes = [];

    abstract protected function dataset(): array;

    abstract protected function dto(array $record): mixed;

    /**
     * @return TData[]
     */
    public function all(): array
    {
        return array_map(
            fn (array $record) => $this->dto($record),
            $this->dataset()
        );
    }

    /**
     * @return TData|null
     */
    public function find(string $id): mixed
    {
        return $this->findIndexed('$id', $id);
    }

    /**
     * @return TData|null
     */
    protected function findIndexed(
        string $field,
        string $value
    ): mixed
    {
        $record = $this->indexBy($field)[$value] ?? null;

        return $record
            ? $this->dto($record)
            : null;
    }
    

    /**
     * @return TData
     *
     * @throws InvalidArgumentException if the record is not found
     */
    public function findOrFail(string $id): mixed
    {
        return $this->find($id)
            ?? throw new InvalidArgumentException(
                static::class . " could not find record [{$id}]."
            );
    }

    protected function indexBy(string $field): array
    {
        return $this->indexes[$field]
            ??= collect($this->dataset())
                ->keyBy($field)
                ->all();
    }

    protected function groupBy(string $field): array
    {
        return $this->groupedIndexes[$field]
            ??= collect($this->dataset())
                ->groupBy($field)
                ->all();
    }
}