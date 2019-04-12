<?php
include('../views/template1.php');
?>
<div class="container">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
                <a class="nav-link active" href="#inventory" data-toggle="tab">Inventario</a>
            </li>
            <li><a class="nav-link active" href="#register" data-toggle="tab">Registrar en inventario</a>
            </li>
        </ul>
    </div>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="inventory">
            <?php
            include('../views/inventory/vwincludeinventory.php');
            ?>
        </div>
        <div class="tab-pane" id="register">
            <?php
            include('../views/inventory/vwaddinventory.php');
            ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php
include('../views/template2.php');

