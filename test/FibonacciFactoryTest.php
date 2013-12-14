<?php
require_once (dirname(dirname(__FILE__)) . "/Bootstrap.php");

class FibonacciFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $ff;
    
    function setUp()
    {
        $this->ff = new FibonacciFactory();
    }

    /**
     * @test
     * @dataProvider getFibsByUpperLimitProvider
     */
    function getFibsByUpperLimit($upper_limit, $expected)
    {
        $actual = $this->ff->getFibsByUpperLimit($upper_limit);
        $this->assertEquals($actual, $expected);
    }

    function getFibsByUpperLimitProvider()
    {
        return [
            [1, [1]],
            [2, [1, 2]],
            [10, [1, 2, 3, 5, 8]],
            [50, [1, 2, 3, 5, 8, 13, 21, 34]],
            ["invalid", false],
            [4.9, [1, 2, 3]],
            [-1, []],
            [false, false],
            [array(), false],
        ];
    }
}
