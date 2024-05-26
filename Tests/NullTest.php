<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Tests;

use Atournayre\Component\Null\Tests\Fixtures\Title;
use PHPUnit\Framework\TestCase;

class NullTest extends TestCase
{
    public function testNull(): void
    {
        $title = Title::asNull();

        self::assertTrue($title->isNull());
    }

    public function testNotNull(): void
    {
        $title = Title::create('My title');

        self::assertFalse($title->isNull());
        self::assertTrue($title->isNotNull());
    }

    public function testNullValue(): void
    {
        $title = Title::asNull();

        self::assertEquals('Empty title', $title->title);
    }

    public function testNotNullValue(): void
    {
        $title = Title::create('My title');

        self::assertEquals('My title', $title->title);
    }

    public function testNullable(): void
    {
        $title = Title::create('My title');

        self::assertFalse($title->isNull());

        $title = $title->toNullable();

        self::assertTrue($title->isNull());
    }

    public function testGetOrNull(): void
    {
        $title = Title::asNull();
        self::assertTrue($title->getOrNull()->isNull());
        self::assertSame('Empty title', $title->getOrNull()->title);

        $title = Title::create('My title');
        self::assertTrue($title->getOrNull()->isNotNull());
        self::assertSame('My title', $title->getOrNull()->title);
    }
}
