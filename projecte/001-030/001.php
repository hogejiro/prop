<?php
function calcSumOfFilteredNumbers($filter_numbers, $upper_limit)
{
    $sum = 0;
    for ($idx = 1; $idx < $upper_limit; $idx++) {
        foreach ($filter_numbers as $filter_num) {
            if ($idx % $filter_num == 0) {
                $sum += $idx;
                break;
            }
        }
    }
    return $sum;
}

print calcSumOfFilteredNumbers(array(3, 5), 1000);
