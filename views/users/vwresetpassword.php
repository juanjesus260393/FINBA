<div class="modal" id="resetpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="controllers/crtauth.php" name="form1" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" style="text-align: center;">Restablecer Contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <center>
                            <div>
                                <!-- Nombre de usuario -->
                                <span><label>Nombre de usuario (Correo electronico):</label></span>
                                <span><input type="text" id="usernameresetpass" name="usernameresetpass" placeholder="username" maxlength="99" onblur = "validarCorreoresetpass();" required></span>
                            </div>
                            <div hidden="true">
                                <!-- identificador reset contraseña -->
                                <span><input type="text" id="resetpass" name="resetpass" value="1"></span>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- En el boton registrar se encuentra una alerta para validar que efectivamente se quiere registrar el cupon-->
                    <input type="submit" class="btn btn-primary"
                           onclick="if (!confirm('Estas seguro que quieres solicitar una nueva contraseña')) {
                                       return false;
                                   }" value="Restablecer Contraseña" >
                </div>
            </form>
        </div>
    </div>
</div>  
