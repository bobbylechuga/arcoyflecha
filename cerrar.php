<?php
  //error_reporting(E_ERROR | E_WARNING | E_PARSE);
  $string = file_get_contents("eventos/".$_POST['idArchivo'].".json");
  $json = json_decode($string, true);
  //print_r($json);
  $parcial1 = $json['parcial1'];
  $parcial2 = $json['parcial2'];
  if($parcial1 > $parcial2) {
    $punto1 = $json['total_1'] + 2;
    echo "parcial1 ".$punto1;
  }elseif($parcial1 < $parcial2) {
    $punto2 = $json['total_2'] + 2;
    echo "parcial2 ".$punto2;
  }else {
    $punto1 = $json['total_1'] + 1;
    $punto2 = $json['total_2'] + 1;

    echo "empate ".$punto1." ".$punto2;
    //echo "parcial2 ".$punto1;
  }
  /*
  $json['total_1'] = $punto1;
  $json['total_2'] = $punto2;

  $newJsonString = json_encode($json);
  print_r($newJsonString);
  $fp = fopen("eventos/".$_POST['idArchivo'].".json", 'w');
  fwrite($fp, $newJsonString);
  fclose($fp);
  */
  //echo $punto1 . "<>" .$punto2;
?>
