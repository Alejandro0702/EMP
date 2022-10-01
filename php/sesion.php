<?php
class Sesion {
    public static function Comprobar(){
        session_start();
        if ( !isset( $_SESSION['sesion'] ) ) {
          header("location: ../index.html");
        }
    }
}
?>