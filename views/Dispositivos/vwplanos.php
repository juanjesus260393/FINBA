<script>
    var ubicacion = ["", "", "", "", "", "", "", ""];
    function back() {
        $("#imgplano").attr("src", "../resources/img/cic.jpg");
        $("#atrasLevels").addClass("d-none");
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levels");
        $("#imgplano").attr("width", "600");
        $("#niveltext").text("");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
    function backS() {
        $("#imgplano").attr("src", "../resources/img/escuelas.jpg");
        $("#atrasSchool").addClass("d-none");
        $("#imgplano").attr("usemap", "#schools");
        $("#imgplano").attr("width", "645");
        $("#niveltext").text("");
        $("#info").text("Selecciona en la imgen en la escuela donde se colocara el sensor");
    }
    function settoCIC() {
        ubicacion[1] = "CIC";
        ubicacion[4] = "Norte";
        ubicacion[5] = "Interior";

        $("#imgplano").attr("src", "../resources/img/cic.jpg");
        $("#imgplano").attr("width", "600");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#levels");
        $("#atrasSchool").removeClass("d-none");
        $("#niveltext").text("CIC");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
    function settoN1() {
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/cicN1-nombres.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("usemap", "#mapn1");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
    ;
    function ubicacionFinal(a) {

        ubicacion[6] = ($(a).attr("id"));
        ubicacion[7] = 1;
        
        $("#exampleModal").modal("hide");
        $("#dos").val(ubicacion[1]);
        $("#tres").val(ubicacion[2]);
        $("#cuatro").val(ubicacion[3]);
        $("#cinco").val(ubicacion[4]);
        $("#seis").val(ubicacion[5]);
        $("#siete").val(ubicacion[6]);
        $("#ocho").val(ubicacion[7]);
    };
</script>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal1-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubicación del Sensor</h5>
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
                                <button id="atrasSchool" class="d-none btn-primary" onclick="backS();">Elegir otra escuela</button>
                                <h3 id="info">Selecciona en la imgen en la escuela donde se colocara el sensor</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-10" style="overflow-x: auto;">
                        
                        <img  id="imgplano" src="../resources/img/escuelas.jpg" width="645" height="645" alt="Escuelas" usemap="#schools">

                        <map name="schools">
                            <area shape="rect" coords="11,21,258,258" alt="cic" nohref onclick="settoCIC();return false;">
                        </map> 

                        <map name="levels">
                            <area shape="rect" coords="0,0,82,126" alt="N3" href="sun.htm">
                            <area shape="circle" coords="90,58,3" alt="Mercury" href="mercur.htm">
                            <area id="CICN1" shape="rect" coords="0,310,700,210" alt="Venus" nohref onclick="settoN1();return false;">
                        </map> 
                        
                        <map name="mapn1">
                            <area id="Fabrica de Software" shape="rect" coords="870,476,1028,570" alt="Fabrica de Software" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="SITE" shape="rect" coords="731,590,863,696" alt="SITE" noherf onclick="ubicacionFinal(this); return false;">
                            <area id="Cafeteria" shape="rect" coords="56,480,264,698" alt="Cafeteria" noherf onclick="ubicacionFinal(this); return false;">
                            <area id="Departamento de Tecnologias Educativas" shape="rect" coords="871,575,1030,700" alt="Dpto. de Tecnologias Educativas" noherf onclick="ubicacionFinal(this); return false;" >
                            <area id="Salas de Usos Multiples" shape="rect" coords="50,15,356,144" alt="Salas de Usos Multiples" noherf onclick="ubicacionFinal(this); return false;" >
                            <area id="Sala de Video Conferencias" shape="rect" coords="53,188,194,227" alt="Sala de Video Conferencias" noherf onclick="ubicacionFinal(this); return false;" >
                            <area id="Aula E4" shape="rect" coords="261,487,348,616" alt="Aula E4" noherf onclick="ubicacionFinal(this); return false;" >
                            <area id="Aula E5" shape="rect" coords="595,594,726,696" alt="Aula E5" noherf onclick="ubicacionFinal(this); return false;" >
                            <area id="Aula E3" shape="rect" coords="408,488,468,589" alt="Aula E3" nohref onclick="ubicacionFinal(this); return false;"> 
                            <area id="Aula 1" shape="rect" coords="336,619,391,695" alt="Aula 1" nohref onclick="ubicacionFinal(this); return false;"> 
                            <area id="Aula 2" shape="rect" coords="401,614,455,694" alt="Aula 2" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Aula 3" shape="rect" coords="463,619,526,696" alt="Aula 3" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Aula 4" shape="rect" coords="533,617,590,695" alt="Aula 4" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Aula E1" shape="rect" coords="595,132,729,220" alt="Aula E1" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Biblioteca" shape="poly" coords="360,17,654,17,654,95,614,95,614,122,472,122,472,221,360,220" alt="Biblioteca" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Fuente" shape="circle" coords="540,355,66" alt="Fuente" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Laboratorio de Prototipos de Hardware" shape="rect" coords="777,492,866,548" alt="Laboratorio de Prototipos de Hardware" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Conmutador" shape="rect" coords="54,152,123,177" alt="Conmutador" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="Aula 6" shape="rect" coords="737,19,861,122" alt="Aula 6" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="IDF" shape="rect" coords="476,563,502,582" alt="IDF" nohref onclick="ubicacionFinal(this); return false;">
                            <area id="IDF N-N1" shape="rect" coords="505,564,563,588" alt="IDF N-N1 " nohref onclick="ubicacionFinal(this); return false;">
                            
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