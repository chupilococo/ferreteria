
document.getElementById('new_user_btn').addEventListener('click',function(){
	agregarUsuario();
},true);

agregarUsuario = function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/adm/agregar.php",true);
    xhttp.send();
};


var usuarioEditar = function(id){
	usuarioEditarAj(id);
};
usuarioEditarAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/adm/modalUserEdit.php?id="+str,true);
    xhttp.send();
};

var usuarioDel = function(id){
	usuarioDelAj(id);
};
usuarioDelAj = function (str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
				modal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","modulos/adm/modalUserDel.php?id="+str,true);
    xhttp.send();
};
