<?php
$filter_numbers = [3, 5];
$filter = function ($object_num) use ($filter_numbers)
          {
              foreach ($filter_numbers as $filter_num) {
                  if ($object_num % $filter_num == 0) {
                      return $object_num;
                  }
              }
          };

print array_sum(array_filter(range(1, 999), $filter));
