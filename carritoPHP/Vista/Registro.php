<!DOCTYPE html>
<?php
include '../DAO/MetodosDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- plantilla -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carrito de Compras</title>

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
    <!-- Estilos-->
    <link href="../css/modern-business.css" rel="stylesheet">
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
              <a class="nav-link" href="catalogo.php">Catalogo</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <!-- fin de menu -->
        
        <h3 align="center">Registro de Usuarios</h3>
        <form action="" method="get">
            <table border="0" width="300" align="center">
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="txtNom"></td>
                </tr><tr>
                    <td>Correo: </td>
                    <td><input type="text" name="txtCor"></td>
                </tr><tr>
                    <td>Password: </td>
                    <td><input type="password" name="txtPas"></td>
                </tr><tr>
                    <th colspan="2"><input type="submit" value="Registrar" name="btnRegistrar"></th>
                </tr>
            </table>
        </form>
        </table>

        <?php
        
        if(isset($_REQUEST['btnRegistrar'])){
            $nom=$_REQUEST['txtNom'];
            $cor=$_REQUEST['txtCor'];
            $pas=$_REQUEST['txtPas'];
            
        $objCli=new Cliente(0, $nom, $cor, $pas);
            
            $Metodos=new MetodosDAO();
            $i=$Metodos->RegistrarCliente($objCli);
            
        if($i==1)
           header("Location: Catalogo.php");
        else
            echo "<h4 align=center>Registro No Insertado</h4>";  
        
        }
        
        ?>
        
    </body>
</html>
