<?php
require_once (dirname(dirname(__FILE__)) . "/Bootstrap.php");

class PrimeFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $pf;

    function setUp()
    {
        $this->pf = new PrimeFactory();
    }

    /**
     * @dataProvider getPrimesProvider
     */
    function testGetPrimes($num, $expected)
    {
        $actual = $this->pf->getPrimes($num);
        $this->assertEquals($actual, $expected);
    }

    function getPrimesProvider()
    {
        return array(
            array( 2, [2]),
            array( 3, [2, 3]),
            array(10, [2, 3, 5, 7]),
            array(99, [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97]),
        );
    }

    /**
     * @dataProvider getPrimeFactorsProvider()
     */
    function testGetPrimeFactors($num, $expected)
    {
        $actual = $this->pf->getPrimeFactors($num);
        $this->assertEquals($actual, $expected);
    }

    function getPrimeFactorsProvider()
    {
        return array(
            array( 2, array(2 => 1)),
            array( 3, array(3 => 1)),
            array(10, array(2 => 1,  5 => 1)),
            array(30, array(2 => 1,  3 => 1, 5 => 1)),
            array(31, array(31 => 1)),
        );
    }
}
