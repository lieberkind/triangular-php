<?php

use Triangular\Triangle;
use Triangular\InvalidTriangleException;

class TriangleTest extends PHPUnit_Framework_TestCase
{
    /** @test **/
    public function it_creates_a_valid_triangle()
    {
        $triangle = new Triangle(3, 4, 5);

        $this->assertTrue($triangle instanceof Triangle);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function it_fails_to_create_triangle_with_non_numeric_sides()
    {
        $triangle1 = new Triangle([], true, "string");
    }

    /**
     * @test
     * @expectedException Triangular\InvalidTriangleException
     */
    public function it_fails_to_create_invalid_triangles()
    {
        $triangle1 = new Triangle(2, 3, 7);
    }

    /** @test **/
    public function it_determines_if_trangles_are_equilateral()
    {
        $triangle1 = new Triangle(7.5, 7.5, 7.5);
        $triangle2 = new Triangle(42, 42, 42);
        $triangle3 = new Triangle(3, 4, 5);

        $this->assertTrue($triangle1->isEquilateral());
        $this->assertTrue($triangle2->isEquilateral());
        $this->assertFalse($triangle3->isEquilateral());
    }

    /** @test **/
    public function it_determines_if_triangles_are_isosceles()
    {
        $triangle1 = new Triangle(3, 3, 5);
        $triangle2 = new Triangle(17, 20, 17);
        $triangle3 = new Triangle(9, 10, 10);
        $triangle4 = new Triangle(10, 10, 10);
        $triangle5 = new Triangle(3, 4, 5);

        $this->assertTrue($triangle1->isIsosceles());
        $this->assertTrue($triangle2->isIsosceles());
        $this->assertTrue($triangle3->isIsosceles());
        $this->assertTrue($triangle4->isIsosceles());
        $this->assertFalse($triangle5->isIsosceles());
    }

    /** @test **/
    public function it_determines_if_triangles_are_scalene()
    {
        $triangle1 = new Triangle(3, 4, 5);
        $triangle2 = new Triangle(10, 10, 15);
        $triangle3 = new Triangle(23, 23, 23);

        $this->assertTrue($triangle1->isScalene());
        $this->assertFalse($triangle2->isScalene());
        $this->assertFalse($triangle3->isScalene());
    }

    /** @test **/
    public function it_gets_the_type_of_a_triangle()
    {
        $triangle1 = new Triangle(71, 71, 71);
        $triangle2 = new Triangle(71, 71, 101);
        $triangle3 = new Triangle(10, 20, 25);

        $this->assertEquals(Triangle::EQUILATERAL, $triangle1->getType());
        $this->assertEquals(Triangle::ISOSCELES, $triangle2->getType());
        $this->assertEquals(Triangle::SCALENE, $triangle3->getType());
    }
}
