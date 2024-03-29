/**
* Funciones Y Ajax de proveedores
**/

document.getElementById('nuevoProv').addEventListener('click', function () {
  agregarProv();
}, true);


agregarProv = function () {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "modulos/prov/agregar.php", true);
  xhttp.send();
};



var provDetalle = function (id) {
  provDetalleAj(id);
};
provDetalleAj = function (str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "modulos/prov/modalProvDetalle.php?id=" + str, true);
  xhttp.send();
};


var provEditar = function (id) {
  provEditarAj(id);
};
provEditarAj = function (str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "modulos/prov/modalProvEditar.php?id=" + str, true);
  xhttp.send();
};

const provExportarAJ = function (id, porcentaje) {
  const ratio = porcentaje / 100;
  const url = 'http://' + window.location.host + `:3000/providers/${id}/stock/${ratio}`;
  window.open(url, '_blank').focus;
}

const provExportar = (id) => {
  modal.innerHTML = `
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Porcentaje de Exportacion</h4>
        </div>
      <div class="form">
      <div class="modal-body">
        <label for="porcentaje">Porcentaje</label><input class='form-control' id='porcentaje' value='100' type="number"  />	
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button onClick='provExportarAJ(${id},document.getElementById("porcentaje").value)' class="btn btn-success">Exportar</button>
        </div>
      </div>
      </div>
    </div>
  `;
};



var provBorrar = function (id) {
  provBorrarAj(id);
};
provBorrarAj = function (str) {
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
provProd = function (str) {
  provProdAj(str);
}

var provProdAj;
provProdAj = function (str) {
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