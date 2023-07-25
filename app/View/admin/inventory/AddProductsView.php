<div>
  <div class="form-content">
    <h2>Agregar un nuevo producto</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/proyecto/?c=InventoryController&m=Add" 
  method="post" 
  enctype="multipart/form-data">
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" class="form-style"/>
    </p>
    <p>
      <label for="descripcion">Descripción : </label><br />
      <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" class="form-style"/>
    </p>
    <p>
      <label for="porcion">Porción : </label><br>
      <select name="porcion" id="porcion" class="form-style">
        <option value="0">Seleccione...</option>
          <?php 
          foreach($porciones as $porcion){
          echo "<option value='".$porcion['id_porcion']."'>".$porcion['descripcion']."(".$porcion['cont_neto']."gr)</option>";
          }
          ?>
      </select>
  </p>
    <p>
        <label for="presentacion">Presentación : </label><br>
        <select name="presentacion" id="presentacion" class="form-style">
            <option value="0">Seleccione...</option>
            <?php 
            foreach($presentaciones as $presentacion){
            echo "<option value='".$presentacion['id_presentacion']."'>".$presentacion['descripcion']."</option>";
            }
            ?>
        </select>
    </p>
    <p>
      <label for="avatar">Avatar de producto : </label><br>
      <input type="file" name="avatar" id="avatar" accept="image/*"class="form-style">
    </p>
    <p><input type="submit" value="Add Product"></p>
  </form>
</div>
</div>
