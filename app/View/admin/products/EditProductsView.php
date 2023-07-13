<div>
    <h2>Actualizacion de datos de producto</h2>
  <!--en el metodo action de este formulario llamaremos al metodo edit de nuestro controlador -->
  <form 
  action="http://localhost/proyecto/?c=ProductsController&m=Edit" 
  method="post" 
  enctype="multipart/form-data" class="form">
  <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" value="<?=$product['nombre']  ?>"/>
    </p>
    <p>
      <label for="descripcion">Descripción : </label><br />
      <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" value="<?=$product['descripcion']  ?>"/>
    </p>
    
    <p>
      <label for="porcion">Porción : </label><br>
      <select name="porcion" id="porcion">
          <?php 
          foreach($porciones as $porcion){
            $por=($porcion['id_porcion'] == $product['id_porcion']) ? 'selected' : '';
          echo "<option value='".$porcion['id_porcion']."' ".$por.">".$porcion['descripcion']."(".$porcion['cont_neto']."gr)</option>";
          }
          ?>
      </select>
  </p>
    <p>
        <label for="presentacion">Presentación : </label><br>
        <select name="presentacion" id="presentacion">
            <?php 
            foreach($presentaciones as $presentacion){
              $present=($presentacion['id_presentacion'] == $product['id_presentacion']) ? 'selected' : '';
            echo "<option value='".$presentacion['id_presentacion']."' ".$present.">".$presentacion['descripcion']."</option>";
            }
            ?>
        </select>
    </p>
    <p>
      <input
        type="hidden"
        name="id_producto"
        value="<?= $product['id_producto'] ?>"
        readonly
        id="id_producto"
      />
    </p>
    <p><input type="submit" value="Edit Product"></p>
  </form>
  
</div>