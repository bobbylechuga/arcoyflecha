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

    <h1>Marcatronix 2000 - Arco y Flecha</h1>

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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
          $("#next").click(function(){

              $('#puntos input[type="text"]').each(function() {
                $(this).val('0');
              });
              var valor = $("#next").val();
              $("#juegoActual").val(valor);
              //console.log(valor);
          });
          /*
          $("#calcular").click(function(){
            var idEvento = $("#calcular").val();

            $.ajax({
                type: 'POST',
                url: 'cerrar.php',
                data: {'idArchivo' : idEvento},
                success: function(data) {

                    console.log(data);
                    if (data.indexOf("parcial1") >= 0) {
                        var valor = data.split(" ");
                        $("#marcador1").val(valor[1]);
                    } else if (data.indexOf("parcial2") >= 0) {
                        var valor = data.split(" ");
                        $("#marcador2").val(valor[1]);
                    } else if (data.indexOf("empate") >= 0) {
                        var valor = data.split(" ");
                        $("#marcador1").val(valor[1]);
                        $("#marcador2").val(valor[2]);
                    }

                }
            });


          });
          */
      });
  </script>
 </body>
</html>
