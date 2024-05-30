<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Traits;

use Atournayre\Component\Null\Enum\NullEnum;

trait NullTrait
{
    protected NullEnum $null;

    /**
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments)
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
        $clone->null = NullEnum::fromBool(true);

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
        $self->null = NullEnum::fromBool(true);

        return $self;
    }

    public function getOrNull(): self
    {
        if ($this->null->yes()) {
            return $this::asNull();
        }

        return $this;
    }
}
