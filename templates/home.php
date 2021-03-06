<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 3. Include the following <meta> tags in the <head> section of this index.html --> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <meta name="author" content="define author of the page -- Sneha Iyer, McKayla Thomas">
    <meta name="description" content="home page for Sprint 2, CS4640 at UVA">
    <meta name="keywords" content="define keywords for search engines">


    <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
    Bootstrap is designed to be responsive to mobile.
    Mobile-first styles are part of the core framework.

    width=device-width sets the width of the page to follow the screen-width
    initial-scale=1 sets the initial zoom level when the page is first loaded   
    -->
      
    <title>Home</title>

    <!-- 3. link bootstrap -->
    <!-- if you choose to use CDN for CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <!-- 
    Use a link tag to link an external resource. A rel (relationship) specifies relationship between the current document and the linked resource. 
    -->
    
    <!-- For development, we may want a better-printed CSS, but with larger download size.  Ignore "min"
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.css" rel="stylesheet"> 
    -->
    <!-- if you choose to download bootstrap and host it locally -->
    <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> --> 
    
    <!-- include your CSS
        by including your CSS last, anything you write may override (depending on specificity) the Bootstrap CSS
    <link rel="stylesheet" href="your-custom.css" /> 
    -->
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

    <!-- Media heading -->
    <div class="media justify-content-center">
        <div class="media-body">
            <h3 class="mt-0" style="text-align: center;">Hello <?=$user["name"]?>!</h3>
            <h4 class="mt-0" style="text-align: center;">Welcome to ReviewMovies</h4>
        </div>
        <img class="mr-3 img-fluid img-responsive center-block d-block mx-auto" 
          src="https://images.ctfassets.net/3s5io6mnxfqz/1oe7cgtHSNZTbOJ0V1o1pW/4f012e392b0d8c57453d0c6a508772bc/AdobeStock_176638789.jpeg" 
          height=100 width = 500 alt="media heading">
    </div>
  
    <!-- Accordion with Info -->
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" 
            aria-controls="collapseOne">
            Brief Statement
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>Welcome to ReviewMovies.</strong> This website allows users to view and create reviews about their favorite movies!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" 
            aria-controls="collapseTwo">
            How-To: About this Website
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              <ul>
                  <li>Click on any movie to see ratings/reviews as well as write/edit your own review!</li>
                  <li>You can filter/find movies using the search bar at the top of the page or by choosing a genre and scrolling</li>
                  <li>Click on ???See your Reviews??? in the navbar to view all of your reviews</li>
                  <li>Click on ???Edit Information??? in the navbar to edit any personal information such as your username</li>
              </ul>
              <strong>We hope you enjoy your movie-watching experience!</strong>
          </div>
        </div>
      </div>
    </div>

      <br>
      <br>

    <!--Filter Buttons-->
    <div class="justify-content: center;">
      <button id="all" onclick="allMovies()" class="btn btn-default filter-button" data-filter="all">All</button>
      <button id="fantasy" onclick="fantasyMovies()" class="btn btn-default filter-button" data-filter="fantasy">Fantasy</button>
      <button id="scifi" onclick="scifiMovies()" class="btn btn-default filter-button" data-filter="scifi">SciFi</button>
      <button id="comedy" onclick="comedyMovies()" class="btn btn-default filter-button" data-filter="comedy">Comedy</button>
      <button id="romance" onclick="romanceMovies()" class="btn btn-default filter-button" data-filter="romance">Romance</button>
      <button id="horror" onclick="horrorMovies()" class="btn btn-default filter-button" data-filter="horror">Horror</button>
      <button id="animation" onclick="animationMovies()" class="btn btn-default filter-button" data-filter="animation">Animation</button>
      <button id="action" onclick="actionMovies()" class="btn btn-default filter-button" data-filter="action">Action/Adventure</button>
    </div>

    <!-- this div is for the list of movies (hopefully layed out in a Netflix-esque grid format)-->
    <div id="content" class="movieArea">
        <h2 style="text-align: center;"> THIS AREA WILL BE WHERE MOVIES ARE DISPLAYED </h2>
    </div>

    <footer class="primaryFooter containerClass"> <!-- class="text-center bg-light text-muted p-1 fixed-bottom mt-5"> -->
        <small class="copyrightClass">
          &copy; 2022 Copyright:
          <a class="text-reset fw-bold" >Sneha Iyer, McKayla Thomas. CS 4640, UVA</a>
        </small>
    </footer>
    <!-- 4. include bootstrap Javascript-->
    <script src="script.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>