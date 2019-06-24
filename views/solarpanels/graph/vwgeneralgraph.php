<!-- javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/Chart/Chart.min.js"></script>
<script type="text/javascript" src="../js/datagraphinvestor.js"></script>
<script type="text/javascript" src="../js/datagraphinvestoryear.js"></script>
<script type="text/javascript" src="../js/datagraphinvestormonth.js"></script>
<script type="text/javascript" src="../js/datagraphinvestortoday.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
    #chart-container {
        position: absolute;
        width: 640px;
        height: auto;
    }
</style>
<div> 
    <div class="tabbal">
        <div class="container">
            <div id="content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li>
                        <a class="nav-link active" href="#day" data-toggle="tab">DIA</a>
                    </li>
                    <li><a class="nav-link active" href="#month" data-toggle="tab">MES</a>
                    </li>
                    <li><a class="nav-link active" href="#year" data-toggle="tab">AÑO</a>
                    </li>
                    <li><a class="nav-link active" href="#total" data-toggle="tab">TOTAL</a>
                    </li>
                </ul>
            </div>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane" id="day">
                     <?php
                    include('../views/solarpanels/graph/includegraphtoday.php');
                    ?>
                </div>
                <div class="tab-pane" id="month">
                     <?php
                    include('../views/solarpanels/graph/includegraphmonth.php');
                    ?>
                </div>
                <div class="tab-pane" id="year">
                      <?php
                    include('../views/solarpanels/graph/includegraphyear.php');
                    ?>
                </div>
                <div class="tab-pane" id="total">
                    <?php
                    include('../views/solarpanels/graph/includegraphtotal.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>