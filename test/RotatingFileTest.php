<?php

namespace Akmalmp\BelajarLogger;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class RotatingFileTest extends \PHPUnit\Framework\TestCase
{
    public function testRotating()
    {
        $logger = new Logger(RotatingFileTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../app.log', 10, Logger::INFO));

        $logger->info("Belajar PHP");
        $logger->info("Belajar PHP OOP");
        $logger->info("Belajar PHP MVC");
        $logger->info("Belajar PHP Logging");

        self::assertNotNull($logger);
    }

}