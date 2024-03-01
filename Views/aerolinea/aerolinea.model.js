class aerolinea_model {
  constructor(
    ID_aerolinea,
    Nombre,
    Pais,
    Flota,
    Alianzas,
    Ruta
  ) {
    this.ID_aerolinea = ID_aerolinea;
    this.Nombre = Nombre;
    this.Pais = Pais;
    this.Flota = Flota;
    this.Alianzas = Alianzas;
    this.Ruta = Ruta;
  }
  todos() {
    var html = "";
    $.get("../../Controllers/aerolinea.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {


        html += `<tr>
                            <td>${index + 1}</td>
                            <td>${valor.Nombre}</td>
                            <td>${valor.Pais}</td>
                            <td>${valor.Flota}</td>
                            <td>${valor.Alianzas}</td>
                            </span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.ID_aerolinea
          })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.ID_aerolinea
          })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${valor.ID_aerolinea
          })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_aerolinea").html(html);
    });
    return html;

  }
  insertar() {
    var dato = new FormData();
    dato = this.Alianzas;
    $.ajax({
      url: "../../Controllers/aerolinea.controller.php?op=insertar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("aerolinea", "aerolinea Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  // Alianzas_repetida() {
  //   var Alianzas = this.Alianzas;
  //   $.post(
  //     "../../Controllers/aerolinea.controller.php?op=Alianzas_repetida",
  //     { Alianzas: Alianzas },
  //     (res) => {
  //       res = JSON.parse(res);
  //       if (parseInt(res.Alianzas_repetida) > 0) {
  //         $("#AlianzasRepetida").removeClass("d-none");
  //         $("#AlianzasRepetida").html(
  //           "La cédua ingresa, ya exite en la base de datos"
  //         );
  //         $("button").prop("disabled", true);
  //       } else {
  //         $("#AlianzasRepetida").addClass("d-none");
  //         $("button").prop("disabled", false);
  //       }
  //     }
  //   );
  // }


  uno() {
    var ID_aerolinea = this.ID_aerolinea;
    $.post(
      "../../Controllers/aerolinea.controller.php?op=uno",
      { ID_aerolinea: ID_aerolinea },
      (res) => {
        console.log(res);
        res = JSON.parse(res);
        $("#ID_aerolinea").val(res.ID_aerolinea);
        $("#Nombre").val(res.Nombre);
        $("#Pais").val(res.Pais);
        $("#Flota").val(res.Flota);


        document.getElementById("Alianzas ").value = res.Alianzas; //asiganr al select el valor

      }
    );
    $("#Modal_aerolinea").modal("show");
  }

  editar() {
    var dato = new FormData();
    dato = this.Alianzas;
    $.ajax({
      url: "../../Controllers/aerolinea.controller.php?op=actualizar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("aerolinea", "aerolinea Registrado", "success");
          todos_controlador();
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });
    this.limpia_Cajas();
  }

  eliminar() {
    var ID_aerolinea = this.ID_aerolinea;

    Swal.fire({
      title: "aerolinea",
      text: "Esta seguro de eliminar el aerolinea",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/aerolinea.controller.php?op=eliminar",
          { ID_aerolinea: ID_aerolinea },
          (res) => {
            console.log(res);

            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("aerolineas", "aerolinea Eliminado", "success");
              todos_controlador();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });

    this.limpia_Cajas();
  }

  limpia_Cajas() {
    document.getElementById("Nombre").value = "";
    document.getElementById("Pais").value = "";
    document.getElementById("Flota").value = "";
    document.getElementById("Alianzas ").value = "";
    $("#ID_aerolinea").val("");

    $("#Modal_aerolinea").modal("hide");
  }
}