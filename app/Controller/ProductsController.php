<?php
include_once('app/Model/ProductModel.php');
    class ProductsController{
        private $vista;
        private $modelo;
        public function index(){
            $modelo=new ProductModel();
            $productos=$modelo->getAll();
            
            session_start();
            if(isset($_SESSION['logedin'])&&$_SESSION['logedin']==true){
            //incluimos al archivo de la plantilla para que éste sea llamado y lleve como variable a vista
                $vista="app/View/public/products/ProductsIndexView.php";
                include_once("app/View/PlantillaView.php");
            }else{
                $vista="app/View/public/products/ProductsIndexView.php";
                include_once("app/View/Plantilla2View.php");
            }
        }
    }
    
?>