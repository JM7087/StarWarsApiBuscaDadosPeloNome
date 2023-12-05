<?php

// Verifica se o formulário foi submetido
if (isset($_POST['urlNome'])) {
    
    // Obtém o valor do campo 'urlNome' do formulário
    $urlNome = $_POST['urlNome'];

    // Substitui espaços por %20 para formar a URL adequada para a API
    $urlNomeSemEspaco = str_replace(' ', '%20', $urlNome);
} else {
    // Se o campo 'urlNome' estiver vazio, atribui uma string vazia
    $urlNomeSemEspaco = "";
}

// Faz uma requisição à API SWAPI para obter dados dos personagens com base no nome fornecido
$jsonWrl = file_get_contents("https://swapi.dev/api/people/?search=" . $urlNomeSemEspaco . "&format=json");

// Decodifica o JSON recebido da API para um objeto PHP
$jsonData = json_decode($jsonWrl);

// Extrai a lista de resultados dos personagens da resposta JSON
$results = $jsonData->results;

// Inicializa variáveis para armazenar os dados do personagem
$nome = '';
$altura = '';
$peso = '';
$corDoCabelo = '';
$corDaPele = '';
$corDosOlhos = '';
$anoDeNascimento = '';
$sexo = '';

// Verifica se o campo 'urlNome' não está vazio
if ($urlNomeSemEspaco != "") {

    // Percorre os resultados obtidos da API (neste caso, apenas o primeiro resultado)
    foreach ($results as $dados) {
        $dados; // Nenhuma operação específica é realizada aqui
    }

    // Extrai os dados do primeiro personagem encontrado na API
    $nome = $dados->name;
    $altura = $dados->height;
    $peso = $dados->mass;
    $corDoCabelo = $dados->hair_color;
    $corDaPele = $dados->skin_color;
    $corDosOlhos = $dados->eye_color;
    $anoDeNascimento = $dados->birth_year;
    $sexo = $dados->gender;

    // Prepara uma string formatada para exibir os dados do personagem
    $mostrarDados = "
    
    <h2>Nome: $nome</h2>
    <h2>Altura: $altura</h2>
    <h2>Peso: $peso</h2>
    <h2>Cor do Cabelo: $corDoCabelo</h2>
    <h2>Cor da Pele: $corDaPele</h2>
    <h2>Cor dos Olhos: $corDosOlhos</h2>
    <h2>Ano do Nascimento: $anoDeNascimento</h2>
    <h2>Sexo: $sexo</h2>
    
    ";
} else {
    // Caso o campo 'urlNome' esteja vazio, define $dados como 0 e a string a ser mostrada como vazia
    $dados = 0;
    $mostrarDados = '';
}
?>

<html>

<head>
    <title>Personagens de Star Wars</title>
</head>

<body style="background-color: A4A4A4">

    <h1 style="text-align: center;"><span style="color: #f1c232;">Buscar Dados de Personagem do Star Wars</span></h1>

    <br />

    <center>
        <form action="" method="post">
            Nome:
            <input type=text name=urlNome>
            <input type=submit value="Buscar">
        </form>
    </center>

    <?php echo $mostrarDados ?>

</body>

</html>
