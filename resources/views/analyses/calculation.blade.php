@extends('layouts.app')

@section('content')
    <p>※2019年12月末時点の税法に沿っています。</p>
    
    <table class="table table-striped table-bordered table-sm text-nowrap table-calc">
        <tr>
            <th></th>
            <th>所得税</th>
            <th>住民税</th>
        </tr>
        <tr>
            <td>差引金額</td>
            <td>{{ number_format($deduction_amount) }}</td>
            <td>{{ number_format($deduction_amount) }}</td>
        </tr>
        <tr>
            <td>青色申告特別控除</td>
            <td>{{ number_format($blue_declaration_amount) }}</td>
            <td>{{ number_format($blue_declaration_amount) }}</td>
        </tr>
        <tr>
            <td>所得金額</td>
            <td>{{ number_format($income_amount) }}</td>
            <td>{{ number_format($income_amount) }}</td>
        </tr>
        <tr>
            <td>社会保険料控除</td>
            <td>{{ number_format($social_insurance_amount) }}</td>
            <td>{{ number_format($social_insurance_amount) }}</td>
        </tr>
        <tr>
            <td>生命保険料控除</td>
            <td>{{ number_format($life_result[0]) }}</td>
            <td>{{ number_format($life_result[1]) }}</td>
        </tr>
        <tr>
            <td>地震保険料控除</td>
            <td>{{ number_format($earthquake_deduction[0]) }}</td>
            <td>{{ number_format($earthquake_deduction[1]) }}</td>
        </tr>
        <tr>
            <td>寡夫・寡婦控除</td>
            <td>{{ number_format($widower_amount[0]) }}</td>
            <td>{{ number_format($widower_amount[1]) }}</td>
        </tr>
        <tr>
            <td>配偶者（特別）控除</td>
            <td>{{ number_format($spouse_deduction[0]) }}</td>
            <td>{{ number_format($spouse_deduction[1]) }}</td>
        </tr>
        <tr>
            <td>扶養控除</td>
            <td>{{ number_format($dependent_amount[0]) }}</td>
            <td>{{ number_format($dependent_amount[1]) }}</td>
        </tr>
        <tr>
            <td>医療費控除</td>
            <td>{{ number_format($medical_amount) }}</td>
            <td>{{ number_format($medical_amount) }}</td>
        </tr>
        <tr>
            <td>基礎控除</td>
            <td>{{ number_format($basic_exemption[0]) }}</td>
            <td>{{ number_format($basic_exemption[1]) }}</td>
        </tr>
        <tr>
            <td>課税所得金額</td>
            <td>{{ number_format($taxable_income_amount[0]) }}</td>
            <td>{{ number_format($taxable_income_amount[1]) }}</td>
        </tr>
        <tr>
            <td>納付税額</td>
            <td>{{ number_format($tax_val[0]) }}</td>
            <td>{{ number_format($tax_val[1]) }}</td>
        </tr>
    </table>
@endsection