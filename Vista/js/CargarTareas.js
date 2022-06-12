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

function cargarEmpleados() {
    //Agregamos donde esta la api
    var url = '../../Controlador/TrabajadorConsultaTarea.php';
    xmlhttp.open('GET', url, false);
    //se pasa nulo porque no hay parametros
    xmlhttp.send(null);

    //Recibe  una funcion que comprueba el estado del servidor
    resultadoJson = respuestaServidor();
    //console.log(resultadoJson);
    //Empezamos a trabajar con el JSON
    //Pasamos a cadena de texto
    const trabajadores = JSON.parse(resultadoJson);    
    // Obtenemos el id del resultado
    var id = document.getElementById('tareas');

    //Estructura de datos a mostrar
    var cadena = '<table id="example2" class="table table-bordered table-hover">';
    cadena += '<thead>';
    //cadena += '<tr><td>Codigo</td>';
    cadena += '<td>Nombre</td>';
    cadena += '<td>Descripcion</td>';
    cadena += '<td>Estado</td>';
    cadena += '<td>Fecha Inicio</td>';
    cadena += '<td>Fecha Fin</td>';
    cadena += '<td>Usuario</td>';
    cadena += '</thead>';
    cadena += '</tr>';
    cadena += '<tbody>';

    //Mostramos los datos
    for (const key in trabajadores) {
        cadena += '<td>' + trabajadores[key]['nombre'] + '</td>';
            cadena += '<td>' + trabajadores[key]['descripcion'] + '</td>';
            cadena += '<td>' + trabajadores[key]['estado'] + '</td>';
            cadena += '<td>' + trabajadores[key]['fecha_inicio'] + '</td>';
            cadena += '<td>' + trabajadores[key]['fecha_fin'] + '</td>';
            cadena += '<td>' + trabajadores[key]['usuario'] + '</td>';  
            cadena += '</tr>';
        
              
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

cargarEmpleados();