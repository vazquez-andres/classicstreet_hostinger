<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión</title>
 <!--Made with love by Mutiullah Samim -->
 
 <!--Bootsrap 4 CDN-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
 <!--Fontawesome CDN-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 <!--Custom styles-->
 <link rel="stylesheet" type="text/css" href="styles.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <!------ Include the above in your HEAD tag ---------->
 <style>
    /* Made with love by Mutiullah Samim*/

    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
        background-image: url('assets/images/wallpaper.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;

        font-family: 'Numans', sans-serif;
    }

    .container{
        height: 100%;
        align-content: center;
    }

    .card{
        height: 300px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0,0,0,0.8) !important;
    }

    .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
    }

    .social_icon span:hover{
        color: white;
        cursor: pointer;
    }

    .card-header h3{
        color: white;
    }

    .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span{
        width: 50px;
        background-color: #white;
        color: black;
        border:0 !important;
    }

    input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember{
        color: white;
    }

    .remember input
    {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn{
        color: black;
        background-color: white;
        width: 150px;
    }

    .login_btn:hover{
        color: white;
        background-color: black;
    }

    .links{
        color: white;
    }

    .links a{
        margin-left: 4px;
    }
</style>
</head>
<body>
    <div class="container">
       <div class="d-flex justify-content-center h-100">
          <div class="card">
             <div class="card-header">
                <h3>Iniciar Sesión</h3>
                
            </div>
            <div id="formularios" class="card-body">
                <form action="controlador/validacion.php" id="form-session" method="post">
                   <div class="input-group form-group">
                      <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-user"></i></span>
                     </div>
                     <input type="text" class="form-control" name="nombre" placeholder="Usuario">					
                 </div>
                 <div class="input-group form-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fas fa-key"></i></span>
                 </div>
                 <input type="password" class="form-control" name="password" placeholder="password">
             </div>
             
             <div class="form-group">
              <input type="submit" value="Iniciar Sesión" class="btn float-right login_btn">
          </div>
      </form>
  </div>
  
</div>
</div>
</div>
</body>
</html>
