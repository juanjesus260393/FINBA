<?php

class mdlconection {

    public static function connect() {
        $conexion = mysqli_connect("localhost", "root", "P4SSW0RD", "dbfinba");
        return $conexion;
    }

}
