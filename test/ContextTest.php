<?php

namespace Akmalmp\BelajarLogger;

use Akmalmp\BelajarPhpMvc\HandlerTest;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log message", ["username" => "Akmal"]);
        $logger->info("This is log message", ["method" => "login"]);

        self::assertNotNull($logger);
    }

}