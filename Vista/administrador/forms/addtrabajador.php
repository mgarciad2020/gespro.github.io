<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <script>
        
    </script>
</head>
<body>
    <div class="container-fluid">
    <h1>Agregar Nuevo Trabajador</h1>
    </div>

    <div class="container margin-bottom">
        <br>
        <form  method="GET" action="../../Controlador/AdminAddTrabajador.php">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre"  pattern="[A-Za-z]{3-30}" aria-describedby="emailHelp" required="true">
            </div>

            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" pattern="[A-Za-z]{3-60}" aria-describedby="emailHelp" required="true">
            </div>

            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" aria-describedby="emailHelp" required="true">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" aria-describedby="emailHelp" required="true">
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" required="true">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" aria-describedby="emailHelp" required="true">
            </div>

            <br>

            <div class="button-group" >
                <input type="submit" value="Agregar Trabajador" class="btn btn-primary" style="width: 15%;">
            </div>

            <br>
        </div>
    </form>
</body>
</html>