<?php
require_once("conexion.php");

$sql="select * from estancias order by estancia";
$registros=mysqli_query($conexion, $sql) or die(mysqli_error());


if (isset($_POST['idencargado']) && $_POST['idencargado']!="")
{
    $sql=sprintf("insert into encargados(idencargado,nombre,apellidos, email, password,tipo) values('%s','%s','%s','%s','%s','%s')",strtolower($_POST['idencargado']),$_POST['nombre'],$_POST['apellidos'],$_POST['email'],md5($_POST['password']),$_POST['tipo']);
    mysqli_query($conexion, $sql) or die(mysqli_error());

    // insertamos a continuaci�n las estancias para cada encargado.
    if (count($_POST['estancias'])!=0)
    {
        $sql="insert into ee values ";
        for ($i=0;$i<count($_POST['estancias']);$i++)
        {
            $sql.=sprintf("('%s','%s'),",$_POST['estancias'][$i],strtolower($_POST['idencargado']));
        }

        $sql=substr($sql,0,strlen($sql)-1);
        mysqli_query($conexion,$sql) or die(mysqli_error());
    }

    header("location: encargados.php");
}
else
{
?>
<form id="formulario" name="formulario" method="post" action="altaenc.php">
<fieldset>
<legend>ALTA DE ENCARGADOS</legend>
  <p>
    <label for="idencargado">ID Encargado: </label>
    <input type="text" name="idencargado" id="idencargado" /><br />
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" /><br />
    <label for="apellidos">Apellidos: </label>
    <input type="text" name="apellidos" id="apellidos" /><br />
    <label for="tipo">Tipo Encargado: </label>
    <select name="tipo" id="tipo">
    <option value="U">Seleccione tipo</option>
    <option value="E">Encargado</option>
    <option value="A">Administrador</option>
    </select><br />
    <label for="email">E-mail: </label>
    <input type="text" name="email" id="email" /><br />
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" /><br />
    <label for="estancias">Estancias Asignadas: </label>
<?php
    // Imprimimos las estancias asignadas.
    while ($fila=mysqli_fetch_assoc($registros))
    {
        echo $fila['estancia']."<input type=\"checkbox\" name=\"estancias[]]\" value=\"".$fila['idestancia']."\">, ";
    }
?>
    <br />
    <input type="reset" name="reset" id="reset" value="Reset" />
    <label for="reset"></label>
    <input type="submit" name="enviar" id="enviar" value="Enviar" />
  </p>
</fieldset>
</form>
<?php
}
?>
