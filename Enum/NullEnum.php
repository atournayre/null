<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Enum;

use Atournayre\Component\Null\Trait\EnumTrait;

enum NullEnum
{
    use EnumTrait;

    case YES;
    case NO;

    public function yes(): bool
    {
        return self::YES === $this;
    }

    public function no(): bool
    {
        return self::NO === $this;
    }

    public static function fromBool(bool $bool): self
    {
        return match ($bool) {
            true => self::YES,
            false => self::NO,
        };
    }
}
