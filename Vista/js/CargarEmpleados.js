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
    var url = '../../Controlador/AdminConsultaTrabajador.php';
    xmlhttp.open('GET', url, false);
    //se pasa nulo porque no hay parametros
    xmlhttp.send(null);

    //Recibe  una funcion que comprueba el estado del servidor
    resultadoJson = respuestaServidor();

    //Empezamos a trabajar con el JSON
    //Pasamos a cadena de texto
    const trabajadores = JSON.parse(resultadoJson);
    //mostramos
    console.table(resultadoJson);
    // Obtenemos el id del resultado
    var id = document.getElementById('empleados');

    //Estructura de datos a mostrar
    var cadena = '<table id="example2" class="table table-bordered table-hover">';
    cadena += '<thead>';
    //cadena += '<tr><td>Codigo</td>';
    cadena += '<td>Nombre</td>';
    cadena += '<td>Apellidos</td>';
    cadena += '<td>DNI</td>';
    cadena += '<td>email</td>';
    cadena += '<td>Usuario</td>';
    cadena += '<td>Estado</td>';
    cadena += '<td>Acciones</td>';
    cadena += '</thead>';
    cadena += '</tr>';
    cadena += '<tbody>';

    //Mostramos los datos
    for (const key in trabajadores) {
        console.log(trabajadores[key].length);
        for (let i = 0; i < trabajadores[key].length; i++) {
            console.log(trabajadores[key][i]);
            //cadena += '<tr><td>' + trabajadores[key][i]['id_trabajador'] + '</td>';
            cadena += '<td>' + trabajadores[key][i]['nombre'] + '</td>';
            cadena += '<td>' + trabajadores[key][i]['apellidos'] + '</td>';
            cadena += '<td>' + trabajadores[key][i]['dni'] + '</td>';
            cadena += '<td>' + trabajadores[key][i]['email'] + '</td>';
            cadena += '<td>' + trabajadores[key][i]['usuario'] + '</td>';
            cadena += '<td>' + trabajadores[key][i]['estado'] + '</td>';
            //../../Controlador/AdminModifyTrabajador.php?nombre='+ trabajadores[key][i]['nombre'] + '&apellidos=' + trabajadores[key][i]['apellidos'] + '&dni=' + trabajadores[key][i]['dni']+ '&email=' + trabajadores[key][i]['email'] + '&usuario='+ trabajadores[key][i]['usuario'] + '&contrasena='+ trabajadores[key][i]['contrasena'] +'&estado='+ trabajadores[key][i]['estado'] +'&id_trabajador='+ trabajadores[key][i]['id_trabajador'] + '">Modificar</a>
            cadena += '<td> <a class="btn btn-block btn-warning btn-xs" href="../Administrador/dashboardmodifytrabajador.php">Modificar</a> <a class="btn btn-block btn-danger btn-xs" href="../../Controlador/AdminDeleteTrabajador.php?id='+ trabajadores[key][i]['id_trabajador'] + '">Eliminar</a> </td>';            cadena += '</tr>';
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

cargarEmpleados();