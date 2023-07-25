<?php
session_start();
include_once('app/Model/InventoryModel.php');
    class InventoryController{
        private $vista;
        private $modelo;
        public function index(){
            $modelo=new InventoryModel();
            $datos=$modelo->getAll();
            
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                $vista="app/View/admin/inventory/IndexProductsView.php";
                include_once("app/View/PlantillaView.php");
            }else{
                $vista="app/View/HomeView.php";
                include_once("app/View/Plantilla2View.php");
            }
        }
        //creamos el metodo para manadar a llamar a la vista de agregar usuario
        public function CallFormAdd(){
            $modelo=new InventoryModel();
            $porciones=$modelo->getPorciones();
            $modelo=new InventoryModel();
            $presentaciones=$modelo->getPresentations();
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                $vista='app/View/admin/inventory/AddProductsView.php';
                include_once("app/View/PlantillaView.php");
            }else{
                $vista="app/View/HomeView.php";
                include_once("app/View/Plantilla2View.php");
            }
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
                    );if(isset($_FILES['avatar']) && $_FILES['avatar']['error']===UPLOAD_ERR_OK){
                        //obtenemos los datos de la imagen que cargamos en el formulario
                        $nombreArchivo=$_FILES['avatar']['name'];
                        $tipoArchivo=$_FILES['avatar']['type'];
                        $tamanoArchivo=$_FILES['avatar']['size'];
                        $rutaTemporal=$_FILES['avatar']['tmp_name'];
                        //validamos tipos de archivos permitidos
                        $extenciones=array('jpg','jpeg','png');
                        $extencion=pathinfo($nombreArchivo,PATHINFO_EXTENSION);
                        if(!in_array($extencion,$extenciones)){
                            echo "El formato de la imagen no es válido";
                            exit;
                        }
                        //definimos el tamaño de la imagen a cargar
                        $tamanomax=3*1024*1024;
                        if($tamanoArchivo>$tamanomax){
                            echo "Ya mejor sube un video o una lona";
                            exit;
                        }
                        //definimos el nombre que va a tener nuestro archivo
                        $nombreArchivo=uniqid('Product_').'.'.$extencion;
                        //definimos la ruta destino
                        $rutadestino="src/img/products/".$nombreArchivo;
                        if(!move_uploaded_file($rutaTemporal,$rutadestino)){
                            echo "Error al momento de cargar la imagen al servidor";
                            exit;
                        }
                        $datos['avatar']=$nombreArchivo;
                    }
                    //llamamos al metodo del modelo que agrega al usuario a la base de datos
                    $modelo=new InventoryModel();
                    $res=$modelo->insertProduct($datos);
                    //podríamos poner un if que dependiendo de si se insertó o no va a redireccionar a la pantalla de index con los datos actualizados o me regresa al formulario para reintentar
                    //redireccionamos al index de usuarios
                    header("Location:http://localhost/proyecto/?c=InventoryController&m=index");
            }
        }
        //Creamos el metodo para llamar a la vista de editar usuario
        public function CallFormEdit(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del usuario a editar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del usuario a editar
                $modelo=new InventoryModel();
                $product=$modelo->getByID($id);
                $modelo=new InventoryModel();
                $porciones=$modelo->getPorciones();
                $modelo=new InventoryModel();
                $presentaciones=$modelo->getPresentations();
                //llamamos a la vista de editar usuario
                if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
                //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                    $vista='app/View/admin/inventory/EditProductsView.php';
                    include_once("app/View/PlantillaView.php");
                }else{
                    $vista="app/View/HomeView.php";
                    include_once("app/View/Plantilla2View.php");
                }
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
                if(isset($_FILES['avatar']) && $_FILES['avatar']['error']===UPLOAD_ERR_OK){
                    //obtenemos los datos de la imagen que cargamos en el formulario
                    $nombreArchivo=$_FILES['avatar']['name'];
                    $tipoArchivo=$_FILES['avatar']['type'];
                    $tamanoArchivo=$_FILES['avatar']['size'];
                    $rutaTemporal=$_FILES['avatar']['tmp_name'];
                    //validamos tipos de archivos permitidos
                    $extenciones=array('jpg','jpeg','png');
                    $extencion=pathinfo($nombreArchivo,PATHINFO_EXTENSION);
                    if(!in_array($extencion,$extenciones)){
                        echo "El formato de la imagen no es válido";
                        exit;
                    }
                    //definimos el tamaño de la imagen a cargar
                    $tamanomax=3*1024*1024;
                    if($tamanoArchivo>$tamanomax){
                        echo "Ya mejor sube un video o una lona";
                        exit;
                    }
                    //definimos el nombre que va a tener nuestro archivo
                    $nombreArchivo=uniqid('Product_').'.'.$extencion;
                    //definimos la ruta destino
                    $rutadestino="src/img/products/".$nombreArchivo;
                    if(!move_uploaded_file($rutaTemporal,$rutadestino)){
                        echo "Error al momento de cargar la imagen al servidor";
                        exit;
                    }
                    //borramos la imagen anterior
                    $this->modelo=new InventoryModel();
                    $anterior=$this->modelo->getById($_POST['id_producto']);
                    if(!empty($anterior['avatar'])){
                        unlink('app/src/img/products/'.$anterior['avatar']);
                    }
                    $datos['avatar']=$nombreArchivo;
                }else{
                    $datos['avatar']=$_POST['ava'];
                }
                //llamamos al metodo del modelo que actualiza los datos del usuario
                $modelo=new InventoryModel();
                $modelo->updateProduct($datos);
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=InventoryController&m=index");
            }
        }

        //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
        //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript
        public function Delete(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del usuario a eliminar
                $id=$_GET['id'];
                //creo la instancia para obtener los datos a eliminar
                $this->modelo=new InventoryModel();
                $anterior=$this->modelo->getById($id);
                //llamamos al metodo del modelo que elimina al usuario de la base de datos
                $modelo=new InventoryModel();
                $modelo->deleteRow($id);
                if(!empty($anterior['avatar'])){
                    unlink('app/src/img/products/'.$anterior['avatar']);
                }
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=ProductsController&m=index");
            }
        }
    }
    
?>