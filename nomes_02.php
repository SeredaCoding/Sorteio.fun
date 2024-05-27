<?php
session_start();

// Função para remover um nome da lista
function removerNome($index) {
    if (isset($_SESSION['nomes'][$index])) {
        unset($_SESSION['nomes'][$index]);
        $_SESSION['nomes'] = array_values($_SESSION['nomes']); // Reindexar o array após a remoção
    }
}

if (isset($_POST['removerNome'])) {
    $index = $_POST['indice'];
    removerNome($index);
}

if (isset($_POST['adicionarNome'])) {
    $novoNome = $_POST['novoNome'];
    $_SESSION['nomes'][] = $novoNome;
    header("Location: nomes?adicionar=s&novoNome=" . urlencode($novoNome));
    exit();
}

// Restante do código...
?>

<!-- Restante do código HTML -->

<?php
if (isset($_SESSION['nomes']) && !empty($_SESSION['nomes'])) {
    foreach ($_SESSION['nomes'] as $index => $nome) {
        ?>
        <div class="col-6 col-md-auto col-md-3 col-lg-4 centralizar">
            <form method="post" action="">
                <div class="p-2 m-2 rounded border" id="nome_adicionado">
                    <?php echo $nome; ?>
                    <button type="submit" class="btn btn-danger btn-sm" name="removerNome">
                        Remover
                    </button>
                    <input type="hidden" name="indice" value="<?php echo $index; ?>">
                </div>
            </form>
        </div>
        <?php
    }
}
?>
