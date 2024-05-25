<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Enum;

use Atournayre\Component\Null\Trait\EnumTrait;

enum NullEnum
{
    use EnumTrait;

    case YES;
    case NO;
    case MAYBE;

    public function yes(): bool
    {
        return self::YES === $this;
    }

    public function no(): bool
    {
        return self::NO === $this;
    }

    public function maybe(): bool
    {
        return self::MAYBE === $this;
    }

    public static function fromBool(?bool $bool): self
    {
        return match ($bool) {
            true => self::YES,
            false => self::NO,
            default => self::MAYBE,
        };
    }
}
