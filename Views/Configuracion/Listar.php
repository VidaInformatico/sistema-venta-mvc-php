<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Datos de la Empresa</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 ml-auto">
                        <?php if (isset($alert['mensaje'])) {
                            if ($alert['mensaje'] == "modificado") { ?>
                                <div class="alert alert-primary" role="alert">
                                    <strong>Datos Modificado</strong>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Error al Actualizar</strong>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            Datos de la Empresa
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>/Configuracion/actualizar" method="post">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="ruc">Ruc</label>
                                            <input id="id" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <input id="ruc" class="form-control" type="text" name="ruc" value="<?php echo $data['ruc']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="razon">Razon Social</label>
                                            <input id="razon" class="form-control" type="text" name="razon" value="<?php echo $data['razon']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>