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
  <header class="start-header navbar-light">
  <div class="navigation-wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar">
            <a class="navbar-brand" href="http://localhost/proyecto/"><img src="src/img/project/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link"  href="http://localhost/proyecto/" role="button" >Inicio</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/proyecto/?c=ProductsController&m=index">Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/proyecto/?c=AboutController&m=index">Acerca de</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/proyecto/?c=UserController&m=CallFormLogin">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/proyecto/?c=UserController&m=CallFormLogin">Registro</a>
                </li>
              </ul>
              
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
    <section class="content">
        <!--Aqui va todo lo que pueda ser contenido de la plantilla-->
        <?php include_once($vista)?>
    </section>
    <footer class="footer-distributed">
        
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
        
    </script>
</body>
</html>