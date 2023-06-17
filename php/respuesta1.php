<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="container-header">
        <h1>Registro</h1>
        <img src="../src/CSS3_logo.svg.png" alt="Yo" />
      </div>
      <div class="container-body">
        <h2>New user</h2>
        <?php
            $fno=$_POST['nombre'];
            $fus=$_POST['user'];
            $fps=$_POST['pass'];
            $fem=$_POST['email'];
            $fte=$_POST['tel'];
            $fse=$_POST['sex'];
            $ffe=$_POST['fchnac'];
        ?>
          <fieldset>
            <legend>New user</legend>
            <table>
              <tr>
                <td><p>Nombre:</p></td>
                <td>
                  <p><?php echo($fno)?></p>
                </td>
              </tr>
              <tr>
                <td><p>Usuario:</p></td>
                <td>
                  <p><?= $fus?></p>
                </td>
              </tr>
              <tr>
                <td><p>Password:</p></td>
                <td>
                  <p><?= $fps?></p>
                </td>
              </tr>
              <tr>
                <td><p>Correo:</p></td>
                <td>
                  <p><?= $fem?></p>
                </td>
              </tr>
              <tr>
                <td><p>Teléfono:</p></td>
                <td>
                  <p><?= $fte?></p>
                </td>
              </tr>
              <tr>
                <td><p>Género:</p></td>
                <td>
                  <p><?= $fse?></p>
                </td>
              </tr>
              <tr>
                <td><p>Fecha de nacimiento:</p></td>
                <td>
                  <p><?= $ffe?></p>
                </td>
              </tr>
              
            </table>
          </fieldset>
      </div>
      <div class="container-footer">
        <h2>footer</h2>
        <img src="../src/CSS3_logo.svg.png" alt="yo" />
      </div>
    </div>
  </body>
</html>