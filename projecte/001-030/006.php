<?php
$natural_numbers = range(1, 100);
print pow(array_sum($natural_numbers), 2) - array_sum(array_map(function($num) {return pow($num, 2);}, $natural_numbers));
