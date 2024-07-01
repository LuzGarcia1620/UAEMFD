document.addEventListener('DOMContentLoaded', () => {
    fetchUsuarios();

    document.getElementById('buscarInput').addEventListener('input', (event) => {
        const searchQuery = event.target.value.toLowerCase();
        filterUsuarios(searchQuery);
    });
});

function fetchUsuarios() {
    fetch('http://localhost/API/verUsuarios.php')
        .then(response => response.json())
        .then(data => displayUsuarios(data))
        .catch(error => console.error('Error:', error));
}

function displayUsuarios(usuarios) {
    const container = document.getElementById('usuariosContainer');
    container.innerHTML = '';

    usuarios.forEach(usuario => {
        const userCard = document.createElement('div');
        userCard.className = 'card';

        userCard.innerHTML = `
            <div class="card-body">
                <h5 class="card-title">${usuario.nombre} ${usuario.apellidoPaterno} ${usuario.apellidoMaterno}</h5>
                <p class="card-text">${usuario.correo}</p>
                <p class="card-text"><small class="text-muted">${usuario.rol}</small></p>
            </div>
        `;
        container.appendChild(userCard);
    });
}

function filterUsuarios(query) {
    const cards = document.querySelectorAll('#usuariosContainer .card');
    cards.forEach(card => {
        const text = card.innerText.toLowerCase();
        if (text.includes(query)) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}
