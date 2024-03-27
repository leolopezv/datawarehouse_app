@extends('layout')
@section('content')

<h1>Ventas por Producto</h1>

<!-- Incluye Chart.js una vez -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<canvas id="ventasPorProductoChart" style="max-width: 1000px; max-height: 900px;"></canvas>


<script>
  const labels = @json($labels);
  const ventasData = @json($data);
  const backgroundColor = @json($backgroundColor);
  const borderColor = @json($borderColor);

  const data = {
    labels: labels,
    datasets: [{
      axis: 'y',
      label: 'Ventas por Producto',
      data: ventasData,
      fill: false,
      backgroundColor: backgroundColor,
      borderColor: borderColor, // Ahora siempre será negro
      borderWidth: 0.01
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      indexAxis: 'y',
      scales: {
        x: {
          beginAtZero: true,
        },
      },
    }
  };

  new Chart(document.getElementById('ventasPorProductoChart'), config);
</script>
@endsection