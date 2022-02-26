# High Test Coverage

_Classes and Interfaces to help you get higher test coverage_

[![License](https://img.shields.io/badge/license-MIT-teal)](https://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/ancarda/high-test-coverage/v/stable)](https://packagist.org/packages/ancarda/high-test-coverage)
[![Total Downloads](https://poser.pugx.org/ancarda/high-test-coverage/downloads)](https://packagist.org/packages/ancarda/high-test-coverage)
[![builds.sr.ht status](https://builds.sr.ht/~ancarda/high-test-coverage.svg)](https://builds.sr.ht/~ancarda/high-test-coverage)

High Test Coverage is a collection of classes and interfaces designed to help
you get higher test coverage when using impure parts of the PHP Standard
Library. It provides a `RandomInt` interface which you can use in place of the
`random_int` function, like so:

Pull down with composer:

    composer require --dev ancarda/high-test-coverage

## Example Usage

```php
<?php

use Ancarda\HighTestCoverage\RandomInt\RandomInt;

final class Genie
{
    public function __construct(private RandomInt $randomInt) {}

    public function fortune(): string
    {
        return 'Your lucky number is ' . $this->randomInt(1, 10);
    }
}
```

In production, this class would be given an instance of `RandomInt\Real`,
likely via your Dependency Injection container. Under test, you would use one
of the many built-in classes, such as `Fixed` or `OneShot`, like so:

```php
<?php

use Ancarda\HighTestCoverage\RandomInt\Fixed;

final class GenieTest extends TestCase
{
    public function testFortune(): void
    {
        $genie = new Genie(new Fixed(42));
        self::assertSame('Your lucky number is 42', $genie->fortune());
    }
}
```

## Useful Links

* Source Code:   <https://git.sr.ht/~ancarda/high-test-coverage>
* Issue Tracker: <https://todo.sr.ht/~ancarda/high-test-coverage>
* Mailing List:  <https://lists.sr.ht/~ancarda/high-test-coverage>
