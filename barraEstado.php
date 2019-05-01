<?php
 if(isset($_SESSION["Nombre"])):
?>
<nav class="navbar navbar-dark bg-dark" style="background-color: #23282e !important;">
  <a class="navbar-brand"> </a>
  <form class="form-inline" action="salir.php">
    <i id="iusuario" class="far fa-user mr-sm-3"> </i>
    <input id="brEstadNom" class="form-control mr-sm-4 bg-dark text-white" type="text" value="<?php echo $_SESSION['Nombre']; ?>" readonly>    
    <button id="btnSalir" class="btn btn-dark my-2 my-sm-0 " type="submit">Salir...</button>
  </form>
</nav>
 <?php endif; ?>