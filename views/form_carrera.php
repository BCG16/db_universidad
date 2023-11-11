<div class="modal fade" id="carrera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar nueva carrera</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form id="carreraForm">
                  
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Carrera</label>
                            <input type="text" id="carrera" name="carrera" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Creditos</label>
                            <input type="text" id="creditos" name="creditos" class="form-control" required>
                        </div>
                    </div>
                </div>   
                
                    <div class="form-group">
                        <label for="nombre" class="form-label">Duración</label>
                        <input type="text" id="duracion" name="duracion" class="form-control" required>
                    </div>


                    <br>

                    <input type="hidden" name="accion" value="insert_carrera">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#carreraForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '../includes/functions.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Éxito: Los datos se guardaron correctamente');
                        window.location = "carreras.php";
                    } else {
                        alert('Error: Ocurrió un error inesperado');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: Ocurrió un error inesperado');
                }
            });
        });
    });
</script>