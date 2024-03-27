@extends('layout')
@section('content')
<h1>Ventas por Empleado</h1>
<!-- Incluye Chart.js una vez -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="salesByEmployeeChart" style="max-width: 800px; max-height: 600px;"></canvas>
<script>
  const labels = @json($labels);
  const percentages = @json($percentages);
  const backgroundColor = @json($backgroundColor);
  const data = {
    labels: labels,
    datasets: [{
      label: 'Porcentaje de Ventas por Empleado',
      data: percentages,
      backgroundColor: backgroundColor,
      hoverOffset: 4
    }]
  };

  // agregar abajo las ventas totales y hacer comparación en dolares

  const config = {
    type: 'doughnut',
    data: data,
    options: {
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index] || '';
            if (label) {
              label += ': ';
            }
            label += new Intl.NumberFormat('en-US', { style: 'percent', minimumFractionDigits: 2 }).format(data.datasets[0].data[tooltipItem.index] / 100);
            return label;
          }
        }
      }
    },
  };

  new Chart(document.getElementById('salesByEmployeeChart'), config);
</script>
@endsection