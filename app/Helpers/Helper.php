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
    
    // 配偶者特別控除額を求める
    public static function spose_special($income_amount, $spouse_income, $type)
    {
        if ($spouse_income <= 380000)   //もし、配偶者所得38万円以下の場合で、メソッドが呼び出された場合
        {
            return 0;       
        } 
        else if ($spouse_income <= 850000) 
        {
            if ($income_amount <= 9000000) 
            {
                if ($type ===0) 
                {
                    return 380000;
                } else {
                    return 330000;
                }
            } elseif ($income_amount <= 9500000) {
                if ($type ===0) 
                {
                    return 260000;
                } else {
                    return 220000;
                }
            } elseif ($income_amount <= 10000000) {
                if ($type ===0) 
                {
                    return 130000;
                } else {
                    return 110000;
                } 
            } else {
                return 0;
            }
        }
        else if ($spouse_income <= 900000) 
        {
            if ($income_amount <= 9000000) 
            {
                if ($type ===0) 
                {
                    return 360000;
                } else {
                    return 330000;
                }
            } elseif ($income_amount <= 9500000) {
                if ($type ===0) 
                {
                    return 240000;
                } else {
                    return 220000;
                }
            } elseif ($income_amount <= 10000000) {
                if ($type ===0) 
                {
                    return 120000;
                } else {
                    return 110000;
                } 
            } else {
                return 0;
            }
        }
        else if ($spouse_income <= 950000) 
        {
            if ($income_amount <= 9000000) 
            {
                return 310000;
            } elseif ($income_amount <= 9500000) {
                return 210000;
            } elseif ($income_amount <= 10000000) {
                return 110000;
            } else {
                return 0;
            }
        }    
        else if ($spouse_income <= 1000000) 
        {
            if ($income_amount <= 9000000) {
                return 260000;
            } elseif ($income_amount <= 9500000) {
                return 180000;
            } elseif ($income_amount <= 10000000) {
                return 90000;
            } else {
                return 0;
            }
        }   
        else if ($spouse_income <= 1050000) 
        {
            if ($income_amount <= 9000000) {
                return 210000;
            } elseif ($income_amount <= 9500000) {
                return 140000;
            } elseif ($income_amount <= 10000000) {
                return 70000;
            } else {
                return 0;
            }
        }   
        else if ($spouse_income <= 1100000) 
        {
            if ($income_amount <= 9000000) {
                return 160000;
            } elseif ($income_amount <= 9500000) {
                return 110000;
            } elseif ($income_amount <= 10000000) {
                return 60000;
            } else {
                return 0;
            }
        }  
        else if ($spouse_income <= 1150000) 
        {
            if ($income_amount <= 9000000) {
                return 110000;
            } elseif ($income_amount <= 9500000) {
                return 80000;
            } elseif ($income_amount <= 10000000) {
                return 40000;
            } else {
                return 0;
            }
        }  
        else if ($spouse_income <= 1200000) 
        {
            if ($income_amount <= 9000000) {
                return 60000;
            } elseif ($income_amount <= 9500000) {
                return 40000;
            } elseif ($income_amount <= 10000000) {
                return 20000;
            } else {
                return 0;
            }
        }  
        else if ($spouse_income <= 1230000) 
        {
            if ($income_amount <= 9000000) {
                return 30000;
            } elseif ($income_amount <= 9500000) {
                return 20000;
            } elseif ($income_amount <= 10000000) {
                return 10000;
            } else {
                return 0;
            }
        }  
        else 
        {
            return 0;
        }
    }
        
    
    // 生命保険料　上限額を考慮して、控除額（全体）を算出する
    public static function life_max($money_array1, $money_array2, $money_array3, $type)
    {   
        if($type===0){ //所得税
            
            if (($money_array1['income_tax']+$money_array2['income_tax']+$money_array3['income_tax']) > 120000) {
                return 120000;
            } else {
                return $money_array1['income_tax']+$money_array2['income_tax']+$money_array3['income_tax'];
            }
        } else { //住民税
            
            if (($money_array1['resident_tax']+$money_array2['resident_tax']+$money_array3['resident_tax']) > 70000) {
                return 70000;
            } else {
                return $money_array1['resident_tax']+$money_array2['resident_tax']+$money_array3['resident_tax'];
            }
        }
    }

    
    // 生命保険料　控除（個別）を算出する
    public static function life_deducation($money, $type)
    {   
        $income_tax = 0;
        $resident_tax = 0;
        
        if($type === 1) { //新　生命保険料控除
            //所得税
            if($money <= 20000) 
            {
                $income_tax = $money;
            } elseif ($money <= 40000) {
                $income_tax = (($money / 2) + 10000);
            } elseif ($money <= 80000) {
                $income_tax =  (($money / 4) + 20000);
            } else {
                $income_tax =  40000;
            }
             
            //住民税
            if($money <= 12000) 
            {
                $resident_tax = $money;
            } elseif ($money <= 32000) {
                $resident_tax = (($money / 2) + 6000);
            } elseif ($money <= 56000) {
                $resident_tax =  (($money / 4) + 14000);
            } else {
                $resident_tax =  28000;
            }
            
        } else {//旧　生命保険料控除
            
            //所得税
            if($money <= 25000) 
            {
                $income_tax = $money;
            } elseif ($money <= 50000) {
                $income_tax = (($money / 2) + 12500);
            } elseif ($money <= 100000) {
                $income_tax =  (($money / 4) + 25000);
            } else {
                $income_tax =  50000;
            }
             
            //住民税
            if($money <= 15000) 
            {
                $resident_tax = $money;
            } elseif ($money <= 40000) {
                $resident_tax = (($money / 2) + 7500);
            } elseif ($money <= 70000) {
                $resident_tax =  (($money / 4) + 17500);
            } else {
                $resident_tax =  35000;
            }
        }
        
        return array('income_tax' => $income_tax, 'resident_tax' => $resident_tax);
    }    
    
    
    


}

