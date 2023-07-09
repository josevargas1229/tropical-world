<div>
    <h2>Actualizacion de datos de usuario</h2>
  <!--en el metodo action de este formulario llamaremos al metodo edit de nuestro controlador -->
  <form 
  action="http://localhost/proyecto/?c=UserController&m=Edit" 
  method="post" 
  enctype="multipart/form-data" class="form">
  
    <p>
        <label for="contrasena">Password : </label><br>
        <input type="password" name="contrasena" id="contrasena" placeholder="Password" value="<?=$user['contrasena']  ?>"/>
    </p>
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?=$cliente['nombre']  ?>"/>
    </p>
    <p>
      <label for="aMaterno">Apellido Materno : </label><br />
      <input type="text" name="aMaterno" id="aMaterno" placeholder="Apellido materno" value="<?=$cliente['aMaterno']  ?>"/>
    </p>
    <p>
      <label for="aPaterno">Apellido Paterno : </label><br />
      <input type="text" name="aPaterno" id="aPaterno" placeholder="Apellido paterno" value="<?=$cliente['aPaterno']  ?>"/>
    </p>
    <p>
        <label for="telefono">Número telefónico : </label><br>
        <input type="number" name="telefono" id="telefono" placeholder="Teléfono" value="<?=$cliente['telefono']  ?>"/>
    </p>
    <p>
      <label for="calle">Calle : </label><br />
      <input type="text" name="calle" id="calle" placeholder="Calle" value="<?=$cliente['calle']  ?>"/>
    </p>
    <p>
      <label for="nInt">Número interior : </label><br />
      <input type="text" name="nInt" id="nInt" placeholder="Número interior" value="<?=$cliente['numero_int']  ?>"/>
    </p>
    <p>
      <label for="nExt">Número Exterior : </label><br />
      <input type="text" name="nExt" id="nExt" placeholder="Número exterior" value="<?=$cliente['numero_ext']  ?>"/>
    </p>
    <p>
      <label for="localidad">Localidad : </label><br>
      <select name="localidad" id="localidad">
          <?php 
          foreach($localidades as $localidad){
            $locU=($localidad['id_localida'] == $cliente['idlocalidad']) ? 'selected' : '';
            echo "<option value='".$localidad['id_localida']."'".$locU.">".$localidad['nombre']."</option>";
          }
          ?>
      </select>
  </p>
  <p>
    <label for="colonia">Colonia : </label><br>
    <select name="colonia" id="colonia">
        <?php 
        foreach($colonias as $colonia){
          $colU=($colonia['id_colonia'] == $cliente['id_colonia']) ? 'selected' : '';
          echo "<option value='".$colonia['id_colonia']."' ".$colU.">".$colonia['nombre']."</option>";
        }
        ?>
    </select>
    
</p>
    <p>
        <label for="puesto">Puesto : </label><br>
        <select name="puesto" id="puesto">
            <?php 
            foreach($niveles as $nivel){
            echo "<option value='".$nivel['ID_Nivel']."'>".$nivel['Nombre_Nivel']."</option>";
            }
            ?>
        </select>
        
    </p>
    <p>
      <label for="avatar">Avatar de usuario : </label><br>
      <input type="file" name="avatar" id="avatar" accept="image/jpeg">
    </p>
    <p>
      <input
        type="hidden"
        name="id_usuario"
        value="<?= $user['id_usuario'] ?>"
        readonly
        id="id_usuario"
      />
    </p>
    <p><input type="submit" value="Edit User"></p>
  </form>
  
</div>