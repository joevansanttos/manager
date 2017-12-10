<?php	
	require_once "cabecalho.php";
?>

<link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="../../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

	
<?php require_once "css.php"; ?> 

<h3>Dashboard Financeiro</h3>

<?php require "body.php";	?>			


<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
    <div class="count">2500</div>
    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
    <div class="count">123.50</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
    <div class="count green">2,500</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
    <div class="count">4,567</div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
    <div class="count">2,315</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
    <div class="count">7,325</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
</div>
<!-- /top tiles -->

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Resumo das Transações</h2>
        <div class="filter">
          <div id="datepicker"  class="pull-right"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
              <span></span> <b class="caret"></b>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="demo-container" style="height:280px">
            <div id="chart_plot_02" class="demo-placeholder"></div>
          </div>
          

        </div>

        <div class="col-md-3 col-sm-12 col-xs-12">
          <div>
            <div class="x_title">
              <h2>Top Profiles</h2>
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
            <ul class="list-unstyled top_profiles scroll-view">
              <li class="media event">
                <a class="pull-left border-aero profile_thumb">
                  <i class="fa fa-user aero"></i>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Ms. Mary Jane</a>
                  <p><strong>$2300. </strong> Agent Avarage Sales </p>
                  <p> <small>12 Sales Today</small>
                  </p>
                </div>
              </li>
              <li class="media event">
                <a class="pull-left border-green profile_thumb">
                  <i class="fa fa-user green"></i>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Ms. Mary Jane</a>
                  <p><strong>$2300. </strong> Agent Avarage Sales </p>
                  <p> <small>12 Sales Today</small>
                  </p>
                </div>
              </li>
              <li class="media event">
                <a class="pull-left border-blue profile_thumb">
                  <i class="fa fa-user blue"></i>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Ms. Mary Jane</a>
                  <p><strong>$2300. </strong> Agent Avarage Sales </p>
                  <p> <small>12 Sales Today</small>
                  </p>
                </div>
              </li>
              <li class="media event">
                <a class="pull-left border-aero profile_thumb">
                  <i class="fa fa-user aero"></i>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Ms. Mary Jane</a>
                  <p><strong>$2300. </strong> Agent Avarage Sales </p>
                  <p> <small>12 Sales Today</small>
                  </p>
                </div>
              </li>
              <li class="media event">
                <a class="pull-left border-green profile_thumb">
                  <i class="fa fa-user green"></i>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Ms. Mary Jane</a>
                  <p><strong>$2300. </strong> Agent Avarage Sales </p>
                  <p> <small>12 Sales Today</small>
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
			

<?php	require_once "script.php"; ?>

<!-- Chart.js -->
<script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="../../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Flot -->
<script src="../../vendors/Flot/jquery.flot.js"></script>
<script src="../../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../../vendors/Flot/jquery.flot.time.js"></script>
<script src="../../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../../vendors/DateJS/build/date.js"></script>

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
          url:"financeiro.php",  
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

<?php	require_once "rodape.php"; ?>