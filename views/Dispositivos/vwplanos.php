
<script>
    var ubicacion = ["", "", "", "", "", "", "", ""];
    function back() {
        $("#imgplano").attr("src", "../resources/img/cic2.jpg");
        $("#atrasLevels").addClass("d-none");
        $("#datos").addClass("d-none");
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levels");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
    function backS() {
        $("#imgplano").attr("src", "../resources/img/escuelas.jpg");
        $("#atrasSchool").addClass("d-none");
        $("#imgplano").attr("usemap", "#schools");
        $("#imgplano").attr("width", "645");
        $("#imgplano").attr("height", "645");
        $("#niveltext").text("");
        $("#info").text("Selecciona en la imgen en la escuela donde se colocara el sensor");
    }
    function settoCIC() {
        ubicacion[1] = "CIC";
        ubicacion[4] = "Norte";
        ubicacion[5] = "Interior";

        $("#imgplano").attr("src", "../resources/img/cic2.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
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
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn1");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
      function settoN0() {
        ubicacion[2] = "Ediicio 1";
        ubicacion[3] = "Nivel 0";

        $("#imgplano").attr("src", "../resources/img/CIC-N0.jpg");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn0");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 0");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
    function settoN2() {
        ubicacion[2] = "Ediicio 1";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/CIC-N2.jpg");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn2");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
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
        function getinfo(a) {
        $("#infolugar").text($(a).attr("id"));
    };
    function limpia(b) {
        $("#infolugar").text('');
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
                        <div class="row" >
                        <div class="col-2">
                            <div id="datos" class="d-none" style="margin-top: 20%; border: 1px solid #040505;">
                                <p id="infolugar" style="color: #000; font-size:20px;"></p>
                            </div>
                        </div>
                        <div class="col-10">
                        <img  id="imgplano" src="../resources/img/escuelas.jpg" width="645" height="645" alt="Escuelas" usemap="#schools">

                        <map name="schools">
                            <area shape="rect" coords="11,21,258,258" alt="cic" nohref onclick="settoCIC();return false;">
                        </map> 

                        <map name="levels"> 
                            <area id="CICN1" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN1();return false;">
                            <area id="CICN0" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoN0();return false;">
                            <area id="CICN2" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN2();return false;">
                        </map> 
                        
                        <map name="mapn1">
                            <area id="Fabrica de Software" shape="rect" coords="870,476,1028,570" alt="Fabrica de Software" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
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
                        <map name="mapn0">
                            <area id="Almacen Refrigeracion" shape="rect" coords="190,505,255,535" alt="Almacen Refrigeracion" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Montacargas" shape="rect" coords="148,500,170,520" alt="Montacargas" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Area de Lavado" shape="rect" coords="130,521,185,548" alt="Area de Lavado" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen 2" shape="rect" coords="130,425,250,500" alt="Almacen 2" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Limpieza" shape="rect" coords="198,390,250,423" alt="Limpieza" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="AlmacenCafeteria" shape="rect" coords="130,550,165,600" alt="Almacen Cafeteria" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Proyectos" shape="rect" coords="130,602,260,700" alt="Almacen Proyectos" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Ups" shape="poly" coords="805,515,860,515,860,582,931,582,931,705,805,705" alt="Ups" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Subestacion" shape="rect" coords="861,515,931,578" alt="Subestacion" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Servicio LAB MICRO SE" shape="rect" coords="820,339,870,370" alt="Servicio LAB MICRO SE" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="LAB Comunicaciones" shape="rect" coords="820,260,935,337" alt="LAB Comunicaciones" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen1" shape="rect" coords="820,418,935,500" alt="Almacen1" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Jardineria" shape="rect" coords="132,55,250,150" alt="Jardineria" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Archivo de Tramite" shape="rect" coords="132,152,250,257" alt="Jardineria" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Mantenimiento" shape="rect" coords="132,260,250,350" alt="Mantenimiento" noherf onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Activo Fijo" shape="rect" coords="820,55,935,150" alt="LAB Comunicaciones" noherf onclick="ubicacionFinal(this);return false;">
                        </map> 
                        <map name="mapn2">
                            <area id="Area Secretarial Recursos Financieros" shape="rect" coords="153,75,435,202" alt="Area Secretarial Recursos Financieros" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Area Secretarial Recursos Financieros" shape="rect" coords="437,45,535,152" alt="Area Secretarial Recursos Financieros" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Refrigeracion" shape="rect" coords="190,505,255,535" alt="Almacen Refrigeracion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                         
                        </map>
                        </div></div></div>
                </div>
            </div>  
            <div  class="modal-footer">
            </div>
        </div>  </div>
</div>
</div>
</div>