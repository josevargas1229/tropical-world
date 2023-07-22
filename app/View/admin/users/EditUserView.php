<div>
    <div class="form-content">
  <form 
  action="http://localhost/proyecto/?c=UserController&m=Edit" 
  method="post" 
  enctype="multipart/form-data" class="form">
    <p>
        <label for="usuario">Usuario : </label><br />
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required minlength="3" maxlength="10" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ ]+" value="<?=$user['nombre']?>" disabled="true" class="form-style"/>
    </p>
    <p>
        <label for="contrasena">Password : </label><br>
        <input type="password" name="contrasena" id="contrasena" placeholder="Password" value="<?=$user['contrasena']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?=$cliente['nombre']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="aMaterno">Apellido Materno : </label><br />
      <input type="text" name="aMaterno" id="aMaterno" placeholder="Apellido materno" value="<?=$cliente['aMaterno']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="aPaterno">Apellido Paterno : </label><br />
      <input type="text" name="aPaterno" id="aPaterno" placeholder="Apellido paterno" value="<?=$cliente['aPaterno']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="rfc">RFC : </label><br />
      <input type="text" name="rfc" id="rfc" placeholder="RFC" required
                    minlength="13" maxlength="13"
                    pattern="[A-Z]{4}[0-9]{6}[A-Z0-9]{3}" value="<?=$cliente['RFC'] ?>" class="form-style"/>
    </p>
    <p>
        <label for="telefono">Número telefónico : </label><br>
        <input type="number" name="telefono" id="telefono" placeholder="Teléfono" value="<?=$cliente['telefono']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="calle">Calle : </label><br />
      <input type="text" name="calle" id="calle" placeholder="Calle" value="<?=$direccion['calle']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="nInt">Número interior : </label><br />
      <input type="text" name="nInt" id="nInt" placeholder="Número interior" value="<?=$direccion['num_int']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="nExt">Número Exterior : </label><br />
      <input type="text" name="nExt" id="nExt" placeholder="Número exterior" value="<?=$direccion['num_ext']  ?>" class="form-style"/>
    </p>
    <p>
      <label for="localidad">Localidad : </label><br>
      <select name="localidad" id="localidad" class="form-style">
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
    <select name="colonia" id="colonia" class="form-style">
        
    </select>
    <p>
      <label for="avatar">Avatar de usuario : </label><br>
      <input type="file" name="avatar" id="avatar" accept="image/*" class="form-style">
    </p>
    <p>
    <input type="hidden" name="ava" value="<?= $user['avatar']?>">
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
  <script>
  var localidad = document.getElementById('localidad');
  localidad.addEventListener("change", function() {
  var localidadValue = localidad.value;
  
  fetch('http://localhost/proyecto/?c=UserController&m=getColonias', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'localidadID=' + encodeURIComponent(localidadValue)
  })
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      var coloniaSelect = document.getElementById('colonia');
      coloniaSelect.innerHTML = ""; // Limpia las opciones existentes antes de agregar nuevas opciones

      data.forEach(function(elemento) {
        var option = document.createElement('option');
        option.text = elemento.nombre;
        option.value = elemento.id_colonia;
        coloniaSelect.appendChild(option);
      });
    })
    .catch(function(error) {
      console.error('Error:', error);
    });
});

</script>
</div>