@extends('layouts.app')

@section('content')
    @if (Auth::check())
    
        {{-- Inputページへのリンク --}}
        {!! link_to_route('analyses.input_get', 'Input', [], ['class' => 'btn btn-lg btn-primary']) !!}
        {{-- Calculationページへのリンク --}}
        {!! link_to_route('analyses.calculation', 'Calculation', [], ['class' => 'btn btn-lg btn-primary']) !!}
        {{-- Aboutページへのリンク --}}
        {!! link_to_route('analyses.about_get', 'About', ['id' => $user->id], ['class' => 'btn btn-lg btn-primary']) !!}
    
        
        <table class="table-bordered table-sm table-toppage">
             <tr>
                 <td>所得税</td>
                 <td>{{number_format($calc_details['tax_val'][0]) }}</td>
                 <td>住民税</td>
                 <td>{{ number_format($calc_details['tax_val'][1]) }}</td>
             </tr>
        </table>

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
        <canvas id="myChart"></canvas>
        <div id="chart_analysis">
            <script type="text/javascript">
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                        datasets: [{
                            label: '損益',
                            type: "line",
                            fill: false,
                            data: [
                                    {{ $deduction_amount[0] }}, 
                                    {{ $deduction_amount[1] }}, 
                                    {{ $deduction_amount[2] }}, 
                                    {{ $deduction_amount[3] }}, 
                                    {{ $deduction_amount[4] }}, 
                                    {{ $deduction_amount[5] }}, 
                                    {{ $deduction_amount[6] }}, 
                                    {{ $deduction_amount[7] }}, 
                                    {{ $deduction_amount[8] }}, 
                                    {{ $deduction_amount[9] }}, 
                                    {{ $deduction_amount[10] }}, 
                                    {{ $deduction_amount[11] }}
                                  ],
                            borderColor: "rgb(154, 162, 235)",
                            yAxisID: "y-axis-1",
                            }, {
                            label: '累積',
                            data: [
                                    {{ $accumulation_array[0] }}, 
                                    {{ $accumulation_array[1] }}, 
                                    {{ $accumulation_array[2] }}, 
                                    {{ $accumulation_array[3] }}, 
                                    {{ $accumulation_array[4] }}, 
                                    {{ $accumulation_array[5] }}, 
                                    {{ $accumulation_array[6] }}, 
                                    {{ $accumulation_array[7] }}, 
                                    {{ $accumulation_array[8] }}, 
                                    {{ $accumulation_array[9] }}, 
                                    {{ $accumulation_array[10] }}, 
                                    {{ $accumulation_array[11] }}
                                ],
                            borderColor: "rgb(255, 99, 132)",
                            backgroundColor: "rgba(255, 99, 132, 0.2)",
                            yAxisID: "y-axis-2",
                            }
                        ]
                    },
                    options: {
        				title: {
        					display: true,
        					text: '年間損益'
        				},
                        tooltips: {
                            mode: 'nearest',
                            intersect: false,
                        },
                        responsive: true,
                        scales: {
                            yAxes: [{
                                id: "y-axis-1",
                                type: "linear",
                                position: "left",
                                ticks: {
                                    max: {{ $deduction_amount_max }},
                                    min: {{ $deduction_amount_min }},
                                    stepSize: {{ $line_graph_step }} 
                                },
                            }, {
                            id: "y-axis-2",
                            type: "linear",
                            position: "right",
                            ticks: {
                                max: {{ $accumulation_amount_max }},
                                min: {{ $accumulation_amount_min }},
                                stepSize: {{ $bar_graph_step }} 
                            },
                            gridLines: {
                                drawOnChartArea: false,
                            }}
                            ],
                        },
                    }
                });
        
            </script>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Analyses</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection