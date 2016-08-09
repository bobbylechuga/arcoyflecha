function escribirhtml(){
  var d = new Date();
  var n = d.getTime();
  $.getJSON('http://localhost/arcoyflecha/json.php?id=9999&v='+n, function(data) {
      var jugador1;
      var jugador2;
      var parcial1;
      var parcial2;
      var servicio;
      var sets;
      var marcaValor;

      jugador1 = data[0].nombre;
      jugador2 = data[1].nombre;
      parcial1 = data[0].parcial;
      parcial2 = data[1].parcial;
      var marcador;
      $("#p1").text(jugador1);
      $("#p2").text(jugador2);
      /* Parciales */
      $("#ptoPlayer1").text(parcial1);
      $("#ptoPlayer2").text(parcial2);
      data = data.slice(0, 2);
      $.each(data, function(index, element) {

          if (element.servicio === true) {
            servicio = "#servPlayer"+index;
            $(servicio).addClass("on");
          }else if (element.servicio === false) {
            servicio = "#servPlayer"+index;
            $(servicio).removeClass("on");
          }

          marcador = element.marcador;
          console.log(marcador);
          for (var i =0; i < marcador.length;i++) {
            sets= "#set_player"+index+"_"+i;
            marcaValor = marcador[i];
            $(sets).text(marcaValor);
          }


      });
  });
}
escribirhtml();
setInterval(escribirhtml, 3000);
