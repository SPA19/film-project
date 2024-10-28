# 🎬 Buscador de Películas - Prueba Técnica

Aplicación web que permite buscar y gestionar una colección de películas utilizando la API de OMDB, con almacenamiento en base de datos y exportación a Excel.

## 🛠️ Tecnologías Utilizadas

- PHP 8.0
- JavaScript
- HTML5
- CSS3
- MySQL
- API OMDB

## ✨ Funcionalidades

- Búsqueda de películas usando la API de OMDB
- Guardado de películas en base de datos MySQL
- Registro manual de películas
- Visualización de películas guardadas
- Eliminación de películas guardadas
- Exportación de la colección a Excel
- Diseño responsivo

## ⚙️ Configuración del Proyecto

1. Clonar el proyecto
2. Crear base de datos MySQL
3. Configurar credenciales en `config/db.php`
4. Configurar API key de OMDB en `assets/js/main.js`

## 📊 Estructura de la Base de Datos

```sql
CREATE DATABASE IF NOT EXISTS films_database;
USE films_database;

CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    year VARCHAR(4),
    director VARCHAR(255),
    poster VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 📁 Estructura de Archivos

```
├── assets/
│   ├── css/
│   │   └── styles.css
│   └── js/
│       └── main.js
├── config/
│   └── db.php
├── includes/
│   ├── delete_films.php
│   ├── export_films.php
│   ├── footer.php
│   ├── header.php
│   └── save_films.php
└── index.php
```

## 🚀 Instrucciones de Uso

1. **Búsqueda de Películas**

   - Usar el campo de búsqueda para encontrar películas
   - Los resultados se muestran automáticamente

2. **Guardar Películas**

   - Click en "Guardar" para añadir a la base de datos
   - Opción de agregar manualmente disponible

3. **Exportar Datos**
   - Click en "Download" en la sección "Descargar Excel" para descargar la colección

4. **Borrar Películas**

   - Click en el icono del bote de basura que aparece en la tarjeta de la película

## ⚡ Consideraciones Técnicas

- Manejo de errores de API
- Queries SQL optimizadas
- Código comentado para mejor comprensión
- Diseño responsivo para todos los dispositivos

## 👨‍💻 Autor

Desarrollado por Simón Posada Acosta - [simon.150@hotmail.com]