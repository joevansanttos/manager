
function geraData(){
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
}