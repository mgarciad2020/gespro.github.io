<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        
    </script>
</head>
<body>
   
    <div class="container-fluid">
    <h1>Agregar Nuevo Proyecto</h1>

    <div class="container margin-bottom">
        <form class="form-horizontal  row" method="GET" action="../../Controlador/AdminAddProyecto.php">
            <br><br>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre"  pattern="[A-Za-z]{3-30}" aria-describedby="emailHelp" >
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha Fin</label>
                <input type="date" class="form-control" name="fecha_fin" aria-describedby="emailHelp">
            </div>
            
            <br>

            <div class="button-group">
                <input type="submit" value="Agregar Proyecto" class="btn btn-primary" style="width: 15%;">
            </div>
        </div>
        
    </form>
    </div>
</body>
</html>