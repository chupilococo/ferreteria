/**
* Funciones Y Ajax de Facturas
**/

var facDetalle = function(id){
	facDetalleAj(id);
};
facDetalleAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/fac/modalFacDetalle.php?id="+str,true);
    xhttp.send();
};



var facBorrar = function(id){
	facBorrarAj(id);
};
facBorrarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/fac/modalFacBorrar.php?id="+str,true);
    xhttp.send();
};

var facCerrar = function(id){
	facCerrarAj(id);
};
facCerrarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/fac/modalFacCerrar.php?id="+str,true);
    xhttp.send();
};


var cerrarFac = function(id){
	CerrarFacAj(id);
};
CerrarFacAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML=this.responseText;
        }
    };
    xhttp.open("GET","modulos/fac/FacCerrar.php?id="+str,true);
    xhttp.send();
};