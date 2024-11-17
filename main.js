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
        console.log(data); // Verifique a resposta no console
        this.reset();
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao enviar os dados!');
    });
});
