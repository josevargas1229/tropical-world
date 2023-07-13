<div>
    <h1>Homeview de productos</h1>
    <p>
    <!--Agregamos enlace para agregar un nuevo usuario-->
    <a href="http://localhost/proyecto/?c=ProductsController&m=CallFormAdd">Agregar nuevo producto</a>
  </p><br>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Porción</td>
                <td>Precio</td>
                <td>Existencias</td>
                <td>Presentación</td>
                <td>Acciones</td>
            </tr>
        </thead>
        
    <tbody>
        <?php
            foreach($datos as $dato){
             echo "<tr>";
             echo "<td>".$dato['nombre']."</td>";
             echo "<td>".$dato['descripcion']."</td>";
             echo "<td>".$dato['porcion']."</td>";
             echo "<td>".$dato['precio']."</td>";
             echo "<td>".$dato['existencias']."</td>";
             echo "<td>".$dato['presentacion']."</td>";
             echo "<td><button onclick='editar(".$dato['id_producto'].")'>Editar</button><br>
             <button onclick='eliminar(".$dato['id_producto'].")'>Eliminar</button></td>";
             echo "</tr>";
            }
        ?>
    </tbody>
    </table>
    <script>
    //creamos la funcion para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id){
      if(confirm("¿Desea eliminar el producto?")){
        window.location.href="http://localhost/proyecto/?c=ProductsController&m=Delete&id="+id;
        
      }
    }
    //creamos la funcion para editar un usuario por medio de su id
    function editar(id){
      window.location.href="http://localhost/proyecto/?c=ProductsController&m=CallFormEdit&id="+id;
    }
    </script>
</div>