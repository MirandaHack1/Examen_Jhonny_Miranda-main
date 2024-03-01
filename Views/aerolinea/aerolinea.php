<?php require_once('../html/head2.php') ?>
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de aerolinea</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_aerolinea">
                        Nuevo Aerolinea
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Pais</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Flota</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Alianza</h6>
                                </th>
                                <!-- <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estado</h6>
                                </th> -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody id="tabla_aerolinea">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ventana Modal-->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Modal_aerolinea" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_aerolinea">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">aerolinea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ID_aerolinea" id="ID_aerolinea">
                    <div class="form-group">

                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="Pais">Pais</label>
                            <input type="text" required class="form-control" id="Pais" name="Pais" placeholder="Pais">
                        </div>

                        <div class="form-group">
                            <label for="Flota">Flota</label>
                            <input  required class="form-control" id="Flota" name="Flota" placeholder="Flota">
                        </div>

                        <div class="form-group">
                            <label for="Alianzas">Alianza</label>
                            <input required class="form-control" id="Alianzas" name="Alianzas" placeholder="Alianzas">
                        </div>
                        <!-- <div class="form-group">
                            <label for="Cedula">Cedula</label>
                            <input type="text" required class="form-control" id="Cedula" name="Cedula" placeholder="Cedula">
                        </div> -->



                        <!-- <div class="form-group">
                            <label for="Cedula">Cedula</label>
                            <input type="text" onfocusout="algoritmo_cedula();cedula_repetida();" required class="form-control" id="Cedula" name="Cedula" placeholder="Cedula">
                            <div class="alert alert-danger d-none" role="alert" id="errorCedula">
                            </div>
                            <div class="alert alert-danger d-none" role="alert" id="CedulaRepetida">
                            </div>
                        </div> -->


                        <!-- <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" required class="form-control" id="estado" name="estado" placeholder="estado">
                    </div> -->
                        <!-- <div class="form-group">
                            <label for="frm_estado">Estado</label>
                            <input type="text" required class="form-control" id="frm_estado" name="frm_estado" placeholder="frm_estado" value="Activo" readonly>
                        </div> -->



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>


<script src="./aerolinea.controller.js"></script>
<script src="./aerolinea.model.js"></script>