<?php

namespace Alathazal\StarforgedLaravel\AssetTypes\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AssetTypeUsageData extends Data
{
    public function __construct(
        #[MapInputName('Shared')]
        public bool $shared
    ) {}
}