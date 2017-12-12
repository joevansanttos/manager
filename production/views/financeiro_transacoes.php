<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/RecebimentoDao.php";
  require_once "../dao/DespesaDao.php";
  $today = date("Y-m-d");
  $despesaDao = new DespesaDao($conexao);
  $valorDespesa = $despesaDao->calculoDespesasMes($today);
  $recebimentoDao = new RecebimentoDao($conexao);
  $valorRecebimento = $recebimentoDao->calculoRecebimentosMes($today);
?>

<link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<?php require_once "css.php"; ?> 

<link rel="stylesheet" type="text/css" href="../css/transacao.css">

<h3>Financeiro</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Lista de Transações</h2>
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
    <div class="pull-left">
      <div id="datepicker"   style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
          <span></span> <b class="caret"></b>
      </div>
    </div>
    <div class="pull-right animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="green count"><?='R$ '.number_format($valorRecebimento, 2, '.', '')?></div>
        <h3>Receitas do Mês</h3>
      </div>
    </div>
    <div class="pull-right animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="red  count"><?='R$ '.number_format($valorDespesa, 2, '.', '')?></div>
        <h3>Despesas do Mês</h3>
      </div>
    </div>
  </div>


<div class="clearfix"></div>
<div id="transacao-panel"  role="tabpanel" data-example-id="togglable-tabs">
  
</div>        
	

<?php	
	require_once "script.php"; 
?>




<script src="../../vendors/moment/min/moment.min.js"></script>
<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="../../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#datepicker span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
      if(start != '' && end != ''){ 
        var inicio = start.format('YYYY-MM-DD');
        var fim = end.format('YYYY-MM-DD');
        $.ajax({  
          url:"filter.php",  
          method:"POST",  
          data:{
            start:inicio,
            end:fim
          },
          success:function(data){
            $('#transacao-panel').html(data);  
          }  
        });  
      }  
      else {  
           alert("Please Select Date");  
      }

    }


    $('#datepicker').daterangepicker({        
        startDate: start,
        endDate: end,
        ranges: {
           'Hoje': [moment(), moment()],
           'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
           'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
           'Esse Mês': [moment().startOf('month'), moment().endOf('month')],
           'Último Mês': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);  
    
  });
</script>

<?php
	require_once "rodape.php"; 
?>