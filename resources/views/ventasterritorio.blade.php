@extends('layout')
@section('content')
<h1>Ventas por Territorio</h1>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="ventasChart" style="max-width: 800px; max-height: 600px;"></canvas>
<script>
  const labels = @json($labels);
  const ventasData = @json($data);
  const data = {
    labels: labels,
    datasets: [{
      label: 'Ventas por Territorio',
      data: ventasData,
      backgroundColor: 'rgba(255, 99, 132, 0.2)', 
      borderColor: 'rgb(255, 99, 132)',
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  const ventasChart = new Chart(
    document.getElementById('ventasChart'),
    config
  );
</script>
@endsection