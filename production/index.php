<?php
  header('Content-Type: text/html; charset=utf-8');
  error_reporting(E_ALL ^ E_NOTICE);
  ob_start();
  session_start();
  require_once "includes/logica.php";
  if(usuarioEstaLogado()) {
    header("Location: tables/dashboard.php");
    $_SESSION["success"] = "Bem Vindo ao Projek Manager";
  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projek | Gestão da Qualidade Total </title>

    <link rel="shortcut icon" type="image/x-icon" href="ico/favicon.ico"/>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="aut/login.php" method="post" autocomplete="off">
              <h1>Projek Manager</h1>
              <div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
              </div>
              <div>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
              </div>
              <div>
                
                <input type="submit" class="btn btn-default submit login" value="Login">
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
