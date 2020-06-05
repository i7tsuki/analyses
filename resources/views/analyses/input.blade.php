@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'analyses.input_post']) !!}
        <input type="button" onclick="submit();" value="Commit" class="btn btn-primary btn-sm">
        
        <table class="table table-striped table-bordered table-sm table-responsive text-nowrap table-input">
            <tr>
                <th></th>
                <th>1月</th>
                <th>2月</th>
                <th>3月</th>
                <th>4月</th>
                <th>5月</th>
                <th>6月</th>
                <th>7月</th>
                <th>8月</th>
                <th>9月</th>
                <th>10月</th>
                <th>11月</th>
                <th>12月</th>
            </tr>
            <tr>
                <td class="test">売上高</td>
                <td><input type="text" class="january-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->first()->sales}}"></td>
                <td><input type="text" class="february-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('sales')}}"></td>
                <td><input type="text" class="march-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('sales')}}"></td>
                <td><input type="text" class="april-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('sales')}}"></td>
                <td><input type="text" class="may-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('sales')}}"></td>
                <td><input type="text" class="june-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('sales')}}"></td>
                <td><input type="text" class="july-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('sales')}}"></td>
                <td><input type="text" class="august-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('sales')}}"></td>
                <td><input type="text" class="september-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('sales')}}"></td>
                <td><input type="text" class="october-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('sales')}}"></td>
                <td><input type="text" class="november-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('sales')}}"></td>
                <td><input type="text" class="december-plus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('sales')}}"></td>
            </tr>
            <tr>
                <td>仕入高</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('purchase')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('purchase')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('purchase')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('purchase')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('purchase')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('purchase')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('purchase')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('purchase')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('purchase')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('purchase')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('purchase')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('purchase')}}"></td>
            </tr>
            <tr>
                <td>租税公課</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('tax_and_dues')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('tax_and_dues')}}"></td>
            </tr>
            <tr>
                <td>水道光熱費</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('utilities')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('utilities')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('utilities')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('utilities')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('utilities')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('utilities')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('utilities')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('utilities')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('utilities')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('utilities')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('utilities')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('utilities')}}"></td>
            </tr>
            <tr>
                <td>旅費交通費</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('transportations')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('transportations')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('transportations')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('transportations')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('transportations')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('transportations')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('transportations')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('transportations')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('transportations')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('transportations')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('transportations')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('transportations')}}"></td>
            </tr>
            <tr>
                <td>通信費</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('communications')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('communications')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('communications')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('communications')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('communications')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('communications')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('communications')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('communications')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('communications')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('communications')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('communications')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('communications')}}"></td>
            </tr>
            <tr>
                <td>接待交際費</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('entertainments')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('entertainments')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('entertainments')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('entertainments')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('entertainments')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('entertainments')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('entertainments')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('entertainments')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('entertainments')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('entertainments')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('entertainments')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('entertainments')}}"></td>
            </tr>
            <tr>
                <td>消耗品費</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('expendables')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('expendables')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('expendables')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('expendables')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('expendables')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('expendables')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('expendables')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('expendables')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('expendables')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('expendables')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('expendables')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('expendables')}}"></td>
            </tr>
            <tr>
                <td>給料賃金</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('salaries')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('salaries')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('salaries')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('salaries')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('salaries')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('salaries')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('salaries')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('salaries')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('salaries')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('salaries')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('salaries')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('salaries')}}"></td>
            </tr>
            <tr>
                <td>外注工賃</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('outsourcings')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('outsourcings')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('outsourcings')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('outsourcings')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('outsourcings')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('outsourcings')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('outsourcings')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('outsourcings')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('outsourcings')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('outsourcings')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('outsourcings')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('outsourcings')}}"></td>
            </tr>
            <tr>
                <td>地代家賃</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('rents')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('rents')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('rents')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('rents')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('rents')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('rents')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('rents')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('rents')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('rents')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('rents')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('rents')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('rents')}}"></td>
            </tr>
            <tr>
                <td>その他</td>
                <td><input type="text" class="january-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 1)->sum('other_costs')}}"></td>
                <td><input type="text" class="february-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 2)->sum('other_costs')}}"></td>
                <td><input type="text" class="march-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 3)->sum('other_costs')}}"></td>
                <td><input type="text" class="april-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 4)->sum('other_costs')}}"></td>
                <td><input type="text" class="may-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 5)->sum('other_costs')}}"></td>
                <td><input type="text" class="june-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 6)->sum('other_costs')}}"></td>
                <td><input type="text" class="july-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 7)->sum('other_costs')}}"></td>
                <td><input type="text" class="august-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 8)->sum('other_costs')}}"></td>
                <td><input type="text" class="september-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 9)->sum('other_costs')}}"></td>
                <td><input type="text" class="october-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 10)->sum('other_costs')}}"></td>
                <td><input type="text" class="november-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 11)->sum('other_costs')}}"></td>
                <td><input type="text" class="december-minus" name="val[]" value="{{ $profit_and_loss->where('year', 2020)->where('month', 12)->sum('other_costs')}}"></td>
            </tr>
            <tr>
                <td>差引金額</td>
                <td><p class="january-deduction-amount"></p></td>
                <td><p class="february-deduction-amount"></p></td>
                <td><p class="march-deduction-amount"></p></td>
                <td><p class="april-deduction-amount"></p></td>
                <td><p class="may-deduction-amount"></p></td>
                <td><p class="june-deduction-amount"></p></td>
                <td><p class="july-deduction-amount"></p></td>
                <td><p class="august-deduction-amount"></p></td>
                <td><p class="september-deduction-amount"></p></td>
                <td><p class="october-deduction-amount"></p></td>
                <td><p class="november-deduction-amount"></p></td>
                <td><p class="december-deduction-amount"></p></td>
            </tr>
        </table>
        
    {!! Form::close() !!}
@endsection