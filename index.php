<?php
  require_once("inc/funciones.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Marcatronix 2000</title>
    <style>

        * {
            font-family: "Helvetica";
            color: dimgrey;
        }
        body {

            margin:20px;
        }

        h1 {

            color: dodgerblue;

        }
        h3 {

            margin-left:5px;
        }
        em {
            padding-top:0px;
            margin-top:0px;
            font-size:12px;
        }

        table {
            text-align:center;
        }
        input {
            padding: 5px;
            font-size:16px;
        }

        td input {

            text-align: center;

        }

        #deportes p{

            display:block;

            float:left;

        }


        .numero {

            width:50px;

        }
        .encabezado td {

           color: black;
           font-weight: bolder;
           font-size:20px;
           padding: 10px;
           background-color:#999;
        }
        td {
            background-color:#E1E1E1;
            padding:10px;
        }

        .gris {

            background-color:#EEE;
        }


        #guardar {
            font-size: 14px;
            margin-top: 20px;
            width: 200px;
            height: 30px;
            color:white;
            background-color: dodgerblue;
            border: none;
        }

    </style>

    <script>

        function validar() {

            var form = document.getElementById("form");


            if ( form.idEvento.value =="" ) {

                alert("Falta el ID del Evento");

                return false;

            }


            /*if ( form.jugador0.value=="" ||  form.jugador1.value=="" ) {

                alert("Ingresa los jugadores");

                return false;

            } */

            var j1 = new Array();
            var j2 = new Array();

            for ( var i = 0; i<6; i++) {

                j1.push( form["set_0_"+i].value);
                j2.push( form["set_1_"+i].value);
            }

            form.marcadores0.value = j1.join(",");
            form.marcadores1.value = j2.join(",");

            return true;
        }
    </script>


</head>
<body>

    <h1>Marcatronix 2000</h1>

    <form id="form" name="form" action="index.php" method="post" onsubmit="return validar();">
       <input type="hidden" name="marcadores0"/>
       <input type="hidden" name="marcadores1"/>



        <h3>ID de Evento</h3>
        <p>
            <input type="text" name="idEvento"/></p>
            <em>*Siempre asigne un id de evento único (sólo números)</em>

        <h3>Marcador</h3>
        <table>
            <tr class="encabezado">
                <td>Jugadores</td>
                <td>Servicio</td>
                <td>Parcial</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
            <tr>
                <td class="gris">
                    <input type="text" name="jugador0"/>
                </td>
                <td><input id="s0" type="radio" name="servicio" value="0"></td>
                <td><input type="text" class="numero" name="parcial0" value="0"></td>
                <td class="gris"><input type="text" class="numero" name="set_0_0"  value="0"></td>
                <td><input type="text" class="numero" name="set_0_1"  value="0"></td>
                <td class="gris"><input type="text" class="numero"name="set_0_2"  value="0"></td>
                <td><input type="text" class="numero" name="set_0_3"  value="0"></td>
                <td class="gris"><input type="text" class="numero" name="set_0_4"  value="0"></td>
                <td><input type="text" class="numero" name="set_0_5"  value="0"></td>
            </tr>
            <tr>
                <td class="gris">
                    <input type="text" name="jugador1"/>
                </td>
                <td><input id="s1" type="radio" name="servicio" value="1"></td>
                <td><input type="text" class="numero" name="parcial1"  value="0"></td>
                <td class="gris"><input type="text" class="numero" name="set_1_0"  value="0"></td>
                <td><input type="text" class="numero" name="set_1_1"  value="0"></td>
                <td class="gris"><input type="text" class="numero" name="set_1_2"  value="0"></td>
                <td><input type="text" class="numero" name="set_1_3"  value="0"></td>
                <td class="gris"><input type="text" class="numero" name="set_1_4"  value="0"></td>
                <td><input type="text" class="numero" name="set_1_5"  value="0"></td>
            </tr>


        </table>
        <input id="guardar" type="submit" value="guardar y publicar">

    </form>
    <!--
    <script>
        var json = function (data){

            var form = document.getElementById("form");

            form.idEvento.value = data[2]["idEvento"];

            for ( var i = 0; i<2; i++) {


                form["jugador"+i].value = data[i]["nombre"];
                form["parcial"+i].value = data[i]["parcial"];


                for ( var j = 0; j< data[i].marcador.length; j++) {

                     form["set_"+i+"_"+j].value = data[i].marcador[j];
                }

                document.getElementById("s"+i).checked = data[i]["servicio"] == true ? "checked" : false;
            }
        }
    </script>
   <script src='eventos/9999.json'></script></body>-->
</html>
