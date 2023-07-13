<div>
    <h2>Agregar nuevo usuario</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/proyecto/?c=UserController&m=Add" 
  method="post" 
  enctype="multipart/form-data">
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+"/>
    </p>
    <p>
      <label for="aMaterno">Apellido Materno : </label><br />
      <input type="text" name="aMaterno" id="aMaterno" placeholder="Apellido materno" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+"/>
    </p>
    <p>
      <label for="aPaterno">Apellido Paterno : </label><br />
      <input type="text" name="aPaterno" id="aPaterno" placeholder="Apellido paterno" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+"/>
    </p>
    <p>
      <label for="rfc">RFC : </label><br />
      <input type="text" name="rfc" id="rfc" placeholder="RFC" required
                    minlength="13" maxlength="13"
                    pattern="[A-Z]{4}[0-9]{6}[A-Z0-9]{3}"/>
    </p>
    <p>
      <label for="email">Email : </label><br />
      <input
        type="email"
        name="email"
        id="email"
        placeholder="email"
        required
        pattern="[a-zA-Z0-9._]+@[a-zA-Z.]+"
      />
    </p>
    <p>
        <label for="usuario">Usuario : </label><br />
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required minlength="3" maxlength="10" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ ]+"/>
    </p>
    <p>
        <label for="contrasena">Password : </label><br>
        <input type="password" name="contrasena" id="contrasena" placeholder="Password" required
                  minlength="8"
                  maxlength="16"
                  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ]+"/>
    </p>
    <p>
        <label for="pass2">Confirmar password:</label>
        <input type="password" name="pass2" id="pass2" placeholder="Confirmar password" required/>
    </p>
    <p>
        <label for="telefono">Número telefónico : </label><br>
        <input type="number" name="telefono" id="telefono" placeholder="Teléfono" required maxlength="10" />
    </p>
    <p>
      <label for="calle">Calle : </label><br />
      <input type="text" name="calle" id="calle" placeholder="Calle" required/>
    </p>
    <p>
      <label for="nInt">Número interior : </label><br />
      <input type="text" name="nInt" id="nInt" placeholder="Número interior"/>
    </p>
    <p>
      <label for="nExt">Número Exterior : </label><br />
      <input type="text" name="nExt" id="nExt" placeholder="Número exterior"/>
    </p>
    <p>
      <label for="localidad">Localidad : </label><br>
      <select name="localidad" id="localidad">
        <option value="0">Seleccione...</option>
          <?php 
          foreach($localidades as $localidad){
          echo "<option value='".$localidad['id_localida']."'>".$localidad['nombre']."</option>";
          }
          ?>
      </select>
  </p>
  <p>
    <label for="colonia">Colonia : </label><br>
    <select name="colonia" id="colonia">
      <option value="0">Seleccione...</option>
        
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
    <p><input type="submit" value="Add User"></p>
  </form>
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
