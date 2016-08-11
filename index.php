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
        input, button {
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
        #desempateDiv {
          display: none;
        }
    </style>

    <script>
    /*
        function validar() {

            var form = document.getElementById("form");


            if ( form.idEvento.value =="" ) {

                alert("Falta el ID del Evento");

                return false;

            }
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
        */
    </script>


</head>
<body>

    <h1>Guillermo Telltronix 2000 - Arco y Flecha</h1>

    <form id="form" name="form" action="index.php" method="post" >
       <input type="hidden" name="marcadores0"/>
       <input type="hidden" name="marcadores1"/>
        <h3>ID de Evento</h3>
        <p>
            <input type="text" name="idEvento" value="<?php echo $_POST['idEvento'] ?>" />
            <input type="submit" name="guardarIdEvento" value="guardar">
        </p>
            <em>*Siempre asigne un id de evento único (sólo números)</em>

        <?php //tablaPuntos(); ?>


    <?php
      if($_POST['idEvento'] && !file_exists("eventos/".$_POST['idEvento'].".json")):
        crearJson($_POST['idEvento']);
      endif;
      if (file_exists("eventos/".$_POST['idEvento'].".json") && !$_POST['refrescarForm']):
        formAJson($_POST['idEvento']);
      endif;
      if ($_POST['refrescarForm'] == "si"):
        fornToJson($_POST['idEvento']);
        formAJson($_POST['idEvento']);
      endif;
      //echo $_POST['jugador0']."asdasdasd";
    ?>
    </form>
    <div id="desempateDiv" style="margin-top: 150px">
      <h2>Elegir ganador por desempate:</h2>
      <table style="width:900px;">
        <tr>
          <td class="gana1fondo"><button class="desempate-class" id="desempate1" type="button" value="jugador1"></button></td>
          <td class="gana2fondo"><button class="desempate-class" id="desempate2" type="button" value="jugador2"></button></td>
        </tr>
      </table>
    </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){

          var jugador0 = $("[name='jugador0']").val();
          var jugador1 = $("[name='jugador1']").val();

          $("#desempate1").text(jugador0);
          $("#desempate2").text(jugador1);

          var ultimoJuego = $("#next").val();
          var desempate = +ultimoJuego +1;

          $("#next").click(function(){
              $('#puntos input[type="text"]').each(function() {
                $(this).val('0');
              });
              var valor = $("#next").val();
              $("#juegoActual").val(valor);
              if (desempate > 6) {
                $("#next").attr("disabled", true);
                $("#next").text("Desempate");
                $("#desempateDiv").show();
                $("[name='guardarJsonBoton']").attr("disabled", true);
                //guardarIdEvento
              }
              //console.log(valor);
          });

          $(".desempate-class").click(function(){
            var idEvento = $("[name='idEvento']").val();
            var idJugador = $(this).attr('value');
            var idClass = $(this).attr('id');
            $("#"+idClass).parent().css('background-color', 'blue');
            $.ajax({
                type: 'POST',
                url: 'desempate.php',
                data: {'idArchivo' : idEvento, 'idganador': idJugador,},
                success: function(data) {
                  console.log(data)
                }
            });


          });

      });
  </script>
 </body>
</html>
