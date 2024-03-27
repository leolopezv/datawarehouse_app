@extends('layout')
@section('content')
{{-- resources/views/ventas_por_anio_mes.blade.php --}}
<h1>Ventas por Año y Mes</h1>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="ventasAnioMesChart" style="max-width: 800px; max-height: 600px;"></canvas>

<script>
  const labels = @json($labels);
  const ventasData = @json($data);
  const backgroundColor = @json($backgroundColor);
  const borderColor = @json($borderColor);
  
  const data = {
    labels: labels,
    datasets: [{
      label: 'Ventas Totales por Año y Mes',
      data: ventasData,
      backgroundColor: backgroundColor,
      borderColor: borderColor,
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
    }
  };

  new Chart(document.getElementById('ventasAnioMesChart'), config);
</script>
@endsection