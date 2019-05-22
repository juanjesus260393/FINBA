<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../js/slick-1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="../js/slick-1.8.1/slick/slick-theme.css"/>
        <link href="../css/visionglobal.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="autoplay" style="width: 400px; margin: 0 auto;">
            <div><img src="../resources/img/rendimiento/costs-all.svg" width="225" height="125" />
                <h4>hoy</h4>
                <h4>MXN</h4>
            </div>
            <div><img src="../resources/img/rendimiento/costs-all.svg" width="225" height="125"/>
                <h4><?php
                    $mes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    echo $mes[date('n') - 1] . "  " . date('Y');
                    ?></h4>
                <h4>MXN</h4>
            </div>
            <div><img src="../resources/img/rendimiento/costs-all.svg" width="225" height="125" />
                <h4><?php
                    echo date('Y');
                    ?></h4>
                <h4>MXN</h4>
            </div>
            <div><img src="../resources/img/rendimiento/costs-all.svg" width="225" height="125"/>
                <h4>Total</h4>
                <h4>MXN</h4>
            </div>
        </div>

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../js/slick-1.8.1/slick/slick.min.js"></script>

        <script type="text/javascript">
            $('.autoplay').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000
            });
        </script>

    </body>
</html>