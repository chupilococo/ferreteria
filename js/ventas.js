/**
 * Created by danilo on 27/12/2016.
 */

/**
* Ajax y funciones para la busqueda de producctos
*/

var productoSearchNom;
productoSearchNom = document.getElementById('productoNombre');
productoSearchNom.addEventListener('input', function () {
	checkProdNom(productoSearchNom.value.trim());
	prodID.value = '';
	vacio();
}, true);
var prodxr = document.getElementById("prodxr");
var separator = document.getElementById("separator");

var checkProdNom;
checkProdNom = function (str) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4) if (this.status == 200) {
			if (this.responseText.trim() != '<p></p>') {
				prodxr.classList.remove('hidden');
				vacio();
				prodxr.classList.add('borde');
				prodxr.innerHTML = this.responseText;
			} else {
				prodxr.classList.add('hidden');
			}
		}
	};
	xhttp.open("GET", "modulos/ventas/productos.php?client=" + str, true);
	xhttp.send();
};

var vacio;
vacio = function () {
	if (productoSearchNom.value.trim() == '' && productoSearchCod.value.trim() == '') {
		prodxr.classList.add('hidden');
	}
};

var ProdClick;
ProdClick = function (nombre, codigo, id) {
	prodxr.classList.add('hidden');
	document.getElementById('productoCodigo').value = codigo;
	document.getElementById('prodID').value = id;
	productoSearchNom.value = nombre;
};
var productoSearchCod;
productoSearchCod = document.getElementById('productoCodigo');
productoSearchCod.addEventListener('input', function () {
	//console.log(productoSearchCod.value.trim());
	checkProdCod(productoSearchCod.value.trim());
	vacio();
}, true);

var checkProdCod;
checkProdCod = function (str) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4) if (this.status == 200) {
			if (this.responseText.trim() != '<p></p>') {
				prodxr.classList.remove('hidden');
				vacio();
				prodxr.classList.add('borde');
				prodxr.innerHTML = this.responseText;
			} else {
				prodxr.classList.add('hidden');
			}
		}
	};
	xhttp.open("GET", "modulos/ventas/productosCod.php?cod=" + str, true);
	xhttp.send();
};


/**
* Ajax y funciones para la busqueda de Clientes
*/


var ClienteSearch;
ClienteSearch = document.getElementById('cliente');
ClienteSearch.addEventListener('input', function () {
	checkClidNom(ClienteSearch.value.trim());
	vacio();
}, true);

var clixr = document.getElementById("clixr");
var checkCliNom;
checkClidNom = function (str) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4) if (this.status == 200) {
			if (this.responseText.trim() != '<p></p>') {
				clixr.classList.remove('hidden');
				separator.classList.remove('minAlt');
				vacioCli();
				clixr.classList.add('borde');
				clixr.innerHTML = this.responseText;
			} else {
				clixr.classList.add('hidden');
				separator.classList.remove('hidden');
				separator.classList.add('minAlt')
			}
		}
	};
	xhttp.open("GET", "modulos/ventas/clientes.php?client=" + str, true);
	xhttp.send();
};

var vacioCli;
vacioCli = function () {
	if (ClienteSearch.value.trim() == '') {
		clixr.classList.add('hidden');
		separator.classList.remove('hidden');
		separator.classList.add('minAlt');
	}
};

var ClienteClick;
ClienteClick = function (nombre, id) {
	clixr.classList.add('hidden');
	separator.classList.remove('hidden');
	separator.classList.add('minAlt');
	document.getElementById('ClienteId').value = id;
	ClienteSearch.value = nombre;
	console.log(nombre, id);
};

/**
*Ajax y Funciones para la carga del producto
**/

var ventaCancel;
ventaCancel = document.getElementById('ventaCancel')
ventaCancel.addEventListener('click', function () {
	DC.wipeVentasLocal();
	location.reload();
}, true);

var CargaBtn;
CargaBtn = document.getElementById('CargaBtn');
CargaBtn.addEventListener('click', function () {
	CargaModal(document.getElementById('prodID').value);
}, true)

CargaModal = function (str) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4) if (this.status == 200) {
			modal.innerHTML = this.responseText;
			ModalElements();
		}
	};
	xhttp.open("GET", "modulos/ventas/CargaModal.php?id=" + str, true);
	xhttp.send();
};

var CalcPersentage;
CalcPersentage = function () {
	CargaPrecio.value = parseFloat(CargaPrecioPorcentaje.value) * parseFloat(CargaPrecioProv.value) / 100;
	CalcTotal();
};

var CalcTotal;
CalcTotal = function () {
	CargaTotal.value = parseFloat(CargaPrecio.value) * parseInt(CargaCantidad.value);
};

