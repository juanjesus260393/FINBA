<script>
    var ubicacioni = [""];
    function settoCIC1(a) {

        ubicacioni[1] = ($(a).attr("id"));
        
        $("#exampleModal1").removeClass("in");
        $(".modal-backdrop").remove();
        $("#exampleModal1").hide();
        $("#exampleModal1").modal("hide");
        $("#location_investori").val(ubicacioni[1]);

    }
</script>
<div class="modal" id="exampleModal1"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
                                <h3 id="info">Selecciona en la imagen el lugar en el que se colocara el inversor</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-10" style="overflow-x: auto;">
                        <img  id="imgplano" src="../resources/img/edificios/cic.jpg" width="645" height="645" alt="Escuelas" usemap="#schoolsi">
                        <map name="schoolsi">
                            <area id="techo" shape="poly"   coords="288,145,633,302,464,640,126,480" alt="Ubicacion" nohref onclick="settoCIC1(this);return false;">
                            <area id="estacionamiento" shape="rect"  coords="68,7,205,91" alt="Ubicacion" nohref onclick="settoCIC1(this);return false;">
                        </map>  
                    </div>
                </div>
            </div>  
        </div>  
    </div>
</div>


