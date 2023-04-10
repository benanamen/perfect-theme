<?php

declare(strict_types=1);

namespace PerfectApp\Cookie;

trait CookieHandler
{
    public function set(
        string $name,
        string $value,
        int $expire,
        string $path,
        string $domain = '',
        bool $secure = false,
        bool $httponly = false
    ): void {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        $_COOKIE[$name] = $value;
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function get(string $name): ?string
    {
        return $_COOKIE[$name] ?? null;
    }
}
