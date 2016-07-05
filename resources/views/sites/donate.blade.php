@extends('app')
@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--10-col mdl-cell--9-col-tablet mdl-cell--1-offset">
            <div id="main" style="width: 100%;height:400px;"></div>
            <div id="week" style="width: 100%;height:400px;"></div>
        </div>
    </div>
    <script type="text/javascript">
        var todayChart = echarts.init(document.getElementById('main'));
        var weekChart = echarts.init(document.getElementById('week'));
        var option = {
            title: {
                text: '当天接受款项'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {},
            grid: {
                left: '0%',
                right: '1%',
                containLabel: true
            },
            xAxis: {
                data: [
                    {!! $xToday !!}
                ]
            },
            yAxis: {},
            color:['#22c3aa','#7bd9a5'],
            series: [{
                name: '款项',
                type: 'line',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'top'
                    }
                },
                areaStyle: {normal: {}},
                data: [
              {!! $yToday !!}
                ]
            }]
        };
        todayChart.setOption(option);
        var lineOption = {
            title: {
                text: '过去一周接受款项'
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
            },
            grid: {
                left: '0%',
                right: '1%',
                bottom: '3%',
                containLabel: true
            },
            xAxis : [
                {
                    type : 'category',
                    data : [
                        {!! $xWeek !!}
                    ]
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    type:'bar',
                    data:[
                        {!! $yWeek !!}
                    ],
                    label: {
                        normal: {
                            show: true,
                            position: 'top'
                        }
                    },
                   markLine : {
                        lineStyle: {
                            normal: {
                                type: 'dashed'
                            }
                        },
                        data : [
                            [{type : 'min'}, {type : 'max'}]
                        ]
                    }
                }
            ]
        };
        weekChart.setOption(lineOption);
    </script>
@stop