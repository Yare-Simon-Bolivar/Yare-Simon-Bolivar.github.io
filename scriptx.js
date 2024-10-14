document.addEventListener('DOMContentLoaded', function() {
    fetch('get_noticias.php')
        .then(response => response.json())
        .then(data => {
            const noticiasDiv = document.getElementById('noticias');
            data.forEach(noticia => {
                const noticiaDiv = document.createElement('div');
                noticiaDiv.classList.add('noticia');
                noticiaDiv.innerHTML = `
                    <h2>${noticia.titulo}</h2>
                    <p>${noticia.contenido}</p>
                    <small>Publicado el ${noticia.fecha_publicacion} por ${noticia.autor}</small>
                `;
                noticiasDiv.appendChild(noticiaDiv);
            });
        });
});
