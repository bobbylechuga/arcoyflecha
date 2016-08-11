<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  echo $_POST[idArchivo]." + ".$_POST[idganador];
  $string = file_get_contents("eventos/".$_POST['idArchivo'].".json");
  $json = json_decode($string, true);
  if($_POST[idganador] == "jugador1"):
    $json[0]['desempate'] = 1;
    $json[1]['desempate'] = 0;
  else:
    $json[1]['desempate'] = 1;
    $json[0]['desempate'] = 0;
  endif;

  $newJsonString = json_encode($json);

  $fp = fopen("eventos/".$_POST['idArchivo'].".json", 'w');
  fwrite($fp, $newJsonString);
  fclose($fp);
?>
