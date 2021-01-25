@extends('master-layout.index')

@section('content')
    <div class="container">
        <h2>Bitcoin Price Check</h2>
        <p>Please select the date range</p>
        <form class="form-inline" action="#" id="bitcoin_price">
            <input type="date" class="form-control" id="date_from" placeholder="Enter Starting Date" name="date_from" required>


            <input type="date" class="form-control" id="date_to" placeholder="Enter Ending Date" name="date_to" required>

            <button type="submit" class="btn btn-primary" value="Render">Render</button>
        </form>
    </div>

    <hr>

    <div class="alert alert-success" role="alert" id="alert">
        Data Generated Successfully!
    </div>

    <div class="alert alert-danger" role="alert" id="error_alert">
        End Date should be greater by the Start date!
    </div>

    <canvas id="myChart" ></canvas>

    <script>
        $(document).ready(function (){
            $('#alert').hide();
            $('#error_alert').hide();
            $('#myChart').hide();
        });


        /* Form submission function */

        $('#bitcoin_price').on('submit', function (e){
            e.preventDefault();
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();

            if(date_to < date_from){
                $('#error_alert').show();
                setTimeout(function () {
                    $('#error_alert').hide();
                }, 1200);
                $('#myChart').hide();
            }
            else{
                var server_code = "http://127.0.0.1:8001/";                 /* Since the Backend (API server) is running on 8001 port */

                $.ajax({
                    type: 'POST',
                    url: server_code + 'api/price',
                    data:{
                        'date_from' : date_from,
                        'date_to' : date_to,
                    },

                    beforeSend: function (){
                        $('#myChart').hide();
                    },

                    success:function (response){
                        $('#myChart').show();

                        $('#alert').show();

                        setTimeout(function () {
                            $('#alert').hide();
                        }, 900);

                        var result = JSON.parse(response);

                        var dates = result.bpi;

                        var ctx = document.getElementById('myChart');

                        var myLineChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: Object.keys(dates),

                                datasets: [{
                                    label: 'Bitcoin Price Range',
                                    data: Object.values(dates),
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',

                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                        });

                    }
                });

            }

        });
    </script>
@endsection
