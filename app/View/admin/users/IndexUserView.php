<div class="content-userView">
    <br>
    <p>
    <!--Agregamos enlace para agregar un nuevo usuario-->
    <a href="http://localhost/proyecto/?c=UserController&m=CallFormAdd">Agregar nuevo usuario</a>
  </p><br>
  <div class="tbl-header">
  <table>
    <thead>
          <tr>
            <td>Usuario</td>
            <td>email</td>
            <td>Cliente</td>
            <td>RFC</td>
            <td>Teléfono</td>
            <td>Dirección</td>
            <td>Acciones</td>
          </tr>
    </thead>
</table>
  </div>
  <div class="tbl-content">
  <table>
    <tbody>
        <?php
            foreach($datos as $dato){
             echo "<tr>";
             echo "<td>".$dato['usuario']."</td>";
             echo "<td>".$dato['correo']."</td>";
             echo "<td>".$dato['nombre']."</td>";
             echo "<td>".$dato['RFC']."</td>";
             echo "<td>".$dato['telefono']."</td>";
             echo "<td>".$dato['direccion']."</td>";
             echo "<td> <button onclick='editar(".$dato['id_usuario'].")' class='btn-3d'>Editar</button><br>
            <button onclick='eliminar(".$dato['id_usuario'].")' class='btn-3d'>Eliminar</button> </td>";
             echo "</tr>";
            }
        ?>
    </tbody>
    </table>
  </div>
  
    <script>
    //creamos la funcion para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id){
      if(confirm("¿Desea eliminar el usuario?")){
        window.location.href="http://localhost/proyecto/?c=UserController&m=Delete&id="+id;
        
      }
    }
    //creamos la funcion para editar un usuario por medio de su id
    function editar(id){
      window.location.href="http://localhost/proyecto/?c=UserController&m=CallFormEdit&id="+id;
    }
    </script>
</div>