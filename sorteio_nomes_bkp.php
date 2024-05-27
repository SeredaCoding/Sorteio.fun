<?php
// Iniciar ou retomar a sessão
session_start();


if (isset($_POST["novoNome"])) {
    if (strlen($_POST["novoNome"]) > 33 || strlen($_POST["novoNome"]) < 3){
        header('location: nomes?erro');
        exit;
    }
}




// Array de nomes (inicializado se não existir na sessão)
$nomes = $_SESSION['nomes'] ?? [];

// Função para sortear um nome
function sortearNome($nomes) {
    $indiceSorteado = array_rand($nomes);
    return $nomes[$indiceSorteado];
}

// Adicionar novo nome ao array se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionarNome"])) {
    if (isset($_POST["novoNome"])) {
        $novoNome = $_POST["novoNome"];

        //Tratamento dos nomes/ minusculas/maiúsculas e etc...
        $novoNome = strtolower($novoNome);
        $novoNome = ucwords($novoNome);

        $_SESSION['novoNome'] = $novoNome;
        // Adicionar o novo nome ao array

        $nomes[] = $novoNome;
        // Atualizar a lista de nomes na sessão
        $_SESSION['nomes'] = $nomes;
        header('location: nomes?adicionar=s');
        exit;

    }
}

// Sortear um nome 
if (!empty($nomes)) {
    if (isset($_POST["sortear"]) && isset($_SESSION['nomes']) && !empty($_SESSION['nomes'])) {

        $nomeSorteado = sortearNome($nomes);
        // Exibir o resultado do sorteio
        $_SESSION['$nomeSorteado'] = $nomeSorteado;
        header('location: nomes?sortear=s');
        exit;
        //echo "<h2>O nome sorteado é: $nomeSorteado</h2>";
    } 
} else {
    header('location: nomes?sortear=n');
    exit;
}
?>
