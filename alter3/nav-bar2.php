<?php
/*
 * Proyecto: Complete Cargo
 * File: nav-bar.php
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */
?>
<nav class="navbar navbar-default wrapper navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header col-lg-1">
            <a class="navbar-brand " href="#">
                <img src="img/complete_logo_119x79.png" width="65" height="47" alt="">
            </a>
            <!-- navbar-toggle collapsed para que se muestre como un boton -->
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarNavDropdown" aria-expanded="false" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-right col-lg-11" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                <li>
                    <a class="active" href="aprende.php">Aprende</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                       role="button" aria-haspopup="true" aria-expanded="false">
                        Registrarse
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu"> 
                        <li><a  href="generador1.php">Cliente</a></li>
                        <li><a  href="conductor1.php">Transportista</a></li>
                    </ul>
                </li>
                <li class="iniciar" >
                    <a  href="login.php">Iniciar Sesión</a>
                </li>
                <li >
                    <a class="active" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

