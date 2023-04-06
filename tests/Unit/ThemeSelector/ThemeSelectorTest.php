<?php
declare(strict_types=1);

namespace Unit\ThemeSelector;

use PerfectApp\ThemeSelector\ThemeSelector;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

#[CoversClass(ThemeSelector::class)]
class ThemeSelectorTest extends TestCase
{
    private ThemeSelector $themeSelector;

    protected function setUp(): void
    {
        parent::setUp();
        $this->themeSelector = new ThemeSelector();
    }

    public function testGetValidTheme(): void
    {
        $_COOKIE['theme'] = 'darkly';
        $this->assertSame('darkly', $this->themeSelector->getTheme());
    }

    public function testGetThemeInvalidTheme(): void
    {
        $this->themeSelector->setTheme('invalid_theme');
        $this->assertSame('default', $this->themeSelector->getTheme());
    }

    public function testSetTheme(): void
    {
        $this->themeSelector->setTheme('cosmo');
        $this->assertSame('cosmo', $_COOKIE['theme']);

        $this->themeSelector->setTheme('invalid_theme');
        $this->assertSame('default', $_COOKIE['theme']);

        $this->themeSelector->setTheme('');
        $this->assertSame('default', $_COOKIE['theme']);
    }

    public function testRenderSelector(): void
    {
        $reflection = new ReflectionClass(ThemeSelector::class);
        $themesProperty = $reflection->getProperty('themes');
        $themesProperty->setAccessible(true);
        $themes = $themesProperty->getValue($this->themeSelector);

        $output = $this->themeSelector->renderSelector();
        $this->assertStringContainsString('<div class="theme-selector">', $output);
        $this->assertStringContainsString('<label for="theme-select">Select a theme:</label>', $output);
        $this->assertStringContainsString('<select id="theme-select" name="theme">', $output);

        // check that each theme is an option
        foreach ($themes as $themeKey => $themeName) {
            $this->assertStringContainsString("<option value='$themeKey'", $output);
            $this->assertStringContainsString($themeName, $output);
        }
    }
}
