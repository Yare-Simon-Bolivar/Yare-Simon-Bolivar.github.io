fetch('fetch_news.php')
            .then(response => response.json())
            .then(data => {
                const noticiasDiv = document.getElementById('noticias');
                data.forEach(noticia => {
                    const noticiaElement = document.createElement('div');
                    noticiaElement.classList.add('noticia');
                    noticiaElement.innerHTML = `
                        <h2>${noticia.titulo}</h2>
                        <p>${noticia.contenido}</p>
                        ${noticia.imagen ? `<img src="${noticia.imagen}" alt="Imagen de la noticia">` : ''}
                        <small>${noticia.fecha_publicacion}</small>
                    `;
                    noticiasDiv.appendChild(noticiaElement);
                });
            });