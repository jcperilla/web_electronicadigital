<!-- Modal -->
<div class="modal fade" id="crearEditarVigilante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear/Editar Vigilante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo constant('URL'); ?>vigilantes/ingresar" method="POST">
        <div class="form-group row">
            <label for="id" class="col-sm-5 col-form-label">Cédula</label>
            <div class="col-sm-7">
                <input type="number" required class="form-control-plaintext" id="id" name="id" placeholder="Ingrese la cédula">
            </div>
        </div>

        <div class="form-group row">
            <label for="firt_name" class="col-sm-5 col-form-label">Nombre</label>
            <div class="col-sm-7">
                <input type="text" required class="form-control-plaintext" id="firt_name" name="firt_name" placeholder="Ingrese el nombre">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-sm-5 col-form-label">Apellidos</label>
            <div class="col-sm-7">
                <input type="text" required class="form-control-plaintext" id="last_name" name="last_name" placeholder="Ingrese los apellidos">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-5 col-form-label">Correo</label>
            <div class="col-sm-7">
                <input type="email" required class="form-control-plaintext" id="email" name="email" placeholder="Ingrese el correo">
            </div>
        </div>

        <div class="form-group row">
            <label for="entry_time" class="col-sm-5 col-form-label">Hora de entrada</label>
            <div class="col-sm-7">
                <input type="time" required class="form-control-plaintext" id="entry_time" name="entry_time" placeholder="Ingrese los apellidos">
            </div>
        </div>
        <div class="form-group row">
            <label for="departure_time" class="col-sm-5 col-form-label">Hora de salida</label>
            <div class="col-sm-7">
                <input type="time" required class="form-control-plaintext" id="departure_time" name="departure_time" placeholder="Ingrese el correo">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-5 col-form-label">Contraseña</label>
            <div class="col-sm-7">
                <input type="password" required class="form-control-plaintext" id="password" name="password" placeholder="Ingrese la clave">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn addVigilante">Guardar Vigilante</button>
        </div>
      </form>
      </div>
      
    </div>
  </div>
</div>