<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical World Shop</title>
    <link rel="stylesheet" href="src/style/style.css">
    <link rel="shortcut icon" href="src/img/project/logo_icono.png" type="image/x-icon">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <a id="boton-cerrar" class="boton-cerrar" href="javascript:void(0)" onclick="ocultar()">&times;</a>
        <nav class="navbar">
            <ul>
                <li><a href="http://localhost/proyecto/">Inicio</a></li>
                <li><a href="http://localhost/proyecto/?c=ProductsController&m=index">Productos</a></li>
                <li><a href="http://localhost/proyecto/?c=AboutController&m=index">Acerca de</a></li>
                <li><a href="http://localhost/proyecto/?c=UserController&m=CallFormLogin">login</a></li>
            </ul>
        </nav>
    </div>
    <header class="header">
        <div class="header-contenido" id="header-contenido">
            <div class="header-contenido-menu">
                <a id="open" class="open" href="javascript:void(0)" onclick="mostrar()">&equiv;</a>
            </div>
            <div class="header-contenido-principal">
                <div class="header-contenido-principal-titulo">
                    <h1>Tropical World Shop</h1>
                </div>
                <div class="header-contenido-principal-menu">
                <nav class="navbar" id="navbar1">
                    <ul>
                    <li><a href="http://localhost/proyecto/">Inicio</a></li>
                    <li><a href="http://localhost/proyecto/?c=AboutController&m=index">Acerca de</a></li>
                    <li><a href="http://localhost/proyecto/?c=UserController&m=CallFormLogin">login</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="content">
        <!--Aqui va todo lo que pueda ser contenido de la plantilla-->
        <?php include_once($vista)?>
    </section>
    <<footer class="footer-distributed">
        
        <div class="footer-left">
        
        <img src="src/img/project/logo.png" alt="logo">
        <p class="footer-links">
          <a href="#" class="link-1">Inicio</a>
          <a href="#">Blog</a>
          <a href="#">Acerca de </a>
          <a href="#">Faq</a>
          <a href="#">Contactos</a>
        </p>
        <p class="footer-company-name">Tropical World © 2023</p>
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Calle Principal #123, Huejutla de Reyes, Hidalgo</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+1.555.555.5555</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:info@cajetademango.com">info@cajetademango.com</a></p>
        </div>

      </div>

      <div class="footer-right">
        <p class="footer-company-about">
          <span>Acerca de la empresa</span>
          Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>

        </div>

      </div>
    </footer>
</div>
    <script>
        function mostrar(){
            document.getElementById("sidebar").style.width="200px";
            document.getElementById("contenido").style.marginLeft="200px";
            document.getElementById("open").style.display="none";
            document.getElementById("close").style.display="inline";
        }
        function ocultar(){
            document.getElementById("sidebar").style.width="0";
            document.getElementById("contenido").style.marginLeft="0";
            document.getElementById("open").style.display="inline";
            document.getElementById("close").style.display="none";
        }
    </script>
</body>
</html>