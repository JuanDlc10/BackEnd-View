<?php

namespace controller;

use model\TablaPerifericos;

require_once realpath('./vendor/autoload.php');
class Perifericos
{
    public static function obtener_datos()
    {
        try {
            $periferico = new TablaPerifericos();
            $datos = $periferico->consulta()->all();
            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function eliminar_datos($id)
    {
        try {
            $periferico = new TablaPerifericos();
            $periferico->eliminar()->where('id_periferico', $id);
            echo json_encode(["success" => "Se eliminaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    
    
    public static function insercion($datos)
    {
        try {
            $periferico = new TablaPerifericos();
            $add = $periferico->insercion($datos);
            if ($add) {
                echo json_encode(["success" => "Se agregaron los datos correctamente"]);
            } else {
                echo json_encode(["error" => "No se agregaron los datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function actualizar_datos()
    {
        try {
            $periferico = new TablaPerifericos();
            $periferico->actualizar(["nombre" => "prueba1"])->where("id_periferico", "3");
            echo json_encode(["success" => "Se actualizaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }

    }
}
