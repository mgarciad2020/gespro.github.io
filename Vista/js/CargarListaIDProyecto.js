//Clase para guardar carga id de proyectos
ajaxRequest();
function ajaxRequest(){
    var link = "../../Controlador/AdminCargarIDProyecto.php?getAllIdByProyecto=true";
    var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function(){
            if(xmlHttp.readyState === 4 && xmlHttp.status === 200){
                var re = JSON.parse(xmlHttp.responseText);
                re.map(function(id){
                    var opt = document.createElement('option');
                    opt.value = id.id_proyecto;
                    opt.innerHTML = id.id_proyecto;
                    document.getElementById('AllIdByProyecto').appendChild(opt);
                });
            }
        }
        xmlHttp.open("GET", link);
        xmlHttp.send();
}