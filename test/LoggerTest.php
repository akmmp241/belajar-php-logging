<?php

namespace Akmalmp\BelajarPhpMvc;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertNotNull;

class LoggerTest extends TestCase
{
    public function testLogger()
    {
        $logger = new Logger("Akmalmp");

        self::assertNotNull($logger);
    }

    public function testLoggerWithName()
    {
        $logger = new Logger(LoggerTest::class);

        assertNotNull($logger);
    }
}