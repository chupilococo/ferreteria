/**
 * Funciones Y Ajax de Facturas
 **/

var facDetalle = function (id) {
    facDetalleAj(id);
};

facDetalleAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/modalFacDetalle.php?id=" + str, true);
    xhttp.send();
};

var facEditar = function (id) {
    facEditarAj(id);
};

facEditarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/modalFacEditar.php?id=" + str, true);
    xhttp.send();
};



var facBorrar = function (id) {
    facBorrarAj(id);
};
facBorrarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/modalFacBorrar.php?id=" + str, true);
    xhttp.send();
};

var facCerrar = function (id) {
    facCerrarAj(id);
};

facCerrarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/modalFacCerrar.php?id=" + str, true);
    xhttp.send();
};

var facAbrir = function (id) {
    facAbrirAj(id);
};

facAbrirAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/modalFacAbrir.php?id=" + str, true);
    xhttp.send();
};




var facTogglePago = function (id) {
    facTogglePagoAj(id);
};

facTogglePagoAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/modalTogglePago.php?id=" + str, true);
    xhttp.send();
};



var togglePago = function (id) {
    togglePagoAj(id);
};
togglePagoAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/TogglePago.php?id=" + str, true);
    xhttp.send();
};






var cerrarFac = function (id) {
    CerrarFacAj(id);
};
CerrarFacAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/FacCerrar.php?id=" + str, true);
    xhttp.send();
};

var abrirFac = function (id) {
    abrirFacAj(id);
};
abrirFacAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/FacAbrir.php?id=" + str, true);
    xhttp.send();
};

var elimProdFac = function (id, facturas_id, elem) {
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
}


elimProdFacAj = function (id, facturas_id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4)
            if (this.status == 200) {
                // modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/fac/elimProdFac.php?id=" + id + "&facturas_id=" + facturas_id, true);
    xhttp.send();
};



getPDF = function (id) {

    //console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
            modal.innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "modulos/fac/pdf/getPDF.php?id=" + id, true);
    xhttp.send();
};