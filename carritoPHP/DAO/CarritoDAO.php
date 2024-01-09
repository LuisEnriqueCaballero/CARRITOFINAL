<?php
session_start();

$op=$_REQUEST['op'];
include './MetodosDAO.php';
echo $op;

switch ($op){
    case 1:
        unset($_SESSION['lista']);
        $objMetodos=new MetodosDAO();
        $lista=$objMetodos->ListarProductos();
        $_SESSION['lista']=$lista;
        header("Location: ../Vista/Catalogo.php");
        break;
    case 2:
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];
        }else{
            $id=1;
        }
        if(isset($_REQUEST['accion'])){
            $accion=$_REQUEST['accion'];
        }else{
            $accion='vacio';
        }
        switch($accion){
            case'agregar':
                $can=$_REQUEST['txtCan'];
                if(isset($_SESSION['carrito'][$id]))
                    $_SESSION['carrito'][$id]+=$can;
                else
                    $_SESSION['carrito'][$id]=$can;
            break;
            case 'eliminar':
                if(isset($_SESSION['carrito'][$id])){
                    $_SESSION['carrito'][$id]--;
                if($_SESSION['carrito'][$id]==0)
                    unset($_SESSION['carrito'][$id]);}
            break;
            case 'vacio':
                unset($_SESSION['carrito']);
                break;
            }
       header("Location: ../Vista/Carrito.php");
       break;
   
 }

?>
