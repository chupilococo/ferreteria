/**
 * Created by danilo on 27/12/2016.
 */
document.addEventListener('load', function () {
	
	if (window.location.hash=='#error'){ error()};
	var modal=document.getElementById('modal')
    /**
	*@modal {Object} Se define el objeto modal para el dialogo. 
	*/
	console.log('cargo');
}, true)

var error;
error = function () {
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) if (this.status == 200) {
			$("#modal").modal();
            modal.innerHTML = this.responseText;
            }
        };
    xhttp.open("GET","modulos/acciones/error.php",true);
    xhttp.send();
};

const DC={
    persistVentaLocal(aCarga){
        let prevLocal=localStorage.getItem('venta');
        if(prevLocal){
            newLocal=JSON.parse(prevLocal);
            newLocal.push(aCarga);
            localStorage.setItem('venta',JSON.stringify(newLocal));
            console.log('newLocal',newLocal)
        }else{
            
            localStorage.setItem('venta',JSON.stringify([aCarga]));
        }
    },

    getVentasLocal(){
        return JSON.parse(localStorage.getItem('venta'));
    },
    wipeVentasLocal(){
        localStorage.setItem('venta',JSON.stringify([]))
    },
    removeItemVentasLocal(stamp){
        let newLocal=JSON.stringify(DC.getVentasLocal().filter((venta)=>{
            return JSON.stringify(venta)!==$('#'+stamp)[0].value;	
        }));
        localStorage.setItem('venta',newLocal);
        //console.log($('#'+stamp)[0].value)
    }

}