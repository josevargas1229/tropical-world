<div>
    <div class="form-content">
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="http://localhost/proyecto/?c=UserController&m=Add" 
  method="post" 
  enctype="multipart/form-data" id="frmadd">
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" class="form-style"/>
    </p>
    <p>
      <label for="aPaterno">Apellido Paterno : </label><br />
      <input type="text" name="aPaterno" id="aPaterno" placeholder="Apellido paterno" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" class="form-style"/>
    </p>
    <p>
      <label for="aMaterno">Apellido Materno : </label><br />
      <input type="text" name="aMaterno" id="aMaterno" placeholder="Apellido materno" required
                    minlength="2"
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+" class="form-style"/>
    </p>
    <p>
      <label for="rfc">RFC : </label><br />
      <input type="text" name="rfc" id="rfc" placeholder="RFC" required
                    minlength="13" maxlength="13"
                    pattern="[A-Z]{4}[0-9]{6}[A-Z0-9]{3}" class="form-style"/>
    </p>
    <p>
      <label for="email">Email : </label><br />
      <input
        type="email"
        name="email"
        id="email"
        placeholder="email"
        required
        pattern="[a-zA-Z0-9._]+@[a-zA-Z.]+" class="form-style"
      />
    </p>
    <p>
        <label for="usuario">Usuario : </label><br />
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required minlength="3" maxlength="10" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ ]+" class="form-style"/>
    </p>
    <p>
        <label for="contrasena">Password : </label><br>
        <input type="password" name="contrasena" id="contrasena" placeholder="Password" required
                  minlength="8"
                  maxlength="16"
                  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ]+" class="form-style"/>
    </p>
    <p>
        <label for="pass2">Confirmar password:</label>
        <input type="password" name="pass2" id="pass2" placeholder="Confirmar password" required class="form-style"/>
    </p>
    <p>
        <label for="telefono">Número telefónico : </label><br>
        <input type="number" name="telefono" id="telefono" placeholder="Teléfono" required maxlength="10" class="form-style"/>
    </p>
    <p>
      <label for="calle">Calle : </label><br />
      <input type="text" name="calle" id="calle" placeholder="Calle" required class="form-style"/>
    </p>
    <p>
      <label for="nInt">Número interior : </label><br />
      <input type="text" name="nInt" id="nInt" placeholder="Número interior" class="form-style"/>
    </p>
    <p>
      <label for="nExt">Número Exterior : </label><br />
      <input type="text" name="nExt" id="nExt" placeholder="Número exterior" class="form-style"/>
    </p>
    <p>
      <label for="localidad">Localidad : </label><br>
      <select name="localidad" id="localidad" class="form-style">
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
    <select name="colonia" id="colonia" class="form-style">
      <option value="0">Seleccione...</option>
        
    </select>
</p>
    
    <p>
      <label for="avatar">Avatar de usuario : </label><br>
      <input type="file" name="avatar" id="avatar" accept="image/*" class="form-style">
    </p>
    <p><input type="submit" value="Add User"></p>
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
document.addEventListener("DOMContentLoaded", function () {
  var confpass = document.getElementById("pass2");
  var password = document.getElementById("contrasena");
  var cantidad = 0;
  var form=document.getElementById("frmadd");
  confpass.addEventListener("blur", function () {
    var h6 = document.createElement("h6");
    var texto = "";
    h6.id = "confirma";
    if (confpass.value == password.value) {
      texto = "Las contraseñas coinciden";
    } else {
      texto = "Las contraseñas no coinciden";
    }
    if (cantidad == 0) {
      h6.textContent = texto;
      confpass.parentNode.appendChild(h6);
      cantidad++;
    } else {
      var confirma = document.getElementById("confirma");
      confirma.textContent = texto;
    }
  });
  form.addEventListener("submit", function(evento){
    if(confpass.value != password.value){
      evento.preventDefault();
    }
  })
});


</script>
</div>
