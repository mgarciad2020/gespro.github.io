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
                    document.getElementById('nombre').value = respuesta2['nombre'];
                    document.getElementById('estado').value = respuesta2['estado'];
                    document.getElementById('fecha_inicio').value = respuesta2['fecha_inicio'];
                    document.getElementById('fecha_fin').value = respuesta2['fecha_fin'];
                }
            }
            xmlHttp.open("GET", link);
            xmlHttp.send();
        }
    </script>

</head>
<body>
    <div class="container-fluid">
    <h1>Modificar Proyecto</h1>
    <div class="container margin-bottom">
        <form class="form-horizontal  row" method="GET">
            <br>
            <div class="mb-3">
                <label class="form-label">Id Proyecto</label>
                <select class="form-control" name="lista" id="AllIdByProyecto">
                </select>
                <br>
                <button class="btn btn-primary" style="width: 15%;" onclick="myFunction(this.form)">Cargar Proyecto</button>
            </div>
        </form>
    </div>
    
    <div class="container margin-bottom">
        <form class="form-horizontal  row" method="GET" action="../../Controlador/AdminModifyProyecto.php">
            <br><br>

            <div class="mb-3">
                <label class="form-label">Id Proyecto</label>
                <input type="text" class="form-control" name="id_proyecto" aria-describedby="emailHelp" required readonly id="id_proyecto">
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre del Proyecto</label>
                <input type="text" class="form-control" name="nombre"  pattern="[A-Za-z]{3-30}" aria-describedby="emailHelp" required id="nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>
                <input type="text" class="form-control" name="estado"  pattern="[A-Za-z]{3-30}" aria-describedby="emailHelp" required id="estado">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" aria-describedby="emailHelp" required id="fecha_inicio">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" name="fecha_fin" aria-describedby="emailHelp" required id="fecha_fin">
            </div>

            <br>

            <div class="button-group">
                <input type="submit" value="Modificar Proyecto" class="btn btn-primary" style="width: 15%;">
                </div>
            </form>
        </div>
    </div>
</body>

</html>