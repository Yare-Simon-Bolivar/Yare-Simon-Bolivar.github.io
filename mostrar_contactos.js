document.addEventListener("DOMContentLoaded", function() {
    fetch('obtener_mensajes.php')
        .then(response => response.json())
        .then(data => {
            const container = document.querySelector('.mensajes-container');
            data.forEach(mensaje => {
                const card = document.createElement('div');
                card.className = 'mensaje-card';
                card.innerHTML = `
                    <h3>${mensaje.nombre}</h3>
                    <p>${mensaje.mensaje}</p>
                    <div class="email">${mensaje.email}</div>
                    <time>${mensaje.fecha}</time>
                `;
                container.appendChild(card);
            });
        })
        .catch(error => console.error('Error:', error));
});