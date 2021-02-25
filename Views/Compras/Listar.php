<?php encabezado() ?>
<!-- Begin Page Content -->
<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Nueva Compra</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="" method="post" id="frmCompras" class="row" autocomplete="off">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="buscar_codigo"><i class="fas fa-barcode"></i> Código de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input id="buscar_codigo" onkeyup="BuscarCodigo(event);" class="form-control" type="text" name="codigo" placeholder="Código de barras">
                        <span class="text-danger d-none" id="error"><i class="fas fa-ad"></i> No hay producto</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <input id="nombre" class="form-control" type="hidden" name="nombre">
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="IngresarCantidad(event);">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="precio"><i class="fas fa-ad"></i> Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="tablaCompras">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody id="ListaCompras">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <div class="form-group mt-2">
                        <strong class="text-primary"><i class="fas fa-ad"></i> Total a pagar: </strong>
                        <input type="hidden" id="total" value="0.00" name="total" class="form-control mb-2">
                        <strong id="totalV"></strong><br>
                        <button class="btn btn-danger" type="button" id="AnularCompra"><i class="fas fa-ad"></i> Anular</button>
                        <button class="btn btn-success" type="button" id="procesarCompra"><i class="fas fa-ad"></i> Procesar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>