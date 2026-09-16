<?php

namespace Alathazal\StarforgedLaravel\Assets;

enum InputTypes: string
{
    case CLOCK = 'Clock';
    case NUMBER = 'Number';
    case SELECT = 'Select';
    case TEXT = 'Text';
}
