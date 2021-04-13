// Navigator

const navToggle = document.querySelector('#toggle-menu');
const navLink = document.querySelector('.nav-link');

const menu = () => {
    navToggle.classList.toggle('is-active');
    navLink.classList.toggle('active');
};
navToggle.addEventListener('click', menu);


// Partie de GetFlix API methode Fetch


const APIURL = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=1";

const IMGPATH =  "https://image.tmdb.org/t/p/w1280";

const SEARCHAPI =  "https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";



const main = document.getElementById('main');
const form = document.getElementById('form');
const search = document.getElementById('search');


getMovies(APIURL);


async function getMovies(url){
   const resp = await fetch(url);
   const respData = await resp.json();


   console.log(respData);
   showMovies(respData.results);
}

function showMovies(movies){

   main.innerHTML = "";

   movies.forEach((movie) => {
 
      const { backdrop_path, title, vote_average, overview} = movie;

      const movieEl = document.createElement("div");
      movieEl.classList.add("movie");

      movieEl.innerHTML = `
      <img src="${IMGPATH + backdrop_path}"
           alt="${title}" />

      <div class="movie-info">
        <h3>${title}</h3>
        <span class="vote-average"> ${vote_average}</span>
      </div>
      <div class="overview">${overview}</div>
     
      `;
      
      main.appendChild(movieEl);
   });
}

form.addEventListener('submit', (e) => {
   e.preventDefault();

   const searchTerm = search.value;

   if(searchTerm){

      getMovies(SEARCHAPI + searchTerm);

      search.value = "";
   }
});

// login anime

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id02');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// scroleTop

const mybutton = document.getElementById("myBtn");

window.onscroll = function() {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}