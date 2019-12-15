<?php

namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class Helper
{
    /**
     * @param $requisitionLocation
     * @return string RequisitionNo
     */
    public static function generateRequisitionNo($requisitionLocation, $model)
    {
        $requisitionLocation = strip_tags($requisitionLocation);
        /*$array = explode(' ', $requisitionLocation);
        $acronym = '';
        foreach ($array as $item) {
            $acronym = $acronym . substr($item, 0, 1);
        }
        $acronym = strtoupper($acronym);*/

        $four_digit_random_number = mt_rand(1000, 9999);

        $requisitionNo = $requisitionLocation . '-' . $four_digit_random_number;
        $checkRequisitionNo = DB::table($model)
            ->select('requisition_no')
            ->where('requisition_no', '=', $requisitionNo)
            ->first();

        if ($checkRequisitionNo)
            return Helper::generateRequisitionNo($requisitionLocation, $model);
        else
            return $requisitionNo;
    }
}
