<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
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
                            opt.innerHTML = id.nombre;
                            document.getElementById('AllIdByProyecto').appendChild(opt);
                        });
                    }
                }
                xmlHttp.open("GET", link);
                xmlHttp.send();
        }

        ajaxRequest2();
        function ajaxRequest2() {
            var link = "../../Controlador/AdminCargarIDTrabajador.php?getAllIdByTrabajador=true";
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                    var re = JSON.parse(xmlHttp.responseText);
                    re.map(function(id) {
                        var opt = document.createElement('option');
                        opt.value = id.id_trabajador;
                        opt.innerHTML = id.nombre;
                        document.getElementById('AllIdByTrabajador').appendChild(opt);
                    });
                }
            }
            xmlHttp.open("GET", link);
            xmlHttp.send();
        }

        function myFunction(element) {
            event.preventDefault();
            var id_trabajador = element.lista.value;
            console.log(id_trabajador);
            var link = "../../Controlador/AdminConsultaProyecto.php?id=" + id_trabajador;
            console.log(link);


            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                    var respuesta = JSON.parse(xmlHttp.responseText);

                    respuesta2 =  respuesta[0]['items'][0];
                   
                    document.getElementById('id_proyecto').value = respuesta2['id_proyecto'];
                }
            }
            xmlHttp.open("GET", link);
            xmlHttp.send();
        }

    </script>

</head>
<body>
    <div class="container-fluid">
    <h1>Asignar Proyecto</h1>
    <div class="container margin-bottom">
        <form class="form-horizontal  row" method="GET" action="../../Controlador/AdminAddTrabajadorProyecto.php">
            <br>
            <div class="mb-3">
                <label class="form-label">Seleccionar Proyecto</label>
                <select class="form-control" name="id_proyecto" id="AllIdByProyecto">
                </select>
                <br>

                <div class="mb-3">
                    <label class="form-label">Seleccionar Trabajador</label>
                    <select class="form-control" name="id_trabajador" id="AllIdByTrabajador">
                    </select>
                    <br>
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" aria-describedby="emailHelp" required id="fecha_inicio">
                </div>
                <br>

                <div class="mb-3">
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control" name="fecha_fin" aria-describedby="emailHelp" required id="fecha_fin">
                </div>
                <br>
                <button class="btn btn-primary" style="width: 15%;">Asignar</button>
            </div>
            <br>
        </form>
    </div>
    
     </div>
</body>

</html>