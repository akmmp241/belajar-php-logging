<?php

namespace Akmalmp\BelajarLogger;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    public function testFormatter()
    {
        $logger = new Logger(FormatTest::class);
        $handler = new StreamHandler("php://stderr");
        $handler->setFormatter(new JsonFormatter());

        $logger->pushHandler($handler);
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        $logger->info("Belajar PHP Logging", ["username" => "akm"]);
        $logger->info("Belajar PHP Logger", ["username" => "akm"]);

        self::assertNotNull($logger);
    }

}