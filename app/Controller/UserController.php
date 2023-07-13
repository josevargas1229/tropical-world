<?php
include_once('app/Model/UserModel.php');
    class UserController{
        private $vista;
        private $modelo;
        
        public function index(){
            $modelo=new UserModel();
            $datos=$modelo->getAll();
            $vista="app/View/admin/users/IndexUserView.php";
            include_once("app/View/PlantillaView.php");
        }
    
        //creamos el metodo para manadar a llamar a la vista de agregar usuario
        public function CallFormAdd(){
            $modelo=new UserModel();
            $niveles=$modelo->getNivel();
            $modelo=new UserModel();
            $localidades=$modelo->getLocalidad();
            $vista='app/View/admin/users/AddUserView.php';
            include_once('app/View/PlantillaView.php');
        }

        //creamos el metodo para agregar un usuario
        public function Add(){
            //verificamos si el metodo de envio de datos es POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                    $datos=array(
                        'usuario'=>$_POST['usuario'],
                        'correo'=>$_POST['email'],
                        'contrasena'=>$_POST['contrasena'],
                        'cliente'=>$_POST['nombre'],
                        'aMaterno'=>$_POST['aMaterno'],
                        'aPaterno'=>$_POST['aPaterno'],
                        'telefono'=>$_POST['telefono'],
                        'calle'=>$_POST['calle'],
                        'nInt'=>$_POST['nInt'],
                        'nExt'=>$_POST['nExt'],
                        'id_localidad'=>$_POST['localidad'],
                        'id_colonia'=>$_POST['colonia']
                    );
                    //llamamos al metodo del modelo que agrega al usuario a la base de datos
                    $modelo=new UserModel();
                    $res=$modelo->insertUser($datos);
                    //podríamos poner un if que dependiendo de si se insertó o no va a redireccionar a la pantalla de index con los datos actualizados o me regresa al formulario para reintentar
                    //redireccionamos al index de usuarios
                    header("Location:http://localhost/proyecto/?c=UserController&m=index");
            }
        }

        //Creamos el metodo para llamar a la vista de editar usuario
        public function CallFormEdit(){
            //verificamos que el metodo de envio de datos sea GET
            if($_SERVER['REQUEST_METHOD']=='GET'){
                //obtenemos el id del usuario a editar
                $id=$_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del usuario a editar
                $modelo=new UserModel();
                $cliente=$modelo->getClienteById($id);
                $modelo=new UserModel();
                $user=$modelo->getUserById($id);
                $modelo=new UserModel();
                $localidades=$modelo->getLocalidad();
                $modelo=new UserModel();
                $colonias=$modelo->getColonia();
                //llamamos a la vista de editar usuario
                $vista='app/View/admin/users/EditUserView.php';
                include_once('app/View/PlantillaView.php');
            }
        }
        //Creamos el metodo para editar un usuario
        public function Edit(){
            //verificamos que el metodo de envio de datos sea POST
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //almacenamos los datos enviados por el formulario en un arreglo
                $datos=array(
                    'id_usuario'=>$_POST['id_usuario'],
                    'contrasena'=>$_POST['contrasena'],
                    'cliente'=>$_POST['nombre'],
                    'aMaterno'=>$_POST['aMaterno'],
                    'aPaterno'=>$_POST['aPaterno'],
                    'telefono'=>$_POST['telefono'],
                    'calle'=>$_POST['calle'],
                    'nInt'=>$_POST['nInt'],
                    'nExt'=>$_POST['nExt'],
                    'id_localidad'=>$_POST['localidad'],
                    'id_colonia'=>$_POST['colonia']
                );
                //llamamos al metodo del modelo que actualiza los datos del usuario
                $modelo=new UserModel();
                $modelo->updateUser($datos);
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=UserController&m=index");
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
                $modelo=new UserModel();
                $modelo->deleteRow($id);
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=UserController&m=index");
            }
        }
    }
?>