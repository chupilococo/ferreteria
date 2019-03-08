/**
* Funciones Y Ajax de Stock
**/

document.getElementById('nuevoStock').addEventListener('click',function(){
	agregarStock();
},true);


agregarStock = function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/stock/agregar.php",true);
    xhttp.send();
};



var stockDetalle = function(id){
	stockDetalleAj(id);
};
stockDetalleAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/stock/modalStockDetalle.php?id="+str,true);
    xhttp.send();
};

var stockEditar = function(id){
	stockEditarAj(id);
};
stockEditarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/stock/modalStockEditar.php?id="+str,true);
    xhttp.send();
};

var stockBorrar = function(id){
	StockBorrarAj(id);
};
StockBorrarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/stock/modalStockBorrar.php?id="+str,true);
    xhttp.send();
};