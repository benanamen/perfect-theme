[![codecov](https://codecov.io/gh/benanamen/perfect-theme/branch/master/graph/badge.svg?token=rY0IleWJNW)](https://codecov.io/gh/benanamen/perfect-theme)

[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=coverage)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=bugs)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=sqale_index)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=benanamen_perfect-theme&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=benanamen_perfect-theme)

## ThemeSelector

### Introduction

The `ThemeSelector` class provides functionality for managing themes in a web application. It allows users to select a theme from a list of available themes, and it can also set a default theme if the user's selected theme is not available.

### Getting Started

To use the `ThemeSelector` class, you need to instantiate it:

```php 
$themeSelector = new ThemeSelector();
```

### Setting the Theme

To set the user's selected theme, you can use the `setTheme` method:

```php 
$themeSelector->setTheme('cosmo');
```

If the selected theme is not available, the default theme will be used instead.

### Getting the Theme

To get the current theme, you can use the `getTheme` method:

```php 
$theme = $themeSelector->getTheme();
```

### Rendering the Theme Selector

To render the theme selector dropdown, you can use the `renderSelector` method:

```php 
$output = $themeSelector->renderSelector();
```

This will return the HTML markup for the theme selector dropdown.

## CookieHandler

### Introduction

The `CookieHandler` trait provides functionality for handling cookies in a web application.

### Setting a Cookie

To set a cookie, you can use the `set` method:

```php 
$expiry = time() + 3600; // set expiry to one hour from now
$path = '/';
CookieHandler::set('my_cookie', 'my_value', $expiry, $path);
```

This will set a cookie named `my_cookie` with a value of `my_value`, an expiry time of one hour from now, and a path of `/`.

### Getting a Cookie

To get the value of a cookie, you can use the `get` method:

```php 
$value = CookieHandler::get('my_cookie');
```

This will return the value of the cookie named `my_cookie`, or `null` if the cookie does not exist.
