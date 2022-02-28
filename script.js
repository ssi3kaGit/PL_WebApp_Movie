const APIURL = "https://api.themoviedb.org/3/discover/movie?api_key=99e91b6a58a5ae76496412db2d1fd2d9";
const IMGPATH = "https://image.tmdb.org/t/p/w1280";
const SEARCHAPI = "https://api.themoviedb.org/3/search/movie?&api_key=99e91b6a58a5ae76496412db2d1fd2d9&query=";

movieAPIResponse(APIURL);

//GET THE MOVIES FROM API
async function movieAPIResponse(url) {
    const response = await fetch(url);
    const responseData = await response.json();

    if(responseData.total_results < 1){
        alert("No movies found with this title/keyword. Try again.")
    }
    displayMoviesInDiv(responseData.results);
}

//SEARCH BAR
document.getElementById("form").addEventListener("submit", (action) => {
    action.preventDefault();
    movieAPIResponse(SEARCHAPI + document.getElementById("search").value);
    document.getElementById("search").value = "";
    
});

//LISTS THE MOVIES IN A DIV, GET DIV FROM INDEX (id = content)
const movieContent = document.getElementById("content");
function displayMoviesInDiv(movies) {
    movieContent.innerHTML = "";

    movies.forEach((movie) => {
        const {poster_path, title} = movie;
        const movieElement = document.createElement("div");
        movieElement.classList.add("movieItem"); //CSS formatting, class = movieItem

        movieElement.innerHTML = 
            `<img src="${IMGPATH + poster_path}" alt="${title}"/>
            <div class="movieItemTitle">
                <h5>${title}</h5>
            </div>`;
        movieContent.appendChild(movieElement);
    });
}

