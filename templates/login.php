<!DOCTYPE html>
<html>
    <head>
        <!-- 3. Include the following <meta> tags in the <head> section of this index.html --> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="define author of the page -- Sneha Iyer, McKayla Thomas">
        <meta name="description" content="login for Sprint 3, CS4640 at UVA">
        <meta name="keywords" content="define keywords for search engines">


        <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ReviewMovies Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 

        <link rel="stylesheet" href="styles/main.css">

    </head>

    <body>
        
        <div class="container" style="margin-top: 15px;">
            <!--
            <div class="row col-xs-8">
                <h1>ReviewMovies Login</h1>
                <p> Welcome to finance transaction app.  To get started, enter email, username, and password.</p>
            </div>
            -->

            <!-- card with image -->    
            <div class="card mx-auto mt-5" style="width: 27rem;">
                <img class="card-img-top" src="https://i.pinimg.com/originals/4b/ed/36/4bed369e3d0341b40dbb46d7b97076e2.jpg" alt="loginImg">
                <div class="card-body">
                    <h4 class="card-title text-center">ReviewMovies</h4>
                    <h6 class="card-subtitle mb-2 text-muted text-center">Brought to you by Sneha Iyer, McKayla Thomas</h6>
                    <p class="card-text">
                        Welcome to the ReviewMovies! 
                        This application is for easily viewing movies, leaving reviews, and connecting with other movie-lovers. 
                        To get started, enter email, username, and password!
                    </p>
                    <!--<div class="text-center"><a class="btn btn-dark" href="home.html" role="button">Login With Google</a></div>-->
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-4">
                <form action="?command=login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"/>
                    </div>
                    <div class="text-center">                
                        <button type="submit" class="btn btn-primary">Go To Home Page</button>
                    </div>
                </form>
                </div>
            </div>
        </div>


        <footer class="primaryFooter containerClass"> <!-- class="text-center bg-light text-muted p-1 fixed-bottom mt-5"> -->
            <small class="copyrightClass">
                &copy; 2022 Copyright:
            <a class="text-reset fw-bold" >Sneha Iyer, McKayla Thomas. CS 4640, UVA</a>
            </small>
        </footer>
        <!-- 4. include bootstrap Javascript-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>