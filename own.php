<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["nombre"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["anio"]))  
      {  
           $error = "<label class='text-danger'>Enter Gender</label>";  
      }  
      else if(empty($_POST["precio"]))  
      {  
           $error = "<label class='text-danger'>Enter Designation</label>";  
      }  
      else  
      {  
           if(file_exists('batchCaptura.json'))  
           {  
                $current_data = file_get_contents('batchCaptura.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array( 
                     'nombre'               =>     $_POST["nombre"],  
                     'anio'          =>     $_POST["anio"],  
                     'precio'     =>     $_POST["precio"]  
                );  

                $array_data[] = $extra;  
                $final_data = json_encode($array_data, JSON_PRETTY_PRINT);  
                if(file_put_contents('batchCaptura.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Alta correcta...</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON No existe';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>NFT Inicio de Proceso de Alta</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">NFT Inicio de Proceso de Alta</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Nombre del Objeto</label>  
                     <input type="text" name="nombre" class="form-control" /><br />  
                     <label>Año</label>  
                     <input type="text" name="anio" class="form-control" /><br />  
                     <label>Precio de Operación</label>  
                     <input type="text" name="precio" class="form-control" /><br />  
                     <input type="submit" name="submit" value="Subir" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>