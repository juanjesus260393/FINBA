<script>
/**
 *   Proyecto FINBA
 *   Nombre: updateubi.php
 *   Autor: Isidro Delgado Murillo
 *   Fecha: 23-05-2019
 *   Versión: 1.0
 *   Descripcion: Scripts que manejan todo el funcionamiento
 * dentro del modal de Actualizacion de ubicacion
 * de los dispositivos.
 * por Fabrica de Software, CIC-IPN
 * 
 */
/**
 * 
 * Se inicializa un array donde se guardara 
 * provisionalmente la informacion de la ubicacion
 * 
 * @type Array
 */

    var ubicacion = ["", "", "", "", "", "", "", ""];
    
/**
 * 
 * Las funciones back.. tienen la funcion de regresar
 * entre las imagenes para seleccionar otro piso, otro
 * nivel, otro edificio, etc
 * 
 */


/**
 * Regresa a la seleccion de niveles del CIC
*/
    function back() {
        $("#imgplano").attr("src", "../resources/img/cic2.jpg");
        $("#atrasLevels").addClass("d-none");
        $("#datos").addClass("d-none");   
        $("#imgplano").attr("usemap", "#levelsCic");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de niveles del CIDETEC
 */
    function back2() {
        $("#imgplano").attr("src", "../resources/img/cidetec.jpg");
        $("#atrasLevels2").addClass("d-none");
        $("#datos").addClass("d-none"); 
        $("#imgplano").attr("usemap", "#levelsCidetec");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de niveles del Edificio 1 de ESCOM
 */    
    function back3() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#atrasLevels3").addClass("d-none");
        $("#datos").addClass("d-none"); 
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levelsEscomE1");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("Edificio 1");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de niveles del Edificio 2 de ESCOM
 */     
        function back4() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#atrasLevels4").addClass("d-none");
        $("#datos").addClass("d-none"); 
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levelsEscomE2");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("Edificio 2");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de niveles del Edificio 3 de ESCOM
 */     
   function back5() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#atrasLevels5").addClass("d-none");
        $("#datos").addClass("d-none"); 
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levelsEscomE3");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("Edificio 3");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de niveles del Edificio 4 de ESCOM
 */     
    function back6() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#atrasLevels6").addClass("d-none");
        $("#datos").addClass("d-none"); 
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levelsEscomE4");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("Edificio 4");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de niveles del Edificio 5 de ESCOM
 */     
    function back7() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom2.jpg");
        $("#atrasLevels7").addClass("d-none");
        $("#datos").addClass("d-none"); 
        $("#atrasSchool").removeClass("d-none");
        $("#imgplano").attr("usemap", "#levelsEscomE5");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("Edificio 5");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Regresa a la seleccion de Edificios de ESCOM
 */     
   function backS() {
        $("#imgplano").attr("src", "../resources/img/escom.jpg");
        $("#atrasSchool").addClass("d-none");
        $("#imgplano").attr("usemap", "#edificiosEscom");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#niveltext").text("ESCOM");
        $("#info").text("Selecciona en la imgen en el edificio donde se colocara el sensor");
    }
/**
 * Muestra los niveles del CIC
 */     
    function settoCIC() {
        ubicacion[1] = "CIC";
        ubicacion[4] = "Norte";
        ubicacion[5] = "Interior";

        $("#imgplano").attr("src", "../resources/img/cic2.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#imgplano").attr("usemap", "#levels");
       //$("#atrasSchool").removeClass("d-none");
        $("#niveltext").text("CIC");
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Muestra los niveles del Edificio 1 de ESCOM
 */     
    function settoE1() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#imgplano").attr("usemap", "#levelsEscomE1");
        $("#niveltext").text("Edificio 1");
        $("#atrasSchool").removeClass("d-none");
        
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Muestra los niveles del Edificio 2 de ESCOM
 */        
    function settoE2() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#imgplano").attr("usemap", "#levelsEscomE2");
        $("#niveltext").text("Edificio 2");
        $("#atrasSchool").removeClass("d-none");
        
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }   
/**
 * Muestra los niveles del Edificio 3 de ESCOM
 */        
    function settoE3() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#imgplano").attr("usemap", "#levelsEscomE3");
        $("#niveltext").text("Edificio 3");
        $("#atrasSchool").removeClass("d-none");
        
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Muestra los niveles del Edificio 4 de ESCOM
 */        
    function settoE4() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#imgplano").attr("usemap", "#levelsEscomE4");
        $("#niveltext").text("Edificio 4");
        $("#atrasSchool").removeClass("d-none");
        
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    } 
/**
 * Muestra los niveles del Edificio 5 de ESCOM
 */        
    function settoE5() {
        $("#imgplano").attr("src", "../resources/img/lvlsescom2.jpg");
        $("#imgplano").attr("width", "850");
        $("#imgplano").attr("height", "600");
        $("#imgplano").attr("usemap", "#levelsEscomE5");
        $("#niveltext").text("Edificio 5");
        $("#atrasSchool").removeClass("d-none");
        
        $("#info").text("Selecciona en la imgen en que nivel se colocara el sensor");
    }
/**
 * Muestra el plano del Nivel 1 del CIC
 */        
    function settoN1() {
        ubicacion[1] = "CIC";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/cicN1-nombres.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn1");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 1 del Edificio 1 de ESCOM
 */     
     function settoN1E1ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E1-N1.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape1n1escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels3").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 2 del Edificio 1 de ESCOM
 */       
    function settoN2E1ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E1-N2.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape1n2escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels3").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 3 del Edificio 1 de ESCOM
 */       
    function settoN3E1ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E1-N3.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape1n3escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels3").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 1 del Edificio 2 de ESCOM
 */       
     function settoN1E2ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 2";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E2-N1.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape2n1escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels4").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 2 del Edificio 2 de ESCOM
 */       
     function settoN2E2ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 2";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E2-N2.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape2n2escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels4").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    } 
/**
 * Muestra el plano del Nivel 3 del Edificio 2 de ESCOM
 */       
     function settoN3E2ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 2";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E2-N3.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape2n3escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels4").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }  
/**
 * Muestra el plano del Nivel 1 del Edificio 3 de ESCOM
 */       
    function settoN1E3ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 3";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E3-N1.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape3n1escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels5").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }     
/**
 * Muestra el plano del Nivel 2 del Edificio 3 de ESCOM
 */       
    function settoN2E3ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 3";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E3-N2.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape3n2escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels5").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }   
/**
 * Muestra el plano del Nivel 3 del Edificio 3 de ESCOM
 */       
    function settoN3E3ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 3";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E3-N3.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape3n3escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels5").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }   
/**
 * Muestra el plano del Nivel 1 del Edificio 4 de ESCOM
 */       
    function settoN1E4ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 4";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E4-N1.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape4n1escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels6").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    } 
