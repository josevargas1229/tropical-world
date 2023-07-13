<?php
    class UserModel{
        //creamos la instancia para conectar con la base de datos
        private $dbconnection;

        //creamos el constructor para conectar desde ahí con la base de datos
        public function __construct(){
            //llamamos a la clase conexión para vincular el model user con la base de datos
            require_once('app/config/BDConnection.php');
            //creamos la instancia de la conexión a la base de datos en dbconnection
            $this->dbconnection=new BDConnection();
        }

        //vamos a crear todos loss métodos que requieran conexión a la base de datos en la instancia user
        public function getAll(){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM users';
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //creamos un arreglo para manipular a result
            $users=array();
            //vamos a descomponer a result desde un ciclo
            while($user=$result->fetch_assoc()){
                $users[]=$user;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "users"
            return $users;
        }
        public function getNivel(){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM niveles_permisos';
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //creamos un arreglo para manipular a result
            $nivels=array();
            //vamos a descomponer a result desde un ciclo
            while($nivel=$result->fetch_assoc()){
                $nivels[]=$nivel;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "users"
            return $nivels;
        }
        public function getLocalidad(){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM localidades';
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //creamos un arreglo para manipular a result
            $localidades=array();
            //vamos a descomponer a result desde un ciclo
            while($localidad=$result->fetch_assoc()){
                $localidades[]=$localidad;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "users"
            return $localidades;
        }
        public function getColonia($localidad){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM colonias where id_localidad='.$localidad;
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //creamos un arreglo para manipular a result
            $colonias=array();
            //vamos a descomponer a result desde un ciclo
            while($colonia=$result->fetch_assoc()){
                $colonias[]=$colonia;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "users"
            return $colonias;
        }
        
        //método para obtener a un cliente por su ID
        public function getClienteByID($id){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM clientes WHERE id_cliente='.$id;
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($result && $result->num_rows>0){
                $client=$result->fetch_assoc();
            }else{
                $client=false;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "clientes"
            return $client;
        }
        public function getUserByID($id){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM usuarios WHERE id_usuario='.$id;
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($result && $result->num_rows>0){
                $user=$result->fetch_assoc();
            }else{
                $user=false;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "users"
            return $user;
        }
        public function getDireccionByID($id){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM direcciones WHERE id_direccion='.$id;
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($result && $result->num_rows>0){
                $user=$result->fetch_assoc();
            }else{
                $user=false;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "users"
            return $user;
        }
        public function getColoniaByID($id){
            //creamos la consulta a ejecutar
            $sql='SELECT * FROM colonias WHERE id_colonia='.$id;
            //obtenemos la conexión a la base de datos
            $connection=$this->dbconnection->getConnection();
            //ejecutar la consulta
            $result=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($result && $result->num_rows>0){
                $colonia=$result->fetch_assoc();
            }else{
                $colonia=false;
            }
            //cerramos la conexión a la base de datos
            $this->dbconnection->closeConnection();
            //arrojamos la respuesta de nuestra consulta "colonias"
            return $colonia;
        }

        //método para validar un logueo (usuario y contraseña)
        public function getCredentials($us,$ps){
            //paso1: creamos la consulta
            $sql="SELECT * FROM usuarios WHERE nombre=".$us ."AND contrasena=".$ps;
            //paso2: conectamos a la base de datos
            $connection=$this->dbconnection->getConnection();
            //paso3: ejecutamos la consulta
            $result=$connection->query($sql);
            //paso4: preparamos la respuesta
            if($result && $result->num_rows>0){
                $user=$result->fetch_assoc();
            }else{
                $user=false;
            }
            //paso5: cerramos la conexion
            $this->dbconnection->closeConnection();
            //paso6: arrojamos resultados
            return $user;
        }

        //método para eliminar un usuario
        public function deleteRow($id){
            //paso1: creamos la consulta
            $sql="DELETE FROM usuarios WHERE id_usuario=".$id;
            //paso2: conectamos a la base de datos
            $connection=$this->dbconnection->getConnection();
            //paso3: ejecutamos la consulta
            $result=$connection->query($sql);
            //paso4: preparamos la respuesta
            if($result){
                $res=true;
            }else{
                $res=false;
            }
            //paso5: cerramos la conexion
            $this->dbconnection->closeConnection();
            //paso6: arrojamos resultados
            return $res;
        }
        //método para editar un usuario
        public function updateUser($userData){
            //paso1: creamos la consulta
            $sql="CALL userx('','','".$userData['contrasena']."','".$userData['cliente']."','".$userData['aMaterno']."','".$userData['aPaterno']."','".$userData['rfc']."','".$userData['telefono']."','".$userData['calle']."','".$userData['nInt']."','".$userData['nExt']."',".$userData['id_colonia'].",".$userData['id'].",'edit')";        
            //paso2: conectamos a la base de datos
            $connection=$this->dbconnection->getConnection();
            //paso3: ejecutamos la consulta
            $result=$connection->query($sql);
            //paso4: preparamos la respuesta
            if($result){
                $res=true;
            }else{
                $res=false;
            }
            //paso5: cerramos la conexion
            $this->dbconnection->closeConnection();
            //paso6: arrojamos resultados
            return $res;
        }
        //método para insertar un usuario
        public function insertUser($userData){
            //paso1: creamos la consulta
            $sql="CALL userx('".$userData['usuario']."','".$userData['correo']."','".$userData['contrasena']."','".$userData['cliente']."','".$userData['aMaterno']."','".$userData['aPaterno']."','".$userData['rfc']."','".$userData['telefono']."','".$userData['calle']."','".$userData['nInt']."','".$userData['nExt']."',".$userData['id_colonia'].",'','add')";
            //paso2: conectamos a la base de datos
            $connection=$this->dbconnection->getConnection();
            //paso3: ejecutamos la consulta
            $result=$connection->query($sql);
            //paso4: preparamos la respuesta
            if($result){
                $res=true;
            }else{
                $res=false;
            }
            //paso5: cerramos la conexion
            $this->dbconnection->closeConnection();
            //paso6: arrojamos resultados
            return $res;
        }
    }
?>