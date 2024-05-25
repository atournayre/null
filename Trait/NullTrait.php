<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Trait;

use Atournayre\Component\Null\Enum\NullEnum;

trait NullTrait
{
    protected NullEnum $null;

    public function __call($name, $arguments)
    {
        if ('__construct' === $name) {
            $this->initializeNull();
        }
    }

    private function initializeNull(?bool $isNull = null): void
    {
        $this->null = NullEnum::fromBool($isNull ?? false);
    }

    public function toNullable(): self
    {
        $clone = clone $this;
        $clone->null = NullEnum::YES;

        return $clone;
    }

    public function canBeNullable(): self
    {
        $clone = clone $this;
        $clone->null = NullEnum::MAYBE;

        return $clone;
    }

    public function isNull(): bool
    {
        return $this->null->yes();
    }

    public function isNotNull(): bool
    {
        return $this->null->no();
    }

    public function mayBeNull(): bool
    {
        return $this->null->maybe();
    }

    public static function asNull(): self
    {
        $self = new self();
        $self->null = NullEnum::YES;

        return $self;
    }

    public function getOrNull(): ?self
    {
        return $this->null->maybe() ? null : $this;
    }
}
