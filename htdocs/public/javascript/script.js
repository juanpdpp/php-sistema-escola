function validarCamposLogin(event) {
    const email = document.getElementById('nomeUsuario').value;
    const senha = document.getElementById('senha').value;

    if (email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
function validarCamposCadastroUsuario(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
