<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/RecebimentoDao.php";
  require_once "../dao/DespesaDao.php";
?>

<link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">


<?php require_once "css.php"; ?> 

<h3>Transações</h3>

<?php require_once "body.php";	?>

<div class="col-md-4 pull-right">
  <div id="datepicker"  class="pull-right"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
      <span></span> <b class="caret"></b>
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
    var transacao = 1;

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