/**
 * Funciones Y Ajax de Stock
 **/

document.getElementById('nuevoStock').addEventListener('click', function() {
    agregarStock();
}, true);

let ProvSearchChange = function(a) {
    console.log(a.value);
}



agregarStock = function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/stock/agregar.php", true);
    xhttp.send();
};



var stockDetalle = function(id) {
    stockDetalleAj(id);
};
stockDetalleAj = function(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/stock/modalStockDetalle.php?id=" + str, true);
    xhttp.send();
};

var stockEditar = function(id) {
    const params = new URLSearchParams(window.location.search);
    stockEditarAj(id, params.has('ProvSearch'));
};
stockEditarAj = function(str, hasProv) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    if (hasProv) {
        xhttp.open("GET", "modulos/stock/modalStockEditar.php?id=" + str + '&ProvIsSet=true', true);
    } else {
        xhttp.open("GET", "modulos/stock/modalStockEditar.php?id=" + str, true);
    }
    xhttp.send();
};

var stockBorrar = function(id) {
    StockBorrarAj(id);
};
StockBorrarAj = function(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4)
            if (this.status == 200) {
                modal.innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "modulos/stock/modalStockBorrar.php?id=" + str, true);
    xhttp.send();
};