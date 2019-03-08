/**
* Funciones Y Ajax de proveedores
**/

document.getElementById('nuevoProv').addEventListener('click',function(){
	agregarProv();
},true);


agregarProv= function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/prov/agregar.php",true);
    xhttp.send();
};



var provDetalle = function(id){
	provDetalleAj(id);
};
provDetalleAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/prov/modalProvDetalle.php?id="+str,true);
    xhttp.send();
};


var provEditar = function(id){
	provEditarAj(id);
};
provEditarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/prov/modalProvEditar.php?id="+str,true);
    xhttp.send();
};


var provBorrar = function(id){
	provBorrarAj(id);
};
provBorrarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/prov/modalProvBorrar.php?id="+str,true);
    xhttp.send();
};


var provProd;
	provProd = function(str){
		provProdAj(str);		
	}

var provProdAj;
	provProdAj=function(str){
		console.log(str);
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4) if (this.status == 200) {
						modal.innerHTML = this.responseText;
				}
			};
		xhttp.open("GET","modulos/prov/modalProvProd.php?id="+str,true);
		xhttp.send();
	};