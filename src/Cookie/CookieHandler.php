<?php

declare(strict_types=1);

namespace PerfectApp\Cookie;

trait CookieHandler
{
    public function set(string $name, string $value, int $expiry, string $path): void
    {
        setcookie($name, $value, $expiry, $path);
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
