<!--
 *   Proyecto FINBA
 *   Nombre: vwsummarydevices.php
 *   Autor: Isidro Delgado Murillo
 *   Fecha: 23-05-2019
 *   Versión: 1.0
 *   Descripcion: Vista de la Administracion de los
 *   dispositivos
 *   por Fabrica de Software, CIC-IPN
 * 
 -->

<!--
*Tabla donde se muestran los dispositivos ya registrados
-->
<div>
                <center><h2>Administracion de Dispositivos</h2></center>   
                <center> <table class="table">
                        <thead>
                            <tr>
                                <th>MAC del Sensor</th>
                                <th>Nombre del Dispositivo</th>
                                <th>Tipo de Usuario</th>
                                <th>Eliminar Usuario</th>
                                <th>Editar Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           foreach($dispositivos as $dispositivo){
                           ?>
                                <tr  class='btn-outline-primary'>
                                    <td><?php echo $dispositivo[0]; ?></td>
                                    <td><?php echo $dispositivo[1]; ?></td>
                                    <?php
                                    if ($dispositivo[2] == 'Electricidad') {
                                        printf("<td height='80'  style='color: orange ;'><h5><b>".$dispositivo[2]."</b><i class='fas fa-bolt'></i></h5></td>");
                                    } else if ($dispositivo[2] == 'Agua') {
                                        printf("<td height='80'  style='color: blue ;'><h5><b>".$dispositivo[2]."</b><i class='fas fa-tint'></i></h5></td>");
                                    }
                                    ?>
                                    <td>
                                        <form method="POST" action="../controllers/crtadddvc.php">
                                            <input type='hidden' id='mactodelete' name='mactodelete' value="<?php  echo $dispositivo[0] ?>">
                                            <button type="submit" id="bntdelete" name="bntdelete" class="btn btn-light"
                                                         onclick="if (!confirm('Estas seguro que quieres desactivar este sensor?')) {return false;}">
                                                <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        
                                        </td>
                                        <td><form method="POST" action="../views/Dispositivos/vwupdatedevice.php">
                                           <input type='hidden' id='mactoupdate' name='mactoupdate' value="<?php echo $dispositivo[0] ?>">
                                           <button type="submit" class='btn'  >Actualizar</button>
                                           
                                        </form></td>
                                </tr>
                              <?php  
                            }
                            ?>
                        </tbody>
                    </table></center>   
              
            </div>  
