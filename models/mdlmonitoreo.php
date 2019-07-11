<?php

/**
 *  proyecto FINBA
 *   Nombre: mdlmonitoreo.php
 *   Autor: Isidro Delgado Murillo
 *   Fecha: 07-06-2019
 *   Versión: 1.0
 *   Descripcion: Modelo donde se encuentran todas las funciones en donde se
 *   obtienen todos los datos del monitoreo, para formar las graficas
 *   por Fabrica de Software, CIC-IPN
 * */
session_start();

class mdlmonitoreo {

    private $dbh;
    private $mac;
    private $a;

    public function __construct() {
        $this->dbh = mdlconection::connect();
        $this->medidas= array();
        
    }
    public function getMeasuresMes($mestoquery, $añotoquery){
        $medidasmes[]=0;
        $dbhMedidaMes= mdlconection::connect();
        //$dbhMedidaMes= mdlconection::connectSeeds();
        $querymes="SELECT DAY(fecha), AVG(medida) FROM measures WHERE MONTH(fecha)=".$mestoquery." AND YEAR(fecha)=".$añotoquery." GROUP BY DAY(fecha)";
        //$querymes="SELECT DAY(measure_date), AVG(measure) FROM device_measures_1006 WHERE MONTH(measure_date)=".$mestoquery." AND YEAR(measure_date)=".$añotoquery." GROUP BY DAY(measure_date)";
      
        $resquerymes=$dbhMedidaMes->query($querymes);
        while($fl=$resquerymes->fetch_row()){
            $medidasmes[]=$fl;
        }
        
        return $medidasmes;
    }
    
        public function getMeasuresaño($añotoqueryaño){
        $medidasaño[]=0;
        //SELECT DAY(fecha), AVG(medida) FROM measures WHERE MONTH(fecha)=6 GROUP BY DAY(fecha)
        $dbhMedidaMAño= mdlconection::connect();
        $queryesp="SET lc_time_names = 'es_MX';";
        $dbhMedidaMAño->query($queryesp);
        $queryaño="SELECT MONTHNAME(fecha), AVG(medida) FROM measures WHERE YEAR(fecha)=".$añotoqueryaño." GROUP BY MONTH(fecha)";
      // var_dump($queryaño);
        $resqueryaño=$dbhMedidaMAño->query($queryaño);
        while($fl=$resqueryaño->fetch_row()){
            $medidasaño[]=$fl;
        }
        return $medidasaño;
    }
    public function  getMeasuresDia(){
         date_default_timezone_set('America/Mexico_City');
         $hoy = date("Y-m-d");
        $dbhMedida= mdlconection::connect();
       
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 00:00:00' AND '".$hoy." 00:59:59'";
        $res[0]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[0]->fetch_row()) {
            $promhr[0] = $filas[0];
        }if(!$promhr[0]){$promhr[0]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 01:00:00' AND '".$hoy." 01:59:59'";
        $res[1]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[1]->fetch_row()) {
            $promhr[1] = $filas[0];
        }if(!$promhr[1]){$promhr[1]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 02:00:00' AND '".$hoy." 02:59:59'";
        $res[2]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[2]->fetch_row()) {
            $promhr[2] = $filas[0];
        }if(!$promhr[2]){$promhr[2]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 03:00:00' AND '".$hoy." 03:59:59'";
        $res[3]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[3]->fetch_row()) {
            $promhr[3] = $filas[0];
        }if(!$promhr[3]){$promhr[3]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 04:00:00' AND '".$hoy." 04:59:59'";
        $res[4]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[4]->fetch_row()) {
            $promhr[4] = $filas[0];
        }if(!$promhr[4]){$promhr[4]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 05:00:00' AND '".$hoy." 05:59:59'";
        $res[5]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[5]->fetch_row()) {
            $promhr[5] = $filas[0];
        }if(!$promhr[5]){$promhr[5]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 06:00:00' AND '".$hoy." 06:59:59'";
        $res[6]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[6]->fetch_row()) {
            $promhr[6] = $filas[0];
        }if(!$promhr[6]){$promhr[6]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 07:00:00' AND '".$hoy." 07:59:59'";
        $res[7]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[7]->fetch_row()) {
            $promhr[7] = $filas[0];
        }if(!$promhr[7]){$promhr[7]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 08:00:00' AND '".$hoy." 08:59:59'";
        $res[8]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[8]->fetch_row()) {
            $promhr[8] = $filas[0];
        }if(!$promhr[8]){$promhr[8]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 09:00:00' AND '".$hoy." 09:59:59'";
        $res[9]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[9]->fetch_row()) {
            $promhr[9] = $filas[0];
        }if(!$promhr[9]){$promhr[9]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 10:00:00' AND '".$hoy." 10:59:59'";
        $res[10]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[10]->fetch_row()) {
            $promhr[10] = $filas[0];
        }if(!$promhr[10]){$promhr[10]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 11:00:00' AND '".$hoy." 11:59:59'";
        $res[11]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[11]->fetch_row()) {
            $promhr[11] = $filas[0];
        }if(!$promhr[11]){$promhr[11]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 12:00:00' AND '".$hoy." 12:59:59'";
        $res[12]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[12]->fetch_row()) {
            $promhr[12] = $filas[0];
        }if(!$promhr[12]){$promhr[12]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 13:00:00' AND '".$hoy." 13:59:59'";
        $res[13]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[13]->fetch_row()) {
            $promhr[13] = $filas[0];
        }if(!$promhr[13]){$promhr[13]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 14:00:00' AND '".$hoy." 14:59:59'";
        $res[14]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[14]->fetch_row()) {
            $promhr[14] = $filas[0];
        }if(!$promhr[14]){$promhr[14]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 15:00:00' AND '".$hoy." 15:59:59'";
        $res[15]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[15]->fetch_row()) {
            $promhr[15] = $filas[0];
        }if(!$promhr[15]){$promhr[15]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 16:00:00' AND '".$hoy." 16:59:59'";
        $res[16]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[16]->fetch_row()) {
            $promhr[16] = $filas[0];
        }if(!$promhr[16]){$promhr[16]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 17:00:00' AND '".$hoy." 17:59:59'";
        $res[17]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[17]->fetch_row()) {
            $promhr[17] = $filas[0];
        }if(!$promhr[17]){$promhr[17]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 18:00:00' AND '".$hoy." 18:59:59'";
        $res[18]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[18]->fetch_row()) {
            $promhr[18] = $filas[0];
        }if(!$promhr[18]){$promhr[18]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 19:00:00' AND '".$hoy." 19:59:59'";
        $res[19]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[19]->fetch_row()) {
            $promhr[19] = $filas[0];
        }if(!$promhr[19]){$promhr[19]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 20:00:00' AND '".$hoy." 20:59:59'";
        $res[20]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[20]->fetch_row()) {
            $promhr[20] = $filas[0];
        }if(!$promhr[20]){$promhr[20]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 21:00:00' AND '".$hoy." 21:59:59'";
        $res[21]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[21]->fetch_row()) {
            $promhr[21] = $filas[0];
        }if(!$promhr[21]){$promhr[21]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 22:00:00' AND '".$hoy." 22:59:59'";
        $res[22]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[22]->fetch_row()) {
            $promhr[22] = $filas[0];
        }if(!$promhr[22]){$promhr[22]=0;}
        
