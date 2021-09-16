@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Backstage</div>
                    <div class="card-body text-center">
                        <canvas class="my-4 w-100" id="myChart" width="688" height="290"></canvas>

                          <div class="card-deck small">
                        <div class="card shadow">
                          <img class="card-img-top" src="{{ asset('img/backstage/categories/general.png') }}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('backstage-general') }}">General</a></h5>
                          </div>
                        </div>
                        <div class="card shadow">
                          <img class="card-img-top" src="https://via.placeholder.com/362x200/363746" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('backstage-users') }}">Users</a></h5>
                          </div>
                        </div>
                        <div class="card shadow">
                          <img class="card-img-top" src="https://via.placeholder.com/362x200/363746" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><a href="#">Forum</a></h5>
                          </div>
                        </div>
                      </div>

                      <div class="card-deck small mt-4">
                        <div class="card shadow">
                          <img class="card-img-top" src="https://via.placeholder.com/362x200/363746" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><a href="#">Guilds</a></h5>
                          </div>
                        </div>
                        <div class="card shadow">
                          <img class="card-img-top" src="https://via.placeholder.com/362x200/363746" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><a href="#">Guides</a></h5>
                          </div>
                        </div>
                        <div class="card shadow">
                          <img class="card-img-top" src="https://via.placeholder.com/362x200/363746" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><a href="#">Builds</a></h5>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [1, 5, 6, 2, 10, 4, 1],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
@endsection
