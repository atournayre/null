<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Tests\Fixtures;

use Atournayre\Component\Null\Contracts\NullableInterface;
use Atournayre\Component\Null\Traits\NullTrait;

final class Title implements NullableInterface
{
    use NullTrait;

    public string $title;

    private function __construct(
        string $title
    ) {
        $this->title = $title;
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
