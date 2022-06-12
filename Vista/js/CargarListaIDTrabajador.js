//Clase para guardar carga id de tareas
ajaxRequest();
function ajaxRequest(){
    var link = "../../Controlador/AdminCargarIDTrabajador.php?getAllIdByTrabajador=true";
    var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function(){
            if(xmlHttp.readyState === 4 && xmlHttp.status === 200){
                var re = JSON.parse(xmlHttp.responseText);
                re.map(function(id){
                    var opt = document.createElement('option');
                    opt.value = id.id_trabajador;
                    opt.innerHTML = id.id_trabajador;
                    document.getElementById('AllIdByTrabajador').appendChild(opt);
                });
            }
        }
        xmlHttp.open("GET", link);
        xmlHttp.send();
}