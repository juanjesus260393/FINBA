<?php
session_start();
require_once("../models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<!-- Contenido pantalla principal -->
<link href="../css/visionglobal.css" rel="stylesheet" type="text/css">
<div id="main">
    <div class="inner">
        <section class="tiles">
            <article class="style1">
                <span class="image">
                    <a href="">
                        <div id="headerdiv"> 
                            <h2>Potencia Actual</h2>
                        </div>
                        <div class="content">
                            <img src="../resources/img/Potencia Actual.JPG" height="245"/>
                        </div>
                        <div id="footerdiv"> <h2>Offline</h2></div>
                    </a>
                </span>
            </article>
            <article class="style2">
                <span class="image">
                    <a href="">
                        <div id="headerdiv"> 
                            <h2>Balance Energetico</h2>
                        </div>
                        <div class="content">
                            <img src="../resources/img/Balance.JPG" height="280" />
                        </div>
                    </a>
                </span>
            </article>
            <article class="style3">
                <span class="image">
                    <a href="">
                        <div id="headerdiv"> 
                            <h2>Rendimiento</h2>
                        </div>
                        <div class="content">
                            <?php include('../views/solarpanels/vwcarouselpanelsrendimiento.php'); ?>
                        </div>
                    </a>
                </span>
            </article>
            <article class="style4">
                <span class="image">
                    <a href="">
                        <div id="headerdiv"> 
                            <h2>Ahorro total de Co2</h2>
                        </div>
                        <div class="content">
                            <?php include('../views/solarpanels/vwcarruselahorroco2.php'); ?>
                        </div>
                    </a>
                </span>
            </article>
            <article class="style5">
                <span class="image">
                    <a href="">
                        <div id="headerdiv"> 
                            <h2><?php echo $_SESSION['Schoolsname']; ?></h2>
                        </div>
                        <div class="content">
                            <?php echo ('<img src="../resources/img/paneles/' . $_SESSION['id_image_panel'] . '"/ height="200">'); ?>
                        </div>
                    </a>
                </span>
            </article>
            <article class="style6">
                <span class="image">
                    <a href="">
                        <div class="content">
                            <a class="weatherwidget-io" href="https://forecast7.com/es/19d43n99d13/mexico-city/" data-label_1="MEXICO" data-label_2="CLIMA" data-theme="original" >MEXICO CLIMA</a>
                            <script>
                                !function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = 'https://weatherwidget.io/js/widget.min.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'weatherwidget-io-js');
                            </script>
                        </div>
                    </a>
                </span>
            </article>
        </section>
    </div>
</div>