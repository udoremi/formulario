

function validatePassword(password) {
    return (password.length > 5) && (/[0-9]/.test(password));
}

// garante que o codigo da função foi carregado após o conteudo html
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener("submit", function(event) {
        const password = document.getElementById("senha").value;

        if (!validatePassword(password)) {
            alert('Senha inválida! Use pelo menos 6 caracteres, sendo ao menos um número');
            event.preventDefault();
        }
    });
});

function formatarCelular() {
    const celularInput = document.getElementById("whatsapp");
    //obtem o input do celular
    let celular = celularInput.value;

    if (celular.length >= 2 && celular[0] !== '(') {
        //pega o ddd e coloca entre parenteses
        celular = `(${celular.substring(0, 2)})`;
    }

    // Atualiza o valor do input
    celularInput.value = celular;
}
