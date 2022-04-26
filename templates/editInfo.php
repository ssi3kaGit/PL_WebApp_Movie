<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="define author of the page -- Sneha Iyer, McKayla Thomas">
        <meta name="description" content="Sprint 3 Edit Info Page">  

        <title>ReviewMovies</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="styles/main.css">

    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm navbar-custom border-bottom-0">
            <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home"></a>
            <img src="https://img.freepik.com/free-photo/arrangement-film-elements-red-background-with-copy-space_23-2148457861.jpg?size=626&ext=jpg" 
            style="width:3%" alt="nav img">
            <nav class="navbar navbar-dark navbar-custom border-bottom-0">
                <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home"></a>
                <a class="navbar-brand mb-0 h1" href="home.html" aria-label="home" style="color: black;">ReviewMovies</a> 
            </nav>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="home.html"> Home </a> --> 
                        <a class="nav-link text-dark btn btn-default" href="?command=homePage">Home</a>

                    </li>
                    
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="seeReviews.php"> See Reviews </a> -->
                        <a class="nav-link text-dark btn btn-default" href="?command=seeReviews">See Reviews</a>

                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="editInfo.html"> Edit Information </a> -->
                        <a class="nav-link text-dark btn btn-default" href="?command=editInfo">Edit/Update User Info</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-danger" href="?command=logout">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Searchbar -->
            <form id="form">
                <input
                    type="text"
                    id="search"
                    placeholder="Searchbar"
                    class="search"
                />
            </form>
        </nav>

        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>CS4640 Sprint 4 -- Edit User Information</h1>
                <h3>Hello <?=$user["name"]?>! Email: <?=$user["email"]?></h3>
            </div>
            <div class="row">
                <div class="col-xs-8 mx-auto">
                <!--
                <form action="?command=question" method="post">
                    <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Question</h2>
                    <p><?=$question["question"];?></p>
                    </div>
                    <?= $message ?>
                    <div class="h-10 p-5 mb-3">
                        <input type="text" class="form-control" id="answer" name="answer" placeholder="Type your answer here">
                    </div>
                    <div class="text-center">      
                    <input type="hidden" name="questionid" value="<?=$question["id"]?>">          
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="?command=logout" class="btn btn-danger">End Game</a>
                    </div>
                </form>
                -->
                <form name="form3" id="form3" action="?command=homePage" method="post">
                    <p>
                        <label for="name">Edit Username</label>
                        <input type="text" name="name" id="name">
                    </p>
                              
                    <p>&nbsp;</p>
                    <p>
                        <input type="submit" name="Submit" id="Submit" value="Submit">
                    </p>
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

        <!-- jquery script -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
        <script type="text/javascript">
            
            //arrow function
            checkEqual = (val) => "" == val;

            //jquery used here for form validation dynamic behavior
            //anonymous function used here too
            $("#form3").submit(function(){
                var valid = true;

                //second condition
                if (checkEqual(document.form3.name.value)) {
                    alert('Failure, please enter a username')
                    valid = false;
                }
                else{
                    alert("Success!")
                }
                //check whether form should submit
                if(!valid){
                    //Suppress form submit
                    return false;
                }else{
                    return true;
                }
            });

        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>