<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="define author of the page -- Sneha Iyer, McKayla Thomas">
        <meta name="description" content="Sprint 3 Se Reviews Page">  

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
                        <a class="nav-link text-dark" href="?command=homePage" class="btn btn-primary">Home</a>

                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="enterReview.php"> Create Review </a> -->
                        <a class="nav-link text-dark" href="?command=enterReview" class="btn btn-primary">Create New Review</a>

                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="seeReviews.php"> See Reviews </a> -->
                        <a class="nav-link text-dark" href="?command=seeReviews" class="btn btn-primary">See Reviews</a>

                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-dark" href="editInfo.html"> Edit Information </a> -->
                        <a class="nav-link text-dark" href="?command=editInfo" class="btn btn-primary">Edit/Update User Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="?command=logout" class="btn btn-danger">Logout</a>
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
                <h1>CS4640 Sprint 3 - See Reviews</h1>
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

        <!-- msg 2-->
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
            $sn++;}}else{ ?>
            <tr>
                <td colspan="8">
            <?php echo $msg3; ?>
        </td>
            <tr>
            <?php
            }?>
            </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>

        <!-- msg3 -->
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
                        $sn++;
                    }
                }
                else{ 
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

        <footer class="primaryFooter containerClass"> <!-- class="text-center bg-light text-muted p-1 fixed-bottom mt-5"> -->
        <small class="copyrightClass">
            &copy; 2022 Copyright:
        <a class="text-reset fw-bold" >Sneha Iyer, McKayla Thomas. CS 4640, UVA</a>
        </small>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>