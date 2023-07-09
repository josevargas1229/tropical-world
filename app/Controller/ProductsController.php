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
    }
?>