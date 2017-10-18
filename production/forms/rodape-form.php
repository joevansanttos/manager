<footer>
        <div class="pull-right">
          PROJEK
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../../vendors/moment/min/moment.min.js"></script>
<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../../vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="../../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>
<!-- Cidades e Estados -->
<script src="../js/cidades-estados-utf8.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade'),
    estado: document.getElementById('estado')
  })
</script>
<script>
  $('#form').parsley();
</script>
<script type="text/javascript">
  window.ParsleyValidator.setLocale('pt-br');
</script>
<script src="../js/calcula.js"></script>
<script type="text/javascript">
  function calcula(){
    var prob = document.getElementById('prob').value;
    var divide = prob/100;
    var id_profissao = <?=$usuario['id_profissao']?>;
    var porte = <?=$porte['id_porte']?>;
    if(id_profissao == 4){          
      if(porte == 1){
        var valor_op = 1405;
      }else if(porte == 2){
        var valor_op = 1874;

      }else{
        var valor_op = 2342;
      }
      
    }else{
      if(porte == 1){
        var valor_op = 937;
      }else if(porte == 2){
        var valor_op = 1405;
      }else{
        var valor_op = 1874;
      }
    }
    document.getElementById('valor_op').value = parseFloat(Math.round(valor_op)).toFixed(2);
    var result=  parseFloat(divide)*parseFloat(valor_op);

    document.getElementById('valor_est').value = parseFloat(Math.round(result * 100) / 100).toFixed(2);
  }
</script>
</body>
</html>