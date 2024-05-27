<?php
session_start();

if (isset($_GET['indice'])) {
    $indiceNome = $_GET['indice'];

    // Remover o nome do array
    if (isset($_SESSION['nomes'][$indiceNome])) {
        unset($_SESSION['nomes'][$indiceNome]);

        // Retorna uma resposta indicando sucesso para o JavaScript
        echo json_encode(['success' => true]);
        exit;
    }
}
?>
