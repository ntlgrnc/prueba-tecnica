<?php

class Conexion {
    public function  conectar(){
        return new mysqli("localhost","root","","prueba_tecnica");
    }
}
