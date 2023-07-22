<div>
  <div class="form-content">
    <h2>Actualizacion de datos de producto</h2>
  <!--en el metodo action de este formulario llamaremos al metodo edit de nuestro controlador -->
  <form 
  action="http://localhost/proyecto/?c=InventoryController&m=Edit" 
  method="post" 
  enctype="multipart/form-data" class="form">
  <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" value="<?=$product['nombre']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="descripcion">Descripción : </label><br />
      <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" value="<?=$product['descripcion']  ?>" class="form-style"/>
    </p>
    
    <p>
      <label for="porcion">Porción : </label><br>
      <select name="porcion" id="porcion" class="form-style">
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
        <select name="presentacion" id="presentacion" class="form-style">
            <?php 
            foreach($presentaciones as $presentacion){
              $present=($presentacion['id_presentacion'] == $product['id_presentacion']) ? 'selected' : '';
            echo "<option value='".$presentacion['id_presentacion']."' ".$present.">".$presentacion['descripcion']."</option>";
            }
            ?>
        </select>
    </p>
    <p>
      <label for="avatar">Imagen de producto : </label><br>
      <input type="file" name="avatar" id="avatar" accept="image/*" class="form-style">
    </p>
    <p>
    <input type="hidden" name="ava" value="<?= $product['avatar']?>">
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
</div>