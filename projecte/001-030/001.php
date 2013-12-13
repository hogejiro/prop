<?php
$filter_by_3_and_5 = function ($object_num)
                     {
                         $filter_numbers = [3, 5];
                         foreach ($filter_numbers as $filter_num) {
                             if ($object_num % $filter_num == 0) {
                                 return $object_num;
                             }
                         }
                     };

print array_sum(array_filter(range(1, 1000), $filter_by_3_and_5));
