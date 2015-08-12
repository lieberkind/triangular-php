<?php

namespace Triangular;

use InvalidArgumentException;

class Triangle {

    const EQUILATERAL = 'equilateral';
    const ISOSCELES = 'isosceles';
    const SCALENE = 'scalene';

    /**
     * Side a
     *
     * @var integer|float
     */
    protected $a;

    /**
     * Side b
     *
     * @var integer|float
     */
    protected $b;

    /**
     * Side c
     *
     * @var integer|float
     */
    protected $c;

    /**
     * Create a new triangle
     *
     * @param integer|float $a
     * @param integer|float $b
     * @param integer|float $c
     */
    public function __construct($a, $b, $c)
    {
        if(!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
            throw new InvalidArgumentException('All sides must be numeric');
        }

        if(!$this->isPossibleTriangle($a, $b, $c)) {
            throw new InvalidTriangleException('Not a valid triangle');
        }

        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    /**
     * Get the type of the triangle
     *
     * @return string
     */
    public function getType()
    {
        if ($this->isEquilateral()) {
            return self::EQUILATERAL;
        } else if ($this->isIsosceles()) {
            return self::ISOSCELES;
        } else {
            return self::SCALENE;
        }
    }

    /**
     * Determine if the triangle is equilateral (all sides are of equal length)
     *
     * @return boolean
     */
    public function isEquilateral()
    {
        return $this->a == $this->b && $this->b == $this->c;
    }

    /**
     * Determine if the triangle is isosceles (two sides are of equal length)
     *
     * @return boolean
     */
    public function isIsosceles()
    {
        return $this->a == $this->b
            || $this->a == $this->c
            || $this->b == $this->c;
    }

    /**
     * Determine if the triangle is scalene (no two sides are equal)
     *
     * @return boolean
     */
    public function isScalene()
    {
        return !$this->isIsosceles();
    }

    /**
     * Determine whether the lengths of the sides can make up a valid triangle
     *
     * For a triangle to be valid, the sum of the lengths of any two sides must
     * be greater than the length of the third side
     *
     * @param  integer|float $a
     * @param  integer|float $b
     * @param  integer|float $c
     *
     * @return boolean
     */
    private function isPossibleTriangle($a, $b, $c)
    {
        return $a + $b > $c
            && $a + $c > $b
            && $b + $c > $a;
    }
}
