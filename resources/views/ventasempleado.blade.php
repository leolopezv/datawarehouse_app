<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas Por Empleado</title>

    <!-- Incluye Chart.js una vez -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<body>

<canvas id="salesByEmployeeChart"></canvas>

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

    
</body>
</html>
