<?php
declare(strict_types=1);

namespace Unit\Cookie;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PerfectApp\Cookie\CookieHandler;

#[CoversClass(CookieHandlerTest::class)]
class CookieHandlerTest extends TestCase
{
    use CookieHandler;

    public function testSetCookie(): void
    {
        $this->set('test_cookie', 'test_value', time() + 3600, '/');
        $this->assertSame('test_value', $this->get('test_cookie'));
    }

    public function testGetCookie(): void
    {
        $_COOKIE['test_cookie'] = 'test_value';
        $value = $this->get('test_cookie');
        $this->assertSame('test_value', $value);

        $value = $this->get('invalid_cookie');
        $this->assertNull($value);
    }

    public function testGetCookieReturnsNullWhenCookieIsNotSet(): void
    {
        $this->assertNull($this->get('nonexistent_cookie'));
    }

    public function testGetCookieReturnsCookieValueWhenCookieIsSet(): void
    {
        $expectedValue = 'test_value';
        $_COOKIE['test_cookie'] = $expectedValue;

        $this->assertSame($expectedValue, $this->get('test_cookie'));
    }

    public function testSetCookieSetsCookieWithValue(): void
    {
        $name = 'test_cookie';
        $value = 'test_value';
        $expiry = time() + 3600;
        $path = '/';
        $this->set($name, $value, $expiry, $path);

        $this->assertSame($value, $_COOKIE[$name]);
    }
}