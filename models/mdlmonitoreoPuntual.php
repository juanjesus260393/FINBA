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

class mdlmonitoreoPuntual {

    private $dbh;
    
    private $a;

    public function __construct() {
        $this->dbh = mdlconection::connect();
        $this->medidas= array();
        
    }
   public function getMeasuresMes($mestoquery, $añotoquery, $escuela, $edificio, $piso, $lugar){
        $medidasmes[]=0;
        //SELECT DAY(fecha), AVG(medida) FROM measures WHERE MONTH(fecha)=6 GROUP BY DAY(fecha)
        $dbhMedidaMes= mdlconection::connect();
        
        $qyueryauxiliar="SELECT de.id_device_finba FROM device_finba de INNER JOIN nomenclature nom ON de.id_nomenclature=nom.id_nomenclature WHERE nom.school='".$escuela."' AND nom.building_number='".$edificio."' AND nom.level='".$piso."' AND nom.reference='".$lugar."'";                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ;
      
                                                                                                                                                                                                                                                                                                                                                              
           $result[0]=$dbhMedidaMes->query($qyueryauxiliar);
        while ($filas = $result[0]->fetch_row()) {
            $mac= $filas[0];
        }
       
        if(!$mac){
        $mac=0;}
        
        
        
        $querymes="SELECT DAY(date_measure), AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND MONTH(date_measure)=".$mestoquery." AND YEAR(date_measure)=".$añotoquery." GROUP BY DAY(date_measure)";
        var_dump($querymes);
        $resquerymes=$dbhMedidaMes->query($querymes);
       
        while($fl=$resquerymes->fetch_row()){
            $medidasmes[]=$fl;
        }
        var_dump($medidasmes);
        return $medidasmes;
    }
    
