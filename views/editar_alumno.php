<div class="modal fade" id="editar<?php echo $fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Alumno</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form id="editForm<?php echo $fila['id']; ?>" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Identidad</label>
                                <input type="text" name="identidad" id="identidad" class="form-control" value="<?php echo $fila['identidad']; ?>" required>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $fila['nombre']; ?>" required>

                            </div>
                        </div>
                    </div>    
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Apellidos</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $fila['apellido']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Correo</label>
                                <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $fila['correo']; ?>" required>
                            </div>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Telefono</label>
                                <input type="tel" name="telefono" id="telefono" class="form-control" value="<?php echo $fila['telefono']; ?>" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Edad</label>
                                <input type="number" name="edad" id="edad" class="form-control" value="<?php echo $fila['edad']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_na" id="fecha_na" class="form-control" value="<?php echo $fila['fecha_na']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" >Carrera</label><br>
                                <select name="id_carrera" id="id_carrera" class="form-control" required>
                                <option <?php echo $fila['id_carrera'] === 'id_carrera' ? 'selected' : '';  ?> value="<?php echo $fila['id_carrera']; ?>"><?php echo $fila['id_carrera']; ?></option>
                                    <?php

                                    include("db.php");

                                    $sql = "SELECT * FROM carreras ";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($consulta = mysqli_fetch_array($resultado)) {
                                        echo '<option value="' . $consulta['id'] . '">' . $consulta['carrera'] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>

                    <input type="hidden" name="accion" value="editar_alumno">
                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="editForm(<?php echo $fila['id']; ?>)">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function editForm(id) {
        var datosFormulario = $("#editForm" + id).serialize();

        $.ajax({
            url: "../includes/functions.php",
            type: "POST",
            data: datosFormulario,
            dataType: "json",
            success: function(response) {
                if (response === "correcto") {
                    alert("El registro se ha actualizado correctamente");
                    setTimeout(function() {
                        location.assign('alumnos.php');
                    }, 2000);
                } else {
                    alert("Ha ocurrido un error al actualizar el registro");
                }
            },
            error: function() {
                alert("Error de comunicacion con el servidor");
            }
        });
    }
</script>