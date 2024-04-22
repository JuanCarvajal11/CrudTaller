<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script language="JavaScript">
    function validate() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            color: '#000000',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Datos Validados Correctamente'
        })
    }
    function deteteService() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            color: '#000000',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Servicio eliminado corrrectamente'
        })
    }

    function Error() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'No es posible generar este servicio, puede ser que ya sea uno existente',
            showConfirmButton: false
        })
    }
    
    function ErrorUSer() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'No es posible ingresar al sistema',
            showConfirmButton: false
        })
    }

    function errorService() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'No es posible eliminar este servicio',
            showConfirmButton: false
        })
    }
</script>
<script language="JavaScript">
    function go() {
        setTimeout("window.location='../home.php';", 3000);
    }
</script>
<script language="JavaScript">
    function goBack() {
        setTimeout("window.location='../../home.php';", 3000);
    }
    function goBackUser() {
        setTimeout("window.location='../index.php';", 3000);
    }
</script>
<?php

if(isset($_POST['login'])){
    include_once('DatabaseProces.php');
    $user = $_POST['email'];
    $pass = $_POST['pass'];

    //instanciar el objeto
    $users = new DatabaseProcess();
    // llamado función de loguin
    $users->login($user,$pass);

    $response = $users->login($user,$pass);

    if ($response==="verdadero") {
    echo "<font color=\"white\">b</font>";
    echo "<script>";
    echo "validate();";
    echo "go();";
    echo "</script>";
    }

    else{
    echo "<font color=\"white\">b</font>";
    echo "<script>";
    echo "ErrorUSer();";
    echo "goBackUser();";
    echo "</script>";
    }
}


 if(isset($_POST['insert'])){
    
    include_once('DatabaseProces.php');
    $service = new DatabaseProcess();

    $nowner = $_POST['nowner'];
    $nmechanic = $_POST['nmechanic'];
    $ncar = $_POST['ncar'];
    $model = $_POST['model'];
    $plate = $_POST['plate'];
    $comment = $_POST['comments'];
    $estimate = $_POST['estimate'];

    $servicearray = [

        "owner" => $nowner,
        "mechanic" => $nmechanic,
        "ncar" => $ncar,
        "model" =>$model,
        "plate" => $plate,
        "comment" => $comment,
        "estimate" => $estimate
    ];


    $newservice = $service->insertData($servicearray);

 }

 if(isset($_POST['delete'])){
    $id = $_POST['id'];
    include_once('DatabaseProces.php');
    $service = new DatabaseProcess();



    $deleteservice = $service->deleteData($id);
 }

 if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nowne = $_POST['nowner'];
    $nmechani = $_POST['nmechanic']; 
    $nca = $_POST['ncar'];
    $mode = $_POST['model'];
    $plate = $_POST['plate'];
    $comment = $_POST['comments'];
    $estimat = $_POST['estimate'];

    ?>

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
      <div class="col">
        <h1>Ingrese Datos</h1>
        <form action="" method="post">
        <input type="text" class="form-control mb-3" name="id" value="<?php echo $id?>" readonly >
          <input type="text" class="form-control mb-3" name="nowner" value="<?php echo $nowne?>" autocomplete="off" >
          <input type="text" class="form-control mb-3" name="nmechanic" value="<?php echo $nmechani ?>" autocomplete="off" >
          <input type="text" class="form-control mb-3" name="ncar" value="<?php echo $nca ?>" autocomplete="off" >
          <input type="number" class="form-control mb-3" name="model" value="<?php echo $mode?>"  maxlength="4" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off">
          <input type="text" class="form-control mb-3" name="plate" value="<?php echo $plate ?>"   maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off">
          <input type="text" class="form-control mb-3" name="comments" value="<?php echo $comment?> autocomplete="off"">
          <input type="number" class="form-control mb-3" name="estimate" value="<?php echo $estimat ?>" autocomplete="off">

          <input type="submit" class="btn btn-success" name="submitedit" value="Edit">
        </form>
      </div>     
</div>
</div>

<?php
 }



 if(isset($_POST['submitedit'])){

    include_once('DatabaseProces.php');
    $service = new DatabaseProcess();

    $id = $_POST['id'];
    $nowne = $_POST['nowner'];
    $nmechani = $_POST['nmechanic']; 
    $nca = $_POST['ncar'];
    $mode = $_POST['model'];
    $plate = $_POST['plate'];
    $comment = $_POST['comments'];
    $estimat = $_POST['estimate'];

    $serviceeditarray = [

        "owner" => $nowne,
        "mechanic" => $nmechani,
        "ncar" => $nca,
        "model" =>$mode,
        "plate" => $plate,
        "comment" => $comment,
        "estimate" => $estimat
    ];

    $editservice = $service->updateData($serviceeditarray, $id);

 }