var ModalElements = function () {

	var CargaPrecioPorcentaje;
	CargaPrecioPorcentaje = document.getElementById('CargaPrecioPorcentaje');

	var CargaPrecio;
	CargaPrecio = document.getElementById('CargaPrecio');

	var CargaPrecioProv;
	CargaPrecioProv = document.getElementById('CargaPrecioProv');

	var CargaPrecioProvBD;
	CargaPrecioProvBD = document.getElementById('CargaPrecioProvBD');

	var CargaCantidad;
	CargaCantidad = document.getElementById('CargaCantidad');

	var CargaTotal;
	CargaTotal = document.getElementById('CargaTotal');

	var CargaId;
	CargaId = document.getElementById('CargaId');

	var CargaNombre;
	CargaNombre = document.getElementById('CargaNombre');

	var CargaDesc;
	CargaDesc = document.getElementById('CargaDesc');

	var formaPago;
	formaPago = document.getElementById('formaPago');
}

var tablaVenta;
tablaVenta = document.getElementById('tablaVenta');

var totalVenta;
totalVenta = document.getElementById('totalVenta');

var ventasForm;
ventasForm = document.getElementById('ventasForm');

var CargarTablaVenta;
CargarTablaVenta = function (aCarga) {

	//console.log(aCarga)
	var strProd = JSON.stringify(aCarga);
	var tr;
	tr = document.createElement('tr');
	tr.innerHTML = `
		<td> ${aCarga.CargaNombre} </td>
		<td> ${aCarga.formaPago == 0 ? 'No' : 'Si'} </td>
		<td> ${aCarga.CargaPrecio} </td>
		<td> ${aCarga.CargaCantidad} </td>
		<td> ${(parseInt(aCarga.CargaCantidad) * parseFloat(aCarga.CargaPrecio))} </td>
		<td>
			<i  onclick="descEdit( ${aCarga.stamp} )" class="fa fa-pencil-square-o"  data-toggle="modal" data-target="#modal" aria-hidden="true"></i>
			<i onclick="removeItem( ${aCarga.stamp} )" class="fa fa-times" aria-hidden="true"></i>
		</td>`;
	tablaVenta.appendChild(tr);
	totalVenta.innerHTML = parseFloat(totalVenta.innerHTML) + (parseInt(aCarga.CargaCantidad) * parseFloat(aCarga.CargaPrecio))

	var inputForm = document.createElement('input');
	inputForm.type = 'hidden';
	inputForm.value = strProd;
	inputForm.name = aCarga.stamp;
	inputForm.id = aCarga.stamp;
	ventasForm.appendChild(inputForm);
}

const handleCargarTablaVenta = () => {
	var aCarga = {
		'CargaNombre': CargaNombre.value.trim(),
		'CargaPrecioProv': CargaPrecioProv.value.trim(),
		'CargaPrecioProvBD': CargaPrecioProvBD.value.trim(),
		'CargaPrecio': CargaPrecio.value.trim(),
		'CargaCantidad': CargaCantidad.value.trim(),
		'CargaTotal': CargaTotal.value.trim(),
		'CargaId': CargaId.value.trim(),
		'CargaDesc': CargaDesc.value.trim(),
		'formaPago': formaPago.value.trim(),
		'stamp': Date.now()
	};
	CargarTablaVenta(aCarga);
	DC.persistVentaLocal(aCarga);
}

var presupuestarBtn;
presupuestarBtn = document.getElementById('presupuestarBtn');

presupuestarBtn.onclick = function () {
	getPres();
};

getPres = function () {
	data = '';
	var inputs = document.getElementById('ventasForm').getElementsByTagName('input');
	for (x = 0; x < inputs.length; x++) {
		data += inputs[x].name + "=" + inputs[x].value + "&";
	};
	data += 'tipoVenta=' + document.getElementById('tipoVenta').value + "&";
	data += 'direcc=' + document.getElementById('direcc').value;
	console.log(data);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4) if (this.status == 200) {
			modal.innerHTML = this.responseText;
			//ModalElements();
		}
	};
	xhttp.open("POST", "modulos/ventas/pdf/presupuesto.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(data);
};

const changeDesc = (desc, id) => {
	//console.log(desc);
	var val = JSON.parse($('#' + id).val());
	val.CargaDesc = desc;
	$('#' + id).val(JSON.stringify(val));
}

var descEdit;
descEdit = function (id) {
	var val = JSON.parse($('#' + id).val());
	modal.innerHTML = `
	  <div class="modal-dialog alert">
		<div class="modal-content">
		<div class="modal-header">
		</div>
		<div class="modal-body">
			<p class='lead'>Descripcion</p>
			<textarea class="form-control" id='descripcionArea' rows="5">${val.CargaDesc}</textarea>
		</div>
		<div class="modal-footer">
			<button type="button" onclick="changeDesc(document.getElementById('descripcionArea').value, ${id})" class="btn btn-success" data-dismiss="modal">Aceptar</button>
		</div>
		</div>
	</div>
	`;
};

const removeItem = (stamp) => {
	DC.removeItemVentasLocal(stamp);
	location.reload();
}

document.addEventListener('DOMContentLoaded', () => {
	console.log('cargo ventas');
	let ventasLocal = DC.getVentasLocal();
	if (ventasLocal) {
		ventasLocal.forEach(aCarga => {
			CargarTablaVenta(aCarga);
		});
	}

})










