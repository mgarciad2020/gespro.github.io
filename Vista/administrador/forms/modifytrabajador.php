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
            var link = "../../Controlador/AdminConsultaTrabajador.php?id=" + id_trabajador;
            console.log(link);


            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                   console.log(xmlHttp.responseText);
                    var respuesta = JSON.parse(xmlHttp.responseText);
                    console.log("respuesta "+ respuesta );
                    respuesta2 =  respuesta[0]['items'][0];

                   
                    document.getElementById('id_trabajador').value = respuesta2['id_trabajador'];
                    document.getElementById('nombre').value = respuesta2['nombre'];
                    document.getElementById('apellidos').value = respuesta2['apellidos'];
                    document.getElementById('dni').value = respuesta2['dni'];
                    document.getElementById('email').value = respuesta2['email'];
                    document.getElementById('usuario').value = respuesta2['usuario'];
                    document.getElementById('contrasena').value = respuesta2['contrasena'];
                    document.getElementById('estado').value = respuesta2['estado'];
                
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
                    <label class="form-label">Nombre del Trabajador</label>
                    <select class="form-control" name="lista" id="AllIdByTrabajador">
                    </select>
                    <br>
                    <button class="btn btn-primary" style="width: 15%;" onclick="myFunction(this.form)">Cargar Trabajador</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container margin-bottom">
            <form class="form-horizontal  row" method="GET" action="../../Controlador/AdminModifyTrabajador.php">
                <div class="mb-3">
                  <input type="hidden" class="form-control" name="id_trabajador" aria-describedby="emailHelp" required id="id_trabajador" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre"  pattern="[A-Za-z]{3-30}" aria-describedby="emailHelp" required id="nombre" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos"  pattern="[A-Za-z]{3-60}" aria-describedby="emailHelp" required id="apellidos">
                </div>
                <div class="mb-3">
                    <label class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" aria-describedby="emailHelp" required id="dni">
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" required id="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" required id="usuario">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" aria-describedby="emailHelp" readonly id="contrasena">
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <input type="text" class="form-control" pattern="[A-Za-z]{3-30}" name="estado" aria-describedby="emailHelp" required id=estado>
                </div>
                <br>
                <div class="button-group" align="center">
                    <input type="submit" value="Modificar Trabajador" class="btn btn-primary" style="width: 15%;">
                    
                </div>
            </form>
    </div>
</body>
</html>