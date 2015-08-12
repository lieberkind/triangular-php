# Triangular
A small yet overcomplicated PHP program to determine the type of a triangle.

## Get started
First, clone this repository:

```bash
git clone git@github.com:lieberkind/triangular-php.git
```

Then, cd into the directory:

```bash
cd triangular-php
```

Assuming that php is running and available in your path, you can now start testing out your triangles by running:

```bash
php triangle.php 10 10 15
```

The three script arguments are, of course, the lengths of the triangles sides.

## Implementation
The logic has been implemented in the Triangle class, located within the `src/Triangular` directory. When a new instance of `Triangle` is created the arguments are validated. Exceptions are thrown either if one or more of the arguments are not numeric, or if it is not possible to make a triangle from the three provided side lengths. The `Triangle` class has methods for testing whether an instance is equilateral, isosceles or scalene, as well as a method for getting the type of the triangle, which returns one of the three cases.

## Tests
All methods of the `Triangle` class, including the constructor, have been unit tested. The test cases can be found in `tests/TriangleTest.php`. In order to run the tests, PHPUnit must be installed. Follow the steps below:

First, install composer, if you haven't got it already:

```bash
curl -sS https://getcomposer.org/installer | php
```

Then, install the project's dependencies (including PHPUnit):

```bash
composer install
```

It is now possible to run the tests:

```bash
vendor/bin/phpunit
```
