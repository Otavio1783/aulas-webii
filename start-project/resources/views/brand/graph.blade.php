@extends('templates.main')

@section('content')

<div class="row">
    <div class="col text-center" id="barra" style="width: 420px; height: 280px;"></div>
    <div class="col text-center" id="pizza" style="width: 420px; height: 280px;"></div>
    </div>
    <div class="row mt-2">
    <div class="col text-center" id="coluna" style="width: 420px; height: 280px;"></div>
    <div class="col text-center" id="linha" style="width: 420px; height: 280px;"></div>
</div>

<script type="text/javascript">
    var data_graph = <?php echo $data ?>;
    google.charts.load('current', {'packages':['corechart']})
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    
    let data = google.visualization.arrayToDataTable(data_graph);
   
    options = {
        title: 'TOTAL DE VEÍCULOS E MARCAS',
        colors: ['#198754'],
        legend: 'none',
        hAxis: {
            title: 'Número de veículos', 
            titleTextStyle: {
                fontSize: 12,
                bold: true,
                }
            },
            vAxis: {
            },
    };
    
    
    chart = new google.visualization.BarChart(document.getElementById('barra'));
    chart.draw(data, options);


    options = {
        title: 'TOTAL DE VEÍCULOS E MARCAS',
        is3D: true
    };
    
    chart = new google.visualization.PieChart(document.getElementById('pizza'));
    chart.draw(data, options);

    options = {
        title: 'TOTAL DE VEÍCULOS E MARCAS',
        colors: ['#198754'],
        legend: 'none',
    hAxis: {
    },
    vAxis: {
        title: 'Número de veículos',
        titleTextStyle: {
            fontSize: 12,
            bold: true,
        }  
    }
    };
    
    chart = new google.visualization.ColumnChart(document.getElementById('coluna'));
    chart.draw(data, options);
    
    options = {
    title: 'TOTAL DE VEÍCULOS E MARCAS',
    colors: ['#198754'],
    curveType: 'function',
    legend: { position: 'bottom' }
    };
    chart = new google.visualization.LineChart(document.getElementById('linha'));
    chart.draw(data, options);
}
</script>


@endsection