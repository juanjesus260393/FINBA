<script>
    var ubicacion = [""];
    function settoCIC2(a) {

        ubicacion[1] = ($(a).attr("id"));
        
        $("#exampleModal2").removeClass("in");
        $(".modal-backdrop").remove();
        $("#exampleModal2").hide();
        $("#exampleModal2").modal("hide");
        $("#location_investorp").val(ubicacion[1]);

    }
</script>
<div class="modal" id="exampleModal2"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
                                <h3 id="info">Selecciona en la imagen el lugar en el que se colocara el panel</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-10" style="overflow-x: auto;">
                        <img  id="imgplano" src="../resources/img/edificios/cic.JPG" width="645" height="645" alt="Escuelas" usemap="#schools">
                        <map name="schools">
                            <area id="techo" shape="poly"   coords="288,145,633,302,464,640,126,480" alt="Ubicacion" nohref onclick="settoCIC2(this);return false;">
                            <area id="estacionamiento" shape="rect"  coords="68,7,205,91" alt="Ubicacion" nohref onclick="settoCIC2(this);return false;">
                        </map>  
                    </div>
                </div>
            </div>  
        </div>  
    </div>
</div>


