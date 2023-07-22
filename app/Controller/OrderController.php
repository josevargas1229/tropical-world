<?php

    class OrderController{
        private $vista;
        
        public function index(){
            
                session_start();
                if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
                //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                    $vista="app/View/admin/orders/IndexOrderView.php";
                    include_once("app/View/PlantillaView.php");
                }else{
                    $vista="app/View/HomeView.php";
                    include_once("app/View/Plantilla2View.php");
                }
        }
    }
?>