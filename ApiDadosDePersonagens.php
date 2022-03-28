<?php

if (isset($_POST['urlNome'])) {

    $urlNome = $_POST['urlNome'];

    $urlNomeSemEspaco = str_replace(' ', '%20', $urlNome);
} else {

    $urlNomeSemEspaco = "";
}


$jsonWrl = file_get_contents("https://swapi.dev/api/people/?search=" . $urlNomeSemEspaco . "&format=json");


$jsonData = json_decode($jsonWrl);

$results = $jsonData->results;

$nome = '';
$altura = '';
$peso = '';
$corDoCabelo = '';
$corDaPele = '';
$corDosOlhos = '';
$anoDeNascimento = '';
$sexo = '';

if ($urlNomeSemEspaco != "") {

    foreach ($results as $dados) {
        $dados;
    }

    $nome = $dados->name;
    $altura = $dados->height;
    $peso = $dados->mass;
    $corDoCabelo = $dados->hair_color;
    $corDaPele = $dados->skin_color;
    $corDosOlhos = $dados->eye_color;
    $anoDeNascimento = $dados->birth_year;
    $sexo = $dados->gender;

    $mostrarDados = "
    
    <h2>Nome: $nome</h2>
    <h2>Altura: $altura</h2>
    <h2>Peso: $peso</h2>
    <h2>Cor do Cabelo: $corDoCabelo</h2>
    <h2>Cor da Pele: $corDaPele</h2>
    <h2>Cor dos Olhos: $corDosOlhos</h2>
    <h2>Ano do Nacimento: $anoDeNascimento</h2>
    <h2>Sexo: $sexo</h2>
    
    ";
} else {
    $dados = 0;

    $mostrarDados = '';
}


?>

<html>

<head>

    <title>Personagens de Star Wars</title>

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

</head>

</html>