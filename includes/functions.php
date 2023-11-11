<?php
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'insert_mat':
            insert_mat();
            break;

        case 'insert_carrera':
            insert_carrera();
            break;

        case 'insert_esp':
            insert_esp();
            break;

        case 'insert_prof':
            insert_prof();
            break;

        case 'insert_alumno':
            insert_alumno();
            break;

        case 'editar_profe':
            editar_profe();
            break;

        case 'editar_alumno':
            editar_alumno();
            break;

        case 'editar_mat':
            editar_mat();
            break;

        case 'editar_carrera':
            editar_carrera();
            break;

        case 'editar_esp':
            editar_esp();
            break;


        case 'editar_user':
            editar_user();
            break;

            /*case 'delete':
            delete();
            break;

        case 'delete_s':
            delete_s();
            break;*/
    }
}


function insert_esp()
{
    require_once("db.php");
    extract($_POST);

    $consulta = "INSERT INTO especialidades (especialidad) VALUES ('$especialidad')";

    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        $response = array(
            'status' => 'success',
            'message' => 'Los datos se guardaron correctamente'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error inesperado'
        );
    }

    echo json_encode($response);
}

function insert_mat()
{
    global $conexion;
    extract($_POST);
    include "db.php";

    $consulta = "INSERT INTO materias (materia,creditos,id_profesor, per_ini, per_fin) VALUES ('$materia','$creditos','$id_profesor',
    '$per_ini','$per_fin')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $response = array(
            'status' => 'success',
            'message' => 'Los datos se guardaron correctamente'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error inesperado'
        );
    }

    echo json_encode($response);
}

function insert_carrera()
{
    global $conexion;
    extract($_POST);
    include "db.php";

    $consulta = "INSERT INTO carreras (carrera, creditos, duracion) VALUES ('$carrera', '$creditos','$duracion')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $response = array(
            'status' => 'success',
            'message' => 'Los datos se guardaron correctamente'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error inesperado'
        );
    }

    echo json_encode($response);
}




function insert_prof()
{
    global $conexion;
    extract($_POST);
    include "db.php";

    $consulta = "INSERT INTO profesores (identidad, nombres, apellidos,correo,telefono,edad,fecha_na, id_especialidad) 
    VALUES ('$identidad', '$nombres','$apellidos','$correo','$telefono','$edad','$fecha_na', '$id_especialidad')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $response = array(
            'status' => 'success',
            'message' => 'Los datos se guardaron correctamente'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error inesperado'
        );
    }

    echo json_encode($response);
}

function insert_alumno()
{
    global $conexion;
    extract($_POST);
    include "db.php";

    $consulta = "INSERT INTO alumnos (identidad,nombre, apellido,correo,telefono,edad,fecha_na, id_carrera) 
    VALUES ('$identidad','$nombre','$apellido','$correo','$telefono','$edad','$fecha_na', '$id_carrera')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $response = array(
            'status' => 'success',
            'message' => 'Los datos se guardaron correctamente'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error inesperado'
        );
    }

    echo json_encode($response);
}


function editar_profe()
{
    require_once("db.php");

    extract($_POST);


    $consulta = "UPDATE profesores SET identidad = '$identidad', nombres = '$nombres', apellidos = '$apellidos', correo = '$correo',
    telefono = '$telefono', edad='$edad', fecha_na = '$fecha_na',id_especialidad = '$id_especialidad' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo json_encode("correcto");
    } else {
        echo json_encode("error");
    }
}

function editar_alumno()
{
    require_once("db.php");

    extract($_POST);


    $consulta = "UPDATE alumnos SET identidad = '$identidad',nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = '$telefono',
    edad='$edad', fecha_na = '$fecha_na', id_carrera = '$id_carrera' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo json_encode("correcto");
    } else {
        echo json_encode("error");
    }
}

function editar_mat()
{
    require_once("db.php");

    extract($_POST);


    $consulta = "UPDATE materias SET materia = '$materia', creditos = '$creditos', id_profesor = '$id_profesor', 
    per_ini = '$per_ini', per_fin = '$per_fin' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo json_encode("correcto");
    } else {
        echo json_encode("error");
    }
}



function editar_carrera()
{
    require_once("db.php");

    extract($_POST);


    $consulta = "UPDATE carreras SET carrera = '$carrera', creditos = '$creditos', duracion = '$duracion' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo json_encode("correcto");
    } else {
        echo json_encode("error");
    }
}

function editar_esp()
{
    require_once("db.php");

    extract($_POST);


    $consulta = "UPDATE especialidades SET especialidad = '$especialidad' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo json_encode("correcto");
    } else {
        echo json_encode("error");
    }
}

function editar_user()
{
    require_once("db.php");
    extract($_POST);
    $consulta = "UPDATE users SET usuario = '$usuario', correo = '$correo', id_rol='$id_rol' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo json_encode("correcto");
    } else {
        echo json_encode("error");
    }
}
/*function delete()
{
    $id = $_POST['id'];
    require_once("db.php");


    $consulta = "DELETE FROM materias WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo 'success';
    } else {
        echo 'error';
    }
}

function delete_s()
{
    $id = $_POST['id'];
    require_once("db.php");


    $consulta = "DELETE FROM grados WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo 'success';
    } else {
        echo 'error';
    }
}
*/