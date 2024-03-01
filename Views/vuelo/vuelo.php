<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de vuelo</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargavuelo()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_vuelo">
                        Nueva vuelo
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <!--                              -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">vuelo</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Numero_vuelo</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Origen</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Destino</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha_salida</h6>
                                </th>


                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_vuelo">

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
<div class="modal fade" id="Modal_vuelo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_vuelo">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">vuelo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_vuelo" id="ID_vuelo">

                    <!-- <div class="form-group">
                        <label for="nombre">Nombre de la Provincia</label>
                        <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre de la provincia">
                    </div>-->
                    <div class="form-group">
                        <label for="ID_aerolinea">ID_aerolinea</label>
                        <select name="ID_aerolinea" id="ID_aerolinea" class="form-control">
                            <option value="0">Seleccione un vuelo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Numero_vuelo">Numero_vuelo</label>
                        <input type="text" required class="form-control" id="Numero_vuelo" name="Numero_vuelo" placeholder="Ingrese el Numero_vuelo">
                    </div>

                    <div class="form-group">
                        <label for="Origen">Origen</label>
                        <input type="text" required class="form-control" id="Origen" name="Origen" placeholder="Ingrese la Origen">
                    </div>

                    <div class="form-group">
                        <label for="Destino">Destino</label>
                        <input type="text" required class="form-control" id="Destino" name="Destino" placeholder="Ingrese el Destino ">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_salida">Fecha_salida</label>
                        <input type="Date" required class="form-control" id="Fecha_salida" name="Fecha_salida" placeholder="Ingrese el Fecha_salida ">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>
<!-- 
<script src="vuelo.js"></script> -->
<script src="./vuelo.js"></script>
