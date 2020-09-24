function editarCampo(id) {

        document.getElementById(id).disabled = false;


}

function salvarEdicao(nome, login, email,senha, telefone){
    document.getElementById(nome).disabled = false;
    document.getElementById(login).disabled = false;
    document.getElementById(email).disabled = false;
    document.getElementById(senha).disabled = false;
    document.getElementById(telefone).disabled = false;
}