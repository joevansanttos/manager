<?php	 
	require_once "../views/cabecalho.php"; 
	require_once '../dao/UsuarioDao.php';
	require_once '../dao/MarketDao.php';
  require_once '../dao/ContratoDao.php';

	$id = $_GET['id'];
	$usuarios = $usuarioDao->listaUsuarios();
	$total = count($usuarios);
	$homens = [];
	$mulheres = [];
	foreach ($usuarios as $u) {
		if($u->getSexo() == 'feminino'){
			array_push($homens, $u);
		}else{
			array_push($mulheres, $u);
		}


	}


	$id = $_GET['id'];
	$marketDao = new MarketDao($conexao);
	$market = $marketDao->listaMarkets(1);

  $contratoDao = new ContratoDao($conexao);
  $contratos = $contratoDao->listaTodosContratos();
?>


<?php	require_once "css.php"; ?>

<h3>Dashboard</h3>

<?php	require_once "body.php"; ?>

<!--

<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Usuários</span>
    <div class="count"><?=$total?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Total de Markets</span>
    <div class="count"><?=count($market)?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Homens</span>
    <div class="count green"><?=count($homens)?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de Mulheres</span>
    <div class="count"><?=count($mulheres)?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Contratos</span>
    <div class="count"><?=count($contratos)?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de Projetos</span>
    <div class="count">1</div>
  </div>
</div>

<canvas id="myChart" >
</canvas>
-->

<?php	require_once "script.php"; ?>

<!-- Chart.js -->
<script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Novembro", "Outubro", "Setembro", "Agosto"],
        datasets: [{
            label: 'Market',
            data: [12, 0, 0, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>



<?php	require_once "rodape.php"; ?>