        $querygetMedidas="SELECT AVG(medida) FROM measures WHERE fecha BETWEEN '".$hoy." 23:00:00' AND '".$hoy." 23:59:59'";
        $res[23]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[23]->fetch_row()) {
            $promhr[23] = $filas[0];
        }if(!$promhr[23]){$promhr[23]=0;}
       
            
        
       //Devuelve el resultado
        return $promhr;
        
        
        
    }
    public function getdia(){
        date_default_timezone_set('America/Mexico_City');

        $hoy = date("Y-m-d");
        return $hoy;
    }

    public function getMeasures(){
        $dbhMedida= mdlconection::connect();
        date_default_timezone_set('America/Mexico_City');

        $hoy = date("Y-m-d");
        $querygetMedidas="SELECT*FROM measures WHERE fecha >= '".$hoy." 00:00:00' AND fecha <= '".$hoy." 23:59:59' ORDER BY fecha ASC";
        $resgetmedidas=$dbhMedida->query($querygetMedidas);
        
        
        while ($filas = $resgetmedidas->fetch_row()) {
            $this->medidas[] = $filas;
        }
        $resgetmedidas->close();
       //Devuelve el resultado
        return $this->medidas;
    }
    public function getnumMed(){
       $dbhMedida= mdlconection::connect();
        date_default_timezone_set('America/Mexico_City');

        $hoy = date("Y-m-d");
        
        $querygetMedidas="SELECT*FROM measures WHERE fecha >= '".$hoy." 00:00:00' AND fecha <= '".$hoy." 23:59:59' ORDER BY fecha ASC";
        $resgetmedidas=$dbhMedida->query($querygetMedidas);
        $NMed=$resgetmedidas->num_rows;
        return $NMed;
    }

    






}
