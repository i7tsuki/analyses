<?php

namespace App\Helpers;

class Helper
{
    // 所得税の計算
    public static function income_tax_result($taxable_income_amount)
    {   
        if ($taxable_income_amount <= 1950000)
        {
            $income_tax = $taxable_income_amount * 0.05;
        } 
        elseif ($taxable_income_amount <= 3300000)
        {
            $income_tax = ($taxable_income_amount-97500) * 0.1;
        }
        elseif ($taxable_income_amount <= 6950000)
        {
            $income_tax = ($taxable_income_amount-427500) * 0.2;
        }
        elseif ($taxable_income_amount <= 9000000)
        {
            $income_tax = ($taxable_income_amount-636000) * 0.23;
        }
        elseif ($taxable_income_amount <= 18000000)
        {
            $income_tax = ($taxable_income_amount-1536000) * 0.33;
        }
        elseif ($taxable_income_amount <= 40000000)
        {
            $income_tax = ($taxable_income_amount-2796000) * 0.4;
        }
        else 
        {
            $income_tax = ($taxable_income_amount-4796000) * 0.45;
        }
        
        $income_tax *= 100.021;
        return $income_tax;
    }
    
    // 住民税の計算
    public static function resident_tax_result($taxable_income_amount)
    {
        $resident_tax = 0;
        $resident_tax += 5000;
        $resident_tax += $taxable_income_amount * 0.1;
        return $resident_tax;
    }
}

