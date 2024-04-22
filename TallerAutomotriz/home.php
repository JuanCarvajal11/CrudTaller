<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <title>Home | TallerAutomotriz</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3">
        <h1>Ingrese Datos</h1>
        <form action="./config/Process.php" method="post">
          <input type="text" class="form-control mb-3" name="nowner" placeholder="NombrePropietario" autocomplete="off">
          <input type="text" class="form-control mb-3" name="nmechanic" placeholder="NombreMecanico" autocomplete="off">
          <input type="text" class="form-control mb-3" name="ncar" placeholder="ReferenciaCarro" autocomplete="off">
          <input type="number" class="form-control mb-3" name="model" placeholder="ModeloCarro" maxlength="4" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off">
          <input type="text" class="form-control mb-3" name="plate" placeholder="Placa"  maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off">
          <input type="text" class="form-control mb-3" name="comments" placeholder="Observaciones" autocomplete="off">
          <input type="number" class="form-control mb-3" name="estimate" placeholder="Presupuesto" autocomplete="off">

          <input type="submit" class="btn btn-dark" name="insert">
        </form>
      </div>
      <div class="col-md-8">
        <table class="table">
          <thead class="ttable table-dark table-striped-columns">
            <tr>
              <th>ID</th>
              <th>NomPropietario</th>
              <th>NomMecanico</th>
              <th>ReferCarro</th>
              <th>Modelo</th>
              <th>Placa</th>
              <th>Obseraciones</th>
              <th>Presupuesto</th>
              <th>Acciones</th>
              <th></th>
            </tr>

          </thead>
          <tbody>
            <?php
            include('./config/DatabaseProces.php');
            $get = New DatabaseProcess();
            $services = $get->getAll();
            foreach ($services as $key => $value){?>
            <tr>
                <th><?php echo $value['id']; ?></th>
                <th><?php echo $value['nowner']; ?></th>
                <th><?php echo $value['nmechanic']; ?></th>
                <th><?php echo $value['ncar']; ?></th>
                <th><?php echo $value['model']; ?></th>
                <th><?php echo $value['plate']; ?></th>
                <th><?php echo $value['comments']; ?></th>
                <th><?php echo $value['estimate']; ?></th>
                <th>
                  <form action="./config/Process.php" method="post">
                    <input type="hidden" name="id" value=<?php echo $value['id'];?>>
                    <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                </form></th>
                <th>
                <form action="./config/Process.php" method="post">
                    <input type="hidden" name="id" value=<?php echo $value['id'];?>>
                    <input type="hidden" name="nowner" value=<?php echo $value['nowner'];?>>
                    <input type="hidden" name="nmechanic" value=<?php echo $value['nmechanic'];?>>
                    <input type="hidden" name="ncar" value=<?php echo $value['ncar'];?>>
                    <input type="hidden" name="model" value=<?php echo $value['model'];?>>
                    <input type="hidden" name="plate" value=<?php echo $value['plate'];?>>
                    <input type="hidden" name="comments" value=<?php echo $value['comments'];?>>
                    <input type="hidden" name="estimate" value=<?php echo $value['estimate'];?>>
                    <input type="submit" class="btn btn-dark" name="edit" value="Editar">
                </form>
                </th>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>