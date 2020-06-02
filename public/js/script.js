//JQuery
$(function() {
    'use strict';
    
    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(1500);
    });
    
    //1月
    function update_deduction_amount(month) {
        
        switch (month){
            case 1:
                var target_plus = ".january-plus";
                var target_minus = ".january-minus";
                break;
            case 2:
                var target_plus = ".february-plus";
                var target_minus = ".february-minus";
                break;
            case 3:
                var target_plus = ".march-plus";
                var target_minus = ".march-minus";
                break;
            case 4:
                var target_plus = ".april-plus";
                var target_minus = ".april-minus";
                break;
            case 5:
                var target_plus = ".may-plus";
                var target_minus = ".may-minus";
                break;
            case 6:
                var target_plus = ".june-plus";
                var target_minus = ".june-minus";
                break;
            case 7:
                var target_plus = ".july-plus";
                var target_minus = ".july-minus";
                break;
            case 8:
                var target_plus = ".august-plus";
                var target_minus = ".august-minus";
                break;
            case 9:
                var target_plus = ".september-plus";
                var target_minus = ".september-minus";
                break;
            case 10:
                var target_plus = ".october-plus";
                var target_minus = ".october-minus";
                break;
            case 11:
                var target_plus = ".november-plus";
                var target_minus = ".november-minus";
                break;
            case 12:
                var target_plus = ".december-plus";
                var target_minus = ".december-minus";
                break;
            default:
                return;
        }
        
        var sum = 0;
        
        //加算
        var err_flg = 0;
        var inputText = $(target_plus).map(function (index, el) {
              return $(this).val();
        });
        
        for (var i = 0; i < inputText.length; i++) {
            if(!(isNaN(inputText[i]))){
                sum += Number(inputText[i]);
            } else {
                err_flg = 1;
                break;
            }
        }
        
        //減算
        var err_flg = 0;
        var inputText = $(target_minus).map(function (index, el) {
             console.log($(this).val());
              return $(this).val();
        });
        
        for (var i = 0; i < inputText.length; i++) {
            if(!(isNaN(inputText[i]))){
                sum -= Number(inputText[i]);
            } else {
                err_flg = 1;
                break;
            }
        }
        
        //結果
        switch (month){
            case 1:
                if (err_flg===1) {
                    $('.january-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.january-deduction-amount').text(sum);
                }
                break;
            case 2:
                if (err_flg===1) {
                    $('.february-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.february-deduction-amount').text(sum);
                }
                break;
            case 3:
                if (err_flg===1) {
                    $('.march-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.march-deduction-amount').text(sum);
                }
                break;
            case 4:
                if (err_flg===1) {
                    $('.april-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.april-deduction-amount').text(sum);
                }
                break;
            case 5:
                if (err_flg===1) {
                    $('.may-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.may-deduction-amount').text(sum);
                }
                break;
            case 6:
                if (err_flg===1) {
                    $('.june-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.june-deduction-amount').text(sum);
                }
                break;
            case 7:
                if (err_flg===1) {
                    $('.july-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.july-deduction-amount').text(sum);
                }
                break;
            case 8:
                if (err_flg===1) {
                    $('.august-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.august-deduction-amount').text(sum);
                }
                break;
            case 9:
                if (err_flg===1) {
                    $('.september-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.september-deduction-amount').text(sum);
                }
                break;
            case 10:
                if (err_flg===1) {
                    $('.october-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.october-deduction-amount').text(sum);
                }
                break;
            case 11:
                if (err_flg===1) {
                    $('.november-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.november-deduction-amount').text(sum);
                }
                break;
            case 12:
                if (err_flg===1) {
                    $('.december-deduction-amount').text('ERROR');
                } else { 
                    //選択したvalue値をp要素に出力
                    $('.december-deduction-amount').text(sum);
                }
                break;
            default:
                return;
        }
    }
    
    
    //イベント
    //画面起動時
    window.onload = function(){
        update_deduction_amount(1);
        update_deduction_amount(2);
        update_deduction_amount(3);
        update_deduction_amount(4);
        update_deduction_amount(5);
        update_deduction_amount(6);
        update_deduction_amount(7);
        update_deduction_amount(8);
        update_deduction_amount(9);
        update_deduction_amount(10);
        update_deduction_amount(11);
        update_deduction_amount(12);
    }
     
    //1月
    $('.january-plus').change(function() {
        update_deduction_amount(1);
    });
    $('.january-minus').change(function() {
        update_deduction_amount(1);
    });
    //2月
    $('.february-plus').change(function() {
        update_deduction_amount(2);
    });
    $('.february-minus').change(function() {
        update_deduction_amount(2);
    });
    //3月
    $('.march-plus').change(function() {
        update_deduction_amount(3);
    });
    $('.march-minus').change(function() {
        update_deduction_amount(3);
    });
    //4月
    $('.april-plus').change(function() {
        update_deduction_amount(4);
    });
    $('.april-minus').change(function() {
        update_deduction_amount(4);
    });
    //5月
    $('.may-plus').change(function() {
        update_deduction_amount(5);
    });
    $('.may-minus').change(function() {
        update_deduction_amount(5);
    });
    //6月
    $('.june-plus').change(function() {
        update_deduction_amount(6);
    });
    $('.june-minus').change(function() {
        update_deduction_amount(6);
    });
    //7月
    $('.july-plus').change(function() {
        update_deduction_amount(7);
    });
    $('.july-minus').change(function() {
        update_deduction_amount(7);
    });
    //8月
    $('.august-plus').change(function() {
        update_deduction_amount(8);
    });
    $('.august-minus').change(function() {
        update_deduction_amount(8);
    });
    //9月
    $('.september-plus').change(function() {
        update_deduction_amount(9);
    });
    $('.september-minus').change(function() {
        update_deduction_amount(9);
    });
    //10月
    $('.october-plus').change(function() {
        update_deduction_amount(10);
    });
    $('.october-minus').change(function() {
        update_deduction_amount(10);
    });
    //11月
    $('.november-plus').change(function() {
        update_deduction_amount(11);
    });
    $('.november-minus').change(function() {
        update_deduction_amount(11);
    });
    //12月
    $('.december-plus').change(function() {
        update_deduction_amount(12);
    });
    $('.december-minus').change(function() {
        update_deduction_amount(12);
    });
    
});