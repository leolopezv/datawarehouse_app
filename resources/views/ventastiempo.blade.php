{{-- resources/views/ventas_por_anio_mes.blade.php --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas Totales por Año y Mes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="ventasAnioMesChart"></canvas>

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

</body>
</html>
