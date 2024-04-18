<?php

namespace controller;

use model\TablaProductos;

require_once realpath('./vendor/autoload.php');
class Productos
{
    public static function obtener_datos()
    {
        try {
            $producto = new TablaProductos();
            $datos = $producto->consulta()->all();
            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function first()
    {
        try {
            $producto = new TablaProductos();
            $dato = $producto->consulta()->first();
            if ($dato) {
                echo json_encode($dato);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function filtro($id)
    {
        try {
            $producto = new TablaProductos();
            $dato = $producto->consulta()->where('id_producto', $id)->first();
            if ($dato) {
                echo json_encode($dato);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }

    public static function total()
    {
        try {
            $producto = new TablaProductos();
            $total = $producto->count();
            echo json_encode(["total de datos" => $total]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function limite($limit)
    {
        try {
            $producto = new TablaProductos();
            $lim = $producto->consulta()->limite($limit)->all();
            echo json_encode([$lim]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function eliminar_datos($id)
    {
        try {
            $periferico = new TablaProductos();
            $periferico->eliminar()->where('id_producto', $id)->first();
            echo json_encode(["success" => "Se eliminaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
}
