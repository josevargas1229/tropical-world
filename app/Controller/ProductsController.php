<?php
include_once('app/Model/ProductModel.php');
    class ProductsController{
        private $vista;
        private $modelo;
        public function index(){
            $modelo=new ProductModel();
            $datos=$modelo->getAll();
            $vista="app/View/admin/products/IndexProductsView.php";
            include_once("app/View/PlantillaView.php");
        }
        //creamos el metodo para manadar a llamar a la vista de agregar usuario
        public function CallFormAdd(){
            $modelo=new ProductModel();
            $porciones=$modelo->getPorciones();
            $modelo=new ProductModel();
            $presentaciones=$modelo->getPresentations();
            $vista='app/View/admin/products/AddProductsView.php';
            include_once('app/View/PlantillaView.php');
        }
        //creamos el metodo para agregar un usuario
        public function Add(){
            //verificamos si el metodo de envio de datos es POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                    $datos=array(
                        'nombre'=>$_POST['nombre'],
                        'descripcion'=>$_POST['descripcion'],
                        'id_porcion'=>$_POST['porcion'],
                        'id_presentacion'=>$_POST['presentacion']
                    );
                    //llamamos al metodo del modelo que agrega al usuario a la base de datos
                    $modelo=new ProductModel();
                    $res=$modelo->insertProduct($datos);
                    //podríamos poner un if que dependiendo de si se insertó o no va a redireccionar a la pantalla de index con los datos actualizados o me regresa al formulario para reintentar
                    //redireccionamos al index de usuarios
                    header("Location:http://localhost/proyecto/?c=ProductsController&m=index");
            }
        }
        //Creamos el metodo para llamar a la vista de editar usuario
        public function CallFormEdit(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del usuario a editar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del usuario a editar
                $modelo=new ProductModel();
                $product=$modelo->getByID($id);
                $modelo=new ProductModel();
                $porciones=$modelo->getPorciones();
                $modelo=new ProductModel();
                $presentaciones=$modelo->getPresentations();
                //llamamos a la vista de editar usuario
                $vista='app/View/admin/products/EditProductsView.php';
                include_once('app/View/PlantillaView.php');
            }
        }
        //Creamos el metodo para editar un usuario
        public function Edit(){
            //verificamos que el metodo de envio de datos sea POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                $datos=array(
                    'nombre'=>$_POST['nombre'],
                    'descripcion'=>$_POST['descripcion'],
                    'id_porcion'=>$_POST['porcion'],
                    'id_presentacion'=>$_POST['presentacion'],
                    'id'=>$_POST['id_producto']
                );
                //llamamos al metodo del modelo que actualiza los datos del usuario
                $modelo=new ProductModel();
                $modelo->updateProduct($datos);
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=ProductsController&m=index");
            }
        }

        //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
        //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript
        public function Delete(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del usuario a eliminar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que elimina al usuario de la base de datos
                $modelo=new ProductModel();
                $modelo->deleteRow($id);
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=ProductsController&m=index");
            }
        }
    }
    
?>