        public function getMeasuresaño($añotoqueryaño, $escuela, $edificio, $piso, $lugar){
        $medidasaño[]=0;
        $dbhMedidaMAño= mdlconection::connect();
        
           $qyueryauxiliar="SELECT de.id_device_finba FROM device_finba de INNER JOIN nomenclature nom ON de.id_nomenclature=nom.id_nomenclature WHERE nom.school='".$escuela."' AND nom.building_number='".$edificio."' AND nom.level='".$piso."' AND nom.reference='".$lugar."'";                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ;
           $mac=0;
           $result[0]=$dbhMedidaMAño->query($qyueryauxiliar);
        while ($filas = $result[0]->fetch_row()) {
            $mac= $filas[0];
        }
        //if(!$mac){$mac=0;}
        //SELECT DAY(fecha), AVG(medida) FROM measures WHERE MONTH(fecha)=6 GROUP BY DAY(fecha)
        
        $queryesp="SET lc_time_names = 'es_MX';";
        $dbhMedidaMAño->query($queryesp);
        $queryaño="SELECT MONTHNAME(date_measure), AVG(measure ) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND YEAR(date_measure)=".$añotoqueryaño." GROUP BY MONTH(date_measure)";
        
        $resqueryaño=$dbhMedidaMAño->query($queryaño);
        
        while($fl=$resqueryaño->fetch_row()){
            $medidasaño[]=$fl;
        }
        
        return $medidasaño;
    }
    public function  getMeasuresDia($escuela, $edificio, $piso, $lugar){
        
         date_default_timezone_set('America/Mexico_City');
         $hoy = date("Y-m-d");
        $dbhMedida= mdlconection::connect();
       
        $qyueryauxiliar="SELECT de.id_device_finba FROM device_finba de INNER JOIN nomenclature no ON de.id_nomenclature=no.id_nomenclature WHERE no.school='".$escuela."' AND no.building_number='".$edificio."' AND no.level='".$piso."' AND no.reference='".$lugar."'";                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ;
        $result[0]=$dbhMedida->query($qyueryauxiliar);
        $mac=0;
        while ($filas = $result[0]->fetch_row()) {
            $mac= $filas[0];
        }
        //if(!$mac){$mac=0;}
                                                                                                                                        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 00:00:00' AND '".$hoy." 00:59:59'";
        $res[0]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[0]->fetch_row()) {
            $promhr[0] = $filas[0];
        }if(!$promhr[0]){$promhr[0]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 01:00:00' AND '".$hoy." 01:59:59'";
        $res[1]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[1]->fetch_row()) {
            $promhr[1] = $filas[0];
        }if(!$promhr[1]){$promhr[1]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 02:00:00' AND '".$hoy." 02:59:59'";
        $res[2]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[2]->fetch_row()) {
            $promhr[2] = $filas[0];
        }if(!$promhr[2]){$promhr[2]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 03:00:00' AND '".$hoy." 03:59:59'";
        $res[3]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[3]->fetch_row()) {
            $promhr[3] = $filas[0];
        }if(!$promhr[3]){$promhr[3]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 04:00:00' AND '".$hoy." 04:59:59'";
        $res[4]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[4]->fetch_row()) {
            $promhr[4] = $filas[0];
        }if(!$promhr[4]){$promhr[4]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 05:00:00' AND '".$hoy." 05:59:59'";
        $res[5]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[5]->fetch_row()) {
            $promhr[5] = $filas[0];
        }if(!$promhr[5]){$promhr[5]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 06:00:00' AND '".$hoy." 06:59:59'";
        $res[6]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[6]->fetch_row()) {
            $promhr[6] = $filas[0];
        }if(!$promhr[6]){$promhr[6]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 07:00:00' AND '".$hoy." 07:59:59'";
        $res[7]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[7]->fetch_row()) {
            $promhr[7] = $filas[0];
        }if(!$promhr[7]){$promhr[7]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 08:00:00' AND '".$hoy." 08:59:59'";
        $res[8]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[8]->fetch_row()) {
            $promhr[8] = $filas[0];
        }if(!$promhr[8]){$promhr[8]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 09:00:00' AND '".$hoy." 09:59:59'";
        $res[9]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[9]->fetch_row()) {
            $promhr[9] = $filas[0];
        }if(!$promhr[9]){$promhr[9]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 10:00:00' AND '".$hoy." 10:59:59'";
        $res[10]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[10]->fetch_row()) {
            $promhr[10] = $filas[0];
        }if(!$promhr[10]){$promhr[10]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 11:00:00' AND '".$hoy." 11:59:59'";
        $res[11]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[11]->fetch_row()) {
            $promhr[11] = $filas[0];
        }if(!$promhr[11]){$promhr[11]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 12:00:00' AND '".$hoy." 12:59:59'";
        $res[12]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[12]->fetch_row()) {
            $promhr[12] = $filas[0];
        }if(!$promhr[12]){$promhr[12]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 13:00:00' AND '".$hoy." 13:59:59'";
        $res[13]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[13]->fetch_row()) {
            $promhr[13] = $filas[0];
        }if(!$promhr[13]){$promhr[13]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 14:00:00' AND '".$hoy." 14:59:59'";
        $res[14]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[14]->fetch_row()) {
            $promhr[14] = $filas[0];
        }if(!$promhr[14]){$promhr[14]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 15:00:00' AND '".$hoy." 15:59:59'";
        $res[15]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[15]->fetch_row()) {
            $promhr[15] = $filas[0];
        }if(!$promhr[15]){$promhr[15]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 16:00:00' AND '".$hoy." 16:59:59'";
        $res[16]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[16]->fetch_row()) {
            $promhr[16] = $filas[0];
        }if(!$promhr[16]){$promhr[16]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 17:00:00' AND '".$hoy." 17:59:59'";
        $res[17]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[17]->fetch_row()) {
            $promhr[17] = $filas[0];
        }if(!$promhr[17]){$promhr[17]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 18:00:00' AND '".$hoy." 18:59:59'";
        $res[18]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[18]->fetch_row()) {
            $promhr[18] = $filas[0];
        }if(!$promhr[18]){$promhr[18]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 19:00:00' AND '".$hoy." 19:59:59'";
        $res[19]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[19]->fetch_row()) {
            $promhr[19] = $filas[0];
        }if(!$promhr[19]){$promhr[19]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 20:00:00' AND '".$hoy." 20:59:59'";
        $res[20]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[20]->fetch_row()) {
            $promhr[20] = $filas[0];
        }if(!$promhr[20]){$promhr[20]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 21:00:00' AND '".$hoy." 21:59:59'";
        $res[21]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[21]->fetch_row()) {
            $promhr[21] = $filas[0];
        }if(!$promhr[21]){$promhr[21]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 22:00:00' AND '".$hoy." 22:59:59'";
        $res[22]=$dbhMedida->query($querygetMedidas);
        while ($filas = $res[22]->fetch_row()) {
            $promhr[22] = $filas[0];
        }if(!$promhr[22]){$promhr[22]=0;}
        
        $querygetMedidas="SELECT AVG(measure) FROM device_finba_measures WHERE id_device_finba='".$mac."' AND date_measure BETWEEN '".$hoy." 23:00:00' AND '".$hoy." 23:59:59'";
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
        $querygetMedidas="SELECT*FROM device_finba_measures WHERE date_measure >= '".$hoy." 00:00:00' AND date_measure <= '".$hoy." 23:59:59' ORDER BY date_measure ASC";
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
