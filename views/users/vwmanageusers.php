<?php
include('../views/template1.php');
?>
<div hidden="true">
    <?php
    session_start();
    require_once("../../models/mdlsecurity.php");
    mdlsecurity::validateToken();
    ?>
</div>
<link rel="stylesheet" href="../css/scrolltabla.css">
<div class="container">
    <center><h2>Administracion de usuarios</h2></center>   
    <center> <table class="table table-fixed">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Puesto</th>
                    <th>Username(correo)</th>
                    <th>Logotipo</th>
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
                        <td><?php echo $listofusers[$i]["name"]; ?></td>
                        <td><?php echo $listofusers[$i]["first_name"]; ?></td>
                        <td><?php echo $listofusers[$i]["work_position"]; ?></td>
                        <td><?php echo $listofusers[$i]["username"]; ?></td>
                        <td><?php
                            $imagen_panel = $listofusers[$i]["idimg_user"];
                            echo ('<span><img src="../resources/img/logotipos/' . $imagen_panel . '" width="152" height="118"></span>');
                            ?>
                        </td>
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

