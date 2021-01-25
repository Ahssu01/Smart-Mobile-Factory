@extends('master-layout.index')

@section('content')
    <div class="container">
        <h2>Bitcoin Price Check</h2>
        <p>Please select the date range</p>
        <form class="form-inline" action="#" id="bitcoin_price">
            <input type="date" class="form-control" id="date_from" placeholder="Enter Starting Date" name="date_from" required>


            <input type="date" class="form-control" id="date_to" placeholder="Enter Ending Date" name="date_to" required>

            <button type="submit" class="btn btn-primary">Render</button>
        </form>
    </div>

    <hr>

    <canvas id="myChart" ></canvas>

    <script>

        var ctx = document.getElementById('myChart');

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Green'],

                datasets: [{
                    label: 'Bitcoin Price Range',
                    data: [22, 30, 50],
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


    </script>
@endsection
