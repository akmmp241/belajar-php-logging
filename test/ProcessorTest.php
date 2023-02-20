<?php

namespace Akmalmp\BelajarLogger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(function ($record) {
            $record['extra']['akm'] = [
                "app" => "Belajar PHP Logging",
                "author" => "Akmal Muhammad p"
            ];
            return $record;
        });

        $logger->info("Hello World", ['username' => "akmal"]);
        $logger->info("Hello World");
        $logger->info("Hello World lagi");

        self::assertNotNull($logger);
    }

}