<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script language="JavaScript">
    function Error() {
        Swal.fire({
            icon: 'error',
            title: 'Lo siento...',
            text: 'Hay un error en la base de datos',
            showConfirmButton: false
        })
    }
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

    function go() {
        setTimeout("window.location='../home.php';", 3000);
    }

</script>
<?php


include_once('db.php');


class DatabaseProcess extends DatabasePDO
{

    private $user;
    private $pass;

        public function getAll()
        {
            try {
                
                # Conexión a MySQL
                // Instantiate database.
                $cnn = $this->conn();
                //Preparamos la consulta sql
                $respuesta = $cnn->prepare("select * from services");
                //Ejecutamos la consulta
                $respuesta->execute();
                //Creamos un array donde almacenaremos la data obtenida
                $usuarios = [];
                //Recorremos la data obtenida
                foreach($respuesta as $res){
                    //Llenamos la data en el array
                    $usuarios[]=$res;
                }
            }
            catch(PDOException $e) {
                echo '<script>';
                echo 'Error()';
                echo'</script>';
            }
            return $usuarios;
        }



    public function login($user,$pass)
    {
        try {
            
            $this->user=$user;
            $this->pass=$pass;

            # Conexión a MySQL
            // Instantiate database.
            $cnn = $this->conn();
        
                //Preparamos la consulta sql
                $stmt = $cnn->prepare("SELECT * FROM users WHERE email=:usernameEmail  AND pass=:hash_password"); 
                $stmt->bindParam("usernameEmail", $this->user,PDO::PARAM_STR) ;
                $stmt->bindParam("hash_password", $this->pass,PDO::PARAM_STR) ;
                //Ejecutamos la consulta
                $stmt->execute();
                $count=$stmt->rowCount();
                $data=$stmt->fetch(PDO::FETCH_OBJ);
                $db = null;
                $mesage= "";
                if($count)
                {
                
                    $mesage = "verdadero";
                }
                else
                {
                    $mesage = "Falso";


                } 
                }
                catch(PDOException $e) {
                    echo '<script>';
                    echo 'Error()';
                    echo'</script>';
                }
                return $mesage;

            }
    

    public function insertData($data)
    {
        try {
            $cnn = $this->conn();

            // set the PDO error mode to exception
            $stmt = $cnn->prepare(
                    "INSERT INTO services(nowner, nmechanic, ncar, model,plate,comments,estimate)
                    VALUES (:nowner, :nmechanic, :ncar, :model, :plate, :comments, :estimate)");
            $stmt->bindParam(':nowner', $data['owner']);
            $stmt->bindParam(':nmechanic', $data['mechanic']);
            $stmt->bindParam(':ncar', $data['ncar']);
            $stmt->bindParam(':model', $data['model']);
            $stmt->bindParam(':plate', $data['plate']);
            $stmt->bindParam(':comments', $data['comment']);
            $stmt->bindParam(':estimate', $data['estimate']);
            // use exec() because no results are returned
            $stmt->execute();
            echo 'Servicio Insertado Correctamente';
            echo("<script>location.href = '../home.php';</script>");
            //return true;
        }
        catch(PDOException $e) {
            echo '<script>';
            echo 'Error()';
            echo'</script>';
        }
        $cnn = null;
    }

    public function updateData($data, $id)
    {
        try {
            $cnn = $this->conn();
            $sql = "UPDATE services SET
                nowner = :nowner,
                nmechanic = :nmechanic,
                ncar = :ncar,
                model = :model,
                plate = :plate,
                comments = :comments,
                estimate = :estimate
                WHERE id = :id";
            $stmt = $cnn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nowner', $data['owner']);
            $stmt->bindParam(':nmechanic', $data['mechanic']);
            $stmt->bindParam(':ncar', $data['ncar']);
            $stmt->bindParam(':model', $data['model']);
            $stmt->bindParam(':plate', $data['plate']);
            $stmt->bindParam(':comments', $data['comment']);
            $stmt->bindParam(':estimate', $data['estimate']);
            $stmt->execute();
            echo 'Servicio Update Correctamente';
            echo("<script>location.href = '../home.php';</script>");
        }
        catch(PDOException $e) {
            echo '<script>';
            echo 'Error()';
            echo'</script>';
        }
        $cnn = null;
    }

    public function deleteData($id)
    {
        try {
            $cnn = $this->conn();
            $sql = "DELETE FROM services WHERE id =  :id";
            $stmt = $cnn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo 'Servicio Eliminado Correctamente';
            echo("<script>location.href = '../home.php';</script>");
        } catch (PDOException $e) {
            echo '<script>';
            echo 'Error()';
            echo'</script>';
        }
        $cnn = null;
    }
}