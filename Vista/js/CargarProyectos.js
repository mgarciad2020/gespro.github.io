function getXMLHTTPRequest() { //Conexion Ajax
    var obj = false;
    try {
        obj = new XMLHttpRequest();
    } catch (err1) {
        try {
            obj = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                obj = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                obj = false;
            }
        }
    }
    return obj;
}
var xmlhttp = getXMLHTTPRequest();

function cargarProyectos() {
    //Agregamos donde esta la api
    var url = '../../Controlador/AdminConsultaProyecto.php';
    xmlhttp.open('GET', url, false);
    //se pasa nulo porque no hay parametros
    xmlhttp.send(null);

    //Recibe  una funcion que comprueba el estado del servidor
    resultadoJson = respuestaServidor();

    //Empezamos a trabajar con el JSON
    //Pasamos a cadena de texto
    const proyecto = JSON.parse(resultadoJson);
    //mostramos
    console.table(resultadoJson);
    // Obtenemos el id del resultado
    var id = document.getElementById('proyectos');

    //Estructura de datos a mostrar
    var cadena = '<table id="example2" class="table table-bordered table-hover">';
    cadena += '<thead>';
   // cadena += '<tr><td>Codigo</td>';
    cadena += '<td>Nombre</td>';
    cadena += '<td>Estado</td>';
    cadena += '<td>Fecha Inicio</td>';
    cadena += '<td>Fecha Fin</td>';
    cadena += '<td>Acciones</td>';
    cadena += '</thead>';
    cadena += '</tr>';
    cadena += '<tbody>';

    //Mostramos los datos
    for (const key in proyecto) {
        console.log(proyecto[key].length);
        for (let i = 0; i < proyecto[key].length; i++) {
            console.log(proyecto[key][i]);
           // cadena += '<tr><td>' + proyecto[key][i]['id_proyecto'] + '</td>';
            cadena += '<td>' + proyecto[key][i]['nombre'] + '</td>';
            cadena += '<td>' + proyecto[key][i]['estado'] + '</td>';
            cadena += '<td>' + proyecto[key][i]['fecha_inicio'] + '</td>';

            if(proyecto[key][i]['fecha_fin'] == null){
                cadena += '<td>' + "-" + '</td>';
            }else{
                cadena += '<td>' + proyecto[key][i]['fecha_fin'] + '</td>';
            }
            
            cadena += '<td> <a class="btn btn-block btn-danger btn-xs" href="../../Controlador/AdminDeleteProyecto.php?id='+ proyecto[key][i]['id_proyecto'] + '">Eliminar</a> </td>';
            cadena += '</tr>';
        }
    }
    cadena += '</tbody>';
    cadena += '</table>';
    //pasamos la cadena a la interfaz
    id.innerHTML = cadena;

    function respuestaServidor() {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                return (xmlhttp.responseText);
            } else {
                alert(xmlhttp.statusText);
            }
        }
    }
}

cargarProyectos();