<?php

namespace Alathazal\StarforgedLaravel\MoveCategories;

enum MoveCategories: string
{
    case SESSION = 'Starforged/Moves/Session';
    case ADVENTURE = 'Starforged/Moves/Adventure';
    case QUEST = 'Starforged/Moves/Quest';
    case CONNECTION = 'Starforged/Moves/Connection';
    case EXPLORATION = 'Starforged/Moves/Exploration';
    case COMBAT = 'Starforged/Moves/Combat';
    case SUFFER = 'Starforged/Moves/Suffer';
    case RECOVER = 'Starforged/Moves/Recover';
    case THRESHOLD = 'Starforged/Moves/Threshold';
    case LEGACY = 'Starforged/Moves/Legacy';
    case FATE = 'Starforged/Moves/Fate';
    case SCENE_CHALLENGE = 'Starforged/Moves/Scene_Challenge';
}