/**
 * Muestra el plano del Nivel 2 del Edificio 4 de ESCOM
 */       
    function settoN2E4ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 4";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E4-N2.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape4n2escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels6").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 3 del Edificio 4 de ESCOM
 */       
        function settoN3E4ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 4";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E4-N3.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape4n3escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels6").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 1 del Edificio 5 de ESCOM
 */       
    function settoN1E5ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 5";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E5-N1.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape5n1escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels7").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 2 del Edificio 5 de ESCOM
 */   
    function settoN2E5ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 5";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E5-N2.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape5n2escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels7").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 3 del Edificio 5 de ESCOM
 */       
    function settoN3E5ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 5";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E5-N3.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape5n3escom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels7").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Sotano del Edificio 5 de ESCOM
 */       
    function settoNSE5ESCOM() {
         ubicacion[1] = "ESCOM";
        ubicacion[2] = "Edificio 5";
        ubicacion[3] = "Sotano";

        $("#imgplano").attr("src", "../resources/img/ESCOM-E5-sotano.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mape5nsescom");
        $("#atrasSchool").addClass("d-none");
        $("#atrasLevels7").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Sotano");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 1 de CIDETEC
 */   
    function settoN1CIDETEC() {
        ubicacion[1] = "CIDETEC";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 1";

        $("#imgplano").attr("src", "../resources/img/CIDETEC-N1.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn1cidetec");
        $("#atrasLevels2").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 1");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 2 de CIDETEC
 */     
    function settoN2CIDETEC() {
        ubicacion[1] = "CIDETEC";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/CIDETEC-N2.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn2cidetec");
        $("#atrasLevels2").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 3 de CIDETEC
 */     
    function settoN3CIDETEC() {
        ubicacion[1] = "CIDETEC";
        ubicacion[2] = "Edificio 1";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/CIDETEC-N3.png");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn3cidetec");
        $("#atrasLevels2").removeClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 0 del CIC
 */     
      function settoN0() {
          ubicacion[1] = "CIC";
        ubicacion[2] = "Ediicio 1";
        ubicacion[3] = "Nivel 0";

        $("#imgplano").attr("src", "../resources/img/CIC-N0.jpg");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn0");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 0");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 2 del CIC
 */       
    function settoN2() {
        ubicacion[1] = "CIC";
        ubicacion[2] = "Ediicio 1";
        ubicacion[3] = "Nivel 2";

        $("#imgplano").attr("src", "../resources/img/CIC-N2.jpg");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn2");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 2");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * Muestra el plano del Nivel 3 del CIC
 */       
    function settoN3() {
        ubicacion[1] = "CIC";
        ubicacion[2] = "Ediicio 1";
        ubicacion[3] = "Nivel 3";

        $("#imgplano").attr("src", "../resources/img/CIC-N3.jpg");
        $("#imgplano").attr("width", "1080");
        $("#imgplano").attr("height", "720");
        $("#imgplano").attr("usemap", "#mapn3");
        $("#atrasLevels").removeClass("d-none");
        $("#atrasSchool").addClass("d-none");
        $("#datos").removeClass("d-none");
        $("#niveltext").text("Nivel 3");
        $("#info").text("Selecciona en que area se colocara el nuevo Sensor");
    }
/**
 * 
 * Envia la informacion de la ubicacion final
 * del dispositivo a la pantalla de registro 
 * de dispositivos
 * 
 * @param {String} a
 */  
      function ubicacionFinal(a) {
        
        ubicacion[4] = "Norte";
        ubicacion[5] = "Interior";
        ubicacion[6] = ($(a).attr("id"));
        ubicacion[7] = 1;
        
        $("#updateubicacion").modal("hide");
        $("#dos").val(ubicacion[1]);
        $("#tres").val(ubicacion[2]);
        $("#cuatro").val(ubicacion[3]);
        $("#cinco").val(ubicacion[4]);
        $("#seis").val(ubicacion[5]);
        $("#siete").val(ubicacion[6]);
        $("#ocho").val(ubicacion[7]);
    };
/**
 * 
 * Muestra la Informacion del plano en el recuadro
 * del lado Izquierdo
 * @param {String} a
 */    
        function getinfo(a) {
        $("#infolugar").text($(a).attr("id"));
    };
/**
 * 
 * Limpia la informacion del recuadro del lado
 * izquierdo dejandolo vacio
 * 
 * @param {String} b
 */ 
    function limpia(b) {
        $("#infolugar").text('');
    };
</script>
<div class="modal" id="updateubicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal1-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubicación del Sensor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body " >
                <div class="row align-content-center text-center">
                    <div class="col-2 " >
                        <div class="row" style="height: 100px"></div>
                        <div class="row justify-content-center align-items-center" >
                            <div class="col-12">
                                <h1 id="niveltext"></h1>
                                <hr/>
<!--
*
*Botones que invocan el retroceso para seleccionar
*otro nivel u otro edificio
*
-->                                
                                 <button id="atrasSchool" class="d-none btn-primary" onclick="backS();">Elegir otro Edificio</button>
                                <button id="atrasLevels" class="d-none btn-primary" onclick="back();">Elegir otro nivel</button>
                                <button id="atrasLevels2" class="d-none btn-primary" onclick="back2();">Elegir otro nivel</button>
                                <button id="atrasLevels3" class="d-none btn-primary" onclick="back3();">Elegir otro nivel</button>
                                <button id="atrasLevels4" class="d-none btn-primary" onclick="back4();">Elegir otro nivel</button>
                                <button id="atrasLevels5" class="d-none btn-primary" onclick="back5();">Elegir otro nivel</button>
                                <button id="atrasLevels6" class="d-none btn-primary" onclick="back6();">Elegir otro nivel</button>
                                <button id="atrasLevels7" class="d-none btn-primary" onclick="back7();">Elegir otro nivel</button>
                                
                                <h3 id="info">Selecciona en la imgen en que nivel se colocara el sensor</h3>
                            <div id="datos" class="d-none" style="margin-top: 20%; border: 1px solid #040505;">
                                <p id="infolugar" style="color: #000; font-size:20px;"></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9" style="overflow-x: auto;">
                       
                            <div id="datos" class="d-none" style="margin-top: 20%; border: 1px solid #040505;">
                                <p id="infolugar" style="color: #000; font-size:20px;"></p>
                            </div>
<!--
*
*Muestra los niveles o edificos de la Escuela
*de la sesión iniciada
*
-->                        
                        <?php 
                                        if( $_SESSION['Schoolsname']=='CIC'){                                      
                                        ?>
                        <img  id="imgplano" src="../../resources/img/cic2.jpg" width="850" height="600" alt="Escuelas"  usemap="#levelsCic">
                        <?php
                                        }
                        else if( $_SESSION['Schoolsname']=='CIDETEC'){
                        ?>
                        
                        <img  id="imgplano" src="../../resources/img/cidetec.jpg" width="850" height="600" alt="Escuelas"  usemap="#levelsCidetec">

                            <?php 
                                        }
                        
                         else if( $_SESSION['Schoolsname']=='ESCOM'){
                        ?>
                        
                        <img  id="imgplano" src="../../resources/img/escom.jpg" width="850" height="600" alt="Escuelas"  usemap="#edificiosEscom">
                        
                            <?php 
                                        }
                        ?>
<!--
*
*Mapeo de los niveles del CIC
*
-->
                        <map name="levelsCic"> 
                            <area id="CICN1" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN1();return false;">
                            <area id="CICN0" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoN0();return false;">
                            <area id="CICN2" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN2();return false;">
                            <area id="CICN3" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN3();return false;">
                        </map> 
<!--
*
*Mapeo de los niveles del CIDETEC
*
-->
                        <map name="levelsCidetec"> 
                            <area id="CIDETECN1" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN1CIDETEC();return false;">
                            <area id="CIDETECN2" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN2CIDETEC();return false;">
                            <area id="CIDETECN3" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN3CIDETEC();return false;">
                        </map> 
<!--
*
*Mapeo de los edificos de ESCOM
*
-->
                        <map name="edificiosEscom">
                            <area id="Edificio 1" shape="rect" coords="256,19,431,298" alt="Venus" nohref onclick="settoE1();return false;">
                            <area id="Edificio 2" shape="rect" coords="639,19,816,296" alt="Venus" nohref onclick="settoE2();return false;">
                            <area id="Edificio 3" shape="rect" coords="258,303,428,575" alt="Venus" nohref onclick="settoE3();return false;">
                            <area id="Edificio 4" shape="rect" coords="644,299,818,580" alt="Venus" nohref onclick="settoE4();return false;">
                            <area id="Edificio 5" shape="rect" coords="456,247,623,506" alt="Venus" nohref onclick="settoE5();return false;">
                        </map>
<!--
*
*Mapeo de los niveles del Edificio 1 de ESCOM
*
-->

                        <map name="levelsEscomE1"> 
                            <area id="ESCOM2" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN2E1ESCOM();return false;">
                            <area id="ESCOM1" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoN1E1ESCOM();return false;">
                            <area id="ESCOM3" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN3E1ESCOM();return false;">
                            <!--<area id="ESCOM4" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN4ESCOM();return false;"> -->
                        </map> 
<!--
*
*Mapeo de los niveles del Edificio 2 de ESCOM
*
-->
                        <map name="levelsEscomE2"> 
                            <area id="ESCOM2" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN2E2ESCOM();return false;">
                            <area id="ESCOM1" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoN1E2ESCOM();return false;">
                            <area id="ESCOM3" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN3E2ESCOM();return false;">
                            <!--<area id="ESCOM4" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN4ESCOM();return false;"> -->
                        </map> 
<!--
*
*Mapeo de los niveles del Edificio 3 de ESCOM
*
-->
                        <map name="levelsEscomE3"> 
                            <area id="ESCOM2" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN2E3ESCOM();return false;">
                            <area id="ESCOM1" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoN1E3ESCOM();return false;">
                            <area id="ESCOM3" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN3E3ESCOM();return false;">
                            <!--<area id="ESCOM4" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN4ESCOM();return false;"> -->
                        </map>
<!--
*
*Mapeo de los niveles del Edificio 4 de ESCOM
*
-->
                        <map name="levelsEscomE4"> 
                            <area id="ESCOM2" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN2E4ESCOM();return false;">
                            <area id="ESCOM1" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoN1E4ESCOM();return false;">
                            <area id="ESCOM3" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN3E4ESCOM();return false;">
                            <!--<area id="ESCOM4" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN4ESCOM();return false;"> -->
                        </map>
<!--
*
*Mapeo de los niveles del Edificio 5 de ESCOM
*
-->
                        <map name="levelsEscomE5"> 
                            <area id="ESCOM1" shape="rect" coords="175,305,835,440" alt="Venus" nohref onclick="settoN1E5ESCOM();return false;">
                            <area id="ESCOMSotano" shape="rect" coords="175,450,835,585" alt="Venus" nohref onclick="settoNSE5ESCOM();return false;">
                            <area id="ESCOM2" shape="rect" coords="175,165,835,300" alt="Venus" nohref onclick="settoN2E5ESCOM();return false;">
                            <area id="ESCOM3" shape="rect" coords="175,15,835,150" alt="Venus" nohref onclick="settoN3E5ESCOM();return false;">
                        </map>
<!--
*
*Mapeo del nivel 1 del CIC
*
-->
                        <map name="mapn1">
                            <area id="Fabrica de Software" shape="rect" coords="870,476,1028,570" alt="Fabrica de Software" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="SITE" shape="rect" coords="731,590,863,696" alt="SITE" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Cafeteria" shape="rect" coords="56,480,264,698" alt="Cafeteria" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Departamento de Tecnologias Educativas" shape="rect" coords="871,575,1030,700" alt="Dpto. de Tecnologias Educativas" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;" >
                            <area id="Salas de Usos Multiples" shape="rect" coords="50,15,356,144" alt="Salas de Usos Multiples" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;" >
                            <area id="Sala de Video Conferencias" shape="rect" coords="53,188,194,227" alt="Sala de Video Conferencias" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;" >
                            <area id="Aula E4" shape="rect" coords="261,487,348,616" alt="Aula E4" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;" >
                            <area id="Aula E5" shape="rect" coords="595,594,726,696" alt="Aula E5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;" >
                            <area id="Aula E3" shape="rect" coords="408,488,468,589" alt="Aula E3" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;"> 
                            <area id="Aula 1" shape="rect" coords="336,619,391,695" alt="Aula 1" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;"> 
                            <area id="Aula 2" shape="rect" coords="401,614,455,694" alt="Aula 2" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Aula 3" shape="rect" coords="463,619,526,696" alt="Aula 3" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Aula 4" shape="rect" coords="533,617,590,695" alt="Aula 4" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Aula E1" shape="rect" coords="595,132,729,220" alt="Aula E1" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Biblioteca" shape="poly" coords="360,17,654,17,654,95,614,95,614,122,472,122,472,221,360,220" alt="Biblioteca" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Fuente" shape="circle" coords="540,355,66" alt="Fuente" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Laboratorio de Prototipos de Hardware" shape="rect" coords="777,492,866,548" alt="Laboratorio de Prototipos de Hardware" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Conmutador" shape="rect" coords="54,152,123,177" alt="Conmutador" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Aula 6" shape="rect" coords="737,19,861,122" alt="Aula 6" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="IDF Norte A N1" shape="rect" coords="476,563,502,582" alt="IDF" nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="IDF Norte B N1" shape="rect" coords="505,564,563,588" alt="IDF N-N1 " nohref onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this); return false;">
                            <area id="Tablero Norte N1" shape="rect" coords="565,560,591,586" alt="5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres Sur N1" shape="rect" coords="477,153,527,225" alt="Sanitario Mujeres Sur N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Ducto Sur N1" shape="rect" coords="530,153,546,225" alt="Ducto Sur N1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Sanitario Hombres Sur N1" shape="rect" coords="549,153,588,225" alt="Sanitario Hombres Sur N1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Tablero Sur N1" shape="rect" coords="477,129,502,149" alt="Tablero Sur N1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="IDF Sur A N1" shape="rect" coords="504,129,560,149" alt="IDF Sur A N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="IDF Sur B N1" shape="rect" coords="565,129,589,149" alt="IDF Sur B N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Revista" shape="rect" coords="660,18,727,127" alt="Revista" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen" shape="rect" coords="774,159,864,215" alt="Almacen" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Relaciones Publicas e Imagen" shape="rect" coords="871,19,974,101" alt="5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Diplomados y Extension Profesional" shape="rect" coords="887,109,977,163" alt="5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Viculacion Sectoral" shape="rect" coords="872,173,975,229" alt="5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres Norte N1" shape="rect" coords="474,484,522,553" alt="Sanitario Mujeres Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Ducto Norte N1" shape="rect" coords="527,484,544,557" alt="Ducto Norte N1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Sanitario Hombres Norte N1" shape="rect" coords="546,484,592,556" alt="Sanitario Hombres Norte N1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">   
                        </map>
<!--
*
*Mapeo del nivel 0 del CIC
*
-->
                        <map name="mapn0">
                            <area id="Almacen Refrigeracion" shape="rect" coords="190,505,255,535" alt="Almacen Refrigeracion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Montacargas" shape="rect" coords="148,500,170,520" alt="Montacargas" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Area de Lavado" shape="rect" coords="130,521,185,548" alt="Area de Lavado" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen 2" shape="rect" coords="130,425,250,500" alt="Almacen 2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Limpieza" shape="rect" coords="198,390,250,423" alt="Limpieza" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="AlmacenCafeteria" shape="rect" coords="130,550,165,600" alt="Almacen Cafeteria" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Proyectos" shape="rect" coords="130,602,260,700" alt="Almacen Proyectos" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Ups" shape="poly" coords="805,515,860,515,860,582,931,582,931,705,805,705" alt="Ups" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Subestacion" shape="rect" coords="861,515,931,578" alt="Subestacion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Servicio LAB MICRO SE" shape="rect" coords="820,339,870,370" alt="Servicio LAB MICRO SE" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="LAB Comunicaciones" shape="rect" coords="820,260,935,337" alt="LAB Comunicaciones" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen1" shape="rect" coords="820,418,935,500" alt="Almacen1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Jardineria" shape="rect" coords="132,55,250,150" alt="Jardineria" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Archivo de Tramite" shape="rect" coords="132,152,250,257" alt="Jardineria" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Mantenimiento" shape="rect" coords="132,260,250,350" alt="Mantenimiento" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Activo Fijo" shape="rect" coords="820,55,935,150" alt="LAB Comunicaciones" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                        </map> 
<!--
*
*Mapeo del nivel 2 del CIC
*
-->
                        <map name="mapn2">
                            <area id="Area Secretarial Recursos Financieros" shape="rect" coords="153,75,440,202" alt="Area Secretarial Recursos Financieros" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Departamento Recursos Financieros" shape="rect" coords="445,37,650,100" alt="Area Secretarial Recursos Financieros" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Tesoreria " shape="rect" coords="652,75,735,105" alt="Almacen Refrigeracion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Soporte Tecnico" shape="rect" coords="113,30,150,60" alt="Almacen Soporte Tecnico" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Soporte Tecnico 2" shape="rect" coords="72,30,112,60" alt="Soporte Tecnico 2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Soporte Tecnico 1" shape="rect" coords="72,62,150,100" alt="Soporte Tecnico 1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 7" shape="rect" coords="72,101,150,146" alt="Cubiculo 7" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 6" shape="rect" coords="72,148,150,192" alt="Cubiculo 6" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Administracion de proyectos" shape="rect" coords="72,194,150,240" alt="Administracion de proyectos" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Almacen Huellas Digitales" shape="rect" coords="152,198,237,240" alt="Almacen Huellas Digitales" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Laboratorio de Ciberseguridad" shape="rect" coords="238,198,322,240" alt="Laboratorio de Ciberseguridad" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Fabrica de Software 2" shape="rect" coords="323,198,365,240" alt="Laboratorio de Ciberseguridad" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 19" shape="rect" coords="150,30,237,80" alt="Cubiculo 19" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 27" shape="rect" coords="238,30,300,80" alt="Cubiculo 27" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 30" shape="rect" coords="301,30,362,80" alt="Cubiculo 30" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 33" shape="rect" coords="362,30,405,80" alt="Cubiculo 33" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 35" shape="rect" coords="405,30,450,80" alt="Cubiculo 35" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Sindicato Administrativo" shape="rect" coords="440,135,494,163" alt="Sindicato Administrativo" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Servicio" shape="rect" coords="440,165,494,193" alt="Servicio" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Medico" shape="rect" coords="440,194,494,225" alt="Medico" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Sanitario Mujeres Sur N2" shape="rect" coords="495,153,540,225" alt="Sanitario Mujeres Sur N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Tablero Sur N2" shape="rect" coords="495,135,523,152" alt="Tablero Sur N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="IDF Sur A N2" shape="rect" coords="524,135,583,152" alt="IDF Sur A N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="IDF Sur B N2" shape="rect" coords="584,135,610,152" alt="IDF Sur B N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Ducto Sur N2" shape="rect" coords="541,153,563,215" alt="Sanitario Mujeres N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Sanitario Hombres Sur N2" shape="rect" coords="563,153,610,225" alt="Sanitario Hombres Sur N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Departamento de Capital Humano 2" shape="rect" coords="609,135,650,180" alt="Departamento de Capital Humano 2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Departamento de Capital Humano 1" shape="rect" coords="609,181,650,225" alt="Departamento de Capital Humano 1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Departamento de Capital Humano" shape="rect" coords="651,135,711,225" alt="Departamento de Capital Humano" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 66 " shape="rect" coords="650,37,735,74" alt="Cubiculo 66" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de juntas Direccion" shape="rect" coords="736,37,817,105" alt="Sala de juntas Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Archivo Direccion" shape="rect" coords="736,106,820,135" alt="Archivo Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion Administrativa" shape="rect" coords="736,136,820,180" alt="Subdireccion Administrativa" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="CEGET" shape="rect" coords="736,181,820,240" alt="CEGET" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Direccion" shape="rect" coords="818,33,880,60" alt="Sanitario Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Secretario Particular" shape="rect" coords="818,61,880,105" alt="Secretario Particular" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Area Secretarial Direccion" shape="rect" coords="818,106,940,195" alt="Area Secretarial Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Direccion" shape="rect" coords="881,33,1030,105" alt="Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion academica" shape="rect" coords="942,106,1030,149" alt="Subdireccion academica" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion de Desarrollo Tecnologico" shape="rect" coords="942,151,1030,193" alt="Subdireccion de Desarrollo Tecnologico" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion de Vinculacion" shape="rect" coords="942,195,1030,242" alt="Subdireccion de Vinculacion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cocineta Direccion" shape="rect" coords="870,210,940,242" alt="Cocineta Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de MICROSE N2" shape="rect" coords="876,310,944,357" alt="Laboratorio de MICROSE N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Investigacion en Ing de Comp 80" shape="rect" coords="876,480,944,525" alt="Departamento de Investigacion en Ing de Comp" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 88" shape="rect" coords="946,482,990,525" alt="Cubiculo 88" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 95" shape="rect" coords="993,482,1030,540" alt="Cubiculo 95" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 94" shape="rect" coords="982,542,1030,591" alt="Cubiculo 94" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 93" shape="rect" coords="982,596,1030,640" alt="Cubiculo 93" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 92" shape="rect" coords="990,643,1030,700" alt="Cubiculo 92" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de Electronica Norte N2" shape="rect" coords="555,635,660,700" alt="Laboratorio de Electronica Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 67" shape="rect" coords="665,642,708,700" alt="Cubiculo 67" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 69" shape="rect" coords="710,642,754,700" alt="Cubiculo 69" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 74" shape="rect" coords="755,642,800,700" alt="Cubiculo 74" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 75" shape="rect" coords="803,642,848,700" alt="Cubiculo 75" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 79" shape="rect" coords="850,642,893,700" alt="Cubiculo 79" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 85" shape="rect" coords="897,642,942,700" alt="Cubiculo 85" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 87" shape="rect" coords="945,635,995,700" alt="Cubiculo 87" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen NorPoniente N2" shape="poly" coords="608,496,638,497,667,513,635,535,612,535" alt="Almacen NorPoniente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computacion NorPoniente N2" shape="poly" coords="614,543,680,543,867,411,867,543,975,543,975,623,652,623,652,576,614,576" alt="Sala de Computacion NorPoniente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cocineta Norte N2 " shape="rect" coords="467,600,642,631" alt="Cocineta Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen NorOriente N2" shape="poly" coords="440,514,467,497,493,497,493,534,470,534" alt="Almacen NorOriente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computacion NorOriente N2" shape="poly" coords="490,553,440,553,309,462,268,462,268,532,131,532,131,638,458,638,458,573" alt="Sala de Computacion NorOriente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Investigacion en Ing de Comp 21" shape="poly" coords="166,489,237,489,259,497,213,529,166,529" alt="Departamento de Investigacion en Ing de Comp 21" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiulo 15" shape="rect" coords="122,489,161,529" alt="Cubiculo 15" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 4" shape="rect" coords="73,489,116,539" alt="Cubiculo 4" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 3" shape="rect" coords="73,543,126,590" alt="Cubiculo 3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 2" shape="rect" coords="73,596,116,639" alt="Cubiculo 2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 1" shape="rect" coords="73,644,115,700" alt="Cubiculo 1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 13" shape="rect" coords="122,652,162,700" alt="Cubiculo 13" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 20" shape="rect" coords="168,652,208,700" alt="Cubiculo 20" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 24" shape="rect" coords="215,652,256,700" alt="Cubiculo 24" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 28" shape="rect" coords="262,652,300,700" alt="Cubiculo 28" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 29" shape="rect" coords="305,652,349,700" alt="Cubiculo 29" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 32" shape="rect" coords="354,652,395,700" alt="Cubiculo 13" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 34" shape="rect" coords="400,652,441,700" alt="Cubiculo 13" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Juntas Norte N2" shape="rect" coords="447,639,549,700" alt="Sala de Juntas Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula Oriente N2" shape="rect" coords="159,371,227,415" alt="Aula Oriente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres Norte N2" shape="rect" coords="500,511,538,574" alt="Sanitario Mujeres Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Ducto Norte N2" shape="rect" coords="546,522,563,574" alt="Ducto Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Hombres Norte N2" shape="rect" coords="569,511,608,574" alt="Sala de Juntas Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="IDF Norte B N2" shape="rect" coords="498,580,521,593" alt="IDF Norte B N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="IDF Norte A N2" shape="rect" coords="529,580,582,593" alt="IDF Norte A N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Tablero Norte N2" shape="rect" coords="587,580,610,593" alt="Tablero Norte N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                        </map>
<!--
*
*Mapeo del nivel 3 del CIC
*
-->
                        <map name="mapn3"> 
                            <area id="Almacen NorOriente N3" shape="poly" coords="413,511,440,493,468,493,468,531,443,531" alt="Almacen NorOriente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres Norte N3" shape="rect" coords="472,518,514,575" alt="Sanitario Mujeres Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Ducto Norte N3" shape="rect" coords="519,518,536,575" alt="Ducto Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Hombres Norte N3" shape="rect" coords="543,518,583,575" alt="Sanitario Hombres Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen NorPoniente N3" shape="poly" coords="589,493,615,493,640,511,610,531,583,531" alt="Almacen NorPoniente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="IDF Norte B N3" shape="rect" coords="471,579,496,595" alt="IDF Norte B N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="IDF Norte A N3" shape="rect" coords="498,579,557,595" alt="IDF Norte A N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Tablero Norte N3" shape="rect" coords="561,578,582,595" alt="Tablero Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computacion NorPoniente N3" shape="poly" coords="589,553,641,553,849,405,849,536,952,536,952,642,614,633,614,586" alt="Sala de Computacion NorPoniente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cocineta Norte N3" shape="rect" coords="456,600,612,631" alt="Cocineta Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computacion NorOriente N3" shape="poly" coords="450,553,450,633,100,633,100,534,235,534,235,480,212,480,212,458,282,458,416,553" alt="Sala de Computacion NorOriente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 1" shape="poly" coords="139,487,217,485,231,493,183,526,139,526" alt="1" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 2" shape="rect" coords="92,487,133,524" alt="2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 3" shape="rect" coords="44,488,88,539" alt="3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 4" shape="rect" coords="44,543,93,591" alt="4" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 5" shape="rect" coords="44,596,93,639" alt="5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 6" shape="rect" coords="44,643,85,711" alt="6" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 7" shape="rect" coords="91,648,134,711" alt="7" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 8" shape="rect" coords="139,648,180,711" alt="8" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 9" shape="rect" coords="185,648,227,711" alt="9" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 10" shape="rect" coords="231,648,276,711" alt="10" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 11" shape="rect" coords="280,648,321,711" alt="11" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 12" shape="rect" coords="326,648,368,711" alt="12" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 13" shape="rect" coords="373,648,415,711" alt="13" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Juntas Norte N3" shape="rect" coords="420,636,525,711" alt="Sala de Juntas Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de Electronica Norte N3" shape="rect" coords="530,636,635,711" alt="Laboratorio de Electronica Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 14" shape="rect" coords="640,648,684,711" alt="2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 15" shape="rect" coords="688,648,730,711" alt="3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 16" shape="rect" coords="734,648,776,711" alt="4" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 17" shape="rect" coords="781,648,823,711" alt="5" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 18" shape="rect" coords="827,648,871,711" alt="6" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 19" shape="rect" coords="876,648,916,711" alt="7" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 20" shape="rect" coords="921,648,963,711" alt="8" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 21" shape="rect" coords="969,643,1014,711" alt="9" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 22" shape="rect" coords="960,595,1014,639" alt="10" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 23" shape="rect" coords="960,543,1014,590" alt="11" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 24" shape="rect" coords="970,485,1014,538" alt="12" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 25" shape="rect" coords="922,485,965,525" alt="2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo Visitante 10" shape="poly" coords="848,505,858,498,858,485,917,485,917,526,873,526" alt="3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen SurOriente N3" shape="poly" coords="413,209,440,191,468,191,468,227,440,227" alt="Almacen NorOriente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres Sur N3" shape="rect" coords="472,146,514,217" alt="Sanitario Mujeres Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Ducto Sur N3" shape="rect" coords="519,146,540,202" alt="Ducto Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Hombres Sur N3" shape="rect" coords="543,146,583,217" alt="Sanitario Hombres Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen SurPoniente N3" shape="poly" coords="589,188,615,188,643,210,616,227,589,227" alt="Almacen NorPoniente N2" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Tablero Sur N3" shape="rect" coords="471,123,496,142" alt="Tablero Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="IDF Sur A N3" shape="rect" coords="498,123,557,142" alt="IDF Norte A N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="IDF Sur B N3" shape="rect" coords="561,123,585,142" alt="IDF Norte B N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo Visitante 7" shape="poly" coords="139,192,184,192,226,223,208,237,139,237" alt="Cubiculo Visitante 7" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo Visitante 6" shape="rect" coords="92,192,134,237" alt="Cubiculo Visitante 6" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 26" shape="rect" coords="44,183,88,237" alt="26" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 27" shape="rect" coords="44,130,93,178" alt="27" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 28" shape="rect" coords="44,80,93,126" alt="28" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 29" shape="rect" coords="44,13,87,76" alt="29" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 30" shape="rect" coords="90,12,132,68" alt="30" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 31" shape="rect" coords="139,12,180,68" alt="31" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 32" shape="rect" coords="184,12,228,68" alt="32" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 33" shape="rect" coords="231,12,276,68" alt="33" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 34" shape="rect" coords="280,12,321,68" alt="34" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 35" shape="rect" coords="326,12,368,68" alt="35" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 36" shape="rect" coords="373,12,416,68" alt="36" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de Electronica Sur N3" shape="rect" coords="420,12,525,83" alt="Laboratorio de Electronica Sur N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Juntas Norte N3" shape="rect" coords="530,12,635,83" alt="Sala de Juntas Norte N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 37" shape="rect" coords="640,12,683,68" alt="37" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 38" shape="rect" coords="687,12,729,68" alt="38" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 39" shape="rect" coords="734,12,776,68" alt="39" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 40" shape="rect" coords="781,12,824,68" alt="40" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 41" shape="rect" coords="827,12,871,68" alt="41" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 42" shape="rect" coords="876,12,917,68" alt="42" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 43" shape="rect" coords="921,12,965,68" alt="43" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 44" shape="rect" coords="969,12,1014,76" alt="44" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 45" shape="rect" coords="960,80,1014,126" alt="45" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 46" shape="rect" coords="960,130,1014,178" alt="46" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 47" shape="rect" coords="968,182,1014,234" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo Visitante 11" shape="rect" coords="922,190,966,234" alt="Cubiculo Visitante 11" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 48" shape="poly" coords="825,228,874,190,917,190,917,234,837,234,873,526" alt="3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computacion SurOriente N3" shape="poly" coords="109,90,448,90,448,144,231,300,231,178,109,178" alt="Sala de Computacion SurOriente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computacion SurPoniente N3" shape="poly" coords="613,90,947,90,947,180,820,180,820,263,776,264,613,144" alt="Sala de Computacion SurPoniente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cocineta Sur N3" shape="rect" coords="461,87,593,120" alt="Cocineta Sur N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula Oriente N3" shape="rect" coords="127,366,199,412" alt="Aula Oriente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio Poniente N3" shape="rect" coords="856,306,928,353" alt="Laboratorio Poniente N3" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                        </map>
<!--
*
*Mapeo del nivel 1 del CIDETEC
*
-->
                        <map name="mapn1cidetec">
                            <area id="Direccion" shape="poly" coords="96,38,259,38,259,136,212,136,212,111,96,111" alt="45" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Direccion" shape="rect" coords="96,117,204,148" alt="Sanitario Direccion" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Juntas" shape="rect" coords="262,38,402,137" alt="Sala de juntas" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Vestibulo Direccion" shape="rect" coords="211,140,402,212" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Coordinacion Enlace y Gestion Tecnica" shape="rect" coords="96,153,204,212" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion" shape="rect" coords="96,217,240,276" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion Academica" shape="rect" coords="246,217,347,300" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Unidad de Tecnologia Educativa y campus Virtual" shape="rect" coords="96,282,176,353" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Posgrado" shape="rect" coords="183,307,261,354" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Decanato" shape="rect" coords="269,306,344,352" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Recursos Financieros y Materiales" shape="poly" coords="96,360,347,360,347,446,247,446,247,427,96,427" alt="45" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Jefatura de Departamento de Recursos Financieros y Materiales" shape="rect" coords="96,436,239,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Jefatura de Capital Humano" shape="rect" coords="247,452,344,507" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Salon de Usos Multiples" shape="poly" coords="96,513,439,513,439,559,388,554,388,673,96,673" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cabina" shape="rect" coords="396,564,438,614" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cocineta" shape="rect" coords="408,623,440,673" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Almacen" shape="poly" coords="445,501,512,501,512,566,555,566,555,573,445,573" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="SITE" shape="rect" coords="522,497,561,560" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Biblioteca" shape="poly" coords="410,38,766,38,766,208,493,208,493,162,410,162" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Departamento de Investigacion e Innovacion" shape="rect" coords="410,170,486,211" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de Mecatronica 3" shape="rect" coords="774,38,1009,353" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres" shape="rect" coords="756,359,1009,397" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Tablero N1" shape="rect" coords="791,402,862,438" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Ducto N1" shape="rect" coords="469,409,1009,428" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Hombres" shape="rect" coords="761,444,1009,484" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Subdireccion de Innovacion y Desarrollo Tecnologico" shape="rect" coords="921,488,1009,584" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Innovacion y Desarrollo Tecnologico" shape="poly" coords="754,487,916,487,916,582,828,582,828,522,754,522" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Unindad Tecnologica de Interaccion Social" shape="rect" coords="754,530,820,584" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Bodega Escalera" shape="rect" coords="895,603,983,661" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Tableros Escalera N1" shape="rect" coords="989,591,1009,663" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                        </map>
<!--
*
*Mapeo del nivel 2 del CIDETEC
*
-->
                        <map name="mapn2cidetec">
                            <area id="Cubiculo 23" shape="rect" coords="48,24,153,94" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 22" shape="rect" coords="48,99,153,161" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 21" shape="rect" coords="48,166,153,234" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 20" shape="rect" coords="48,238,153,300" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala de Computo Informacion Cuantica" shape="rect" coords="160,200,304,300" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de Computo Inteligente" shape="rect" coords="225,24,434,153" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio Realidad Virtual" shape="rect" coords="442,24,623,153" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio Mecatronica 1" shape="rect" coords="627,24,808,153" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Servicio Medico" shape="rect" coords="470,157,625,220" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio Mecatronica 2" shape="poly" coords="48,306,304,307,304,476,174,476,174,441,48,441" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 25" shape="rect" coords="48,448,167,500" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">
                            <area id="Cubiculo 27" shape="rect" coords="48,504,167,561" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 26" shape="rect" coords="173,479,287,531" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 28" shape="rect" coords="48,567,146,625" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 29" shape="rect" coords="48,630,147,692" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 30" shape="rect" coords="194,629,292,692" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo 31" shape="rect" coords="194,566,292,625" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo E" shape="rect" coords="319,504,419,599" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo F" shape="rect" coords="425,504,522,599" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo D" shape="rect" coords="297,601,417,692" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo C" shape="rect" coords="422,623,553,692" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo B" shape="rect" coords="559,604,662,692" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Cubiculo A" shape="rect" coords="556,504,662,599" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Unidad de Informatica" shape="poly" coords="777,494,981,494,981,528,905,528,905,594,777,594" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Jefatura de Unidad de Informatica" shape="rect" coords="911,533,981,593" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Hombres N2" shape="rect" coords="722,449,981,491" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Tebleros N2" shape="rect" coords="757,403,833,443" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Ducto N2" shape="rect" coords="840,408,981,435" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitarios Mujeres N2" shape="rect" coords="722,359,981,400" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Profesores Invitados y Tesistas" shape="rect" coords="722,200,981,354" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Laboratorio de Redes" shape="rect" coords="814,24,981,195" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                        </map>
<!--
*
*Mapeo del nivel 3 del CIDETEC
*
-->
                        <map name="mapn3cidetec">
                            <area id="Aula 6" shape="rect" coords="75,35,182,197" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Centro de Computo 3" shape="rect" coords="189,35,293,197" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Centro de Computo 2" shape="rect" coords="300,35,518,197" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 3" shape="rect" coords="523,35,629,92" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 4" shape="rect" coords="523,98,629,143" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 5" shape="rect" coords="523,148,629,198" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Centro de Computo 1" shape="rect" coords="746,35,972,197" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 2" shape="rect" coords="746,202,972,276" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 1" shape="rect" coords="746,280,972,354" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Mujeres N3" shape="rect" coords="746,360,972,407" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Ducto N3" shape="rect" coords="784,415,905,434" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sanitario Hombres N3" shape="rect" coords="746,441,972,485" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Area de Proyectos" shape="rect" coords="746,492,850,593" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Salda de Juntas Area de Proyectos" shape="rect" coords="856,492,972,593" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Comedor N3" shape="rect" coords="408,517,633,673" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 7" shape="rect" coords="80,275,146,355" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 8" shape="rect" coords="153,275,220,355" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Aula 9" shape="rect" coords="225,275,295,355" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Centro de Computo 4" shape="rect" coords="85,359,295,434" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;"> 
                            <area id="Sala MIGUEL LANDIG BOS" shape="rect" coords="85,439,295,677" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                        </map>
<!--
*
*Mapeo del nivel 1 del Edificio 1 de ESCOM
*
-->
                        <map name="mape1n1escom">
                            <area id="Servicios Administrativos N1" shape="rect" coords="6,279,86,414" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Subdireccion Administrativa" shape="rect" coords="6,419,90,510" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Espera Consultorios" shape="rect" coords="91,279,160,359" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Consultorio de Psicologia" shape="rect" coords="91,362,116,449" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Orientacion Educativa" shape="rect" coords="121,363,145,449" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Servicio Dental" shape="rect" coords="150,361,207,449" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Servicio Medico" shape="rect" coords="166,281,207,359" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Checador" shape="rect" coords="214,281,239,313" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Departamento de Capital Humano" shape="rect" coords="213,397,271,451" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Pagaduria" shape="rect" coords="275,397,303,451" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Oficina de Compras" shape="rect" coords="308,397,335,451" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Departamento de Recursos Materiales Y Servicios" shape="rect" coords="338,397,398,451" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Departamento de Recursos Financieros" shape="rect" coords="402,397,461,451" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Caja" shape="rect" coords="364,283,402,314" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Area Secretarial" shape="poly" coords="247,286,358,286,358,321,410,321,410,286,460,286,460,390,215,390,215,321,247,321" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Salon de Examenes de Ingles" shape="rect" coords="523,302,566,366" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Centro de Lenguas Extranjeras" shape="rect" coords="575,278,724,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1006 A" shape="rect" coords="730,278,840,360" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1006 B" shape="rect" coords="728,368,840,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1007 A" shape="rect" coords="852,278,941,360" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1007 B" shape="rect" coords="852,369,941,456" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E1 N1" shape="rect" coords="948,286,997,362" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E1 N1" shape="rect" coords="1005,282,1027,341" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E1 N1" shape="rect" coords="1005,360,1027,399" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E1 N1" shape="rect" coords="947,396,996,507" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E1 N1" shape="rect" coords="1007,425,1027,510" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                        </map>
<!--
*
*Mapeo del nivel 2 del Edificio 1 de ESCOM
*
-->
                        <map name="mape1n2escom">
                            <area id="Unidad de Informatica" shape="rect" coords="6,364,79,562" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE" shape="rect" coords="6,568,82,635" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen de UI 1" shape="rect" coords="86,364,120,562" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen de UI 2" shape="rect" coords="122,364,195,464" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen de UI 3" shape="rect" coords="122,469,195,563" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala 1103 Impresiones" shape="rect" coords="202,364,312,563" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 1104" shape="rect" coords="320,364,437,563" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 1105" shape="rect" coords="548,364,670,563" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 1106" shape="rect" coords="675,364,782,563" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 1107" shape="rect" coords="798,364,896,528" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE Laboratorio 1107" shape="rect" coords="788,534,847,563" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E1 N2" shape="rect" coords="960,364,954,464" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E1 N2" shape="rect" coords="904,364,980,430" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E1 N2" shape="rect" coords="960,459,985,503" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E1 N2" shape="rect" coords="903,497,954,632" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E1 N2" shape="rect" coords="960,532,981,632" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                           
                        </map>
<!--
*
*Mapeo del nivel 3 del Edificio 1 de ESCOM
*
-->
                        <map name="mape1n3escom">
                            <area id="Recepcion" shape="rect" coords="2,298,75,380" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Subdireccion de Servicios Educativos de Integracion Social" shape="rect" coords="2,386,75,557" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1202" shape="rect" coords="81,305,192,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1203" shape="rect" coords="197,305,310,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1204" shape="rect" coords="314,305,432,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1205" shape="rect" coords="545,305,665,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1206" shape="rect" coords="671,305,779,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1207" shape="rect" coords="784,305,892,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1202" shape="rect" coords="81,305,192,490" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E1 N3" shape="rect" coords="896,305,948,395" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E1 N3" shape="rect" coords="954,305,975,363" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E1 N3" shape="rect" coords="954,391,975,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E1 N3" shape="rect" coords="896,427,948,552" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E1 N3" shape="rect" coords="955,458,973,554" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                           
                        </map>
<!--
*
*Mapeo del nivel 1 del Edificio 2 de ESCOM
*
-->
                        <map name="mape2n1escom">
                            <area id="SITE E2" shape="rect" coords="38,99,109,201" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura Gestion Escolar" shape="rect" coords="38,207,109,281" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Camaras" shape="rect" coords="38,286,109,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Gestion Escolar" shape="rect" coords="114,163,224,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Archivo Gestion Escolar" shape="rect" coords="229,163,331,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2004" shape="rect" coords="337,163,457,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Papeleria" shape="rect" coords="507,240,553,303" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2005" shape="rect" coords="560,163,673,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2006" shape="rect" coords="677,163,786,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2007" shape="rect" coords="790,163,894,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E2 N1" shape="rect" coords="899,251,948,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E2 N1" shape="rect" coords="953,283,975,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E2 N1" shape="rect" coords="950,215,975,255" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E2 N1" shape="rect" coords="898,104,947,219" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E2 N1" shape="rect" coords="954,104,975,192" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                           
                        </map> 
<!--
*
*Mapeo del nivel 2 del Edificio 2 de ESCOM
*
-->
                        <map name="mape2n2escom">
                            <area id="Jefatura de Enlace y Gestion Tecnica" shape="rect" coords="19,181,93,260" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Coordinacion de Enlace y Gestion Tecnica" shape="rect" coords="19,264,93,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Area de Desarrollo Tecnologico" shape="poly" coords="99,249,175,249,175,314,207,314,207,433,99,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE de Desarrolllo Tecnologico" shape="rect" coords="179,249,207,307" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Juntas" shape="rect" coords="213,249,322,330" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Coordinacion de Desarrollo Tecnologico" shape="rect" coords="212,335,278,432" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Desarrollo Tecnologico" shape="rect" coords="282,336,322,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2104" shape="rect" coords="327,249,444,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Sistemas I" shape="rect" coords="550,250,670,432" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Sistemas II" shape="poly" coords="675,280,699,280,699,250,784,250,784,433,675,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE Laboratorio de Sistemas II" shape="rect" coords="674,250,695,274" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Programacion II" shape="rect" coords="789,250,898,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E2 N2" shape="rect" coords="901,330,951,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E2 N2" shape="rect" coords="956,374,978,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E2 N2" shape="rect" coords="956,305,978,347" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E2 N2" shape="rect" coords="899,185,950,321" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E2 N2" shape="rect" coords="957,186,978,282" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                       
                        </map>
<!--
*
*Mapeo del nivel 3 del Edificio 2 de ESCOM
*
-->
                        <map name="mape2n3escom">
                            <area id="Jefatura de Enlace y Gestion Tecnica" shape="rect" coords="19,181,93,260" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Coordinacion de Enlace y Gestion Tecnica" shape="rect" coords="19,264,93,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Area de Desarrollo Tecnologico" shape="poly" coords="99,249,175,249,175,314,207,314,207,433,99,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE de Desarrolllo Tecnologico" shape="rect" coords="179,249,207,307" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Juntas" shape="rect" coords="213,249,322,330" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Coordinacion de Desarrollo Tecnologico" shape="rect" coords="212,335,278,432" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Desarrollo Tecnologico" shape="rect" coords="282,336,322,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2104" shape="rect" coords="327,249,444,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Sistemas I" shape="rect" coords="550,250,670,432" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Sistemas II" shape="poly" coords="675,280,699,280,699,250,784,250,784,433,675,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE Laboratorio de Sistemas II" shape="rect" coords="674,250,695,274" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Programacion II" shape="rect" coords="789,250,898,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E2 N3" shape="rect" coords="901,330,951,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E2 N3" shape="rect" coords="956,374,978,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E2 N3" shape="rect" coords="956,305,978,347" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E2 N3" shape="rect" coords="899,185,950,321" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E2 N3" shape="rect" coords="957,186,978,282" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map>
<!--
*
*Mapeo del nivel 1 del Edificio 3 de ESCOM
*
-->
                        <map name="mape3n1escom">
                            <area id="Area Secretarial Unidad de Tecnologia Educativa y Campus Virtual" shape="rect" coords="44,285,117,472" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Oficina de Unidad de Tecnologia y Campus Virtual" shape="poly" coords="44,477,117,477,117,505,82,505,82,547,44,547" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE Unidad de Tecnologia" shape="rect" coords="87,511,117,547" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Trabajos Terminales" shape="rect" coords="122,285,235,482" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen 2 de Papeleria" shape="rect" coords="256,285,354,391" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen 1 de Papeleria" shape="rect" coords="240,394,354,491" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1011" shape="rect" coords="359,285,475,491" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen 3 de Papeleria" shape="rect" coords="532,325,580,397" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1012" shape="rect" coords="584,285,707,491" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1013" shape="rect" coords="712,285,825,491" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1014" shape="rect" coords="830,285,935,491" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E3 N1" shape="rect" coords="940,285,990,398" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E3 N1" shape="rect" coords="997,285,1019,356" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E3 N1" shape="rect" coords="997,380,1019,426" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E3 N1" shape="rect" coords="940,405,990,544" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E3 N1" shape="rect" coords="997,450,1019,544" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map>
<!--
*
*Mapeo del nivel 2 del Edificio 3 de ESCOM
*
-->
                        <map name="mape3n2escom">
                            <area id="Area Secretarial de Direccion" shape="rect" coords="37,312,113,396" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Direccion ESCOM" shape="rect" coords="37,400,113,496" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Archivo Direccion" shape="rect" coords="37,501,80,577" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Direccion" shape="rect" coords="84,501,115,577" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Consejo Tecnico Consultivo Escolar" shape="rect" coords="117,312,229,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1110" shape="rect" coords="233,312,346,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1111" shape="rect" coords="351,312,470,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1112" shape="rect" coords="580,312,700,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1013" shape="rect" coords="706,312,819,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio de Proyectos de Investigacion" shape="rect" coords="824,312,931,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E3 N2" shape="rect" coords="936,312,988,424" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E3 N2" shape="rect" coords="993,312,1019,382" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E3 N2" shape="rect" coords="993,408,1019,453" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E3 N2" shape="rect" coords="937,432,989,570" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E3 N2" shape="rect" coords="993,478,1019,579" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map>
<!--
*
*Mapeo del nivel 3 del Edificio 3 de ESCOM
*
-->
                        <map name="mape3n3escom">
                            <area id="Departamento de Extension y Apoyos Educativos" shape="rect" coords="42,248,117,445" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Extension y Apoyos Educativos" shape="rect" coords="45,449,119,511" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1209" shape="rect" coords="123,248,233,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1210" shape="rect" coords="238,248,351,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1211" shape="rect" coords="355,248,480,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1212" shape="rect" coords="580,248,704,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1213" shape="rect" coords="710,248,822,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 1214" shape="rect" coords="828,248,934,450" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E3 N3" shape="rect" coords="941,255,991,361" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E3 N3" shape="rect" coords="997,256,1021,321" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E3 N3" shape="rect" coords="996,344,1021,389" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E3 N3" shape="rect" coords="941,369,993,509" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E3 N3" shape="rect" coords="996,413,1021,514" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map>
<!--
*
*Mapeo del nivel 1 del Edificio 4 de ESCOM
*
-->
                        <map name="mape4n1escom">
                            <area id="SITE de Estudios de Posgrado e Investigacion" shape="rect" coords="23,69,61,147" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Posgrado" shape="rect" coords="65,69,103,147" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Seccion de Estudios de Posgrado e Investigacion" shape="rect" coords="23,152,219,310" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Investigacion" shape="rect" coords="24,314,73,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Seccion de Estudios de Posgrado e Investigacion" shape="rect" coords="76,315,219,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 2009" shape="rect" coords="226,153,335,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 2010" shape="rect" coords="341,153,464,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 2011" shape="rect" coords="579,153,704,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Norte 2011" shape="rect" coords="709,153,760,270" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Sur 2011" shape="rect" coords="709,275,760,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 2012" shape="rect" coords="822,153,935,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Norte 2012" shape="rect" coords="765,153,817,270" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Sur 2012" shape="rect" coords="765,275,817,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                            <area id="Sanitario Mujeres E4 N1" shape="rect" coords="941,249,991,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E4 N1" shape="rect" coords="996,301,1021,372" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E4 N1" shape="rect" coords="996,219,1021,273" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E4 N1" shape="rect" coords="941,77,994,242" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E4 N1" shape="rect" coords="996,69,1021,191" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map> 
<!--
*
*Mapeo del nivel 2 del Edificio 4 de ESCOM
*
-->
                        <map name="mape4n2escom">
                            <area id="SITE Sala de Profesores" shape="rect" coords="43,93,81,168" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Norte Sala de Profesores" shape="rect" coords="85,93,118,168" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Profesore 2108" shape="poly" coords="43,172,233,172,233,415,96,415,96,343,43,343" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Sur Sala de Profesores" shape="rect" coords="46,352,91,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2109" shape="rect" coords="237,172,351,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2110" shape="rect" coords="354,172,479,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2111" shape="rect" coords="578,172,708,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2112" shape="rect" coords="713,172,825,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2113" shape="rect" coords="830,172,934,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E4 N2" shape="rect" coords="940,277,992,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E4 N2" shape="rect" coords="996,334,1021,415" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E4 N2" shape="rect" coords="996,243,1021,302" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E4 N2" shape="rect" coords="940,90,992,270" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E4 N2" shape="rect" coords="996,90,1021,221" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map>
<!--
*
*Mapeo del nivel 3 del Edificio 4 de ESCOM
*
-->
                        <map name="mape4n3escom">
                            <area id="SITE Sala de Profesore Ciencias Basicas" shape="rect" coords="17,130,59,220" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Sala de Profesores Ciencias Basicas" shape="rect" coords="62,130,98,220" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Profesores Ciencias Basicas" shape="rect" coords="17,225,220,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2209" shape="rect" coords="224,219,347,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2210" shape="rect" coords="351,219,482,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2211" shape="rect" coords="591,219,719,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2212" shape="rect" coords="725,219,844,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Aula 2213" shape="rect" coords="849,219,966,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Mujeres E4 N3" shape="rect" coords="971,334,1025,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Mujeres E4 N3" shape="rect" coords="1031,392,1060,479" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cuarto de Servicio E4 N3" shape="rect" coords="1030,298,1060,365" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sanitario Hombres E4 N3" shape="rect" coords="970,138,1026,325" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Septico Hombres E4 N3" shape="rect" coords="1031,138,1060,267" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                                                                                
                        </map>
<!--
*
*Mapeo del nivel 1 del Edificio 5 de ESCOM
*
-->
                        <map name="mape5n1escom">
                            <area id="Actividades Culturales y Deportivas" shape="rect" coords="66,152,214,306" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Subestacion Electrica" shape="rect" coords="66,425,214,581" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 03" shape="rect" coords="295,196,478,358" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 6 Laboratorios" shape="rect" coords="479,239,511,299" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 7 Laboratorios" shape="rect" coords="479,301,511,360" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE N1" shape="rect" coords="504,203,549,235" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Bodega de Materiales" shape="rect" coords="66,152,214,306" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Club de MiniRobotica" shape="rect" coords="303,363,341,532" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 01" shape="rect" coords="346,364,510,532" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio 02" shape="rect" coords="553,362,738,532" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 12 N1" shape="rect" coords="553,202,605,255" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 11 N1" shape="rect" coords="253,259,605,294" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Oficina Sindical No Docente" shape="rect" coords="253,299,634,359" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Procesos Tecnicos" shape="rect" coords="635,201,692,294" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Recepcion de DSD" shape="rect" coords="695,202,775,236" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Delegacion Sindical Docente" shape="rect" coords="695,240,738,295" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Servicio Social" shape="rect" coords="742,240,775,295" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Coleccion de Tesis" shape="rect" coords="638,299,719,358" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Biblioteca" shape="rect" coords="723,299,755,358" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cabina de Audio Biblioteca" shape="rect" coords="742,363,775,413" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Biblioteca" shape="rect" coords="780,203,992,530" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                        </map>
<!--
*
*Mapeo del nivel 2 del Edificio 5 de ESCOM
*
-->
                        <map name="mape5n2escom">
                            <area id="Subdireccion Academica" shape="rect" coords="90,113,163,170" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Area Secretarial Subdireccion Academica" shape="poly" coords="91,173,167,173,167,115,224,115,224,267,91,267" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Educacion Continua" shape="rect" coords="88,398,224,551" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Usos Multiples" shape="rect" coords="313,153,524,335" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cabina de SUM" shape="rect" coords="529,161,559,215" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de FII" shape="rect" coords="529,219,559,333" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="CATT y Titulacion" shape="rect" coords="565,170,618,333" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Profesores Formacion Integral e Institucional" shape="rect" coords="624,170,738,333" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="SITE N2" shape="rect" coords="742,160,785,195" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Presidencia Academica" shape="rect" coords="754,261,786,335" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio Digitales 1" shape="rect" coords="789,160,885,333" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Laboratorio Digitales 2" shape="rect" coords="890,160,1000,333" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 29" shape="rect" coords="317,339,351,400" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 30" shape="rect" coords="355,339,395,400" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Profesores" shape="rect" coords="318,405,396,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Academia de Sistemas Distribuidos" shape="rect" coords="400,340,438,394" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Academia de Proyectos" shape="rect" coords="400,399,438,447" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Academia de Sistemas Digitales" shape="rect" coords="400,451,438,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Departamento de Ingenieria en Sistemas Computacionales" shape="rect" coords="444,340,707,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Jefatura de Ingenieria en Sistemas Computacionales" shape="rect" coords="710,339,747,433" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Jefatura de Ciencias e Ingenieria de la Computacion" shape="rect" coords="452,339,783,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Departamento de Ciencias E Ingenieria de la Computacion" shape="rect" coords="789,339,952,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 19" shape="rect" coords="958,340,1004,389" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 20" shape="rect" coords="958,394,1004,446" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 21" shape="rect" coords="958,450,1004,505" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                        </map> 
<!--
*
*Mapeo del nivel 3 del Edificio 5 de ESCOM
*
-->
                        <map name="mape5n3escom">
                            <area id="Tutorias" shape="rect" coords="78,95,140,154" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Jefatura de Evaluacion y Seguimiento Academico" shape="rect" coords="143,100,220,153" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Departamento de Evaluacion y Seguimiento Academico" shape="rect" coords="78,158,220,244" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala de Examenes Profesionales" shape="rect" coords="78,372,220,520" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Deprtamento de Formacion Basica" shape="poly" coords="312,140,549,140,549,280,469,280,469,311,400,311,400,280,344,280,344,251,312,251" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 7" shape="rect" coords="310,255,341,291" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 8" shape="rect" coords="316,293,393,328" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Sala 21-N" shape="rect" coords="397,316,432,361" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo A Sala 21-S" shape="rect" coords="436,316,474,361" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo B Sala 21-S" shape="rect" coords="476,293,512,330" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 1 Formacion Basica" shape="rect" coords="514,284,550,330" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala 21-N" shape="poly" coords="315,331,391,331,391,364,431,364,431,480,315,480" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala 21-S" shape="poly" coords="436,364,478,364,478,335,548,335,548,480,436,480" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Sala 25-N" shape="poly" coords="551,145,659,145,659,255,622,255,622,280,551,280" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 12 Sala 25-N" shape="rect" coords="553,286,584,329" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 11 Sala 25-N" shape="rect" coords="628,261,659,302" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Almacen Sala 22-N" shape="rect" coords="589,285,623,329" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo Sala 22-N" shape="rect" coords="628,306,663,359" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Sala 22-N" shape="poly" coords="553,336,622,336,622,366,663,368,663,480,553,480" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 1 Sala 22-S" shape="rect" coords="668,306,703,359" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Sala 22-S" shape="poly" coords="667,366,710,366,710,338,778,338,778,480,667,480" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 2 Sala 22-S" shape="rect" coords="706,293,743,331" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Sala 25-S" shape="poly" coords="663,171,708,171,708,145,778,145,778,289,709,289,709,254,663,254" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="SITE N3" shape="rect" coords="663,145,703,167" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo Sala 25-S" shape="rect" coords="747,295,779,330" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 18 N3" shape="rect" coords="782,145,829,182" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 19 N3" shape="rect" coords="782,185,829,222" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 20 N3" shape="rect" coords="782,224,829,261" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 21 N3" shape="rect" coords="782,281,817,330" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 22 N3" shape="rect" coords="849,167,894,222" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 43 Sala de Trabajo Terminal" shape="rect" coords="858,318,893,360" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Sala de Trabajo Terminal" shape="poly" coords="783,335,853,335,853,365,892,365,892,480,783,480" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 32" shape="rect" coords="898,145,942,181" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 31" shape="rect" coords="898,185,942,222" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 30" shape="rect" coords="898,225,942,261" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 29" shape="rect" coords="898,265,942,300" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 39" shape="rect" coords="898,321,942,355" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 40" shape="rect" coords="898,359,942,396" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 41" shape="rect" coords="898,400,942,436" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 25" shape="rect" coords="969,184,1023,220" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 26" shape="rect" coords="969,224,1023,262" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">  
                            <area id="Cubiculo 27" shape="rect" coords="969,265,1023,299" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 38" shape="rect" coords="969,321,1023,354" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 37" shape="rect" coords="969,359,1023,394" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 36" shape="rect" coords="969,400,1023,435" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Cubiculo 35" shape="rect" coords="969,439,1023,480" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                        </map>
<!--
*
*Mapeo del Sotano del Edificio 5 de ESCOM
*
-->                        
                        <map name="mape5nsescom">
                            <area id="Departamento de Mantenimiento" shape="rect" coords="86,107,211,269" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Planta de Emergencia" shape="rect" coords="84,383,218,551" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Almacen Sotano" shape="rect" coords="929,473,1065,553" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                            <area id="Estacionamiento Sotano" shape="rect" coords="232,124,908,516" alt="47" noherf onmouseout="limpia(this);return false;" onmouseover="getinfo(this);return false;" onclick="ubicacionFinal(this);return false;">                              
                             
                        </map>
                </div>
            </div>  
            <div  class="modal-footer">
            </div>
        </div>  </div>
</div>
</div>
</div>

