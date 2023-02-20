<?php

namespace Akmalmp\BelajarPhpMvc;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    public function testRegex()
    {
        $path = "/products/12345/categories/abcde";

        $pattern = "#^/products/([0-9]*)/categories/([a-zA-Z]*)$#";

        $result = preg_match($pattern, $path, $variable);

        self::assertEquals(1, $result);

        var_dump($variable);
        array_shift($variable
        );
        var_dump($variable);
    }
}