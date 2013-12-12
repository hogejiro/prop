<?php
require_once dirname(dirname(dirname(__FILE__))) . '/Bootstrap.php';

$ff = new FibonacciFactory();
$even_filter = function($num)
               {
                   if ($num % 2 == 0) {
                       return $num;
                   }
               };
print(array_sum(array_map($even_filter, $ff->getFibsByUpperLimit(4000000))));
