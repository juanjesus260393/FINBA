<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("input[type='button']").click(function () {
            var radioValue = $("input[name='radioinversor']:checked").val();
            if (radioValue) {
                document.getElementById("nameinvestor").value = radioValue;
                document.getElementById("nameinvestorhiden").value = radioValue;
            }
        });

    });

</script>
<style type="text/css">
    #chart-container {
        width: 640px;
        height: auto;
    }
</style>
<div> 
    <div class="menuinverstors">
        <h2>Inversores del <?php echo $_SESSION['Schoolsname']; ?>
        </h2>

        <form>
            <?php
            $listofinvestors;
            for ($i = 0; $i < count($listofinvestors); $i++) {
                ?>
                <?php
                $name = $listofinvestors[$i]["name_investor"];
                echo '<input type = "radio" id= "radioinversor" name = "radioinversor" value = "' . $name . '"
                ?>' . $name . '<br> 
                '
                ?>
                <?php
            }
            ?>
        </form> 
        <center><p><input type="button" value="Seleccionar Inversor"></p></center> 
    </div>

    <div class="tabbal">
        <form  method="post" action="../controllers/crtsolarpanels.php" name="form1" enctype="multipart/form-data">
            <input type="text" id="nameinvestor" name="nameinvestor" disabled="true"> 
            <input type="text" id="nameinvestorhiden" name="nameinvestorhiden" hidden="true">
            <center><input type="submit"  value="Graficar Inversor" > </center> 
        </form>
    </div>
    <div class="graph">
        <div id="chart-container">
            <canvas id="mycanvas"></canvas>
        </div>  
    </div>

    <!-- javascript -->
    <script type="text/javascript" src="../js/Chart/Chart.min.js"></script>
    <script type="text/javascript" src="../js/datagraphinvestor.js"></script>

</div>