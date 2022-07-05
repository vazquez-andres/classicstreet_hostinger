<?php 

session_start(); 

$nombre = $_SESSION['nombre'];

include 'controlador/conexion_bd.php';

$consulta="SELECT * FROM usuarios where usuario='$nombre' ";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']=='1'){ //administrador
  

    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Sistema de Administración Classic Street</title>
        <script type="text/javascript" src="script.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        
        <link href="./main.css" rel="stylesheet"></head>
        <body>
            <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
                <div class="app-header header-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="app-header__content">
                        <div class="app-header-left">
                            
                            </div>
                            <div class="app-header-right">
                                <div class="header-btn-lg pr-0">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="btn-group">
                                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/0.jpg" alt="">
                                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                                    </a>
                                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                        <a href="controlador/salir.php"> <button type="button" tabindex="0" class="dropdown-item">Cerrar Sesion</button> </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left  ml-3 header-user-info">
                                                <div class="widget-heading">
                                                 <?php  
                                                 
                                                 $nombre = $_SESSION['nombre'];
                                                 echo $nombre;
                                                 
                                                 ?>
                                             </div>
                                             <div class="widget-subheading">
                                                ADMINISTRADOR <BR>Sesion Iniciada
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>        </div>
                        </div>
                    </div>       
                    
                    <div class="app-main">
                        <div class="app-sidebar sidebar-shadow">
                            <div class="app-header__logo">
                                <div class="logo-src"></div>
                                <div class="header__pane ml-auto">
                                    <div>
                                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="app-header__mobile-menu">
                                <div>
                                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>    <div class="scrollbar-sidebar">
                                <div class="app-sidebar__inner">
                                    <ul class="vertical-nav-menu">
                                        <li class="app-sidebar__heading">INICIO</li>
                                        <li>
                                            <a href="index_admin.php" class="mm-active">
                                                <i class="metismenu-icon pe-7s-home"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="app-sidebar__heading">Ventas</li>
                                        <li>

                                            <a href="ventas.php" >
                                                <i class="metismenu-icon pe-7s-cart"></i>
                                                Vender
                                            </a>
                                        </li>
                                        <li class="app-sidebar__heading">Reportes</li>
                                        <li>

                                            <a href="reportes.php" >
                                                <i class="metismenu-icon pe-7s-id"></i>
                                                Generar Reportes
                                            </a>
                                        </li>
                                        <li class="app-sidebar__heading">Usuarios</li>
                                        <li>
                                            <a href="agregar_usuarios.php">
                                                <i class="metismenu-icon pe-7s-add-user"></i>
                                                Agregar Usuarios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="restablecer_password.php">
                                                <i class="metismenu-icon pe-7s-key"></i>
                                                Restablecer Password
                                            </a>
                                        </li>
                                        <li class="app-sidebar__heading">Stock</li>
                                        <li>
                                            <a href="nuevo_stock.php">
                                                <i class="metismenu-icon pe-7s-upload"></i>
                                                Agregar Stock
                                            </a>
                                        </li>
                                        <li>
                                            <a href="modificar_stock.php">
                                                <i class="metismenu-icon pe-7s-refresh"></i>
                                                Modificar Stock
                                            </a>
                                        </li>
                                        <li class="app-sidebar__heading">SEGURIDAD</li>
                                        <li>
                                            <a href="miHome.php">
                                                <i class="metismenu-icon pe-7s-camera"></i>
                                                Xiaomi Mi Home App
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>    <div class="app-main__outer">
                            <div class="app-main__inner">
                                <div class="app-page-title">
                                    <div class="page-title-wrapper">
                                        <div class="page-title-heading">
                                            <div class="page-title-icon">
                                                <i class="pe-7s-camera icon-gradient bg-mean-fruit">
                                                </i>
                                            </div>
                                            <div>Sistema de Vigilancia
                                                <div class="page-title-subheading">Xiaomi Mi Home App
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>           
                                 
                                

                                <div class="row">
                                    <div class="col-md-12">
                                           
                                               
                                                <center>
                                               <input type="image" src="https://ds-blobs-2.cdn.devapps.ru/24740646.png" width="400" onclick="abrir()" /> 
                                                </center>
                                       

                                </div>


                                
                            </div>

                            
                        </div>

                        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                    </div>
                </div>
                <script type="text/javascript" src="./assets/scripts/main.js"></script>
                <script type="text/javascript" src="controlador/script.js"></script>

            </body>
                </html>

                <?php 
            }else{

                header('Location:index.php');

            }

            ?>

<script type="text/javascript" charset="utf-8"> 
function abrir() {

window.location = "MiHome://MiHome.app";
}

</script>