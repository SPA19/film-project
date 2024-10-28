<?php
include_once 'config/db.php';

//Obtener películas de la base de datos con created_at
$stmt = $connection->query("SELECT *, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') as formatted_date FROM movies ORDER BY created_at DESC");
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include_once "includes/header.php" ?>

<div class="container">
  <h1 class="name-project">CineKeep</h1>
  <!-- OMDB Búscar -->
  <div class="section">
    <h2>Buscar Película</h2>
    <p>Aqui puedes buscar tus películas favoritas gracias a OMDb API ademas de poderlas guardar</p>
    <div class="search-container">
      <input type="text" id="searchInput" placeholder="Nombre de la pelicula" class="input-custom" autofocus>
      <button onclick="searchMovie()" class="save-btn"><i class="fa-solid fa-magnifying-glass icons-space"></i>
        Buscar
      </button>
    </div>
    <div id="apiResult"></div>
  </div>

  <!-- Formulario manual -->
  <div class="section">
    <h2>Añadir Película</h2>
    <p>Puedes añadir las peliculas que te gustan manualmente y te quedaran guardadas sin ningun problema</p>
    <form id="movieForm">
      <div class="form-horizontal">
        <input type="text" name="title" placeholder="Título" required>
        <input type="number" name="year" placeholder="Año" required>
        <input type="text" name="director" placeholder="Director" required>
        <input type="url" name="poster" placeholder="URL imagen" required>
      </div>
      <div class="button-wrapper">
        <button type="submit" class="save-btn"><i class="fa-solid fa-floppy-disk icons-space"></i> Guardar</button>
      </div>
    </form>
  </div>

  <!-- Descarga de Excel-->
  <div class="section">
    <h2>Descargar Excel</h2>
    <p>Descargaras la lista de las películas guardadas en formato Excel</p>
    <div class="button-wrapper">
      <button onclick="window.location.href='includes/export_films.php'" class="download-btn"><i
          class="fa-solid fa-download icons-space"></i> Descargar</button>
    </div>
  </div>

  <!-- Lista de películas -->
  <div class="section">
    <h2 class="title-list">Lista de películas guardadas</h2>
    <div class="movies-grid">
      <?php foreach ($movies as $movie): ?>
        <div class="movie-card">
          <img src="<?php echo $movie['poster']; ?>" alt="<?php echo $movie['title']; ?>">
          <h3><?php echo $movie['title']; ?></h3>
          <p>Director: <?php echo $movie['director']; ?></p>
          <p>Año: <?php echo $movie['year']; ?></p>
          <p class="created-date">Añadida: <?php echo $movie['formatted_date']; ?></p>
          <button onclick="deleteById(<?php echo $movie['id'] ?>)" class="delete-btn">
            <i class="fa-solid fa-trash icons-space"></i> Eliminar
          </button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php include_once "includes/footer.php" ?>