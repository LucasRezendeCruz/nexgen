<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexgen";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM produto";
$result = $conn->query($sql);
?>

<div class="container mt-3">
    <h1>Produtos - Serviços</h1>
    <h4 class="mt-1">Venha conecer todos os nossos produtos e serviços!</h4>
</div>

<div class="container">
        <div class="row div-produtos">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $statusMensagem = ($row['statusRegistro'] == 1) ? 'Disponível' : 'Indisponível';
                    ?>

                    <div class="col-3 card-produto">
                        <div class="">
                            <?= htmlspecialchars($row['descricao']) ?>
                        </div>
                        <div class="">
                            
                            <img class="comida" src="<?= baseUrl() ?>uploads/produto/<?= htmlspecialchars($row['imagem']) ?>" width="340" height="300">
                            
                        </div>
                        <div class="">
                            <?= $row['caracteristicas'] ?>
                            <p><b>Status do produto:</b> <?= $statusMensagem ?></p>
                            
                        </div>
                    </div>

                    <?php
                }
            } else {
                echo "Nenhum produto encontrado.";
            }
            ?>
        </div>
</div>

<?php
// Fecha a conexão
$conn->close();
?>
