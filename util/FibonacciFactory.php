<?php
class FibonacciFactory
{
    /**
     * getFibsByUpperLimit 
     * (ex) getFibsByUpperLimit(10) = [1, 2, 3, 5, 8]
     * 
     * @param  (int / float)  $upper_limit upper limit
     * @return (@int / false) $fib_array   fibonacci numbers
     */
    function getFibsByUpperLimit($upper_limit)
    {
        if (! is_numeric($upper_limit)) {
            return false;
        }
        if ($upper_limit < 2) {
            return ($upper_limit < 1) ? [] : [1];
        }
        $fib_array = [1, 2];
        $acc = $fib_array[0] + $fib_array[1];
        for($idx = 2; $acc < $upper_limit; $idx++) {
            $fib_array[$idx] = $acc;
            $acc += $fib_array[$idx - 1];
        }
        return $fib_array;
    }
}
