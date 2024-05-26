<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Tests\Fixtures;

use Atournayre\Component\Null\Contracts\NullableInterface;
use Atournayre\Component\Null\Trait\NullTrait;

final class Title implements NullableInterface
{
    use NullTrait;

    private function __construct(
        public readonly string $title,
    ) {
        $this->initializeNull();
    }

    public static function create(string $title): Title
    {
        return new Title($title);
    }

    public static function asNull(): Title
    {
        $self = new self('Empty title');

        return $self
            ->toNullable()
        ;
    }
}
