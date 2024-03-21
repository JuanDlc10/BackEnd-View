<?php

namespace controller;

use model\TablaMascota;

require_once realpath('./vendor/autoload.php');
class Mascotas
{
    public static function obtener_datos()
    {
        try {
            $mascota = new TablaMascota();
            $datos = $mascota->consulta(['id_mascota', 'nombre'])->all();
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
            $mascota = new TablaMascota();
            $mascota->eliminar()->where('id_mascota', $id);
            echo json_encode(["success" => "Se eliminaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    public static function insercion($datos)
    {
        try {
            $mascota = new TablaMascota();
            echo json_encode($mascota->insercion($datos));
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    public static function actualizar_datos()
    {
        try {
            $mascota = new TablaMascota();
            $mascota->actualizar(["nombre" => "prueba1"])->where("id_mascota", "1");
            echo json_encode(["success" => "Se actualizaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
}
