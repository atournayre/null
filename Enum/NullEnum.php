<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Enum;

class NullEnum
{
    private const YES = true;
    private const NO = false;

    private bool $bool;

    private function __construct(bool $bool)
    {
        $this->bool = $bool;
    }

    public function yes(): bool
    {
        return $this->bool === true;
    }

    public function no(): bool
    {
        return $this->bool === false;
    }

    public static function fromBool(bool $bool): self
    {
        $yesNo = $bool ? self::YES : self::NO;

        return new self($yesNo);
    }
}
