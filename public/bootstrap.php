<?php

declare(strict_types=1);

use PerfectApp\ThemeSelector\ThemeSelector;

require_once '../vendor/autoload.php';

$theme = new ThemeSelector();

if (!empty($_GET['theme'])) {
    $theme->setTheme($_GET['theme']);
    header('Location: ./');
    exit;
}
