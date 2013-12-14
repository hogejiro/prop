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
     * @test
     * @dataProvider getPrimeProvider
     */
    function getPrime($num, $expected)
    {
        $actual = $this->pf->getPrime($num);
        $this->assertEquals($actual, $expected);
    }

    function getPrimeProvider()
    {
        return [
            [ 1,   2],
            [ 2,   3],
            [ 3,   5],
            [10,  29],
            [50, 229],
            [0, false],
            [-1, false],
            [4.9, false],
            ['invalid', false],
        ];
    }

    /**
     * @test
     * @dataProvider getPrimesByUpperLimitProvider
     */
    function getPrimesByUpperLimit($upper_limit, $expected)
    {
        $actual = $this->pf->getPrimesByUpperLimit($upper_limit);
        $this->assertEquals($actual, $expected);
    }

    function getPrimesByUpperLimitProvider()
    {
        return [
            [ 2, [2]],
            [ 3, [2, 3]],
            [10, [2, 3, 5, 7]],
            [99, [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97]],
            [-1, false],
            [4.9, [2, 3]],
            ['invalid', false],
        ];
    }

    /**
     * @test
     * @dataProvider getPrimeFactorsProvider()
     */
    function getPrimeFactors($num, $expected)
    {
        $actual = $this->pf->getPrimeFactors($num);
        $this->assertEquals($actual, $expected);
    }

    function getPrimeFactorsProvider()
    {
        return [
            [ 2, [2 => 1]],
            [ 3, [3 => 1]],
            [10, [2 => 1, 5 => 1]],
            [30, [2 => 1, 3 => 1, 5 => 1]],
            [31, [31 => 1]],
            [-1, []],
            [4.9, false],
            ['invalid', false],
        ];
    }
}
