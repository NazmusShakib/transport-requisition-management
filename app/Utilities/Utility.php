<?php


namespace App\Utilities;


class Utility
{
    /**
     * Calculates percentage for a given number
     *
     * @param int $number
     * @param int $percent
     * @param int $addition default = 0
     *
     * @return float
     */
    public function calc_percentage($number, $percent, $addition = 0)
    {
        return ($addition + ($number * ($percent / 100)));
    }

    /**
     * Calculates base value on which percentage is calculated
     *
     * @param int $number
     * @param int $percent
     *
     * @return float
     */
    public function calc_percentage_base($number, $percent)
    {
        return ($number * 100) / (100 + $percent);
    }

    /**
     * Calculates percentage
     *
     * @param int $base
     * @param int $number
     *
     * @return float
     */
    public function get_percent($base, $number)
    {
        if ($base == 0) {
            return 0;
        }

        $diff = $number - $base;
        return ($diff / $base) * 100;
    }

    /**
     * Defines available Pay Modes
     *
     * @return array
     */
    public function pay_modes()
    {
        $pay_modes = ['cash' => __('utility.cash'), 'card' => __('utility.card'), 'cheque' => __('utility.cheque'), 'bank_transfer' => __('utility.bank_transfer'), 'other' => __('utility.other')];
        return $pay_modes;
    }

}
