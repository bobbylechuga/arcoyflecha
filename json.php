<?php
  error_reporting(0);
  $jsonUrl = "eventos/".$_GET[id].".json";
  $str = file_get_contents($jsonUrl);
  //$json = json_decode($str, true);
  $str = str_replace("json(", "", $str);
  $str = substr($str, 0, -2);
  print_r($str);
?>
