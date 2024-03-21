<?php

namespace controller;

use model\TablaJuegos;

require_once realpath('./vendor/autoload.php');
class Juegos
{
    public static function obtener_datos()
    {
        try {
            $juego = new TablaJuegos();
            $datos = $juego->consulta()->all();
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
            $juego = new TablaJuegos();
            $juego->eliminar($id);
            echo json_encode(["success" => "Se eliminaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    public static function insercion($datos)
    {
        try {
            $juego = new TablaJuegos();
            $add = $juego->insercion($datos);
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
            $juego = new TablaJuegos();
            $juego->actualizar(["nombre" => "prueba"])->where("id_juego", "1");
            echo json_encode(["success" => "Se actualizaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
}
