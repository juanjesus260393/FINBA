<?php
include('../views/template1.php');
?>
<div class="container">

    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
                <a class="nav-link active" href="#vision" data-toggle="tab">Vision Global</a>
            </li>
            <li><a class="nav-link active" href="#administracion" data-toggle="tab">Sistemas Fotovolaticos</a>
            </li>
            <li><a class="nav-link active" href="#registrar" data-toggle="tab">Registrar Panel</a>
            </li>
            <li><a class="nav-link active" href="#inversor" data-toggle="tab">Registrar Inversor</a>
            </li>
        </ul>
    </div>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="vision">
            <?php
            include('../views/solarpanels/vwglobalvisionsolarpanels.php');
            ?>
        </div>
        <div class="tab-pane" id="administracion">
            <?php
            if ($_SESSION['type_user'] == 'administrator') {
                include('../views/solarpanels/vwsolarpanelsadministrator.php');
            } else {
                include('../views/solarpanels/vwsolarpanels.php');
            }
            ?>
        </div>
        <div class="tab-pane" id="registrar">
            <?php
            if ($_SESSION['type_user'] == 'administrator') {
                
            } else {
                include('../views/solarpanels/vwaddsolarpanel.php');
            }
            ?>
        </div>
        <div class="tab-pane" id="inversor">
            <?php
            if ($_SESSION['type_user'] == 'administrator') {
                
            } else {

                include('../views/solarpanels/investor/vwaddinversor.php');
            }
            ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php
include('../views/template2.php');
?>