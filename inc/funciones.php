<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  function crearJson($idevento) {
    $marcadorArray = array (
      array (
        "jugador1" => "nombre_jugador",
        "primer_set" => array ("0", "0", "0","0"),
        /*
        "segundo_set" => array ("0", "0", "0"),
        "tercer_set" => array ("0", "0", "0"),
        "cuarto_set" => array ("0", "0", "0"),
        */
        "desempate" => "0"
      ),
      array (
        "jugador2" => "nombre_jugador",
        "primer_set" => array ("0", "0", "0","0"),
        /*
        "segundo_set" => array ("0", "0", "0"),
        "tercer_set" => array ("0", "0", "0"),
        "cuarto_set" => array ("0", "0", "0"),
        */
        "desempate" => "0"
      ),
      "juego"    => "1",
      "parcial1" => "puntos1",
      "parcial2" => "puntos2",
      "total_1" => "0",
      "total_2" => "0"

    );
    /*
    echo "<pre>";
    print_r($marcadorArray);
    echo "</pre>";
    */
    guardarJson ($idevento, $marcadorArray);
  }

  function guardarJson($idevento, $jsonArray) {
    $json = json_encode($jsonArray);
    $fp = fopen("eventos/".$idevento.".json", 'w');
      fwrite($fp, $json);
      fclose($fp);
  }

  function abrirJson($idevento) {
    $string = file_get_contents("eventos/".$idevento.".json");
    $json = json_decode($string, true);
    /*
    echo "<pre>";
    print_r($json);
    echo "</pre>";
    */
    return $json;
  }

  function formAJson($idevento) {
    $json = abrirJson($idevento);
    /*
    echo "<pre>";
    print_r($json);
    echo "</pre>";
    */
    //$json[0][primer_set]
    //$parcial1 = calcularParciales($json[0][primer_set]);
    //$parcial2 = calcularParciales($json[1][primer_set]);
    $proximoJuego=$json[juego]+1;
    echo '
    <table style="width:900px;">
      <tr>
        <td><h3>Juego:</h3></td>
        <td><input type="text" id="juegoActual" name="juego" value="'.$json[juego].'" readonly /></td>
        <td><button id="next" type="button" value="'.$proximoJuego.'">Pr&oacute;ximo '.$proximoJuego.'</button></td>
      </tr>
    </table>
    <table>
        <tr class="encabezado">
            <td>Jugadores</td>
            <td>Parcial</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>Total</td>
        </tr>
        <tr>
            <td class="gris">
                <input type="text" name="jugador0" value="'.$json[0][jugador1].'" />
            </td>
            <td ><input id="marcador1" type="text" name="marcador1" value="'.$json[total_1].'"> </td>
            <td id="puntos" class="gris"><input type="text" class="numero" name="juego1_1"  value="'.$json[0][primer_set][0].'"></td>
            <td id="puntos" class="gris"><input type="text" class="numero" name="juego1_2"  value="'.$json[0][primer_set][1].'"></td>
            <td id="puntos" class="gris"><input type="text" class="numero" name="juego1_3"  value="'.$json[0][primer_set][2].'"></td>
            <td id="puntos">
              <input type="text" name="parcial1" value="'.$json[parcial1].'" readonly>
            </td>
        </tr>
        <tr>
            <td class="gris">
                <input type="text" name="jugador1" value="'.$json[1][jugador2].'"/>
            </td>
            <td ><input id="marcador2" type="text" name="marcador2" value="'.$json[total_2].'"></td>
            <td id="puntos" class="gris"><input type="text" class="numero" name="juego2_1"  value="'.$json[1][primer_set][0].'"></td>
            <td id="puntos" class="gris"><input type="text" class="numero" name="juego2_2"  value="'.$json[1][primer_set][1].'"></td>
            <td id="puntos" class="gris"><input type="text" class="numero" name="juego2_3"  value="'.$json[1][primer_set][2].'"></td>
            <td id="puntos"><input type="text" name="parcial2" value="'.$json[parcial2].'" readonly></td>
        </tr>
      </table>
      <div style="width:720px; margin-top: 30px;">
        <input type="hidden" name="refrescarForm" value="si">
        <input type="submit" name="guardarJsonBoton" value="guardar y publicar"  style="float: right; clear: both;">
      </div>
      ';
      //fornToJson($idevento);
  }

  function fornToJson($idevento) {
    $parcial1 = $_POST[juego1_1] + $_POST[juego1_2] + $_POST[juego1_3];
    $parcial2 = $_POST[juego2_1] + $_POST[juego2_2] + $_POST[juego2_3];

    $marcadorArray = array (
      array (
        "jugador1" => "$_POST[jugador0]",
        "primer_set" => array ("$_POST[juego1_1]", "$_POST[juego1_2]", "$_POST[juego1_3]","$_POST[juego1_4]","$_POST[juego1_5]"),
        /*
        "segundo_set" => array ("0", "0", "0"),
        "tercer_set" => array ("0", "0", "0"),
        "cuarto_set" => array ("0", "0", "0"),
        */
        "desempate" => "0"
      ),
      array (
        "jugador2" => "$_POST[jugador1]",
        "primer_set" => array ("$_POST[juego2_1]", "$_POST[juego2_2]", "$_POST[juego2_3]","$_POST[juego2_4]","$_POST[juego2_5]"),
        /*
        "segundo_set" => array ("0", "0", "0"),
        "tercer_set" => array ("0", "0", "0"),
        "cuarto_set" => array ("0", "0", "0"),
        */
        "desempate" => "0"
      ),
      "juego"    => "$_POST[juego]",
      "parcial1" => "$parcial1",
      "parcial2" => "$parcial2",
      "total_1" => "$_POST[marcador1]",
      "total_2" => "$_POST[marcador2]"

    );
    guardarJson($idevento, $marcadorArray);
  }
?>

<!--
<table>
    <tr class="encabezado">
        <td>Jugadores</td>
        <td>Parcial</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
    </tr>
    <tr>
        <td class="gris">
            <input type="text" name="jugador0"/>
        </td>
        <td><input type="text" class="numero" name="parcial0" value="0"></td>
        <td class="gris"><input type="text" class="numero" name="set_0_0"  value="0"></td>
        <td><input type="text" class="numero" name="set_0_1"  value="0"></td>
        <td class="gris"><input type="text" class="numero"name="set_0_2"  value="0"></td>
        <td><input type="text" class="numero" name="set_0_3"  value="0"></td>
        <td class="gris"><input type="text" class="numero" name="set_0_4"  value="0"></td>
    </tr>
    <tr>
        <td class="gris">
            <input type="text" name="jugador1"/>
        </td>
        <td><input type="text" class="numero" name="parcial1"  value="0"></td>
        <td class="gris"><input type="text" class="numero" name="set_1_0"  value="0"></td>
        <td><input type="text" class="numero" name="set_1_1"  value="0"></td>
        <td class="gris"><input type="text" class="numero" name="set_1_2"  value="0"></td>
        <td><input type="text" class="numero" name="set_1_3"  value="0"></td>
        <td class="gris"><input type="text" class="numero" name="set_1_4"  value="0"></td>
    </tr>
</table>
<input id="guardar" type="submit" value="guardar y publicar">
-->
