<?php

include('functions/DB.php');
include('functions/html.php');
include('functions/interface.php');




$buscar = isset($_POST['Buscar']) ? $_POST['Buscar']: null;
$remplazar = isset($_POST['Remplazar']) ? $_POST['Remplazar']: null;


if($buscar!= "" and $remplazar!="")
{
  buscarYremplazar($buscar,$remplazar);
}







openHTML("Ficheiros");

$ruta = "fich-dir/textos";
$file = fopen($ruta."/texto1.txt","w+");
//echo fread($file,filesize($ruta."/texto1.txt"));

fwrite($file,"Hola Mundo");
fseek($file,0);
echo fread($file,filesize($ruta."/texto1.txt"));
echo "<br>";
//echo ftell($file);
fseek($file,2);
echo fgetc($file);
echo "<br>";
fseek($file,filesize($ruta."/texto1.txt")-4);

echo fread($file,4);
echo "<br>";

fseek($file,0);
echo "<br>";
echo feof($file);

//echo feof($file);

echo "<br>";
fseek($file,0);
echo fread($file,filesize($ruta."/texto1.txt"));

fclose($file);

//echo readfile($ruta."/texto1.txt");

echo "<br>";

$file = fopen($ruta."/textoCSV.csv","r");

$csv =  fgetcsv($file,filesize($ruta."/textoCSV.csv"),';');
echo "<br>";


for ($i=0;$i<count($csv);$i++)
{
  echo $csv[$i];
  echo "<br>";
}

formI("Buscar y remplazar","ficheiros.php");
createInput("Buscar");
createInput("Remplazar");
formF("Remplazar");
finishHTML();

function buscarYremplazar($busqueda,$replazo){

  $ruta = "fich-dir/textos";
  $file = fopen($ruta."/texto1.txt","w+");
  $busqueda = "Hola";
  $replazo = "Bye ";
  $word = "";

  for($i=0;!feof($file);$i++ )
  {
    fseek($file,$i);
    $aux = fgetc($file);

    if( $aux == " ")
    {
      if(comprobarPalabra($word,$busqueda))
      {
          remplazarPalabra($word,$replazo,$i,$file);
      }else {
         echo "no es igual";
      }
    }else
      $word = $word."". $aux;
    //echo $word;
  }
  fseek($file,0);
  fread($file,filesize($ruta."/texto1.txt"));
  fclose($file);
}

function comprobarPalabra($palabra1,$palabra2){
  if($palabra1 == $palabra2 )
  {

    return true;
  }else {

    return false;
  }
}

function remplazarPalabra($palabra,$remplazo,$puntero,$fichero){

  fseek($fichero,$puntero-strlen($palabra));
  fwrite($fichero,$remplazo);

}

 ?>
