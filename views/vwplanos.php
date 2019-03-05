<script> 
    var ubicacion=["escuela", "edificio", "nivel", "orientacion", "ubicacion", "referencia", "numero-registro"];
   function back(){
        $("#imgplano").attr("src", "../resources/img/cic.jpg");
        $("#atrasLevels").addClass("d-none");
        $("#imgplano").attr("usemap", "#levels");
         $("#imgplano").attr("width", "#600");
    $("#niveltext").text("");
     $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
function settoN1(){
    ubicacion[2]= "Nivel 1";
    
    $("#imgplano").attr("src", "../resources/img/cicN1-nombres.png");
     $("#imgplano").attr("width", "#1100");
      $("#imgplano").attr("usemap", "#mapn1");
      $("#atrasLevels").removeClass("d-none");
       $("#niveltext").text("Nivel 1");
      $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
};
function ubicacionFinal(a){
   ubicacion[4]=($(a).attr("id"));
    $("#exampleModal").modal("hide");
    $("#inputUbicacion").text(ubicacion);
};
</script>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal1-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sitio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " >
                <div class="row align-content-center text-center">
                    <div class="col-2 " >
                        <div class="row" style="height: 100px"></div>
                        <div class="row justify-content-center align-items-center" >
                            <div class="col-12">
                            <h1 id="niveltext"></h1>
                            <hr/>
                            <button id="atrasLevels" class="d-none btn-primary" onclick="back();">Elegir otro nivel</button>
                            <h3 id="info">Selecciona en la imgen en que nivel se colocara el sensor</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <img id="imgplano" src="../resources/img/cic.jpg" width="700" height="720" alt="Niveles" usemap="#levels">

                <map name="levels">
                    <area shape="rect" coords="0,0,82,126" alt="N3" href="sun.htm">
                    <area shape="circle" coords="90,58,3" alt="Mercury" href="mercur.htm">
                    <area id="CICN1" shape="rect" coords="0,310,700,210" alt="Venus" nohref onclick="settoN1();return false;">
                </map> 
                        <map name="mapn1">
                            <area id="Fabrica de Software" shape="rect" coords="870,476,1028,570" alt="Fabrica de Software" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="SITE" shape="rect" coords="731,590,867,696" alt="SITE" noherf onclick="ubicacionFinal(this);return false;">
                        </map>
                    </div>
                </div>
            </div>  
            <div  class="modal-footer">

            </div>


        </div>  </div>
</div>
</div>
</div>