<?php

include '../Utils/ConexionDB.php';
include '../Beans/Cliente.php';
include '../Beans/DetalleVenta.php';
include '../Beans/Venta.php';
include '../Beans/Producto.php';

class MetodosDAO {
   
        public function ListarProductos(){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select * from productos");
        $res->execute();
        foreach ($res as $row)
        {
            $lista[]=$row;
        }
        return $lista;
    }
    
    public function ListarProductosCod($cod){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select * from productos where codPro=$cod");
        $res->execute();
        foreach ($res as $row)
        {
            $lista=$row;
        }
        return $lista;
    }
    
    public function RegistrarCliente(Cliente $cli){
        $i=0;
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("INSERT  INTO clientes VALUES(0,'$cli->nomCli','$cli->correo',
                '$cli->pas');");
        $i=$res->execute();
        return  $i;
    }
    
    public function validar(Cliente $cli){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select * from clientes "
                . "where correo='$cli->correo' and pas='$cli->pas'");
        $res->execute();
        foreach ($res as $row)
        {
            $lista=$row;
        }
        return $lista;
    }
    
    public function registrarVenta(Venta $venta){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("INSERT  INTO venta VALUES(null,"
                . "'$venta->codCli','$venta->fecha')");
        $res->execute();
    }
    
    public function numeroVenta(){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select max(numVenta) from venta");
        $res->execute();
        foreach ($res as $row)
        {
            $num=$row;
        }
        return $num;
    }
    public function detalleVenta(DetalleVenta $det){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("INSERT  into detalleventa VALUES($det->num,"
                . "'$det->codpro','$det->can')");
        $res->execute();
    }
    
    public function agregarProducto(Producto $pro){
        
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("INSERT into productos VALUES(null,'$pro->des',$pro->pre,"
                . "$pro->stock,'$pro->estado','$pro->detalle','$pro->imagen')");
        $res->execute();        
    }
    
    public function eliminarProducto($cod){
        
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("delete from productos where codpro=$cod");
        $res->execute();        
    }
    public function editarProducto(Producto $pro){
        
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res=$cn->prepare("update productos set descripcion='$pro->des',precio=$pro->pre,"
                . "stock=$pro->stock,estado='$pro->estado',detalle='$pro->detalle',imagen='$pro->imagen'"
                . " where codpro=$pro->cod");
        $res->execute();        
    }
    
    public function ListarPedidos(){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select v.numpedido,v.codCli,c.nombre,v.fecha"
                . " from pedido v inner join clientes c on v.codcli=c.codcli");
        $res->execute();
        foreach ($res as $row)
        {
            $lista[]=$row;
        }
        return $lista;
    }
    
    public function ListarPedidosNum($num){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select d.numpedido,d.codpro,p.descripcion,p.precio,d.can"
                . " from detallepedido d inner join productos p on d.codpro=p.codpro where numpedido=$num");
        $res->execute();
        foreach ($res as $row)
        {
            $lista[]=$row;
        }
        return $lista;
    }
       public function ListarClientes(){
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        $res = $cn->prepare("select * from clientes");
        $res->execute();
        foreach ($res as $row)
        {
            $lista[]=$row;
        }
        return $lista;
    }
}
