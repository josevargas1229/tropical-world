<div class="contain">
    <div class="grid">
  <?php foreach ($productos as $producto): ?>
    <div class="four columns">
      <div class="card">
        <!-- Mostrar la imagen del producto -->
        <img src="src/img/products/<?php echo $producto['avatar']; ?>">

        <div class="info-card">
          <!-- Mostrar el nombre del producto -->
          <h4><?php echo $producto['nombre']; ?></h4>
          <!-- Mostrar la presentación del producto -->
          <p><?php echo $producto['presentacion']; ?></p>
          <!-- Mostrar el tamaño del producto -->
          <p>Tamaño: <?php echo $producto['porcion']; ?></p>
          <!-- Mostrar el precio del producto -->
          <p class="precio">$<?php echo $producto['precio']; ?></p>
          <button>Agregar al carrito</button>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div>
