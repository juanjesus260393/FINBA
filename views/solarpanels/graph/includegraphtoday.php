<div id="chart-container">
    <canvas id="mycanvastoday"></canvas>
    <form action="../controllers/crtsolarpanels.php" method="post">  
        <input type="date" id = "searchfordayusr" name="searchfordayusr" value="<?php echo date("Y-m-d");?>"> 
        <a href="javascript:;" onclick="parentNode.submit();">Buscar Informacion</a>
                                        <input type="hidden" name="mess" value= "">
    </form>
</div>
