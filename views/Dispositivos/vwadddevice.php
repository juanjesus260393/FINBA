<?php

/**
 *  proyecto FINBA
 *   Nombre: vwadddevice
 *   Autor: Isidro Delgado Murillo
 *   Fecha: 13-03-2019
 *   Versión: 1.0
 *   Descripcion: Vista principal del control de dispositivos , registro , eliminacino o consulta
 *   por Fabrica de Software, CIC-IPN
 **/

include('../views/template1.php');
?>
<?php
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<div class="container">
    
    <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
    </li>
      <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#second">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Registrar">Registrar Nuevo Dispositivo</a>
    </li>
    
  </ul>
    <div class="tab-content">
    <div id="second" class="container tab-pane active"><br>
      
    </div>
         <div id="home" class="container tab-pane active"><br>
      
    </div>
    <div id="Registrar" class="container tab-pane fade"><br> 
    <!-- Codigo de Vista-->
    <div class="row">
        <br> <br>

    </div>
    <div class="row">
        <div class="col-1"></div>
        <div id="formulario" >

            <script>
                $(document).ready(function () {
                    $("#dvcmac").on("keyup", function () {
                        if ($('#dvcmac').val().length === 2 || $('#dvcmac').val().length === 5 || $('#dvcmac').val().length === 8
                                || $('#dvcmac').val().length === 11 || $('#dvcmac').val().length === 14) {
                            $('#dvcmac').val($('#dvcmac').val() + ":");
                        }
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
                            <input type="text" id="dvcmac1" name="dvcmac1" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
                            <input type="text" id="dvcmac2" name="dvcmac2" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
                            <input type="text" id="dvcmac3" name="dvcmac3" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
                            <input type="text" id="dvcmac4" name="dvcmac4" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
                            <input type="text" id="dvcmac5" name="dvcmac5" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">:
                            <input type="text" id="dvcmac6" name="dvcmac6" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros">

                        </div></div>
                    <div class="row">
                        <div class="col-5"> 
                            <label>Nombre, marca o Modelo del Dispositivo</label> 
                        </div>
                        <div class="col-5">
                            <input type="text" id="namedvc" name="namedvc" maxlength="52" required="">
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-5">
                            Tipo de Dispositivo
                        </div>
                        <div class="col-7">
                            
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="agua" name="tipo" value="Agua">
                            <label class="custom-control-label" for="agua">Agua</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="electricidad" name="tipo" value="Electricidad">
                            <label class="custom-control-label" for="electricidad">Electricidad</label>
                            <hr>
                        </div>
                        
                       
                    </div></div>
                <div class="row">   
                    <div class="col-5"> 
                        <button type="button" class='btn btn-success'  data-toggle='modal' id='idcup' data-target='#exampleModal'>Ubicación</button>
                        <br><br>
                        <hr>
                        <input type="submit" class='btn btn-primary'  name="AddDvc" value="Registrar Dispositivo">
                    </div>
                    <div class="col-5">


                        <p><input type="text" id="dos" name="dos" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
                        <p><input type="text" id="tres" name="tres" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
                        <p><input type="text" id="cuatro" name="cuatro"readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
                        <p><input type="text" id="cinco" name="cinco" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
                        <p><input type="text" id="seis" name="seis" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
                        <p><input type="text" id="siete" name="siete" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>
                        <p><input type="text" id="ocho" name="ocho" readonly style="border: 0; background-color: #fafafa; outline: none;" required=""/></p>

                    </div>    
                </div>

        </div>                                                       

        </form>


    </div>
</div>
</div>
    </div>
</div>






<?php
require('../views/Dispositivos/vwplanos.php');
include('../views/template2.php');
