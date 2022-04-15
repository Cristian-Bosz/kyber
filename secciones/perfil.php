<?php

$errores=[];
if (!empty($_GET['campo']))
    $errores = json_decode($_GET['campo']);


//EDITAR Aqui chequeo que no este vacio el id del usuario asi podemos editarlo

if(!empty($_GET['id'])){
    $user_id = $_GET['id'];
    $select_user = "SELECT usuarios_id, nombre, apellido, email, fecha_nacimiento, img_user
    FROM usuarios
    WHERE usuarios_id=$user_id";
    $res_select_user = mysqli_query($cnx, $select_user);
    
    if (!$res_select_user->num_rows){
        header("Location: index.php?seccion=home&status=error_4");
         exit;
    }
   
    $user = mysqli_fetch_assoc($res_select_user);
}

//EDITAR
?>


<aside class="container-fluid py-3 contacto">


<?php  
if(!empty($_GET['tipo']) && $_GET['tipo'] == 'usuario'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2>Hubo un error al guardar estos nuevos datos. Intenta nuevamente.</h2>
 </div>

<?php
endif;
?>

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2>Hubo un error al guardar estos nuevos datos.<strong> Campos incompletos.</strong> Intenta nuevamente..</h2>
 </div>

<?php
endif;
?> 


     
        <div class="container-fluid text-white mb-5">
            
        <div class="row justify-content-center">
            
            <div class="col-md-8 borde pb-3 ">
                <h2 class= "display-4 text-info text-center my-2" > <b> Editar</b> perfil </h2>
          	 <form action="procesos/p_perfil.php" method="post" enctype="multipart/form-data">

<!--pasamos el id de lo que vamos editar-->
                        <?php
                        if(isset($user['usuarios_id'])):
                        ?>
                        <input type="hidden" name="id" value="<?= $user['usuarios_id']?>">
                        <?php
                        endif;    
                        ?>
                <!--/-->






<div class='container card-body-perfil my-5'>

    <div class='row my-5 mx-5 profile'>    

<!--IMAGEN-->
    <div class='col-12 col-md-12 col-lg-6 col-xl-5'>
            <div class='text-white mx-5'>
                
                            <label for="img_user" class="text-warning"><strong>Foto de perfil</strong> 
                                                </label>
                                                

                                                <figure class="card shadow bg-transparent">
                                                    <img src="img/<?= !empty($user['img_user']) ? 'users/' . $user['img_user'] : 'foto_perfil.png' ?>" 
                                                    alt="<?= empty($user['nombre']) ? $user['nombre'] : 'usuario de kyber' ?>" class="figure-img img-fluid  rounded-circle">
                                                </figure>
                                            
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" id="img_user" name="img_user">
                                                        <label class="input-group-text" for="img_user"> <?= !empty($user['img_user']) ?  $user['img_user'] : 'Examinar' ?></label>
                                                    </div> 
                                                <small class="form-text text-muted">Sugerimos que el tamaño de la imagen sea 1000x1000px o 750x750px</small>
                                                    <?php
                                                    if (isset($errores->img_user)):
                                                        ?>
                                                        <div class="alert alert-danger fade show mt-2" role="alert">
                                                            <?= $errores->img_user ?>
                                                        </div>
                                                    <?php
                                                    endif;
                                                    ?>        
                                                </div>
                                          
                  
            </div>      
        </div>
<!--/-->
<!--FORMULARIO DATOS DEL PRODUCTO-->
        <div class='col-12 col-md-12 col-lg-6 col-xl-6'>
            <ul class='list-unstyled'>
            <li>  
        
                <div class='row align-items-center text-light mb-3'>
                
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-2 my-2">
                                            <label for="nombre" class="text-warning"><strong>Nombre de usuario</strong></label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" 
                                            value="<?= isset($user['nombre']) ? $user['nombre'] : '' ?>" >
                                        
                                                <?php
                                                if(isset($errores->nombre)):
                                                ?>
                                                
                                                <p class="text-danger"> <?= $errores->nombre?> </p>
                                                
                                                <?php
                                                endif;
                                                ?>
                                    </div>


                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-2 my-2">
                                          <label for="apellido" class="text-warning"><strong>Apellido</strong></label>
                                            <input type="text" class="form-control" name="apellido" id="apellido" 
                                            value="<?= isset($user['apellido']) ? $user['apellido'] : '' ?>" >
                                    
                                            <?php
                                              if(isset($errores->apellido)):
                                            ?>
                                    
                                            <p class="text-danger"> <?= $errores->apellido?> </p>
                                        
                                            <?php
                                            endif;
                                            ?>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-2 my-2">
                                            <label for="fecha" class="text-warning"><strong>Fecha de nacimiento</strong></label>
                                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= isset($user['fecha_nacimiento']) ? $user['fecha_nacimiento'] : '' ?>"
                                            min="1940-01-01" max="2022-12-31">
                                                    <?php
                                                    if(isset($errores->fecha_nacimiento)):
                                                    ?>
                                                        
                                                        <p class="text-danger"> <?= $errores->fecha_nacimiento?></p>
                                                        
                                                    <?php
                                                    endif;
                                                    ?>  
                                        </div>
        
        

     
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-2 my-2">
                                        <label for="email" class="text-warning"><strong>Email</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="ayudamail"
                                        value="<?= isset($user['email']) ? $user['email'] : '' ?>" >                                            
                                        <small id="ayudamail" class="form-text text-muted">Tu dirección de email está segura con nosotros.</small>
                                    
                                        <?php
                                        if(isset($errores->email)):
                                            ?>
                                            
                                            <p class="text-danger">  <?= $errores->email ?> </p>
                                        
                                        <?php
                                        endif;
                                        ?>
                                        
                                    </div>

                            
                                        
                            
                                        
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3 float-end">           
                                    <button type="submit" value="enviar" class="btn btn-primary my-3 float-end">
                                    <i class="fas fa-user-edit mx-2"></i>Guardar cambios
                                    </button>
                            </div>
                </div>
        
            </li>
            </ul>
        </div>      
             

    </div>
</div>


                            

				 </form>
				</div>
			</div>
</div>
				
</aside>