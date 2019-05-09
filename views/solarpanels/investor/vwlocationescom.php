<script>
    var ubicacion = [""];
    function settoESC(a) {

        ubicacion[1] = ($(a).attr("id"));

        $("#escommodal").removeClass("in");
        $(".modal-backdrop").remove();
        $("#escommodal").hide();
        $("#escommodal").modal("hide");
        $("#number_build_solar").val(ubicacion[1]);

    }
</script>
<div class="modal" id="escommodal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal1-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubicación del inversor</h5>
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
                                <h3 id="info">Selecciona el edificio en el que se colocara el inversor</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-10" style="overflow-x: auto;">
                        <img  id="imgescom" src="../resources/img/edificios/escom.jpg" width="645" height="645" alt="Escuelas" usemap="#escom">
                        <map name="escom">
                            <area id="1" shape="poly" coords="267,20,350,59,73,505,20,486" alt="Ubicacion" nohref onclick="settoESC(this);return false;">
                            <area id="2" shape="poly" coords="305,250,405,292,289,508,189,460" alt="Ubicacion" nohref onclick="settoESC(this);return false;">
                            <area id="3" shape="poly" coords="536,134,628,174,373,628,327,617" alt="Ubicacion" nohref onclick="settoESC(this);return false;">
                        </map>  
                    </div>
                </div>
            </div>  
        </div>  
    </div>
</div>


