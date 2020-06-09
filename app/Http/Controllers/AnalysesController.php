<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Helper;
use Illuminate\Support\Facades\Mail;



class AnalysesController extends Controller
{
    public function index() 
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();

            // 認証済みユーザーの損益を取得
            $pl = new App\ProfitAndLoss;
            $profit_and_loss = $pl->where('user_id', $user->id)
                            ->where('year', 2020)->get();
            
                
            // 認証済みユーザーの差引金額を取得する
            $deduction_amount = [];
            $deduction_amount_max = 0;  
            $deduction_amount_min = 0;
            $accumulation = 0;
            $accumulation_array = [];
            
            for ($i = 0; $i <= 11; $i++) {  //12か月分
                
                $month = $i+1;
                $sum = 0;
                
                $sum += $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('sales');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('purchase');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('tax_and_dues');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('utilities');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('transportations');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('communications');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('entertainments');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('expendables');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('salaries');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('outsourcings');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('rents');
                $sum -= $pl->where('user_id', $user->id)->where('year', 2020)->where('month', $month)->sum('other_costs');
                
                // 折れ線グラフの情報
                array_push($deduction_amount, $sum);
                
                if($sum > $deduction_amount_max) {
                    $deduction_amount_max = $sum;  
                }
                
                if($sum < $deduction_amount_min) {
                    $deduction_amount_min = $sum;  
                }
                
                // 棒グラフの情報
                $accumulation += $sum;
                array_push($accumulation_array, $accumulation);
            }
            
            // 折れ線グラフの最大値の設定
            $max_digit = strlen((string)$deduction_amount_max);     //最大差引金額の桁数取得
            
            if ($max_digit > 0 && $max_digit > 1) {
                if ((int)(substr(((string)$deduction_amount_max), 1, 1)) > 4) {     //差引金額の2桁目の数字が四捨五入で、桁数が増えるか？
                    $first_num = (int)substr(((string)$deduction_amount_max), 0, 1) + 1;
                    $deduction_amount_max = (int)((string)$first_num . str_repeat('0', $max_digit-1));  //グラフの最大値を設定する
                } else {
                    $first_num = substr(((string)$deduction_amount_max), 0, 1);
                    $deduction_amount_max = (int)($first_num . '5' . str_repeat('0', $max_digit-2));     //グラフの最大値を設定する
                }
            } else {
                $deduction_amount_max = 0;   
            }
            
            // 折れ線グラフの最小値の設定
            if ($deduction_amount_min > -1)  //最小値が0以上なら、グラフの最小値は0とする
            {
                $deduction_amount_min = 0;
            } else {
                $min_digit = strlen((string)-$deduction_amount_min);     //最小差引金額の桁数取得
                
                if ((int)(substr(((string)$deduction_amount_min), 2, 1)) > 4) {     //差引金額の頭の数字が四捨五入で、桁数が増えるか？
                    $first_num = (int)substr(((string)$deduction_amount_min), 1, 1) + 1;
                    $deduction_amount_min = -(int)((string)$first_num . str_repeat('0', $min_digit-1));  //グラフの最大値を設定する
                } else {
                    $first_num = substr(((string)$deduction_amount_min), 1, 1);
                    $deduction_amount_min = -(int)($first_num . '5' . str_repeat('0', $min_digit-2));     //グラフの最小値を設定する
                }
            }
            
            // 折れ線グラフの縦軸の金額単位を設定
            $line_graph_step = ($deduction_amount_max - $deduction_amount_min) /10;
            
            
            
            //棒グラフの最大値の設定
            $max_digit = strlen((string)max($accumulation_array));     //最大累積金額の桁数取得
            
            if ($max_digit > 0 && $max_digit > 1) {
                if ((int)(substr(((string)max($accumulation_array)), 1, 1)) > 4) {     //差引金額の2桁目の数字が四捨五入で、桁数が増えるか？
                    $first_num = (int)substr(((string)max($accumulation_array)), 0, 1) + 1;
                    $accumulation_amount_max = (int)((string)$first_num . str_repeat('0', $max_digit-1));  //グラフの最大値を設定する
                } else {
                    $first_num = substr(((string)max($accumulation_array)), 0, 1);
                    $accumulation_amount_max = (int)($first_num . '5' . str_repeat('0', $max_digit-2));     //グラフの最大値を設定する
                }
            } else {
                $accumulation_amount_max = 0;
            }
            
