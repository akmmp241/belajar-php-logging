<?php

namespace Akmalmp\BelajarLogger;

use Akmalmp\BelajarPhpMvc\HandlerTest;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));

        $logger->info("Belajar PHP Logging");
        $logger->info("Ini Akmal Muhammad P");
        $logger->info("Ini Logging");

        self::assertNotNull($logger);
    }

    public function testLevel()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::WARNING));

        $logger->debug("This is debug");
        $logger->info("This is info");
        $logger->notice("This is notice");
        $logger->warning("This is warning");
        $logger->error("This is error");
        $logger->critical("This is critical");
        $logger->alert("This is alert");
        $logger->emergency("This is emergency");

        self::assertNotNull($logger);
    }


}