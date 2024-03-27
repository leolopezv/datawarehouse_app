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
      fill: false,
      backgroundColor: backgroundColor,
      pointStyle: 'circle', 
      pointRadius: 5, // puntos
      pointHoverRadius: 7, // puntos al pasar el mouse para que sean más grandes 
      borderColor: borderColor,
      borderWidth: 1
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Ventas Totales por Año y Mes'
        }
      },
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