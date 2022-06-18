<?php
//session_start();
//$user = $_SESSION['usuario'];

?>
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
                }
            }
            xmlHttp.open("GET", link);
            xmlHttp.send();
        }
    </script>
</head>
<body>
    <div class="container-fluid">
    <h1>Agregar Nueva Tarea</h1>

    <div class="container margin-bottom">
        <form class="form-horizontal  row" method="GET" action="../../Controlador/TrabajadorAddTarea.php">
            <br><br>

            <div class="mb-3">
                <label class="form-label">Seleccionar Proyecto</label>
                <select class="form-control" name="id_proyecto" id="AllIdByProyecto">
                </select>
                <br>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" aria-describedby="emailHelp" required id="fecha_inicio">
                <br>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" name="fecha_fin" aria-describedby="emailHelp" required id="fecha_fin">
                <br>
            </div>

            <div class="mb-3">
               <label class="form-label">Nombre</label>
               <input type="text" class="form-control" pattern="[A-Za-z]{3-30}" name="nombre" aria-describedby="emailHelp" required>
               <br>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" pattern="[A-Za-z]{20-500}" title="Debes escribir una descripción de 20 caracteres como minimo" aria-describedby="emailHelp" required></textarea>
                <br>
            </div>

            <div class="mb-3">
                <input type="hidden" name="usuario" class="form-control" value="<?php echo $user ?>" readonly>
                <br>
            </div>
           
            <br>
            <button class="btn btn-primary" style="width: 15%;">Agregar Tarea</button>
        
    </form>
    </div>
    </div>
</body>
</html>