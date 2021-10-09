<!doctype html>
<html lang="en">
  <head>
    <title>Anibal Paredes Editor S.A.C.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type = "text/css" href="<?php echo base_url(); ?>/assets/template/dist/css/login.css">

</head>
    <body>
        
        <div class="container">
            <div class="card card-container">
                <h4 class="text-center"> <strong style="color:#41D3BD;">ANIBAL </strong><strong style="color:#000000;">PAREDES EDITOR S.A.C</strong></h3>
                <h6 class="text-center">Acceso al sistema</h4>
                <?php if($this->session->flashdata("error")):?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $this->session->flashdata("error")?></strong>
                    </div>
                <?php endif; ?>
                <br> 
                <form action="<?php echo base_url();?>auth/login" method="post">
                    <input type="text" class="form-control" style="text-transform:uppercase;" id="usuario_usuario" name="username" placeholder="Usuario" required autofocus>
                    <label id="valiusuario" style="color: #d32f2f"></label>
                    <input type="password" class="form-control" id="usuario_clave" name="password" placeholder="Contraseña" required autofocus>
                    <label id="valicontra" style="color: #d32f2f"></label>
                    <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">Ingresar</button>
                </form>
                <br>
                <h6 class="text-center"> © 2020. Todos los derechos reservados. </h6>   
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>