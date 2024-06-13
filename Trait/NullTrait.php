<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Trait;

use Atournayre\Component\Null\Enum\NullEnum;

trait NullTrait
{
    protected NullEnum $null;

    /**
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments): mixed
    {
        if ('__construct' === $name) {
            $this->initializeNull();
        }

        return null;
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

    public function isNull(): bool
    {
        return $this->null->yes();
    }

    public function isNotNull(): bool
    {
        return $this->null->no();
    }

    public static function asNull(): self
    {
        $self = new self();
        $self->null = NullEnum::YES;

        return $self;
    }

    public function orNull(): self
    {
        if ($this->null->yes()) {
            return $this::asNull();
        }

        return $this;
    }

    /**
     * @throws \Throwable
     */
    public function orThrow(\Throwable|callable $throwable): self
    {
        if ($this->null->yes()) {
            if ($throwable instanceof \Throwable) {
                throw $throwable;
            }

            throw $throwable();
        }

        return $this;
    }
}
