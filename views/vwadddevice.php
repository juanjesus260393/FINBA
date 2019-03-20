<<<<<<< HEAD
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
<form method="POST" action="../controllers/crtadddvc.php">
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
             <div class="col-12">
   
    <h2>Agrega un nuevo dispositivo </h2>
    <hr/>
             </div>
        </div>
        <div class="row">
            <div class="col-4">
    <label>Direccion Mac del sensor</label> 
            </div>
    <div class="col-8">
        <input type="text" id="dvcmac1" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac2" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac3" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac4" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac5" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac6" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">
       
    </div></div>
        <div class="row">
            <div class="col-5"> 
    <label>Nombre, marca o Modelo del Dispositivo</label> 
    </div>
    <div class="col-5">
        <input type="text" id="namedvc" maxlength="52" required="">
     </div>    
            </div>
            <div class="row">
            <div class="col-5"> 
                <button type="button" class='btn btn-success'  data-toggle='modal' id='idcup' data-target='#exampleModal'>Ubicación</button>
                <br><br>
                <hr>
                <input type="submit" class='btn btn-primary'  data-toggle='modal' value="Registrar Dispositivo">
    </div>
    <div class="col-5">
        
           
        <p><input type="text" id="dos" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>  <input type="text" id="tres" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>  <input type="text" id="cuatro" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>  <input type="text" id="cinco" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>   <input type="text" id="seis" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p><input type="text" id="siete" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p><input type="text" id="ocho" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
       
     </div>    
            </div>
  
    </div>                                                       
    
</form>


</div>
    </div>


</div>






<?php
require('../views/vwplanos.php');
include('../views/template2.php');
=======
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
<form method="POST" action="../controllers/crtadddvc.php">
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
             <div class="col-12">
   
    <h2>Agrega un nuevo dispositivo </h2>
    <hr/>
             </div>
        </div>
        <div class="row">
            <div class="col-4">
    <label>Direccion Mac del sensor</label> 
            </div>
    <div class="col-8">
        <input type="text" id="dvcmac1" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac2" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac3" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac4" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac5" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
        <input type="text" id="dvcmac6" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">
       
    </div></div>
        <div class="row">
            <div class="col-5"> 
    <label>Nombre, marca o Modelo del Dispositivo</label> 
    </div>
    <div class="col-5">
        <input type="text" id="namedvc" maxlength="52" required="">
     </div>    
            </div>
            <div class="row">
            <div class="col-5"> 
                <button type="button" class='btn btn-success'  data-toggle='modal' id='idcup' data-target='#exampleModal'>Ubicación</button>
                <br><br>
                <hr>
                <input type="submit" class='btn btn-primary'  data-toggle='modal' value="Registrar Dispositivo">
    </div>
    <div class="col-5">
        
           
        <p><input type="text" id="dos" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>  <input type="text" id="tres" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>  <input type="text" id="cuatro" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>  <input type="text" id="cinco" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p>   <input type="text" id="seis" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p><input type="text" id="siete" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
        <p><input type="text" id="ocho" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
       
     </div>    
            </div>
  
    </div>                                                       
    
</form>


</div>
    </div>


</div>






<?php
require('../views/vwplanos.php');
include('../views/template2.php');
>>>>>>> 5d174fcfa6cbc7ec4bcfececa4991851cc2dfac4
