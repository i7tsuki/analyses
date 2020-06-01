@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'analyses.about_post']) !!}
        <div class="form-group">
            <p><input type="button" onclick="submit();" value="Commit" class="btn btn-primary btn-sm"></p>
            
            <div>
                <label class="col-form-label">青色申告：</label>
                @if ($deduction->sum('blue_declaration') === 1) 
                    <input type="checkbox" name="blue_declaration" checked>
                @else
                    <input type="checkbox" name="blue_declaration">
                @endif
            </div>
            
            <label class="col-form-label">社会保険料：</label>
            <input type="text" name="social_insurance" class="form-control" value="{{ $deduction->sum('social_insurance') }}">
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-2">
                        <label class="col-form-label">生命保険料　新</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="col-form-label">生命保険料：</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="life_premium_new" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
                    </div>
                </div>
            </div>
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-2">
                        <p></p>
                    </div>
                    <div class="col-sm-2">
                        <label class="col-form-label">介護医療保険料：</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ltc_premium" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
                    </div>
                </div>
            </div>
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-2">
                        <p></p>
                    </div>
                    <div class="col-sm-2">
                        <label class="col-form-label">個人年金保険料：</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="pension_new" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
                    </div>
                </div>
            </div>
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-2">
                        <label class="col-form-label">生命保険料　旧</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="col-form-label">生命保険料：</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="life_premium_old" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
                    </div>
                </div>
            </div>
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-2">
                        <p></p>
                    </div>
                    <div class="col-sm-2">
                        <label class="col-form-label">個人年金保険料：</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="pension_old" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
                    </div>
                </div>
            </div>
            
            <label class="col-form-label">地震保険料：</label>
            <input type="text" name="earthquake_insurance" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="col-form-label">寡夫：</label>
                        @if ($deduction->sum('widower') === 1) 
                            <input type="checkbox" name="widower" checked>
                        @else
                            <input type="checkbox" name="widower">
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">寡婦（一般）：</label>
                        @if ($deduction->sum('widow_normal') === 1) 
                            <input type="checkbox" name="widow_normal" checked>
                        @else
                            <input type="checkbox" name="widow_normal">
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">寡婦（特別）：</label>
                        @if ($deduction->sum('widow_special') === 1) 
                            <input type="checkbox" name="widow_special" checked>
                        @else
                            <input type="checkbox" name="widow_special">
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="col-form-label">配偶者有無：</label>
                        @if ($deduction->sum('spouse') === 1) 
                            <input type="checkbox" name="spouse" checked>
                        @else
                            <input type="checkbox" name="spouse">
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">配偶者が70歳以上：</label>
                        @if ($deduction->sum('spouse_old') === 1) 
                            <input type="checkbox" name="spouse_old" checked>
                        @else
                            <input type="checkbox" name="spouse_old">
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">配偶者所得：</label>
                        <input type="text" name="spouse_income" class="form-control" value="{{ $deduction->sum('spouse_income') }}">
                    </div>
                </div>
            </div>
    
            <label class="col-form-label">控除対象扶養親族（人数）：</label>
            <input type="text" name="dependent_relatives_for_deduction" class="form-control" value="{{ $deduction->sum('dependent_relatives_for_deduction') }}">
            
            <label class="col-form-label">特定扶養親族（人数）：</label>
            <input type="text" name="specific_dependent" class="form-control" value="{{ $deduction->sum('specific_dependent') }}">
            
            <div class="life_premium">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="col-form-label">非同居老人扶養親族（人数）：</label>
                        <input type="text" name="elderly_dependent_relative" class="form-control" value="{{ $deduction->sum('elderly_dependent_relative') }}">
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">同居老人扶養親族（人数）：</label>
                        <input type="text" name="elderly_dependent_relative_living_together" class="form-control" value="{{ $deduction->sum('elderly_dependent_relative_living_together') }}">
                    </div>
                </div>
            </div>
    
            
            <label class="col-form-label">医療費：</label>
            <input type="text" name="medical_bills_income" class="form-control" value="{{ $deduction->sum('life_premium_new') }}">
        
        </div>
    {!! Form::close() !!}
@endsection