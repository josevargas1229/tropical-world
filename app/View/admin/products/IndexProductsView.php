<div>
    <h1>Homeview de productos</h1>
    <table>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>precio</th>
            <th>existencias</th>
            <th>acciones</th>
        </tr>
    <tbody>
        <?php
            foreach($datos as $dato){
             echo "<tr>";
             echo "<td>".$dato['nombre']."</td>";
             echo "<td>".$dato['descripcion']."</td>";
             echo "<td>".$dato['precio']."</td>";
             echo "<td>".$dato['existencias']."</td>";
             echo "<td><a href=''>Editar</a><br><a href=''>Eliminar</a></td>";
             echo "</tr>";
            }
        ?>
    </tbody>
    </table>
</div>