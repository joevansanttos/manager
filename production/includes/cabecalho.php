<?php
  require_once "logica.php";
  require_once "../class/Conexao.php";
  require_once "../dao/UsuarioDao.php"; 
  error_reporting(E_ALL ^ E_NOTICE);
  ob_start();
  session_start();
  verificaUsuario();
  $conexao = new Conexao();
  $email = $_SESSION["usuario_logado"];
  $usuarioDao = new UsuarioDao($conexao);
  $usuario = $usuarioDao->buscaUsuarioEmail($email);
  $usuario_id = $usuario->getId();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projek | Gestão da Qualidade Total</title>
    <link rel="shortcut icon" type="image/x-icon" href="../ico/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../../vendors/lou-multi-select/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Sidebar-->      
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-rocket"></i><span> Projek Manager</span>
              </a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php                  
                  $sql = "SELECT * FROM profileimg WHERE usuario_id = $usuario_id";
                  $sth = $conexao->conecta()->query($sql);
                  $result=mysqli_fetch_array($sth);
                  if($result != null){
                    echo '<img class="img-responsive img-circle profile_img" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
                  }else{
                ?>
                <img class="img-responsive img-circle profile_img" src="../images/user.png">
                <?php    
                  }                            
                  
                ?>
                  
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2><?=$usuario->getNome()?></h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Menu<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="dashboard.php">Dashboard</a></li>
                    </ul>
                  </li>
                <?php
                  if($usuario->getProfissao()->getId() != 4){
                ?>                  
                  <li><a><i class="fa fa-users"></i> Usuários<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="usuarios.php">Usuários</a></li>
                      <li><a href="consultores.php">Consultores</a></li>
                      <li><a href="partners.php">Partners</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i> Tarefas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="atividades.php">Tarefas</a></li>                      
                    </ul>
                  </li>
                <?php
                  }
                ?>
                  <li><a><i class="fa fa-cart-plus"></i> Produtos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="produtos.php">Produtos Cadastrados</a></li>
                    </ul>
                  </li>                  
                  <li><a><i class="fa fa-briefcase"></i> Negócios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="market.php">Market</a></li>
                      <li><a href="leads.php">Leads</a></li>
                      <li><a href="suspects.php">Suspects</a></li>
                      <li><a href="prospects.php">Prospects</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file" aria-hidden="true"></i> Contratos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contratos.php">Contratos</a></li>                      
                    </ul>
                  </li>
                <?php
                  if($usuario->getProfissao()->getId() != 4){
                ?> 
                  <li><a><i class="fa fa-comments" aria-hidden="true"></i> Pós-Venda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="pos-venda.php">Pós-Venda</a></li>                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Consultoria <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="projetos.php">Projetos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contratos_pendentes.php">Contratos Pendentes</a></li>
                      <li><a href="contratos_aprovados.php">Contratos Aprovados</a></li>
                      <li><a href="transacoes.php">Transações</a></li>
                    </ul>
                  </li>
                <?php
                  }
                ?>                     
                </ul>
              </div>
            </div>
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>          
          </div>
        </div>      
        <!-- Col-->
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php
                      if($result != null){
                        echo '<img alt="" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
                      }else{
                    ?>
                    <img src="../images/user.png" alt="">
                    <?php    
                      }                            
                    ?>              
                    <?=$usuario->getNome()?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="usuario-perfil.php"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Configurações</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="../aut/logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation --> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
