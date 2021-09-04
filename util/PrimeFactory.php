<?php

class PrimeFactory
{
    /**
     * get prime
     * (ex) getprime(6) = [2, 3, 5, 7, 11, 13]
     *
     * @param  (int)         $num
     * @return (int / false) $prime the $num-th prime
     */
    public function getPrime($num)
    {
        if (! (is_int($num) && $num > 0)) {
            return false;
        }
        if ($num == 1) {
            return 2;
        }
        $idx = 1;
        foreach ($this->_generatePrimes() as $prime) {
            $idx++;
            if ($idx == $num) {
                return $prime;
            }
        }
    }

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
        foreach ($this->_generatePrimes() as $prime) {
            if ($prime > $upper_limit) {
                return $primes;
            }
            $primes[] = $prime;
        }
    }

    /**
     * generate Primes
     *
     * @yield prime
     */
    private function _generatePrimes() {
        $primes = [2];
        for ($idx = 3; ; $idx += 2) {
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
                yield $idx;
                $primes[] = $idx;
            }
        }
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
