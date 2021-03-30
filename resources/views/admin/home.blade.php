@extends('layouts.app')


@section('content')

    @include('layouts.partials.dash-menu')

    <h1 class="text-center text-capitalize">backoffice user</h1>

    <div id="stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-main">
                        <canvas id="line-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Set','Ott','Nov','Dic'],
    datasets: [{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Piemonte",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Lombardia",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Lazio",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784],
        label: "Campania",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "Sicilia",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Vendite Italiane per regione'
    }
  }
});
    </script>

@endsection
