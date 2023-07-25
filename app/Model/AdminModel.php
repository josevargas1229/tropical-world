<?php
    class AdminModel{
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
            $sql='SELECT * FROM admins';
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
        public function InAdmin($id){
            $sql="CALL adminx(".$id.",'admin');";
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
        public function InClient($id){
            $sql="CALL adminx(".$id.",'cliente');";
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