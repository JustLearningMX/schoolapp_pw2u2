<?php
  if (session_id() == '') {
      session_start();
  }

  $local = false;

//En modo local trabajamos con Xampp
  if($local){
    $host= "localhost";
    $user= "root";
    $bd= "es1821000366";
    $pass= "";
    
    //si trabajamos con Heroku u otro hosting
  } else {
    $host= "us-cdbr-east-05.cleardb.net";
    $user= "beed73ed0c715b";
    $bd= "heroku_1c9bbf4429d4520";
    $pass= "e1981089";
  };
  
  // Parámetros para la conexión con PDO
  $dsn = "mysql:host=$host;dbname=$bd";
  $username = "$user";
  $password = "$pass";
  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'", //Para los acentos
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION,
    // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //CONVIERTE A OBJETO EL RESULTADO
  );

  //Conexión segura a la BD  
  try {
    $pdo = new PDO($dsn, $username, $password, $options); //Conectamos
  } 
  catch (PDOException $e) { //Si existe un error
      echo "Error en Conexión a BD:" . $e->getMessage();
      die();
      echo "<script type='text/javascript'>";
      echo "alert(`Falló la conexión a la BD`)";
      echo "</script>";
  }

  // **** PREPARAMOS LAS CONSULTAS SELECT PARA MOSTRAR TODOS LOS USUARIOS EN 
  //***** UNA TABLA O PARA BUSCAR UN SOLO USUARIO Y GUARDAR SU SESIÓN

  // Obtenemos los valores de los inputs
  $matricula = $_POST['matricula'];
  $programacion = $_POST['programacion'] ? $_POST['programacion'] : 0;
  $matematicas = $_POST['matematicas'] ? $_POST['matematicas'] : 0;
  $algoritmo = $_POST['algoritmos'] ? $_POST['algoritmos'] : 0;
  $logica = $_POST['logica'] ? $_POST['logica'] : 0;
  $so = $_POST['so'] ? $_POST['so'] : 0;
  $bd = $_POST['bd'] ? $_POST['bd'] : 0;
  $sumaCalificaciones = intval($programacion) + intval($matematicas) + intval($algoritmo) + intval($logica) + intval($so) + intval($bd);

  // Si no se agregó ninguna calificación
  if (!$sumaCalificaciones OR $sumaCalificaciones === 0) { 
    echo "<script type='text/javascript'>";
    echo "alert('Ingrese por lo menos una calificación')";
    echo "</script>";

    echo "<script type='text/javascript'>";
    echo "window.location.href='./evaluar.php'"; // Vuelve a solicitar las evaluaciones
    echo "</script>";

    //Si se agregó una calificación o más
  } elseif ($sumaCalificaciones > 0) {
    //Consulta con sentencias preparadas
    // Verificamos que exista el usuario
    $tabla = 'usuarios';
    $consulta = 'SELECT * FROM';
    $statement = $pdo->prepare($consulta . ' ' . $tabla . ' WHERE id_usuario = :IdUser and tipo_usuario = :TipoUsuario');
    
    $IdUser = $matricula;
    $TipoUsuario = 'E';
    $statement->execute(array(':IdUser' => $IdUser, ':TipoUsuario' => $TipoUsuario));
    
    //Guarda los resultados como un array
    while($rows = $statement->fetch()) {		
    $arreglo [] = array(
        'id' => $rows['id_usuario'],
        'nombre' => $rows['nombre_usuario'],
        'tipo' => $rows['tipo_usuario'],
        'password' => $rows['password']
        );
    };

    $jsonArray = json_encode($arreglo); //Se pasa a formato JSON 

    if(empty($arreglo)){ // Si no se halló una coincidencia con el USER
        echo "<script type='text/javascript'>";  
        echo "alert(`No existe el alumno. Agréguelo primero.`)"; // Mensaje
        echo "</script>";
    
        echo "<script type='text/javascript'>";
        echo "window.location.href='./evaluar.php'"; // Ingresar calificaciones nuevamente
        echo "</script>";

      } else {//Si todo OK se guardan las calificaciones
        
        $tabla = 'calificaciones';
        $consultaInsert = 'INSERT INTO';

        //Consulta con sentencias preparadas, Insertaremos el nuevo usuario
        $statement = $pdo->prepare($consultaInsert . ' ' . $tabla . ' (matricula_estudiante, id_profesor, programacion, matematicas, algoritmos, logica, so, bd) VALUES (:Matri, :IdProf, :Prog, :Mate, :Algo, :Logi, :SO, :BD)');
        $Matri = $matricula;
        $IdProf = $_SESSION['userId'];
        $Prog = $programacion;
        $Mate = $matematicas;
        $Algo = $algoritmo;
        $Logi = $logica;
        $SO = $so;
        $BD = $bd;

        $statement->execute(array(':Matri' => $Matri, ':IdProf' => $IdProf, ':Prog' => $Prog, ':Mate' => $Mate, ':Algo' => $Algo, ':Logi' => $Logi, ':SO' => $SO, ':BD' => $BD ));
        
        echo "<script type='text/javascript'>";
        echo "alert(`¡Calificaciones ingresadas exitosamente!`)"; //Debug 
        echo "</script>";

        //Redireccionamos 
        echo "<script type='text/javascript'>";
        echo "window.location.href='./evaluar.php'"; 
        echo "</script>";
      };
  }

  $pdo = null; // Cerramos la conexión
?>