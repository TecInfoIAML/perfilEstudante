<?php
// Incluindo o arquivo de conexão
include 'connection.php';




// Verificando se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebendo os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    if (!preg_match("/^\d{3}\.\d{3}\.\d{3}-\d{2}$/", $_POST['cpf'])) {
        die("CPF inválido.");
    }else{
    $cpf = $_POST['cpf'];}
    $ra = $_POST['ra'];
    $sexo = $_POST['sexo'];
    $cor = $_POST['cor'];
    $periodoEstudo = $_POST['periodo']; 
    $situacaoOcupacional = $_POST['situacao_ocupacional'];
    $procurandoEmprego = $_POST['procurando_emprego'];
    $periodoTrabalho = $_POST['periodo_trabalho'];
    $responsavelFinanceiro =$_POST['responsavel_financeiro'];
    $moraComPais =$_POST['mora_com_pais'];
    $situacaoOcupacionalPai = $_POST['situacao_ocupacional_pai'];
    $situacaoOcupacionalMae = $_POST['situacao_ocupacional_mae'];
    $pessoasCasa = $_POST['pessoas_casa'];
    $pessoasTrabalham = $_POST['pessoas_trabalham'];
    $rendaFamiliar = $_POST['renda_familiar'];
    $programaSocial = $_POST['programa_social'];
    $qualProgramaSocial = $_POST['qual_programa_social'];
    $pagaAluguel = $_POST['paga_aluguel'];
    $estado_civil = $_POST['casado'];
    $empregadoConjuge = $_POST['situacao_ocupacional_conjuge'];
    $filhos = $_POST['filhos'];
    $quantidadeFilhos = $_POST['quantidade_filhos'];
    $escolaridadeConjuge = $_POST['escolaridade_conjuge'];
    $escolaridadeMae = $_POST['escolaridade_mae'];
    $escolaridadePai = $_POST['escolaridade_pai'];
        
    // SQL para inserir os dados no banco
    $sql = "INSERT INTO perfil_educacional (nome, data_nascimento, cpf, ra, sexo, cor, periodo, situacao_ocupacional, procurando_emprego, periodo_trabalho, responsavel_financeiro, mora_com_pais, situacao_ocupacional_pai, situacao_ocupacional_mae, pessoas_casa, pessoas_trabalham, renda_familiar, programa_social, qual_programa_social, paga_aluguel,casado,situacao_ocupacional_conjuge,filhos,quantidade_filhos,escolaridade_conjuge,escolaridade_mae,escolaridade_pai) 
            VALUES ($nome, $data_nascimento, $cpf, $ra, $sexo, $cor, $periodo, $situacao_ocupacional, $procurando_emprego, $periodo_trabalho, $responsavel_financeiro, $mora_com_pais, $situacao_ocupacional_pai, $situacao_ocupacional_mae, $pessoas_casa, $pessoas_trabalham, $renda_familiar, $programa_social, $qual_programa_social, $paga_aluguel,$casado,$situacao_ocupacional_conjuge,$filhos,$quantidade_filhos,$escolaridade_conjuge,$escolaridade_mae,$escolaridade_pai)";
    
    // Preparando a consulta
    $stmt = $conn->prepare($sql);
    
    // Executando a consulta com os dados recebidos
    $stmt->execute([
        $nome, $data_nascimento, $cpf, $ra, $sexo, $cor, $periodo, $situacao_ocupacional, $procurando_emprego, $periodo_trabalho, $responsavel_financeiro, $mora_com_pais, $situacao_ocupacional_pai, $situacao_ocupacional_mae, $pessoas_casa, $pessoas_trabalham, $renda_familiar, $programa_social, $qual_programa_social, $paga_aluguel,$casado,$situacao_ocupacional_conjuge,$filhos,$quantidade_filhos,$escolaridade_conjuge,$escolaridade_mae,$escolaridade_pai
    ]);

    // Retornando mensagem de sucesso
    echo "Dados inseridos com sucesso!";
}
?>
