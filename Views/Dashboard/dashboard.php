<?php headerAdmin($data); ?>
<?php $cabeza = $data['cabeza'] ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <h4>Usuarios</h4>
                  <p><b><?= $cabeza['usuarios']['cantidad']?></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-calendar-plus-o"></i>
                <div class="info">
                  <h4 id="txtClientes">Clientes</h4>
                  <p><b><?= $cabeza['clientes']['cantidad']?></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                  <h4>Productos</h4>
                  <p><b><?= $cabeza['productos']['cantidad']?></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                  <h4>Mascotas</h4>
                  <p><b><?= $cabeza['mascotas']['cantidad']?></b></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <h3 class="tile-title">Especie de mascotas</h3>
              <div>
                <canvas id="mypie"></canvas>
              </div>
            </div>

            <div class="col-md-8">
              <h3 class="tile-title">Productos con menor Stock</h3>
              <div>
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</main>
<?php footerAdmin($data); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$valores = [];
$etiquetas = [];

foreach ($data['menor'] as $dato) {
  $valores[] = $dato['stock'];
  $etiquetas[] = $dato['nombre'];
}
?>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($etiquetas); ?>,
      datasets: [{
        label: '# Cantidad',
        data: <?php echo json_encode($valores); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?php
$valores2 = [];
$etiquetasw = [];

foreach ($data['especie'] as $dato) {
  $valores2[] = $dato['cantidad_mascotas'];
  $etiquetas2[] = $dato['especie'];
}
?>
<script>
  const ctx2 = document.getElementById('mypie');

  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($etiquetas2); ?>,
      datasets: [{
        label: '# Cantidad',
        data: <?php echo json_encode($valores2); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>