"use strict";

/**
 * Funciones Y Ajax de Facturas
 **/
var facDetalle = function facDetalle(id) {
  facDetalleAj(id);
};

facDetalleAj = function facDetalleAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/modalFacDetalle.php?id=" + str, true);
  xhttp.send();
};

var facEditar = function facEditar(id) {
  facEditarAj(id);
};

facEditarAj = function facEditarAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/modalFacEditar.php?id=" + str, true);
  xhttp.send();
};

var facBorrar = function facBorrar(id) {
  facBorrarAj(id);
};

facBorrarAj = function facBorrarAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/modalFacBorrar.php?id=" + str, true);
  xhttp.send();
};

var facCerrar = function facCerrar(id) {
  facCerrarAj(id);
};

facCerrarAj = function facCerrarAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/modalFacCerrar.php?id=" + str, true);
  xhttp.send();
};

var facAbrir = function facAbrir(id) {
  facAbrirAj(id);
};

facAbrirAj = function facAbrirAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/modalFacAbrir.php?id=" + str, true);
  xhttp.send();
};

var facTogglePago = function facTogglePago(id) {
  facTogglePagoAj(id);
};

facTogglePagoAj = function facTogglePagoAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/modalTogglePago.php?id=" + str, true);
  xhttp.send();
};

var togglePago = function togglePago(id) {
  togglePagoAj(id);
};

togglePagoAj = function togglePagoAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/TogglePago.php?id=" + str, true);
  xhttp.send();
};

var cerrarFac = function cerrarFac(id) {
  CerrarFacAj(id);
};

CerrarFacAj = function CerrarFacAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/FacCerrar.php?id=" + str, true);
  xhttp.send();
};

var abrirFac = function abrirFac(id) {
  abrirFacAj(id);
};

abrirFacAj = function abrirFacAj(str) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {
      modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/FacAbrir.php?id=" + str, true);
  xhttp.send();
};

var elimProdFac = function elimProdFac(id, facturas_id, elem) {
  // console.log(stock_id, facturas_id);
  var row = elem.parentNode.parentNode;
  elem.classList.remove('btn-primary');
  elem.classList.add('btn-default');
  elem.classList.add('disabled');
  row.classList.add("gray-out");

  if (confirm('Seguro de quitar el producto de la factura?')) {
    elimProdFacAj(id, facturas_id);
  } else {
    elem.classList.add('btn-primary');
    elem.classList.remove('btn-default');
    elem.classList.remove('disabled');
    row.classList.remove("gray-out");
  }
};

elimProdFacAj = function elimProdFacAj(id, facturas_id) {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) if (this.status == 200) {// modal.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "modulos/fac/elimProdFac.php?id=" + id + "&facturas_id=" + facturas_id, true);
  xhttp.send();
};