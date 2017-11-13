<?php	
	require_once "cabecalho.php"; 
	require_once "../aut/logica.php"; 
  require_once "../dao/MarketDao.php"; 
  require_once "../dao/LeadDao.php"; 
  require_once "../dao/ProspectDao.php"; 
  require_once "../dao/SuspectDao.php"; 
  require_once "../dao/ContratoDao.php";  

  $id = $_GET['id'];
  $u = $usuarioDao->buscaUsuario($id);

  $marketDao = new MarketDao($conexao);
  $market = $marketDao->listaMarkets($id);

  $leadDao = new LeadDao($conexao);
  $leads = $leadDao->listaLeads($id);

  $suspectDao = new SuspectDao($conexao);
  $suspects = $suspectDao->listaSuspects($id);

  $prospectDao = new ProspectDao($conexao);
  $prospects = $prospectDao->listaProspects($id);

  $contratoDao = new ContratoDao($conexao);
  $contratos = $contratoDao->listaContratos($id);

  $cidade = $marketDao->buscaCidade($usuario->getCidade() );
?>	

<?php require_once "css.php"; ?>


<h3>Perfil do Usuário</h3>
	
<?php require_once "body.php";	?>

<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
  <div class="profile_img">
    <div id="crop-avatar">
      <?php
        if($u->getImage() != null){
          if (getimagesize('../' . $u->getImage()) !== false) {

      ?>
            <img class="img-responsive avatar-view" src="<?='../' . $u->getImage()?>" alt="Avatar" title="Change the avatar">
      <?php
          }else{

      ?>
            <img class="img-responsive avatar-view" src="../images/user.png" alt="Avatar" title="Change the avatar">
      <?php
          } 
        }else{
      ?>
        <img class="img-responsive avatar-view" src="../images/user.png" alt="Avatar" title="Change the avatar">
      <?php
        }
        
      ?>
    </div>
  </div>
  <h3><?=$u->getNome()?> <?=$u->getSobrenome()?></h3>

  <ul class="list-unstyled user_data">
    <li><i class="fa fa-map-marker user-profile-icon"></i> <?=$cidade?> , <?=$u->getEstado()?>
    </li>

    <li>
      <i class="fa fa-briefcase user-profile-icon"></i> <?=$u->getProfissao()->getDescricao()?>
    </li>

    <li class="m-top-xs">
      <i class="fa fa-external-link user-profile-icon"></i>
      <a  target="_blank"><?=$u->getEmail()?></a>
    </li>
  </ul>
  <?php
    if($usuario_id == $u->getId()){
  ?>
    <a  href="usuario-altera.php?id=<?=$usuario_id?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
  <?php
    }
  ?>
  
  <br />

 
</div>
<div class="col-md-9 col-sm-9 col-xs-12">

  <div class="profile_title">
    <div class="col-md-6">
      <h2>Atividade do Usuário</h2>
    </div>
    <div class="col-md-6">
      <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
        <span>December 30, 2014 - January 28, 2019</span> <b class="caret"></b>
      </div>
    </div>
  </div>
  <!-- start of user-activity-graph -->
  <canvas id="myChart" style="width:100%; height:280px;" >  </canvas>
  <!-- end of user-activity-graph -->

  
</div>


			    	


<?php	require "script.php"; ?>

<!-- Chart.js -->
<script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Market", "Leads", "Suspects", "Prospects", "Contratos"],
        datasets: [{
            label: 'Novembro',
            data: [<?=count($market)?>, <?=count($leads)?>, <?=count($suspects)?>, <?=count($prospects)?>, <?=count($contratos)?>],
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


<?php	require "rodape.php"; ?>