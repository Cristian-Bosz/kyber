<?php

$select_tipos = "SELECT * FROM tipo_usuarios;";
$res_select_tipos = mysqli_query($cnx, $select_tipos);



$errores=[];
if (!empty($_GET['campo']))
    $errores = json_decode($_GET['campo']);

$user = [];
$accion='Crear';
$archivo = 'p_alta_usuarios.php';

//EDITAR Aqui chequeo que no este vacio el id del usuario asi podemos editarlo

if(!empty($_GET['id'])){
    $user_id = $_GET['id'];
    $select_user = "SELECT usuarios_id, nombre, email, password, tipo
    FROM usuarios
    JOIN tipo_usuarios ON tipo_user_id=tipo_user_id_fk 
    WHERE usuarios_id=$user_id";
    $res_select_user = mysqli_query($cnx, $select_user);
    
    if (!$res_select_user->num_rows){
        header("Location: ../panel.php?seccion=listado_usuarios&status=error_4");
         exit;
    }
    $accion='Editar';
    $archivo = 'p_editar_usuarios.php';
    $user = mysqli_fetch_assoc($res_select_user);
}

//EDITAR
?>


<aside class="container-fluid text-white py-3 bg-dark contacto">


<?php  
if(!empty($_GET['tipo']) && $_GET['tipo'] == 'usuario'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Hubo un error al cargar el usuario. Intenta nuevamente.</h2>
 </div>

<?php
endif;
?>

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Hubo un error al cargar el usuario.<strong> Campos incorrectos.</strong> Intenta nuevamente..</h2>
 </div>

<?php
endif;
?> 

<?php
if(!empty($_GET['status']) && $_GET['status'] == 'error_e'):
?>
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
   <h2 class="display-6">Ups! El id no existe en la base de datos</h2>
 </div>

<?php
endif;
?> 

     <h2 class= "display-4 text-info mt-5 mb-5 text-center" > <b><?= $accion ?></b> nuevo usuario </h2>
        <div class="container mb-5">

        <div class="row justify-content-center">
            <div class="col-md-8 borde pb-3 ">
                
          	 <form action="procesos/<?=$archivo?>" method="post" enctype="multipart/form-data">

<!--pasamos el id de lo que vamos editar-->
                        <?php
                        if(isset($user['usuarios_id'])):
                        ?>
                        <input type="hidden" name="id" value="<?= $user['usuarios_id']?>">
                        <?php
                        endif;    
                        ?>
                <!--/-->



		                    <div class="form-group">
		                        <label for="nombre" class="text-warning">Nombre de usuario</label>
		                        <input type="text" class="form-control" name="nombre" id="nombre" 
                                value="<?= isset($user['nombre']) ? $user['nombre'] : '' ?>" >
		                    
                                <?php
                               if(isset($errores->nombre)):
                                    ?>
                                    <p class="fw-bold text-danger">
                                       <?= $errores->nombre?> 
                               </p>
                                <?php
                                endif;
                                ?>
                            </div>
		                    
                              <!--RECORRO LOS permisos EN UN SELECT-->
                              <div class="form-group">
                                        <label for="permisos" class="text-warning">Permisos</label>
                                        <select name="permisos" id="permisos" class="form-select text-dark">
                                            <option value="0"  <?= !isset($user) ? 'selected' : '' ?> class=" text-dark">Seleccione un
                                                tipo de usuario
                                            </option>
                                            <?php
                                             while ($tipos = mysqli_fetch_assoc($res_select_tipos)):
                                            ?>
                                                    <option value="<?= $tipos['tipo_user_id'] ?>" class="text-dark" 
                                                    <?= in_array($tipos['tipo'], $user) ? 'selected' : '' ?>
                                                    ><?= ucfirst($tipos['tipo']) ?></option>
                                                <?php
                                                endwhile;
                                                ?>
                                        </select>
                                           
                                           <?php
                                             if(isset($errores->permisos)):
                                            ?>
                                                    <p class="fw-bold text-danger">
                                                      <?= $errores->permisos ?> 
                                             </p>
                                            <?php
                                            endif;
                                            ?>
                                        
                                </div>


		                    <div class="form-group">
		                        <label for="email" class="text-warning">Email</label>
		                        <input type="email" class="form-control" name="email" id="email" aria-describedby="ayudamail"
                                value="<?= isset($user['email']) ? $user['email'] : '' ?>" >                                            
		                        <small id="ayudamail" class="form-text text-muted">Tu dirección de email está segura con nosotros.</small>
		                    
                                <?php
                                  if(isset($errores->email)):
                                    ?>
                                    
                                    <p class="fw-bold text-danger">  <?= $errores->email ?> </p>
                                    
                                <?php
                                endif;
                                ?>
                            </div>




                            <div class="form-group">
                                <label for="pass" class="text-warning">Contraseña</label>
                                <div class="input-group">
                                <input type="password" name="pass" id="txtPassword" class="form-control" value="<?= isset($user['password']) ? $user['password'] : '' ?>"> 
                                    <div class="input-group-append">
                                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="bi bi-eye-slash-fill"></span></button>
                                    </div>
                                </div>
                                
                                <?php
                                if(isset($errores->pass)):
                                    ?>
                                  
                                    <p class="fw-bold text-danger">  <?=$errores->pass ?> </p>
                                <?php
                                endif;
                                ?>
                            </div>
		         	                  
		                

                            <div class="my-4">
                            <button class="btn btn-primary float-end" value="enviar" type="submit">
                                <i class="bi bi-person-plus-fill mx-2"></i><strong><?= $accion?> Usuario </strong></button>
    <a class="btn btn-primary mb-5" href="panel.php?seccion=listado_usuarios" role="button"><i class="bi bi-arrow-bar-left"></i> Volver</a>
                            
                            </div>
				 </form>
				</div>
			</div>
</div>
				
</aside>