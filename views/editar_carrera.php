<div class="modal fade" id="editar<?php echo $fila['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Carrera</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form id="editForm<?php echo $fila['id']; ?>" method="POST">


                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Carrera</label>
                            <input type="text" id="carrera" name="carrera" class="form-control" value="<?php echo $fila['carrera']; ?>" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Creditos</label>
                            <input type="text" id="creditos" name="creditos" class="form-control" value="<?php echo $fila['creditos']; ?>" required>
                        </div>
                    </div>
                </div>    

                    <div class="form-group">
                        <label for="nombre" class="form-label">Duración</label>
                        <input type="text" id="duracion" name="duracion" class="form-control" value="<?php echo $fila['duracion']; ?>" required>
                    </div>


                    <br>

                    <input type="hidden" name="accion" value="editar_carrera">
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
                        location.assign('carreras.php');
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