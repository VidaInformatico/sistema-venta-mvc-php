<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <section>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form method="post" action="<?php echo base_url(); ?>Usuarios/actualizar" autocomplete="off">
                        <div class="card-header bg-dark">
                            <h6 class="title text-white text-center">Modificar Usuario</46>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" value="<?php echo $data['usuario']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo" value="<?php echo $data['correo']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="rol">Rol</label>
                                    <select id="rol" class="form-control" name="rol">
                                        <option value="Administrador" <?php if ($data['rol'] == "Administrador") {
                                                                            echo "selected";
                                                                        } ?>>Administrador</option>
                                        <option value="Vendedor" <?php if ($data['rol'] == "Vendedor") {
                                                                        echo "selected";
                                                                    } ?>>Vendedor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Modificar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>