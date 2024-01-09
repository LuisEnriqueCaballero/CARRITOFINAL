<!DOCTYPE html>
<?php
session_start();
$lista=$_SESSION['lista'];

?>

<html>
    <head>
        <meta charset="UTF-8">

        <!-- plantilla -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carrito de Compras</title>

    <!-- Estilos-->
    <link href="../css/modern-business.css" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
    
    </head>
    <body>       
        <!-- Menu  -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="http://www.formandocodigo.com">Formando Codigo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Registro.php">Registrarse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Carrito.php">Carrito</a>
            </li>
            <?php
            if(!isset($_SESSION['acceso']) || $_SESSION['acceso']<>true){ 
            ?>
            <li class="nav-item">
                 <a  class="nav-link" href="" data-toggle="modal" 
                     data-target="#modalLogin">Iniciar Sesion</a>
            </li>
            <?php
            }else{
                ?>
            <li class="nav-item">
                 <a  class="nav-link">Bienvenido <?php echo $_SESSION['nombre'];?></a>
            </li>
             <li class="nav-item">
                 <a href="Cerrar.php" class="nav-link">Cerrar Sesion</a>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
        <!-- fin de menu -->
        
        
        <!-- banner -->
        <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('../Imagenes/dos.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Cocina</h3>
              <p>Todo para su cocina.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../Imagenes/uno.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Sala Comedor</h3>
              <p>Calidad y Confort.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../Imagenes/tres.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Dormitorio</h3>
              <p>Duerme con Placer y cmodidad.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
        <!-- fin de banner -->
        
        
        
<h2 align="center"></h2>
<div class="container">
<table border="0" width="1000" align="center" class="table">
    <tr align='center'>
<?php
 $num=0;
   foreach ($lista as $REGISTRO){
         if($num==3){
             echo "<tr align=center>";
             $num=1;
         }else
             $num++;
?>
 <th><img src="../Imagenes/<?php echo $REGISTRO[6]?>" width=180 height=180>
     <br>
     <h6>Producto: <?php echo $REGISTRO[1]?></h6>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="mostrarDetalle(<?php echo $REGISTRO[0];?>)">
  Agregar
</button></th>      
<?php
    }
?>
        </table>
</div>
<!-- Modal Detalle-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body" id="mostrar">
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<!-- Modal Login-->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLoginLabel">Login de Usuario</h5>
      </div>
         <form action="Valida.php">
         <div class="modal-body">
         
              <table border="0" align="center">
                  <tr>
                      <td>Usuario: </td>
                      <td><Input type="text" name="txtUsu"></td>
                  </tr><tr>
                      <td>Password: </td>
                      <td><Input type="text" name="txtPas"></td>
                  </tr>
              </table>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="submit()">Iniciar Sesion</button>
      </div>
             <h6 align="center"><a href="Registro.php">Registarse</a></h6>
        </form>
    </div>
  </div>
</div>


<script type="text/javascript">

var resultado=document.getElementById("mostrar");

function mostrarDetalle(cod){
    //validamos navegador que estamos utilizando
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState===4 && xmlhttp.status===200){
            resultado.innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","detalle.php?cod="+cod,true);
    xmlhttp.send();
}

</script>
  
  <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Luis enrique 2020</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    
    
    </body>
</html>
