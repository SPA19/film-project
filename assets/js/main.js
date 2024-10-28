const API_KEY = "e8ca224b"; //esta es la key que se genero para poder hacer busquedas.

//Busqueda con la tecla enter de la pelicula.
document.getElementById("searchInput").addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      searchMovie();
    }
  });

//Busqueda en la api de la pelicula ingresada.
async function searchMovie() {
  const title = document.getElementById("searchInput").value;
  try {
    const response = await fetch(
      `http://www.omdbapi.com/?apikey=${API_KEY}&t=${title}`
    );
    const data = await response.json();

    if (data.Response === "True") {
      const html = `
                <div class="search-result">
                    <img src="${data.Poster}" alt="${data.Title}">
                    <h3>${data.Title}</h3>
                    <p>Director: ${data.Director}</p>
                    <p>Genero: ${data.Genre}</p>
                    <p>Duración: ${data.Runtime}</p>
                    <p>Año: ${data.Year}</p>
                    <button onclick="saveFromSearch('${data.Title}', '${data.Year}', '${data.Director}', '${data.Poster}')" class="save-btn">
                        <i class="fa-solid fa-floppy-disk icons-space"></i> Guardar
                    </button>
                </div>
            `;
      document.getElementById("apiResult").innerHTML = html;
    } else {
      document.getElementById("apiResult").innerHTML = `<div class="alert">
        Película no encontrada...
      </div>`;
    }
  } catch (error) {
    console.error("Error:", error);
  }
}

//Funcion para guardar la película.
async function saveFromSearch(title, year, director, poster) {
  const formData = new FormData();
  formData.append("title", title);
  formData.append("year", year);
  formData.append("director", director);
  formData.append("poster", poster);

  try {
    const response = await fetch("includes/save_films.php", {
      method: "POST",
      body: formData,
    });
    const result = await response.text();
    alert("Película guardada correctamente");
    window.location.href = "index.php";
  } catch (error) {
    console.error("Error:", error);
  }
}

//Se genera el evento submit cuando se esta guardando una pelicula manuelamente
document
  .getElementById("movieForm")
  .addEventListener("submit", async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);

    try {
      const response = await fetch("includes/save_films.php", {
        method: "POST",
        body: formData,
      });
      const result = await response.text();
      alert("Película guardada correctamente");
      window.location.href = "index.php";
    } catch (error) {
      console.error("Error:", error);
    }
  });

//Se elimina peliculas de la lista
async function deleteById(id) {
  try {
    const response = await fetch(`includes/delete_films.php?id=${id}`, {
      method: "GET",
    });
    const result = await response.text();
    alert("Solicitud aceptada");
    window.location.href = "index.php";
  } catch (error) {
    console.error("Error:", error);
  }
}
