<?php

namespace Filament\Infolists\Components\IconEntry\Enums;

enum IconEntrySize
{
    case ExtraSmall;

    case Small;

    case Medium;

    case Large;

    case ExtraLarge;

    case TwoExtraLarge;

    /**
     * @deprecated Use `TwoExtraLarge` instead.
     */
    public const ExtraExtraLarge = self::TwoExtraLarge;
}
