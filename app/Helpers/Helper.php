<?php

namespace App\Helpers;

use App;

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
        
        $income_tax *= 1.021;
        
        // 千円未満切捨て
        $income_tax = floor(($income_tax)/1000)*1000;
        
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
    
    
    /* 各種税額計算の詳細を返す */
    public static function calc_details($user, $year)
    {
        // 認証済みユーザーの損益を取得
        $pl = new App\ProfitAndLoss;
        
        $profit_and_loss = $pl->where('user_id', $user->id)
                        ->where('year', $year)->get();
        
        // 差引金額
        $deduction_amount = 0;
        $deduction_amount += $profit_and_loss->sum('sales');
        $deduction_amount -= $profit_and_loss->sum('purchase');
        $deduction_amount -= $profit_and_loss->sum('tax_and_dues');
        $deduction_amount -= $profit_and_loss->sum('utilities');
        $deduction_amount -= $profit_and_loss->sum('transportations');
        $deduction_amount -= $profit_and_loss->sum('communications');
        $deduction_amount -= $profit_and_loss->sum('entertainments');
        $deduction_amount -= $profit_and_loss->sum('expendables');
        $deduction_amount -= $profit_and_loss->sum('salaries');
        $deduction_amount -= $profit_and_loss->sum('outsourcings');
        $deduction_amount -= $profit_and_loss->sum('rents');
        $deduction_amount -= $profit_and_loss->sum('other_costs');


        
        // 認証済みユーザーの個人情報を取得
        $deduction = $user->deduction()->where('id', $user->id)->where('year', $year)->get();
        
        
        // 青色申告・所得金額
        if ($deduction->sum('blue_declaration') === 1) 
        {
            if ($deduction_amount > 650000)
            {
                $income_amount = $deduction_amount - 650000;
                $blue_declaration_amount = 650000;
            } else {
                $blue_declaration_amount = $deduction_amount;
                $income_amount = 0; 
            }
        } else {
            $blue_declaration_amount = 0;
            $income_amount = $deduction_amount;
        }
        
        //社会保険料控除
        if (null !== $deduction->sum('social_insurance'))
        {
            $social_insurance_amount = $deduction->sum('social_insurance');
        
        } else {
            $social_insurance_amount = 0;
        }
        
        //生命保険料控除
        $life_new_deduction1 = Helper::life_deducation($deduction->sum('life_premium_new'), 0);
        $life_new_deduction2 = Helper::life_deducation($deduction->sum('ltc_premium'), 0);
        $life_new_deduction3 = Helper::life_deducation($deduction->sum('pension_new'), 0);
        
        $life_old_deduction1 = Helper::life_deducation($deduction->sum('life_premium_old'), 1);
        $life_old_deduction2 = Helper::life_deducation($deduction->sum('pension_old'), 1);
        
        
        //　　上限額を考慮して、生命保険料控除を算出する.
        $life_result = [];
        array_push($life_result, Helper::life_max($life_new_deduction1, $life_new_deduction2, $life_new_deduction3, 0)); 
        array_push($life_result, Helper::life_max($life_new_deduction1, $life_new_deduction2, ['income_tax' => 0, 'resident_tax' => 0], 1)); 
        
        
        //地震保険料控除
        $earthquake_deduction = [];
        
        if($deduction->sum('earthquake_insurance') > 50000) 
        {
            array_push($earthquake_deduction, 50000);
            array_push($earthquake_deduction, 25000);
        } else {
            array_push($earthquake_deduction, $deduction->sum('earthquake_insurance'));
            array_push($earthquake_deduction, $deduction->sum('earthquake_insurance')/2);
        }
        
        //寡夫・寡婦控除
        $widower_amount = [];
        
        //　所得税
        if ($deduction->sum('widower')===1) 
        {
            array_push($widower_amount, 270000);
        } elseif ($deduction->sum('widow_normal')===1) 
        {
            array_push($widower_amount, 270000);
        } elseif ($deduction->sum('widow_special')===1) 
        {
            array_push($widower_amount, 350000);    
        } else {
            array_push($widower_amount, 0);    
        }
        
        //　住民税
        if ($deduction->sum('widower')===1) 
        {
            array_push($widower_amount, 260000);
        } elseif ($deduction->sum('widow_normal')===1) 
        {
            array_push($widower_amount, 260000);
        } elseif ($deduction->sum('widow_special')===1) 
        {
            array_push($widower_amount, 300000);    
        } else {
            array_push($widower_amount, 0);    
        }
        
        
        //配偶者（特別）控除
        $spouse_deduction = [];
        
        //　所得税
        if ($deduction->sum('spouse') === 1)
        {   
            if ($deduction->sum('spouse_income') > 380000)   //配偶者所得が38万円超の場合（配偶者特別控除の判定）
            {
                array_push($spouse_deduction, Helper::spose_special($income_amount, $deduction->sum('spouse_income'), 0));
                
            } else {  //配偶者所得がnull又は38万円以下の場合
                if ($deduction->sum('spouse_old') === 1)   //老人控除対象配偶者の場合
                {
                    if($income_amount <= 9000000) //納税者が所得900万円以下
                    {
                        array_push($spouse_deduction, 480000);
                    } elseif ($income_amount <= 9500000) 
                    {
                        array_push($spouse_deduction, 320000);
                    } elseif ($income_amount <= 10000000)  {
                        array_push($spouse_deduction, 160000);
                    } else {
                        array_push($spouse_deduction, 0);
                    } 
                } 
                else //控除対象配偶者の場合
                {
                    if($income_amount <= 9000000) //納税者が所得900万円以下
                    {
                        array_push($spouse_deduction, 380000);
                    } elseif ($income_amount <= 9500000) 
                    {
                        array_push($spouse_deduction, 260000);
                    } elseif ($income_amount <= 10000000)  {
                        array_push($spouse_deduction, 130000);
                    } else {
                        array_push($spouse_deduction, 0);
                    } 
                }
            }
        } else { // nullまたは0（配偶者無）
            array_push($spouse_deduction, 0);
        }
        
        
        //　住民税
        if ($deduction->sum('spouse') === 1)
        {   
            if ($deduction->sum('spouse_income') > 380000)   //配偶者所得が38万円超の場合（配偶者特別控除の判定）
            {
                array_push($spouse_deduction, Helper::spose_special($income_amount, $deduction->sum('spouse_income'), 1));
                
            } else {  //配偶者所得がnull又は38万円以下の場合
                if ($deduction->sum('spouse_old') === 1)   //老人控除対象配偶者の場合
                {
                    if($income_amount <= 9000000) //納税者が所得900万円以下
                    {
                        array_push($spouse_deduction, 380000);
                    } elseif ($income_amount <= 9500000) 
                    {
                        array_push($spouse_deduction, 260000);
                    } elseif ($income_amount <= 10000000)  {
                        array_push($spouse_deduction, 130000);
                    } else {
                        array_push($spouse_deduction, 0);
                    } 
                } 
                else //控除対象配偶者の場合
                {
                    if($income_amount <= 9000000) //納税者が所得900万円以下
                    {
                        array_push($spouse_deduction, 330000);
                    } elseif ($income_amount <= 9500000) 
                    {
                        array_push($spouse_deduction, 220000);
                    } elseif ($income_amount <= 10000000)  {
                        array_push($spouse_deduction, 110000);
                    } else {
                        array_push($spouse_deduction, 0);
                    } 
                }
            }
        } else { // nullまたは0（配偶者無）
            array_push($spouse_deduction, 0);
        }
        
        
        //扶養控除
        $dependent_amount = [0,0];
        
        if ($deduction->sum('dependent_relatives_for_deduction') > 0 )
        {
            $dependent_amount[0] += $deduction->sum('dependent_relatives_for_deduction') * 380000;
            $dependent_amount[1] += $deduction->sum('dependent_relatives_for_deduction') * 330000;
        }
        
        if ($deduction->sum('specific_dependent') > 0 )
        {
            $dependent_amount[0] += $deduction->sum('specific_dependent') * 630000;
            $dependent_amount[1] += $deduction->sum('specific_dependent') * 450000;
        }
        
        if ($deduction->sum('elderly_dependent_relative') > 0 )
        {
            $dependent_amount[0] += $deduction->sum('elderly_dependent_relative') * 480000;
            $dependent_amount[1] += $deduction->sum('elderly_dependent_relative') * 380000;
        }
        
        if ($deduction->sum('elderly_dependent_relative_living_together') > 0 )
        {
            $dependent_amount[0] += $deduction->sum('elderly_dependent_relative_living_together') * 580000;
            $dependent_amount[1] += $deduction->sum('elderly_dependent_relative_living_together') * 450000;
        }
        
        //医療費控除
        
        if ($deduction->sum('medical_bills_income') > 0 ) 
        {
            if (100000 > $income_amount*0.05) 
            {
                if ($medical_amount - $income_amount*0.05 > 0)
                {
                    $medical_amount = $deduction->sum('medical_bills_income') - $income_amount*0.05;
                } else  {
                    $medical_amount = 0;
                }
                
            } else {
                if ($medical_amount - 100000 > 0)
                {
                    $medical_amount = $deduction->sum('medical_bills_income') - 100000;
                } else  {
                    $medical_amount = 0;
                }
            }
        
        } else {
            $medical_amount = 0;
        }

        // 基礎控除
        $basic_exemption = [380000,330000];
        
        // 課税所得金額
        $taxable_income_amount = array(
            $income_amount - $social_insurance_amount - $life_result[0] - $earthquake_deduction[0] - $widower_amount[0] - $spouse_deduction[0] - $dependent_amount[0] - $medical_amount,
            $income_amount - $social_insurance_amount - $life_result[1] - $earthquake_deduction[1] - $widower_amount[1] - $spouse_deduction[1] - $dependent_amount[1] - $medical_amount
        );
        
        if ($taxable_income_amount[0] > 380000) 
        {
            $taxable_income_amount[0] -= 380000;
        } else {
            $taxable_income_amount[0] = 0;
        }
        
        if ($taxable_income_amount[1] > 330000) 
        {
            $taxable_income_amount[1] -= 330000;
        } else {
            $taxable_income_amount[1] = 0;
        }
        
        // 千円未満切捨て
        $taxable_income_amount[0] = floor(($taxable_income_amount[0])/1000)*1000;
        $taxable_income_amount[1] = floor(($taxable_income_amount[1])/1000)*1000;
        
        
        // 税額計算
        $tax_val[0] = Helper::income_tax_result($taxable_income_amount[0]);
        $tax_val[1] = Helper::resident_tax_result($taxable_income_amount[1]);
    
        $data = [
            'user' => $user,
            'deduction_amount' => $deduction_amount,                //差引金額
            'blue_declaration_amount' => $blue_declaration_amount,  //青色申告特別控除額
            'income_amount' => $income_amount,                      //所得金額      
            'social_insurance_amount' => $social_insurance_amount,  //社会保険料控除      
            'life_result' => $life_result,                          //生命保険料控除額
            'earthquake_deduction' => $earthquake_deduction,        //地震保険料控除額
            'widower_amount' => $widower_amount,                    //寡夫・寡婦控除額     
            'spouse_deduction' => $spouse_deduction,                //配偶者（特別）控除額
            'dependent_amount' => $dependent_amount,                //扶養控除額
            'medical_amount' => $medical_amount,                    //医療費控除
            'basic_exemption' => $basic_exemption,                  //基礎控除
            'taxable_income_amount' => $taxable_income_amount,      //課税所得金額
            'tax_val' => $tax_val,                                  //税額
        ];
        
        return $data;
    }
}

