<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Contracts;

interface NullableInterface
{
    public function toNullable(): self;

    public function canBeNullable(): self;

    public function isNull(): bool;

    public function isNotNull(): bool;

    public function mayBeNull(): bool;

    public static function asNull(): self;

    public function getOrNull(): ?self;
}
