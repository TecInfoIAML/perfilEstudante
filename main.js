// script.js
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('process_data.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert('Dados enviados com sucesso!');

        // Limpar todos os campos do formulário
        this.reset();  // Método que limpa todos os campos de um formulário
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});