            //棒グラフの最小値の設定
            if (min($accumulation_array) > -1)  //最小値が0以上なら、グラフの最小値は0とする
            {
                $accumulation_amount_min = 0;
            } else {
                $min_digit = strlen((string)-min($accumulation_array));     //最小差引金額の桁数取得
                
                if ((int)(substr(((string)min($accumulation_array)), 2, 1)) > 4) {     //差引金額の頭の数字が四捨五入で、桁数が増えるか？
                    $first_num = (int)substr(((string)min($accumulation_array)), 1, 1) + 1;
                    $accumulation_amount_min = -(int)((string)$first_num . str_repeat('0', $min_digit-1));  //グラフの最大値を設定する
                } else {
                    $first_num = substr(((string)min($accumulation_array)), 1, 1);
                    $accumulation_amount_min = -(int)($first_num . '5' . str_repeat('0', $min_digit-2));     //グラフの最小値を設定する
                }
            }
            
            
            
            //棒グラフの縦軸の金額単位を設定
            if ($accumulation_amount_max === $accumulation_amount_min && $accumulation_amount_max ===0 ) {
                $bar_graph_step = 0;
            } else {
                $bar_graph_step = ($accumulation_amount_max - $accumulation_amount_min) /10;    
            }
            

            //税額を取得
            $calc_details = Helper::calc_details($user, 2020);
                   
            
            $data = [
                'user' => $user,
                'deduction_amount' => $deduction_amount,
                'deduction_amount_max' => $deduction_amount_max,
                'deduction_amount_min' => $deduction_amount_min,
                'line_graph_step' => $line_graph_step,
                'accumulation_array' => $accumulation_array,
                'accumulation_amount_max' => $accumulation_amount_max,
                'accumulation_amount_min' => $accumulation_amount_min,
                'bar_graph_step' => $bar_graph_step,
                'calc_details' => $calc_details,
            ];
        }
        
        return view('welcome', $data);
    }
    
    
    public function input_show() 
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            // 認証済みユーザーの損益を取得
            $pl = new App\ProfitAndLoss;
            $profit_and_loss = $pl->where('user_id', $user->id)
                            ->where('year', 2020)->get();
            
            $data = [
                'user' => $user,
                'profit_and_loss' => $profit_and_loss,
            ];
        }
        return view('analyses.input',  $data);
    }
    
    
    /* Input画面のCommit処理 */
    public function input_store(Request $request)
    {  
        // バリデーション
        $request->validate([
            'val.*' => 'integer|nullable',
        ]);
        
        $year = 2020;   /*ひとまず2020年のみ*/
        $month_num = 12;     //12か月分
        
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            for ($i = 0; $i <= 11; $i++) {  //12か月分
                
                $month = $i+1;
                $sales = $request->val[$i];                      //売上高
                $purchase = $request->val[$i+$month_num];            //仕入高
                $tax_and_dues = $request->val[$i+($month_num*2)];     //租税公課
                $utilities = $request->val[$i+($month_num*3)];         //水道光熱費
                $transportations = $request->val[$i+($month_num*4)];  //旅費交通費
                $communications = $request->val[$i+($month_num*5)];   //通信費
                $entertainments = $request->val[$i+($month_num*6)];   //接待交際費
                $expendables = $request->val[$i+($month_num*7)];      //消耗品費
                $salaries = $request->val[$i+($month_num*8)];          //給料賃金
                $outsourcings = $request->val[$i+($month_num*9)];     //外注工賃
                $rents = $request->val[$i+($month_num*10)];           //地代家賃
                $other_costs = $request->val[$i+($month_num*11)];     //その他
                
                //既にレコードが存在するか調べる
                $pl = App\ProfitAndLoss::where('user_id', $user->id)->
                                    where('year', $year)->where('month', $month)->
                                    first();
                
                
                if (is_null($pl)){
                    //レコードを追加する場合、新たなモデルインスタンスを取得する
                    $pl = new App\ProfitAndLoss;
                }
            
                $pl->user_id = $user->id;
                $pl->year = $year;
                $pl->month = $month;
                $pl->sales = $sales;
                $pl->purchase = $purchase;
                $pl->tax_and_dues = $tax_and_dues;
                $pl->utilities = $utilities;
                $pl->transportations = $transportations;
                $pl->communications = $communications;
                $pl->entertainments = $entertainments;
                $pl->expendables = $expendables;
                $pl->salaries = $salaries;
                $pl->outsourcings = $outsourcings;
                $pl->rents = $rents;
                $pl->other_costs = $other_costs;
                $pl->save();
            }
        }
        \Session::flash('flash_message', '更新が完了しました');
        return redirect('/');
    }
    
    
    public function about_show()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            $deduction = $user->deduction()->where('id', $user->id)->where('year', 2020)->get();
            
            $data = [
                'user' => $user,
                'deduction' => $deduction,
            ];
        }
        return view('analyses.about',  $data);
    }
    
    /* About画面のCommit処理 */
    public function about_store(Request $request)
    {  
        // バリデーション
        $request->validate([
            'social_insurance' => 'integer|nullable',
            'life_premium_new' => 'integer|nullable',
            'ltc_premium' => 'integer|nullable',
            'pension_new' => 'integer|nullable',
            'life_premium_old' => 'integer|nullable',
            'pension_old' => 'integer|nullable',
            'earthquake_insurance' => 'integer|nullable',
            'spouse_income' => 'integer|nullable',
            'dependent_relatives_for_deduction' => 'integer|nullable',
            'specific_dependent' => 'integer|nullable',
            'elderly_dependent_relative' => 'integer|nullable',
            'elderly_dependent_relative_living_together' => 'integer|nullable',
            'medical_bills_income' => 'integer|nullable',
        ]);
        
        $year = 2020;   /*ひとまず2020年のみ*/
        
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            //既にレコードが存在するか調べる
            $deduction = App\Deduction::where('user_id', $user->id)->
                                where('year', $year)->first();
            
            if (is_null($deduction)){
                //レコードを追加する場合、新たなモデルインスタンスを取得する
                $deduction = new App\Deduction;
            }
            
            $deduction->user_id = $user->id;
            $deduction->year = $year;
            
            if ($request->blue_declaration === 'on')    //チェックされている場合、onがくる
            {
                $deduction->blue_declaration = 1;    //チェックされていない場合、nullがくる
            } else {
                $deduction->blue_declaration = 0;
            }
            
            $deduction->social_insurance = $request->social_insurance;
            $deduction->life_premium_new = $request->life_premium_new;
            $deduction->ltc_premium = $request->ltc_premium;
            $deduction->pension_new = $request->pension_new;
            $deduction->life_premium_old = $request->life_premium_old;
            $deduction->pension_old = $request->pension_old;
            $deduction->earthquake_insurance = $request->earthquake_insurance;
            
            if ($request->widower === 'on')    //チェックされている場合、onがくる
            {
                $deduction->widower = 1;    //チェックされていない場合、nullがくる
            } else {
                $deduction->widower = 0;
            }
            
            if ($request->widow_normal === 'on')    //チェックされている場合、onがくる
            {
                $deduction->widow_normal = 1;    //チェックされていない場合、nullがくる
            } else {
                $deduction->widow_normal = 0;
            }
            
            if ($request->widow_special === 'on')    //チェックされている場合、onがくる
            {
                $deduction->widow_special = 1;    //チェックされていない場合、nullがくる
            } else {
                $deduction->widow_special = 0;
            }
            
            if ($request->spouse === 'on')    //チェックされている場合、onがくる
            {
                $deduction->spouse = 1;    //チェックされていない場合、nullがくる
            } else {
                $deduction->spouse = 0;
            }
            
            $deduction->spouse_income = $request->spouse_income;
            
            if ($request->spouse_old === 'on')    //チェックされている場合、onがくる
            {
                $deduction->spouse_old = 1;    //チェックされていない場合、nullがくる
            } else {
                $deduction->spouse_old = 0;
            }
            
            
            $deduction->dependent_relatives_for_deduction = $request->dependent_relatives_for_deduction;
            $deduction->specific_dependent = $request->specific_dependent;
            $deduction->elderly_dependent_relative = $request->elderly_dependent_relative;
            $deduction->elderly_dependent_relative_living_together = $request->elderly_dependent_relative_living_together;
            $deduction->medical_bills_income = $request->medical_bills_income;
            
            $deduction->save();
        }
        \Session::flash('flash_message', '更新が完了しました');
        return redirect('/');
    }
    
    
    public function calculation_show() 
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            $data = Helper::calc_details($user, 2020);

            
        }
        return view('analyses.calculation',  $data);
    }
    
    public function user_show()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            $data = [
                'user' => $user,
            ];
        }
        return view('users.user',  $data);
    }
    
    public function user_store(Request $request)
    {
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            // メール送信
            Mail::to($request->email)->send(new App\Mail\UserMail($request->email));
        }
        \Session::flash('flash_message', 'メールを送りました。');
        return redirect('/');
    }
    
    
    public function email_change($id, $old_email, $new_email, $mail_change_token)
    {
        $user = App\User::where('id', $id)->
                            where('email', $old_email)->
                            where('mail_change_token', $mail_change_token)
                            ->first();
                            
        if ($user === null) {
            return view('users.change_err.blade');
            
        } else {
            
            $user->email = $new_email;
            $user->save();
            
            return view('users.user_change');
        }
    }   
}

