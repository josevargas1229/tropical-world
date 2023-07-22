<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical World Shop</title>
    <link rel="stylesheet" href="src/style/style.css">
    <link rel="shortcut icon" href="src/img/project/logo_icono.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8fc0695688.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <header class="start-header navbar-light">
  <div class="navigation-wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar">
            <a class="navbar-brand" href="http://localhost/proyecto/"><img src="src/img/project/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="dropdown" href="http://localhost/proyecto/" role="button" >Inicio</a>
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
                  <a class="nav-link" href="http://localhost/proyecto/?c=OrderController&m=index">Pedidos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="dropdown" href="http://localhost/proyecto/?c=InventoryController&m=index" role="button" id="inventario">Inventario</a>
                  <div class="dropdown-menu">
                    <ul class="dropdown-navbar">
                    <li class="dropdown-item">
                    <a class="dropdown-link"  href="http://localhost/proyecto/?c=InventoryController&m=index">Productos</a>
                    </li>
                    <li class="dropdown-item">
                    <a class="dropdown-link" href="#">Producción</a>
                    </li>
                    <li class="dropdown-item">
                    <a class="dropdown-link"  href="#">Materias primas</a>
                    </li>
                    <li class="dropdown-item">
                    <a class="dropdown-link"  href="#">Proveedores</a>
                    </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/proyecto/?c=UserController&m=index">Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/proyecto/?c=AboutController&m=index">Acerca de</a>
                </li>
                <li class="nav-item">
                <i class="fa-solid fa-cart-shopping" style="color: #04122a;">
                  <div class="buy-card">
                    <ul class="nav-card">
                      <li>Imagen</li>
                      <li>Nombre</li>
                      <li>Precio</li>
                      <li>Cantidad</li>
                    </ul>
                    <button>VACIAR CARRITO</button>
                  </div>
                </i>
                </li>
              </ul>
              <div class="profile-container">
                <button class="profile-picture-button" >
                  <?php
                  // Obtener la URL de la foto de perfil del usuario desde una variable de sesión
                  if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                    $profilePictureName = $_SESSION['avatar'];
                    if (!empty($profilePictureName)) {
                      echo '<img src="src/img/avatars/' . $profilePictureName . '" alt="Foto de perfil" class="profile-image">';
                    } else {
                      echo '<img src="src/img/avatars/Avatar_usuario.png" alt="Foto de perfil" class="profile-image">';
                    }
                  }
                  ?>
                </button>
                <div class="menu-dropdown" id="menu">
                  <a class="item-dropdown" href="http://localhost/proyecto/?c=UserController&m=Logout">Cerrar sesión</a>
                  <a class="item-dropdown" href="#">Configuración</a>
                  <!-- Otros elementos de menú -->
                </div>
              </div>
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
          <a href="http://localhost/proyecto/" class="link-1">Inicio</a>
          <a href="#">Blog</a>
          <a href="http://localhost/proyecto/?c=AboutController&m=index">Acerca de </a>
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
  function toggleMenu() {
  var menu = document.getElementById("menu");
  if (menu.style.display === "none" || menu.style.display === "") {
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", function() {
  var profilePictureButton = document.querySelector(".profile-picture-button");

  profilePictureButton.addEventListener("click", function(event) {
    event.stopPropagation(); // Evitar que el clic se propague al documento
    toggleMenu();
  });

  document.addEventListener("click", function(event) {
    var menu = document.getElementById("menu");
    var targetElement = event.target; // Elemento en el que se hizo clic

    // Cerrar el menú si se hizo clic fuera de él
    if (menu.style.display === "block" && !menu.contains(targetElement)) {
      menu.style.display = "none";
    }
  });
});

</script>
</body>
</html>