<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas Por Territorio</title>

  <!-- link a chart js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<canvas id="ventasChart" width="400" height="400"></canvas>

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

</body>
</html>