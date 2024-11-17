<?php
// Configurações do banco de dados
$servername = 'localhost';
$dbname = 'perfil';
$username = 'root';
$password = 'usbw';
$port = '3307';

try {
    $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Obtendo os dados do formulário
$data = $_POST;

// Query de inserção
$sql = "INSERT INTO perfil_educacional (
    nome, data_nascimento, cpf, ra, sexo, cor, periodo, situacao_ocupacional,
    procurando_emprego, periodo_trabalho, responsavel_financeiro, mora_com_pais,
    situacao_ocupacional_pai, situacao_ocupacional_mae, pessoas_casa, pessoas_trabalham,
    renda_familiar, programa_social, qual_programa_social, paga_aluguel, casado,
    situacao_ocupacional_conjuge, filhos, quantidade_filhos, escolaridade_conjuge,
    escolaridade_mae, escolaridade_pai
) VALUES (
    :nome, :data_nascimento, :cpf, :ra, :sexo, :cor, :periodo, :situacao_ocupacional,
    :procurando_emprego, :periodo_trabalho, :responsavel_financeiro, :mora_com_pais,
    :situacao_ocupacional_pai, :situacao_ocupacional_mae, :pessoas_casa, :pessoas_trabalham,
    :renda_familiar, :programa_social, :qual_programa_social, :paga_aluguel, :casado,
    :situacao_ocupacional_conjuge, :filhos, :quantidade_filhos, :escolaridade_conjuge,
    :escolaridade_mae, :escolaridade_pai
)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $data['nome'],
        ':data_nascimento' => $data['data_nascimento'],
        ':cpf' => $data['cpf'],
        ':ra' => $data['ra'],
        ':sexo' => $data['sexo'],
        ':cor' => $data['cor'],
        ':periodo' => $data['periodo'],
        ':situacao_ocupacional' => $data['situacao_ocupacional'],
        ':procurando_emprego' => $data['procurando_emprego'] ?? null,
        ':periodo_trabalho' => $data['periodo_trabalho'] ?? null,
        ':responsavel_financeiro' => $data['responsavel_financeiro'],
        ':mora_com_pais' => $data['mora_com_pais'],
        ':situacao_ocupacional_pai' => $data['situacao_ocupacional_pai'],
        ':situacao_ocupacional_mae' => $data['situacao_ocupacional_mae'],
        ':pessoas_casa' => $data['pessoas_casa'],
        ':pessoas_trabalham' => $data['pessoas_trabalham'],
        ':renda_familiar' => $data['renda_familiar'],
        ':programa_social' => $data['programa_social'],
        ':qual_programa_social' => $data['qual_programa_social'] ?? null,
        ':paga_aluguel' => $data['paga_aluguel'],
        ':casado' => $data['casado'],
        ':situacao_ocupacional_conjuge' => $data['situacao_ocupacional_conjuge'],
        ':filhos' => $data['filhos'],
        ':quantidade_filhos' => $data['quantidade_filhos'] ?? null,
        ':escolaridade_conjuge' => $data['escolaridade_conjuge'] ?? null,
        ':escolaridade_mae' => $data['escolaridade_mae'],
        ':escolaridade_pai' => $data['escolaridade_pai'],
    ]);
    echo "Dados inseridos com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
