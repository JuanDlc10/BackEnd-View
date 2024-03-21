<?php

namespace controller;

use model\TablaPersona;

require_once realpath('./vendor/autoload.php');
class Personas
{
    public static function obtener_datos()
    {
        try {
            $persona = new TablaPersona();
            $datos = $persona->consulta()->limite(2 , 2)->all();
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function like()
    {
        try {
            $persona = new TablaPersona();
            $datos = $persona->consulta()->where('nombre')->like('%j%')->all();
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function max()
    {
        try {
            $persona = new TablaPersona();
            $datos = $persona->consulta()->max('id_persona')->all();
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function min()
    {
        try {
            $persona = new TablaPersona();
            $datos = $persona->consulta()->min('id_persona')->all();
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function sum()
    {
        try {
            $persona = new TablaPersona();
            $datos = $persona->consulta()->sum('id_persona')->all();
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo json_encode(["error" => "No se encontraron datos"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function avg()
    {
        try {
            $persona = new TablaPersona();
            $datos = $persona->consulta()->avg('id_persona')->all();
            if ($datos !== false) {
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
            $persona = new TablaPersona();
            $persona->eliminar()->where('id_persona', $id);
            echo json_encode(["success" => "Se eliminaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public static function insercion($datos)
    {
        try {
            $persona = new TablaPersona();
            $add = $persona->insercion($datos);
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
            $persona = new TablaPersona();
            $persona->actualizar(["nombre" => "prueba1"])->where("id_persona", "3");
            echo json_encode(["success" => "Se actualizaron los datos correctamente"]);
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
}
