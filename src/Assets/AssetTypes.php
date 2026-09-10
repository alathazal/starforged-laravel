<?php

namespace Alathazal\DataforgedLaravel\Assets;

enum AssetTypes: string
{
    case COMMAND_VEHICLE = 'Starforged/Assets/Command_Vehicle';
    case MODULE = 'Starforged/Assets/Module';
    case SUPPORT_VEHICLE = 'Starforged/Assets/Support_Vehicle';
    case PATH = 'Starforged/Assets/Path';
    case COMPANION = 'Starforged/Assets/Companion';
    case DEED = 'Starforged/Assets/Deed';
}