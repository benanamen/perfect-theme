<?php

declare(strict_types=1);

namespace PerfectApp\ThemeSelector;

use PerfectApp\Cookie\CookieHandler;

class ThemeSelector
{
    use CookieHandler;

    /**
     * @var array<string, string>
     */
    private array $themes = [
        'default' => 'Default',
        'cerulean' => 'Cerulean',
        'cosmo' => 'Cosmo',
        'cyborg' => 'Cyborg',
        'darkly' => 'Darkly',
        'flatly' => 'Flatly',
        'journal' => 'Journal',
        'litera' => 'Litera',
        'lumen' => 'Lumen',
        'lux' => 'Lux',
        'materia' => 'Materia',
        'minty' => 'Minty',
        'morph' => 'Morph',
        'pulse' => 'Pulse',
        'quartz' => 'Quartz',
        'sandstone' => 'Sandstone',
        'simplex' => 'Simplex',
        'sketchy' => 'Sketchy',
        'slate' => 'Slate',
        'solar' => 'Solar',
        'spacelab' => 'Spacelab',
        'superhero' => 'Superhero',
        'united' => 'United',
        'vapor' => 'Vapor',
        'yeti' => 'Yeti',
        'zephyr' => 'Zephyr',
    ];

    /**
     * @return string|null
     */
    public function getTheme(): ?string
    {
        return $this->get('theme') ?? 'default';
    }

    public function setTheme(string $themeName): void
    {
        if (!isset($this->themes[$themeName])) {
            $themeName = 'default';
        }

        $expire = time() + (60 * 60 * 24 * 30);
        $this->set('theme', $themeName, $expire, '/');
    }

    public function renderSelector(): string
    {
        $currentTheme = $this->getTheme();
        $output = '<div class="theme-selector">';
        $output .= '<label for="theme-select">Select a theme:</label>';
        $output .= '<select id="theme-select" name="theme">';

        foreach ($this->themes as $themeKey => $themeName) {
            $selected = ($themeKey === $currentTheme) ? 'selected' : '';
            $output .= "<option value='$themeKey' $selected>$themeName</option>";
        }

        $output .= '</select>';
        $output .= '</div>';
        return $output;
    }
}
