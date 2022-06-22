<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
      ajaxRequest();
        function ajaxRequest() {
            console.log("Esto se eejecuta al guna vez");
            var link = "../../Controlador/TrabajadorCargaTareas.php?getAllTareas=true";
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                    var re = JSON.parse(xmlHttp.responseText);
                    re.map(function(id) {
                        var opt = document.createElement('option');
                        console.log(opt);
                        opt.value = id.id_tarea;
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
            var link = "../../Controlador/TrabajadorConsultaTarea.php?id=" + id_trabajador;
            console.log(link);


            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                   console.log(xmlHttp.responseText);
                    var respuesta = JSON.parse(xmlHttp.responseText);
                    console.log("respuesta "+ respuesta );
                    respuesta2 =  respuesta[0]['items'][0];

                   
                    document.getElementById('id_tarea').value = respuesta2['id_tarea'];
                    document.getElementById('nombre').value = respuesta2['nombre'];
                    document.getElementById('estado').value = respuesta2['estado'];
                    document.getElementById('descripcion').value = respuesta2['descripcion'];
                    document.getElementById('fecha_inicio').value = respuesta2['fecha_inicio'];
                    document.getElementById('fecha_fin').value = respuesta2['fecha_fin'];
//                    document.getElementById('usuario').value = respuesta2['usuario'];
                }
            }
            xmlHttp.open("GET", link);
            xmlHttp.send();
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <h1>Modificar Trabajador</h1>
        <br>
        <div class="container margin-bottom">
            <form class="form-horizontal  row">
                <br><br>
                <div class="mb-3">
                    <label class="form-label">Id Trabajador</label>
                    <select class="form-control" name="lista" id="AllIdByTrabajador">
                    </select>
                    <br>
                    <button class="btn btn-primary" style="width: 15%;" onclick="myFunction(this.form)">Cargar Trabajador</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container margin-bottom">
            <form class="form-horizontal  row" method="GET" action="../../Controlador/TrabajadorModifyTarea.php">
                <br><br>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id_tarea" aria-describedby="emailHelp" required id="id_tarea" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" pattern="[A-Za-z]{3-30}" name="nombre" aria-describedby="emailHelp" required id="nombre" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select class="form-control" name="estado">
                        <option>Pendiente</option>
                        <option>Procesando</option>
                        <option>Finalizado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripcion</label>
                    <textarea class="form-control" name="descripcion" pattern="[A-Za-z]{20-250}" aria-describedby="emailHelp" required id="descripcion"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" aria-describedby="emailHelp" required id="fecha_inicio">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control" name="fecha_fin" aria-describedby="emailHelp" required id="fecha_fin">
                </div>

                <div class="mb-3">
                    <input type="hidden" name="usuario" class="form-control" value="<?php echo $user ?>"  aria-describedby="emailHelp" readonly>
                </div>
                <br>
                <div class="button-group" align="center">
                    <input type="submit" value="Modificar Tarea" class="btn btn-primary" style="width: 15%;">
                    
                </div>
            </form>
    </div>
</body>
</html>