let selectedGenres = []; 
document.querySelectorAll('.genre-button').forEach(button => { 
    button.addEventListener('click', function () { 
        const genre = this.getAttribute('data-genre'); 
        if (selectedGenres.includes(genre)) { 
            selectedGenres = selectedGenres.filter(g => g !== genre); 
            this.style.backgroundColor = ''; 
        } else { 
            if (selectedGenres.length < 6) { 
                selectedGenres.push(genre); 
                this.style.backgroundColor = 'rgba(20, 20, 20, 1)'; 
            } 
        } 
        fetchMovies(); 
    }); 
}); 

function fetchMovies() { 
    const genres = selectedGenres.join(','); 
    fetch('backend/get_movies.php?genres=' + genres) 
        .then(response => response.json()) 
        .then(data => { 
            const moviesList = document.getElementById('movies-list'); 
            moviesList.innerHTML = ''; 
            if (data.length > 0) { 
                data.forEach(movie => { 
                    const filmContainer = document.createElement('div'); 
                    filmContainer.className = 'film-container'; 
 
                    filmContainer.innerHTML = ` 
                       <a href="film.php?id=${movie.id}"> 
                             <div class='film'> 
                                <strong>${movie.film_name}</strong> Год: ${movie.years} <strong>${movie.genre}</strong> 
                             </div> 
                       </a> 
                    `; 
                    moviesList.appendChild(filmContainer); 
                }); 
            } else { 
                moviesList.textContent = 'Нет фильмов для выбранных жанров. (или вы не выбрали жанр)'; 
            } 
        }) 
        .catch(error => { 
            console.error('Ошибка:', error); 
        }); 
}
