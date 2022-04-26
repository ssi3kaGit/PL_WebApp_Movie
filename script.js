const APIURL = "https://api.themoviedb.org/3/discover/movie?api_key=99e91b6a58a5ae76496412db2d1fd2d9";
const IMGPATH = "https://image.tmdb.org/t/p/w1280";
const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=99e91b6a58a5ae76496412db2d1fd2d9&query=";

movieAPIResponse(APIURL);

//------------------------------GET THE MOVIES FROM API------------------------------
async function movieAPIResponse(url) {
    const response = await fetch(url);
    const responseData = await response.json();

    if(responseData.total_results < 1){
        alert("No movies found with this title/keyword. Try again.")
    }
    displayMoviesInDiv(responseData.results);
}

//------------------------------SEARCH BAR------------------------------
document.getElementById("form").addEventListener("submit", (action) => {
    action.preventDefault();
    movieAPIResponse(SEARCHAPI + document.getElementById("search").value);
    document.getElementById("search").value = "";
    
});


//------------------------------FILTER BUTTONS------------------------------
//28 = Action
function actionMovies() {
    console.log("Action Movies!");
    document.getElementById("action").style.backgroundColor='cyan';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='white';
    movieAPIResponse(APIURL + "&with_genres=28");
}
//27 = Horror
function horrorMovies() {
    console.log("Horror Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='cyan';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='white';    
    movieAPIResponse(APIURL + "&with_genres=27");
}
//Comedy = 35
function comedyMovies() {
    console.log("Comedy Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='cyan';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='white';
    movieAPIResponse(APIURL + "&with_genres=35");
}
//Romance = 10749
function romanceMovies() {
    console.log("Romance Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='cyan';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='white';
    movieAPIResponse(APIURL + "&with_genres=10749");
}
//Fantasy = 14
function fantasyMovies() {
    console.log("Fantasy Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='cyan';
    document.getElementById("animation").style.backgroundColor='white';
    movieAPIResponse(APIURL + "&with_genres=14");
}
//Science Fiction = 878
function scifiMovies() {
    console.log("SciFi Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='cyan';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='white';
    movieAPIResponse(APIURL + "&with_genres=878");
}
//All movies
function allMovies() {
    console.log("All Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='cyan';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='white';
    movieAPIResponse(APIURL);
}
//Animation = 16
function animationMovies() {
    console.log("Animation Movies!");
    document.getElementById("action").style.backgroundColor='white';
    document.getElementById("all").style.backgroundColor='white';
    document.getElementById("horror").style.backgroundColor='white';
    document.getElementById("scifi").style.backgroundColor='white';
    document.getElementById("comedy").style.backgroundColor='white';
    document.getElementById("romance").style.backgroundColor='white';
    document.getElementById("fantasy").style.backgroundColor='white';
    document.getElementById("animation").style.backgroundColor='cyan';
    movieAPIResponse(APIURL + "&with_genres=16");
}


//------------------------------LISTS THE MOVIES IN A DIV, GET DIV FROM INDEX (id = content)------------------------------
const movieContent = document.getElementById("content");

function displayMoviesInDiv(movies) {
    movieContent.innerHTML = "";

    movies.forEach((movie) => {
        const {poster_path, title} = movie;
        const movieElement = document.createElement("div");
        movieElement.classList.add("movieItem"); //CSS formatting, class = movieItem

        movieElement.innerHTML = 
            `
            <img src="${IMGPATH + poster_path}" alt="${title}"/>
            <div class="movieItemTitle">
                    <h5>${title}</h5>
            </div>

            <a class="nav-link text-dark btn btn-default" href="?command=enterReview" value="${title}">Create A Review</a>
            `;
            // <img src="${IMGPATH + poster_path}" alt="${title}"/>
            // <input type="image" name="submit" src="${IMGPATH + poster_path}" alt="Submit" />
                            // <input type="hidden" id="title" name="title" value="${title}" onkeyup="form2.title.value=this.value">
                //action="templates/enterReview.php" method="GET">
            /*
            <form name="form1" command="?enterReview">
            <input type="submit" value="Submit">
            </form>
            */

            //hidden form
            //image = submit button
            //hidden field = title
            //send to review template page
        movieContent.appendChild(movieElement);
    });
}
// function myFunction() {
//     const movieTitleElement = document.createElement("div");
//     var x = document.getElementById("getTitle");
//     console.log(x);
//     //movieTitleElement.innerHTML = `<h5>${x.value}</h5>`

// }

//------------------------------STATS------------------------------

// var numReviews = 1;
// var gameStats = Array(1).fill(0); //[0]

// function loadFromLocal(){
//     //When the page loads, if there is a game or game statistics stored in localStorage, 
//     //then repopulate the display with the stored version.
//     if (localStorage.hasOwnProperty('gameStats')){
//         //console.log("in if local storage.hasOwnProperty(gameStats)")
//         gameStats = JSON.parse(localStorage.getItem('gameStats')); 
//         if(gameStats.length == 1){
//             numReviews = gameStats[0];
//             updateGameStats(numReviews);
//         }
//     }
// }

// function submitButtonClickScore(){
//     numReviews = updateReviewScore(numReviews);
//     updateGameStats(numReviews);
// }

// //arrow function
// const updateReviewScore = (a) => {
//     console.log(a, " is now ", a+1);
//     return a + 1;
// }

// function updateGameStats(numReviews){
//     alert("# reviews score is now: ", Number(numReviews));
//     var statsDiv = document.getElementById("stats");
//     statsDiv.innerHTML = "<h4> Number of Reviews Done: " + numReviews + "</h4>";
// }

// // Save to localStorage when the page unloads
// function save() {
//     gameStats[0] = numReviews;
//     console.log("gameStats: ", gameStats)
//     localStorage.setItem("gameStats", JSON.stringify(gameStats));
// }

// //Clear History - clear out user data from the application.
// function clearEverything() {
//     localStorage.clear();
// }