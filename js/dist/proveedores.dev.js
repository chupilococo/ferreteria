"use strict";

/**
* Funciones Y Ajax de proveedores
**/
document.getElementById('nuevoProv').addEventListener('click', function () {
  agregarProv();
}, true);

agregarProv = function agregarProv() {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/prov/agregar.php", true);
  xhttp.send();
};

var provDetalle = function provDetalle(id) {
  provDetalleAj(id);
};

provDetalleAj = function provDetalleAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/prov/modalProvDetalle.php?id=" + str, true);
  xhttp.send();
};

var provEditar = function provEditar(id) {
  provEditarAj(id);
};

provEditarAj = function provEditarAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/prov/modalProvEditar.php?id=" + str, true);
  xhttp.send();
};

var provExportarAJ = function provExportarAJ(id, porcentaje) {
  var ratio = porcentaje / 100;
  var url = 'http://' + window.location.host + ":3000/providers/".concat(id, "/stock/").concat(ratio);
  window.open(url, '_blank').focus;
};

var provExportar = function provExportar(id) {
  modal.innerHTML = "\n    <div class=\"modal-dialog\">\n      <div class=\"modal-content\">\n        <div class=\"modal-header\">\n          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n          <h4 class=\"modal-title\">Porcentaje de Exportacion</h4>\n        </div>\n      <div class=\"form\">\n      <div class=\"modal-body\">\n        <label for=\"porcentaje\">Porcentaje</label><input class='form-control' id='porcentaje' value='100' type=\"number\"  />\t\n      </div>\n        <div class=\"modal-footer\">\n          <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>\n          <button onClick='provExportarAJ(".concat(id, ",document.getElementById(\"porcentaje\").value)' class=\"btn btn-success\">Exportar</button>\n        </div>\n      </div>\n      </div>\n    </div>\n  ");
};

var provBorrar = function provBorrar(id) {
  provBorrarAj(id);
};

provBorrarAj = function provBorrarAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/prov/modalProvBorrar.php?id=" + str, true);
  xhttp.send();
};

var provProd;

provProd = function provProd(str) {
  provProdAj(str);
};

var provProdAj;

provProdAj = function provProdAj(str) {
  console.log(str);
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/prov/modalProvProd.php?id=" + str, true);
  xhttp.send();
};