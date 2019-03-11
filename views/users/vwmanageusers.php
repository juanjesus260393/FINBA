<?php 
include('../views/template1.php');
?>
<div hidden="true">
    <?php
    session_start();
    require_once("C:/xampp/htdocs/finbaproject/FINBA/models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>

            <div class="container">
                <center><h2>Administracion de usuarios</h2></center>   
                <center> <table class="table">
                        <thead>
                            <tr>
                                <th>Username(correo)</th>
                                <th>Tipo de Usuario</th>
                                <th>Eliminar Usuario</th>
                                <th>Editar Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $listofusers;
                            if (empty($listofusers)) {
                                $voidarray = array();
                                $listofusers = $voidarray;
                            }
                            for ($i = 0; $i < count($listofusers); $i++) {
                                ?>
                                <tr  class='btn-outline-primary'>
                                    <td><?php echo $listofusers[$i]["username"]; ?></td>
                                    <?php
                                    if ($listofusers[$i]["type_user"] == 'Administrator') {
                                        printf("<td height='80'  style='color: #EA1515 ;'><h5><b>Administrador</b></h5></td>");
                                    } else if ($listofusers[$i]["type_user"] == 'Employee') {
                                        printf("<td height='80'  style='color: blue ;'><h5><b>Empleado</b></h5></td>");
                                    }
                                    ?>
                                    <td> 
                                        <?php
                                        $usernamedelete = $listofusers[$i]["username"];
                                        $delete = '1';
                                        $onydelete = '1';
                                        echo '<a href="../controllers/crtusers.php?username=' . $usernamedelete . '&delete=' . $delete . '&onlydelete =' . $onydelete . '" '
                                        . 'onclick="if (!confirm(\'Estas seguro que quieres eliminar este usuario?\')) '
                                        . '{ return false}"><img src="../resources/img/eliminar.jpg"></a>'
                                        ?></td>
                                    <td><form method="post" action="../controllers/crtusers.php">
                                            <?php
                                            $usernameupdate = $listofusers[$i]["username"];
                                            $typeuserupdate = $listofusers[$i]["type_user"];
                                            if ($typeuserupdate == 'Administrator') {
                                                $typeuserupdate = 'Administrador';
                                            }
                                            if ($typeuserupdate == 'Employee') {
                                                $typeuserupdate = 'Empleado';
                                            }
                                            $update = '1';
                                            echo "<input type='hidden' id='usernameupdate' name='usernameupdate' value='$usernameupdate'> "
                                            . "<input type='hidden' id='update' name='update' value='$update'> "
                                            . "<input type='hidden' id='typeuserupdate' name='typeuserupdate' value='$typeuserupdate'>"
                                            . "<input type='submit' value='Actualizar'>"
                                            ?>
                                        </form></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table></center>
                <center>
                    <form method="post" action="../controllers/crtusers.php" name="form1" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="container">
                                <center>
                                    <div hidden="true">
                                        <!-- value insert -->
                                        <input class="col-8" type="text" id="insert" name="insert"  value="true">
                                    </div>
                                </center>
                            </div>
                        </div>
                        <center><div class="modal-footer">
                                <input type="submit" class="btn btn-primary"value="Registrar Usuario" >
                            </div></center>
                    </form>
                </center> 
            </div>  

<?php

include('../views/template2.php');