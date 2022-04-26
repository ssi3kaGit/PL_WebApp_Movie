<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="define author of the page -- Sneha Iyer, McKayla Thomas">
        <meta name="description" content="Sprint 3 Se Reviews Page">  

        <title>ReviewMovies</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="styles/main.css">

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        
        <style>
            /* body {
            padding: 25px;
            background-color: white;
            color: black;
            font-size: 25px;
            } */

            .dark-mode {
            background-color: #A9A9A9; /*#ffffff;*/
            color: white;
            }
        </style>
        
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
                <h1>CS4640 Sprint 4 - See Reviews</h1>
                <h3>Hello <?=$user["name"]?>! Email: <?=$user["email"]?></h3>
            </div>

            <!-- <a href="?command=enterReview" class="btn btn-primary">Enter New Review</a> -->
            <!--<a href="?command=homePage" class="btn btn-primary">Home</a>-->

            <!--
            <div class="row">
                <div class="col-xs-8 mx-auto">
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
                    <a href="?command=logout" class="btn btn-danger">Logout</a>
                    </div>
                </form>
                </div>
            </div>
            -->
        </div>

      
        <button class="btn btn-primary" onclick="darkMode()">Toggle dark/gray mode</button>

        <div id="OverallDiv">
            <!-- <div id="moveDivheader">
                Click here to move this table
            </div> -->

            <div class="container">
                <div class="row">
                    <h4>Favorite Title (max rank title)</h4>
                    <p id="jsonObj_text"></p>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                    
                        <?php echo $deleteMsg??''; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead><tr><th>Reviews (Most Recent at Top)</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Review</th>
                                    <th>Rating</th>

                                </thead>
                                <tbody>
                                    <?php
                                        if(is_array($msg))
                                        {      
                                            $sn=1;
                                            foreach($msg as $data)
                                            {
                                    ?>
                                                <tr>
                                                <td><?php echo $sn; ?></td>
                                                <td><?php echo $data['title']??''; ?></td>
                                                <td><?php echo $data['category']??''; ?></td>
                                                <td><?php echo $data['date']??''; ?></td>
                                                <td><?php echo $data['review']??''; ?></td>
                                                <td><?php echo $data['rating']??''; ?></td>
                                                </tr>
                                    <?php
                                                $sn++;
                                            }
                                        }
                                        else{ 
                                    ?>
                                            <tr>
                                                <td colspan="8">
                                                    <?php echo $msg; ?>
                                                </td>
                                            <tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- msg 2 creates table based on MySQL array for msg2 -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <?php echo $deleteMsg??''; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead><tr><th>Titles by Highest Rating</th>
                                    <th>Title</th>
                                    <th>Rating</th>
                                </thead>
                                <tbody>
                                    <?php
                                        if(is_array($msg2)){      
                                        $sn=1;
                                        foreach($msg2 as $data2){
                                    ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $data2['title']??''; ?></td>
                                            <td><?php echo $data2['rating']??''; ?></td>
                                        </tr>
                                    <?php
                                        $sn++;}}else{ 
                                    ?>
                                        <tr>
                                            <td colspan="8">
                                                <?php echo $msg3;?>
                                            </td>
                                        <tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- msg3 creates table based on MySQL array for msg3 -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <?php echo $deleteMsg??''; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead><tr><th>Reviews by Category</th>
                                    <th>Category</th>
                                    <th>Review</th>
                                </thead>
                                <tbody>
                                    <?php
                                        if(is_array($msg3)){      
                                        $sn=1;
                                        foreach($msg3 as $data3){
                                    ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $data3['category']??''; ?></td>
                                            <td><?php echo $data3['review']??''; ?></td>
                                        </tr>
                                    <?php
                                        $sn++;}}else{ 
                                    ?>
                                        <tr>
                                            <td colspan="8">
                                                <?php echo $msg3; ?>
                                            </td>
                                        <tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="primaryFooter containerClass"> <!-- class="text-center bg-light text-muted p-1 fixed-bottom mt-5"> -->
        <small class="copyrightClass">
            &copy; 2022 Copyright:
            <a class="text-reset fw-bold" >Sneha Iyer, McKayla Thomas. CS 4640, UVA</a>
        </small>
        </footer>

        <script>
            function darkMode() {
                var element = document.body;
                element.classList.toggle("dark-mode");
            }
            
            //AJAX
            var jsonObj = null;
            var score = 0;
            // const myObject = null;

            function getJSON() 
            {
                // instantiate the object
                var ajax = new XMLHttpRequest();
                // open the request
                ajax.open("GET", "?command=get_jsonObj", true);
                // ask for a specific response
                ajax.responseType = "json";
                // send the request
                ajax.send(null);
            
                // What happens if the load succeeds
                ajax.addEventListener("load", function() {
                    // set question
                    if (this.status == 200) { // worked 

                        //Define, instantiate, and use at least one JavaScript object
                        //reading the JSON query
                        jsonObj = this.response;
                        const myObject = { title: jsonObj[0].title, rating: jsonObj[0].rating};

                        // console.log("ajax worked!")
                        // console.log("object: ", myObject.title)
                        document.getElementById("jsonObj_text").innerHTML = myObject.title;

                        // displayJSONObj();
                    }
                });
            
                // What happens on error
                ajax.addEventListener("error", function() {
                    document.getElementById("message").innerHTML = 
                        "<div class='alert alert-danger'>An Error Occurred</div>";
                });
            }
            // Method to display a question
            // function displayJSONObj() {
            //     // Why innerHTML and not textContent?
            //     document.getElementById("jsonObj_text").innerHTML = myObject.title;
            // }

            // Need to add the initial question load
            getJSON();

        </script>
        <script src="script.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>