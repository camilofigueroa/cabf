<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="css/cabf.css" >
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Administrador</title>
    </head>
    <body>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-52755902-1', 'auto');
		ga('send', 'pageview');
    </script>
        <div id="container" class="container">
            <div class="row">
            	<div class="col-md-1"></div>
                <div class="col-md-10" align="center">
                	<img src="imagenes/banner3.png" class="img-responsive" />
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" align="center">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" align="center">
	                     <form class="flogin ensayo" action="validar.php" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" ><img src="iconos/usuario.png"  style="width:20px;"></div>
                                        <input type="text" class="form-control" id="inputusuario" name="inputusuario" placeholder="Usuario" required="required" autofocus="autofocus">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><img src="iconos/contraseña.png"  style="width:20px;"></div>
                                        <input type="password" class="form-control" id="inputclave" name="inputclave" placeholder="Contraseña" required="required">
                                    </div>
                                    <button class="btn pull-right btn-default" id="uno" name="botonlogin" value="botonlogin">Iniciar</button>
                                </div>
                                 
							</form> 
                         </div>
                        <div class="col-md-3"></div>
                    </div>                 
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row ">
                <div class="col-md-1"></div>
                <div class="col-md-10 " align="center">
                    <img src="imagenes/banner4.png" class="img-responsive" />
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>
