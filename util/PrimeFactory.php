<?php
class PrimeFactory
{
    /**
     * get primes below $upper_limit
     * (ex) getprimes(10) = [2, 3, 5, 7]
     *
     * @param  (int / float)  $upper_limit
     * @return (@int / false) $primes prime numbers
     */
    public function getPrimesByUpperLimit($upper_limit)
    {
        if (! (is_numeric($upper_limit) && $upper_limit > 0)) {
            return false;
        }
        if ($upper_limit < 2) {
            return [];
        }
        $primes = [2];
        for ($idx = 3; $idx <= $upper_limit; $idx++) {
            $is_prime = true;
            foreach ($primes as $prime) {
                if ($idx < $prime * $prime) {
                    break;
                }
                if ($idx % $prime == 0) {
                    $is_prime = false;
                    break;
                }
            }
            if ($is_prime) {
                array_push($primes, $idx);
            }
        }
        return $primes;
    }

    /**
     * get prime factors
     * (ex) getprimefactors(63) = array(3 => 2, 7 => 1)
     *      this means 63 = 3 * 3 * 7
     *
     * @param  (int)          $num
     * @return (@int / false) $prime_factors prime factors
     */
    public function getPrimeFactors($num)
    {
        if (! is_int($num)) {
            return false;
        }
        if ($num < 2) {
            return [];
        }
        $prime_factors = [];
        $primes = $this->getPrimesByUpperLimit(sqrt($num));
        foreach ($primes as $prime) {
            if ($num == 1) {
                break;
            }
            while ($num % $prime == 0) {
                $num /= $prime;
                if (isset($prime_factors[$prime])) {
                    $prime_factors[$prime]++;
                } else {
                    $prime_factors[$prime] = 1;
                }
            }
        }
        if ($num != 1) {
            $prime_factors[$num] = 1;
        }
        return $prime_factors;
    }
}
