<?php
include('../views/template1.php');

?>
 
<div class="container">
<!-- Codigo de Vista-->
<div class="row">
    <br> <br>
    
</div>
<div class="row">
    <div class="col-1"></div>
<div id="formulario" >
    
<script>
$(document).ready(function(){
  $("#dvcmac").on("keyup", function(){
     if($('#dvcmac').val().length===2||$('#dvcmac').val().length===5||$('#dvcmac').val().length===8
                ||$('#dvcmac').val().length===11||$('#dvcmac').val().length===14){
            $('#dvcmac').val($('#dvcmac').val()+":");}
});
});
</script>
<form>
    <style>
        hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 5px;
    border-top: 5px solid rgba(0,0,0,.1);
}
    </style>
    <div class="conteiner-fluid">
        <div class="row">
             <div class="col-10">
   
    <h2>Agrega un nuevo dispositivo </h2>
    <hr/>
             </div>
        </div>
        <div class="row">
            <div class="col-5">
    <label>Direccion Mac del sensor</label> 
            </div>
    <div class="col-5">
    <input type="text" id="dvcmac" maxlength="17" >
    </div></div>
        <div class="row">
            <div class="col-5"> 
    <label>Nombre, marca o Modelo del Dispositivo</label> 
    </div>
    <div class="col-5">
        <input type="text" id="namedvc" maxlength="52">
     </div>    
            </div>
            <div class="row">
            <div class="col-5"> 
                <input type="button" class='btn-primary'  data-toggle='modal' id='idcup' data-target='#exampleModal' value="Ubicacion
                       ">
    </div>
    <div class="col-5">
        <ul>
           
            <li id="dos"></li>
            <li id="tres"></li>
            <li id="cuatro"></li>
            <li id="cinco"></li>
            <li id="seis"></li>
            <li id="siete"></li>
            <li id="ocho"></li>
        </ul>
     </div>    
            </div>
  
    </div>                                                       
    
</form>


</div>
    </div>









<?php
require('../views/vwplanos.php');
include('../views/template2.php');
