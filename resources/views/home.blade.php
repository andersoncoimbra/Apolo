@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Temperatura</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="temperatura" style="height: 215px; width: 292px;" height="215" width="292"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (RIGHT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Humidade</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="humidade" style="height: 215px; width: 292px;" height="215" width="292"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.row -->


    </section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
    <script>
        var ctx = $("#temperatura");
        var label =[
            @foreach($labeltemp as $lab)
            '{{date('H:i:s',strtotime($lab->created_at))}}',
            @endforeach
        ];
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label.join().split(','),
                datasets: [{
                    label: '# Temperatura',
                    data: [{{$temp}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        var chumidity = $("#humidade");
        var label =[
            @foreach($labelhumi as $lab)
                    '{{date('H:i:s',strtotime($lab->created_at))}}',
            @endforeach
        ];
        var myChart = new Chart(chumidity, {
            type: 'line',
            data: {
                labels: label.join().split(','),
                datasets: [{
                    label: '# Humidade',
                    data: [{{$humi}}],
                    backgroundColor: [
                        'rgba(35,107,142, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0,0,156,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
