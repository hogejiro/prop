<?php
function getLargestPalindromeByDigitNumber($digit_num)
{
    $largest_palindrome = 0;
    $begin = $this->_getSmallestNumberByDigitNumber($digit_num);
    $end   = $this->_getLargestNumberByDigitNumber($digit_num);
    for ($idx1 = $end; $idx1 >= $begin; $idx1--) {
        if ($largest_palindrome >= $idx1 * $end) {
            break;
        }
        for ($idx2 = $end; $idx2 >= $begin; $idx2--) {
            $mul = $idx1 * $idx2;
            if ($largest_palindrome >= $mul) {
                break;
            }
            if (isPalindrome($mul)) {
                $largest_palindrome = $mul;
            }
        }
    }
    return $largest_palindrome;
}

function _getSmallestNumberByDigitNumber($digit_num)
{
    return pow(10, ($digit_num - 1));
}

function _getLargestNumberByDigitNumber($digit_num)
{
    return (pow(10, $digit_num) - 1);
}

function isPalindrome($num)
{
    $rev_num = strrev($num);
    return $num == $rev_num;
}

print getLargestPalindromeByDigitNumber(3);
