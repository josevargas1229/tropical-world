<?php
include_once('app/Model/UserModel.php');
    class UserController{
        private $vista;
        private $modelo;
        
        public function index(){
            $modelo=new UserModel();
            $datos=$modelo->getAll();
            session_start();
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                $vista="app/View/admin/users/IndexUserView.php";
                include_once("app/View/PlantillaView.php");
            }else{
                $vista="app/View/HomeView.php";
                include_once("app/View/Plantilla2View.php");
            }
            
        }
    
        //creamos el metodo para manadar a llamar a la vista de agregar usuario
        public function CallFormAdd(){
            $modelo=new UserModel();
            $niveles=$modelo->getNivel();
            $modelo=new UserModel();
            $localidades=$modelo->getLocalidad();
            session_start();
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                $vista='app/View/admin/users/AddUserView.php';
                include_once("app/View/PlantillaView.php");
            }else{
                $vista='app/View/admin/users/AddUserView.php';
                include_once("app/View/Plantilla2View.php");
            }
            
            
        }
        public function getColonias(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
            $localidad=$_POST['localidadID'];
            }
            $modelo= new UserModel();
            $colonias=$modelo->getColonia($localidad);
            header('Content-Type: application/json');
            echo json_encode($colonias);
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
                        'rfc'=>$_POST['rfc'],
                        'id_colonia'=>$_POST['colonia']
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
                            echo "Ya mejor sube un video o una lona nmms";
                            exit;
                        }
                        //definimos el nombre que va a tener nuestro archivo
                        $nombreArchivo=uniqid('Avatar_').'.'.$extencion;
                        //definimos la ruta destino
                        $rutadestino="src/img/avatars/".$nombreArchivo;
                        if(!move_uploaded_file($rutaTemporal,$rutadestino)){
                            echo "Error al momento de cargar la imagen al servidor";
                            exit;
                        }
                        $datos['avatar']=$nombreArchivo;
                    }
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
                $direccion=$modelo->getDireccionByID($cliente['id_direccion']);
                $modelo=new UserModel();
                $colonias=$modelo->getColoniaByID($direccion['id_colonia']);
                //llamamos a la vista de editar usuario
                
                session_start();
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                $vista='app/View/admin/users/EditUserView.php';
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
                    'id'=>$_POST['id_usuario'],
                    'contrasena'=>$_POST['contrasena'],
                    'cliente'=>$_POST['nombre'],
                    'aMaterno'=>$_POST['aMaterno'],
                    'aPaterno'=>$_POST['aPaterno'],
                    'telefono'=>$_POST['telefono'],
                    'calle'=>$_POST['calle'],
                    'nInt'=>$_POST['nInt'],
                    'nExt'=>$_POST['nExt'],
                    'rfc'=>$_POST['rfc'],
                    'id_colonia'=>$_POST['colonia']
                );
                //rescatamos la imagen y la procesamos
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
                        echo "Ya mejor sube un video o una lona nmms";
                        exit;
                    }
                    //definimos el nombre que va a tener nuestro archivo
                    $nombreArchivo=uniqid('Avatar_').'.'.$extencion;
                    //definimos la ruta destino
                    $rutadestino="src/img/avatars/".$nombreArchivo;
                    if(!move_uploaded_file($rutaTemporal,$rutadestino)){
                        echo "Error al momento de cargar la imagen al servidor";
                        exit;
                    }
                    //borramos la imagen anterior
                    $this->modelo=new UserModel();
                    $anterior=$this->modelo->getUserById($_POST['id_usuario']);
                    if(!empty($anterior['avatar'])){
                        unlink('app/src/img/avatars/'.$anterior['avatar']);
                    }
                    $datos['avatar']=$nombreArchivo;
                }else{
                    $datos['avatar']=$_POST['ava'];
                }
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
                //creo la instancia para obtener los datos a eliminar
                $this->modelo=new UserModel();
                $anterior=$this->modelo->getById($id);
                //llamamos al metodo del modelo que elimina al usuario de la base de datos
                $modelo=new UserModel();
                $modelo->deleteRow($id);
                if(!empty($anterior['avatar'])){
                    unlink('app/src/img/avatars/'.$anterior['avatar']);
                }
                //redireccionamos al index de usuarios
                header("Location:http://localhost/proyecto/?c=UserController&m=index");
            }
        }
        public function CallFormLogin(){
            
            session_start();
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
            $vista="app/View/admin/LoginView.php";
                include_once("app/View/PlantillaView.php");
            }else{
                $vista="app/View/admin/LoginView.php";
                include_once("app/View/Plantilla2View.php");
            }
        }
        public function Login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $this->modelo=new UserModel();
                $usuario=$this->modelo->getCredentials($_POST['user'],$_POST['password']);
                if($usuario==false){
                    $vista="app/View/admin/LoginView.php";
                    include_once("app/View/Plantilla2View.php");
                }else{
                    session_start();
                    $_SESSION['logedin']=true;
                    $_SESSION['avatar']=$usuario['avatar'];
                    $_SESSION['nombre']=$usuario['nombre'];

                    $vista="app/View/HomeView.php";
                    include_once("app/View/PlantillaView.php");
                }
            }
        }
        public function Logout(){
            session_start();
            session_destroy(); // Destruye la sesión actual
            header("Location: http://localhost/proyecto/?c=DefaultController&m=index"); // Redirige al usuario a la página de inicio de sesión
            exit();
        }
    }
?>