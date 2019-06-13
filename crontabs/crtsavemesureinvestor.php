<!DOCTYPE html>
<html>
    <head>
        <title>Crontab inversor</title>
    </head>
    <body>
        <h1>Crontab que abre y almacena informacion del archivo cvs recibido del inversor</h1>
        <?php
        //Requieres adicionales de conecion, busquedad de nombre de investor, y libreria que abre los archivos excel
        require 'connection.php';
        require_once("C:/xampp/htdocs/finbaproject/FINBA/resources/helpers/validations.php");
        require '../resources/Classes/PHPExcel/IOFactory.php';

        //Funcion que define si existe un archivo xlsx en el directorio raiz
        $directorio_base = 'investormeasures';
        $dir_handle = opendir($directorio_base);
        while (($archivo = readdir($dir_handle)) !== false) {
            $ruta = $directorio_base . '/' . $archivo;
            $newruta = $ruta . PHP_EOL;
            $in = explode("/", $newruta);
            $filenamepoints = $in[1];
            $fn = explode(".", $filenamepoints);
            $filenam = $fn[0];
        }
        closedir($dir_handle);
        if (!empty($filenam)) {
            echo 'almacenando informacion';
           echo $file = $filenam.".xlsx";
            $routeandfile = "investormeasures/" . $file;
            //Nombre del archivo a ejecutar
            $archivo = $routeandfile;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            //ciclo para obtener el nombre del inversor
            for ($fila = 0; $fila <= 1; $fila++) {
                $encabezadoexcell = $sheet->getCell("A" . $fila)->getValue();
                $cadenaseparada = explode(",", $encabezadoexcell);
                $partinvestorname = $cadenaseparada[1];
                $in = explode("|", $partinvestorname);
                $investorname = $in[1];
            }
            $investorname;
            $numberinvestor = investorHelper::getBumberinvestor($investorname);

            //ciclo encargado de obtener la informacion del archivo excell
            for ($row2 = 3; $row2 <= $highestRow; $row2++) {
                $informationexcell = $sheet->getCell("A" . $row2)->getValue();
                $porciones = explode(",", $informationexcell);
                $dat = $porciones[0];
                $kWh = $porciones[1];
                $kWp = $porciones[2];
                $it = $porciones[3];
                $dateregysterinvestor = date("Y-m-d", strtotime($dat));
                $sql = "INSERT INTO  dbfinba.investor_mesure (date_mesure, epikWh, epikWp,total_installation,number_investor)"
                        . " VALUES('$dateregysterinvestor','$kWh','$kWp','$it','$numberinvestor')";
                $result = $mysqli->query($sql);
            }
        } else {
            echo 'No existe archivo alguno';
        }
        ?>
    </body>
</html
