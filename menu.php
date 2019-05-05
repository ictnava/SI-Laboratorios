<?php
  include("barraEstado.php");
?>

<div class="nav-side-menu">
    <div class="brand"><img src="img/LogoUASLP.png" class="img-fluid" alt="Responsive image">Laboratorios UASLP</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="Becarios.php">
                  <i class="fas fa-users"></i>Becarios
                  </a>
                </li>
                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a href="#"><i class="fas fa-user-graduate"></i>Alumnos<i class="fas fa-sort-down"></i></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="regEntrada.php"><i class="fas fa-user-plus"></i>Registro de Entrada</a></li>
                    <li><a href="consultaEntradas.php"><i class="fas fa-search"></i>Consulta de Entradas</a></li>
                    <li><a href="reporteEntrMes.php"><i class="fas fa-search"></i>Reporte Entradas Mes</a></li>
                </ul>
                <li>
                  <a href="Laboratorios.php">
                  <i class="fas fa-flask"></i>Laboratorios
                  </a>
                </li>
                <li data-toggle="collapse" data-target="#inventario" class="collapsed">
                  <a href="#">
                  <i class="fas fa-cash-register"></i>Inventario <i  class="fas fa-sort-down"></i>
                  </a>
                </li>
                <ul class="sub-menu collapse" id ="inventario">
                  <li><a href="regInventario.php"><i class="fas fa-user-plus"></i>Agregar a inventario</a></li>
                  <li><a href="inventario.php"><i class="fas fa-search"></i>Consulta de Entradas</a></li>
                </ul>
                <li  data-toggle="collapse" data-target="#anuncio" class="collapsed">
                  <a href="#"><i class="fas fa-images"></i>Anuncio<i class="fas fa-sort-down"></i></a>
                </li>
                <ul class="sub-menu collapse" id="anuncio">
                    <li><a href="Altaanuncios.php"><i class="fas fa-image"></i>Alta de Anuncios</a></li>
                    <li><a href="consultaAnuncios.php"><i class="fas fa-search"></i>Consulta de Anuncios</a></li>
                    <li><a href="#"><i class="fas fa-search"></i>Reporte Anuncios Mes</a></li>
                </ul>

                <li>
                  <a href="articulos.php">
                  <i class="fas fa-folder-plus"></i>Articulos
                  </a>
                </li>
            </ul>
     </div>
</div>