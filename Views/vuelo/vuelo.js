// Aquí va a estar el código de usuarios.model.js

function init() {
  $("#frm_vuelo").on("submit", function (e) {
    guardaryeditar(e);
  });
}

// $(document).ready(() => {
//   todos();
// });
$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/vuelo.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.aerolinea}</td>
                <td>${valor.Numero_vuelo}</td>
                <td>${valor.Origen}</td>
                <td>${valor.Destino}</td>
                <td>${valor.Fecha_salida}</td>
                <td>
                  <button class='btn btn-success' onclick='editar(${valor.ID_vuelo})'>Editar</button>
                  <button class='btn btn-danger' onclick='eliminar(${valor.ID_vuelo})'>Eliminar</button>
                  <button class='btn btn-info' onclick='ver(${valor.ID_vuelo})'>Ver</button>
                </td>
              </tr>`;
    });
    $("#tabla_vuelo").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_vuelo")[0]);
  var ruta = "";
  // var ID_vuelo = $("#ID_vuelo").val(); // Corregido: Usar jQuery para obtener el valor
  var ID_vuelo = document.getElementById("ID_vuelo").value;
  if (ID_vuelo > 0) {
    ruta = "../../Controllers/vuelo.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/vuelo.controller.php?op=insertar";
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res === "ok") { // Corregido: Verificar la propiedad status
        Swal.fire("vuelo", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("vuelo", "Error al guardar, inténtalo de nuevo más tarde", "error");
      }
    },
  });
};

var cargavuelo = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/aerolinea.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.ID_aerolinea}">${val.Nombre}</option>`;
      });
      $("#ID_aerolinea").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (ID_vuelo) => {
  await cargavuelo();
  $.post(
    "../../Controllers/vuelo.controller.php?op=uno",
    { ID_vuelo: ID_vuelo },
    (res) => {
      res = JSON.parse(res);

      $("#ID_vuelo").val(res.ID_vuelo);
      $("#ID_aerolinea").val(res.ID_aerolinea);
      $("#Numero_vuelo").val(res.Numero_vuelo);
      $("#Origen").val(res.Origen);
      $("#Destino").val(res.Destino);
      $("#Fecha_salida").val(res.Fecha_salida);
    }
  );
  $("#Modal_vuelo").modal("show");
};

var eliminar = (ID_vuelo) => {
  Swal.fire({
    title: "vuelo",
    text: "¿Estás seguro de eliminar la vuelo?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/vuelo.controller.php?op=eliminar",
        { ID_vuelo: ID_vuelo },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("vuelo", "vuelo Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error"); // Mostrar mensaje de error
          }
        }
      );
    }
  });

  limpia_Cajas();
};

var limpia_Cajas = () => {
  $("#ID_vuelo").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#ID_aerolinea").val(""); // Corregido: Usar jQuery para establecer el valor
  $("#Numero_vuelo").val("");
  $("#Origen").val("");
  $("#Destino").val("");
  $("#Fecha_salida").val("");

  $("#Modal_vuelo").modal("hide");
};

init();
