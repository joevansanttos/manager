<?php	
require_once "cabecalho.php"; 
require_once "../dao/ProdutoDao.php"; 
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="../css/produtos.css" rel="stylesheet">

<?php	require_once "css.php"; ?>


<h3>Produtos</h3>

<?php require_once "body.php";  ?>

<div class="x_title">
  <h2>Nossos Produtos</h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">				

<div class="row">
	<div class="col-sm-12">
		<ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
			<li class="active"><a href="#htab1" data-toggle="tab">Mapeamento</a></li>
			<li><a href="#htab2" data-toggle="tab">Auditoria</a></li>
			<li><a href="#htab3" data-toggle="tab">Universidade</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="htab1">
				<br>
				<div class="tabs">
					<h2>Mapeamento de Processos</h2>
					<br>
					<p>A metodologia BPM identifica os processos do cliente e define prioridades de abordagem. Para cada processo estudado são identificados gargalos, indicadores e apontadas melhorias. As normas e procedimentos da organização são também revisados e adequados aos processos modificados.</p>
					<p>Simplificação organizacional,  Aumento do desempenho dos processos,Otimização das equipes de negócio, Redução dos custos, Padronização dos processos</p>
					<p>Relatório de Procedimentos Internos, Fluxogramas de processos, Checklist de processos, Relatório de Não Conformidades, Relatórios de Ações preventivas/corretivas</p>
				</div>
				
				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="htab2">
					<br>
					<div class="tabs">
						<h2>Auditoria de Processos</h2>
						<br>
						<p>A metodologia de auditoria é um instrumento gerencial utilizado para avaliar as ações da qualidade. É um processo de auxílio à prevenção de problemas, um exame sistemático e independente para determinar se as atividades da qualidade cumprem as providências planejadas e se essas providências são implementadas de maneira eficaz, e se são adequadas para atingir os objetivos.</p>
						<p>Assegurar que todos os controles estão sendo executados, Apurar as responsabilidades por eventuais omissões na realização das transações da empresa</p>
						<p>Relatórios de auditoria, Análise de riscos, Checklist de processos,Relatório de não conformidades, Relatórios de ações preventivas/corretivas</p>
					</div>
					
			</div>
			<div role="tabpanel" class="tab-pane fade in" id="htab3">
					<br>
					<h2>Universidade Corporativa</h2>
					<br>
					<p>Através de uma plataforma de estudo online, realizamos toda a Gestão do Conhecimento para promover as necessidades de aprendizado de cada empresa de forma eficiente e bem estruturada.</p>
			</div>
			</div>
		</div>
	</div>



	<?php	require_once "script.php"; ?>


	<!-- Datatables -->
	<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="../js/datatable.js"></script> 

	<?php	require_once "rodape.php"; ?>