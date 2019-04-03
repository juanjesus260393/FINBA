<?php
session_start();
require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
require_once '../../models/mdladddvc.php';
mdlsecurity::validateToken();
$mdlupdate= new mdladddvc();
$mactoset= filter_input(INPUT_POST, 'mactoupdate');
$infodvc= $mdlupdate->getupdateinfo($mactoset);
$macarray= explode(":", $infodvc[0][0]);

?>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap-grid.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/Comprobaciones.js"></script>
        <title>Agregar Usuario</title>
    </head>
    <script>
        $(document).ready(function () {
            $('#updatemodal').modal("show");
            $('#updatemodal').on('hidden.bs.modal', function () {
                document.location.href = '../../controllers/crtadddvc.php';
            });
            
            
            
        });

    </script>

    <body>
        
<div class="modal" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-lg modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Sensor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>         
            </div>
            <div class="modal-body " >
              
                               <form method="POST" action="../../controllers/crtadddvc.php">
                <style>
                    hr {
                        margin-top: 1rem;
                        margin-bottom: 1rem;
                        border: 5px;
                        border-top: 5px solid rgba(0,0,0,.1);
                    }
                   
                </style>
               
                    <div class="row">
                        <div class="col-12">

                            <h2>Actualiza la información del dispositivo </h2>
                            <hr/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Direccion Mac del sensor</label> 
                        </div>
                        <div class="col-8">
                            <input type="text" id="dvcmac1" name="dvcmac1" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros" value="<?php echo $macarray[0]; ?>">:
                            <input type="text" id="dvcmac2" name="dvcmac2" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros" value="<?php echo $macarray[1]; ?>">:
                            <input type="text" id="dvcmac3" name="dvcmac3" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros" value="<?php echo $macarray[2]; ?>">:
                            <input type="text" id="dvcmac4" name="dvcmac4" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros" value="<?php echo $macarray[3]; ?>">:
                            <input type="text" id="dvcmac5" name="dvcmac5" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros" value="<?php echo $macarray[4]; ?>">:
                            <input type="text" id="dvcmac6" name="dvcmac6" size="1" maxlength="2" required pattern="[A-Za-z0-9ñÑ]+" title="Solo letras y Numeros" value="<?php echo $macarray[5]; ?>">
                            <input type="hidden" name="mactoupdates" value="<?php echo $infodvc[0][0]; ?>">
                        </div></div>
                    <div class="row">
                        <div class="col-5"> 
                            <label>Nombre, marca o Modelo del Dispositivo</label> 
                        </div>
                        <div class="col-5">
                            <input type="text" id="namedvc" name="namedvc" maxlength="52" required="" value="<?php echo $infodvc[0][1]; ?>">
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-5">
                            Tipo de Dispositivo 
                        </div>
                        <div class="col-7">
                         <div class="form-group">
                             <?php if($infodvc[0][2]=="Electricidad") { 
                              echo  ' <label class="custom-control custom-radio">
                                    <input type="radio" value="Agua" id="agua" name="tipo" class="custom-control-input" >
                                <span class="custom-control-label" for="agua">Agua<i style="color: blue ;" class="fas fa-tint"></i></span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input type="radio" value="Electricidad" id="electricidad"name="tipo" class="custom-control-input" checked="">
                                <span class="custom-control-label" for="electricidad">Electricidad<i style="color: orange ;" class="fas fa-bolt"></i></span>
                                </label>
                             <hr>';
                             } if($infodvc[0][2]=="Agua"){ 
                               echo ' <label class="custom-control custom-radio">
                                    <input type="radio" value="Agua" id="agua" name="tipo" class="custom-control-input" checked="">
                                <span class="custom-control-label" for="agua">Agua<i style="color: blue ;" class="fas fa-tint"></i></span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input type="radio" value="Electricidad" id="electricidad"name="tipo" class="custom-control-input">
                                <span class="custom-control-label" for="electricidad">Electricidad<i style="color: orange ;" class="fas fa-bolt"></i></span>
                                </label>
                             <hr>';
                              } ?>
                                </div> 
                    </div></div>
                <div class="row">   
                    <div class="col-5"> 
                        <button type="button" class='btn btn-success'  data-toggle='modal' id='idcup' data-target='#updateubicacion'>Ubicación</button>
                        
                        <br><br>
                        <hr>
                        <input type="submit" class='btn btn-primary'  name="UpdateDvc" value="Actualizar Dispositivo">
                    </div>
                    <div class="col-5">
                        <p><input type="text" id="dos" name="dos" readonly style="border: 0; outline: none;" required="" value="<?php echo $infodvc[0][3] ?>"/></p>
                        <p><input type="text" id="tres" name="tres" readonly style="border: 0;  outline: none;" required="" value="Edificio <?php echo $infodvc[0][4] ?>"/></p>
                        <p><input type="text" id="cuatro" name="cuatro"readonly style="border: 0;  outline: none;" required="" value="Nivel <?php echo $infodvc[0][5] ?>"/></p>
                        <p><input type="text" id="cinco" name="cinco" readonly style="border: 0;  outline: none;" required="" value="<?php echo $infodvc[0][6] ?>"/></p>
                        <p><input type="text" id="seis" name="seis" readonly style="border: 0;  outline: none;" required="" value="<?php echo $infodvc[0][7] ?>"/></p>
                        <p><input type="text" id="siete" name="siete" readonly style="border: 0;  outline: none;" required="" value="<?php echo $infodvc[0][8] ?>"/></p>
                        <p><input type="hidden" id="ocho" name="ocho"  value="<?php echo $infodvc[0][9] ?>"/></p>
                    </div>    
                </div>                                                            
        </form>
            </div>  
            <div  class="modal-footer">
            </div>
        </div>  </div>
</div>
        <?php 
require('../Dispositivos/updateubi.php'); ?>
    </body></html>
