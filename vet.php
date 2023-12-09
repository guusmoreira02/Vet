<?php
$servername = "localhost:3000";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Função para cadastrar um animal
function cadastrarAnimal($id, $nome, $especie, $idade) {
    global $conn;
    $sql = "INSERT INTO animal (id, nome, especie, idade) VALUES ('$id', '$nome', '$especie', $idade)";
    return $conn->query($sql);
}

// Função para cadastrar um veterinário
function cadastrarVeterinario($id, $nome, $especialidade) {
    global $conn;
    $sql = "INSERT INTO veterinario (id, nome, especialidade) VALUES ('$id','$nome', '$especialidade')";
    return $conn->query($sql);
}

// Função para cadastrar uma consulta
function cadastrarConsulta($id, $id_animal, $id_vet, $data_consulta) {
    global $conn;
    $sql = "INSERT INTO consulta (id, id_animal, id_vet, data_consulta) VALUES ('$id', '$id_animal', '$id_vet', '$data_consulta')";
    return $conn->query($sql);
}

// Função para visualizar consultas, animais e veterinários
function visualizarConsultasAnimaisVeterinarios() {
    global $conn;
    $sql = "SELECT * FROM consulta";
    $result = $conn->query($sql);
    
    echo "<h2>Consultas:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | Animal ID: " . $row['id_animal'] . " | Veterinário ID: " . $row['id_vet'] . " | Data: " . $row['data_consulta'] . "<br>";
    }

    $sql = "SELECT * FROM animal";
    $result = $conn->query($sql);
    
    echo "<h2>Animais:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | Nome: " . $row['nome'] . " | Espécie: " . $row['especie'] . " | Idade: " . $row['idade'] . "<br>";
    }

    $sql = "SELECT * FROM veterinario";
    $result = $conn->query($sql);
    
    echo "<h2>Veterinários:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | Nome: " . $row['nome'] . " | Especialidade: " . $row['especialidade'] . "<br>";
    }
}

// Função para apagar uma consulta
function apagarConsulta($id) {
    global $conn;
    $sql = "DELETE FROM consulta WHERE id = $id";
    return $conn->query($sql);
}

// Função para apagar um animal
function apagarAnimal($id) {
    global $conn;
    $sql = "DELETE FROM animal WHERE id = $id";
    return $conn->query($sql);
}

// Função para apagar um veterinário
function apagarVeterinario($id) {
    global $conn;
    $sql = "DELETE FROM veterinario WHERE id = $id";
    return $conn->query($sql);
}
// Função para atualizar dados de um animal
function atualizarAnimal($id, $nome, $especie, $idade) {
    global $conn;
    $sql = "UPDATE animal SET id='$id', nome='$nome', especie='$especie', idade=$idade WHERE id=$id";
    return $conn->query($sql);
}

// Função para atualizar dados de um veterinário
function atualizarVeterinario($id, $nome, $especialidade) {
    global $conn;
    $sql = "UPDATE veterinario SET nome='$nome', especialidade='$especialidade' WHERE id=$id";
    return $conn->query($sql);
}

// Função para atualizar dados de uma consulta
function atualizarConsulta($id, $id_animal, $id_vet, $data_consulta) {
    global $conn;
    $sql = "UPDATE consulta SET id_animal=$id_animal, id_vet=$id_vet, data_consulta='$data_consulta' WHERE id=$id";
    return $conn->query($sql);
}


// Exemplo de uso:
visualizarConsultasAnimaisVeterinarios();

// Exemplo de cadastro:
//cadastrarAnimal(1, 'Bob', 'pASSARINHO', 10);  //id, nome, especie, idade
//cadastrarVeterinario(1, 'Dr. Pedro', 'Veterinario'); // id, nome, especialidade
//cadastrarConsulta(1, 1, 1, '2023-08-12');  // id, id animal, id veterinario, data

// Exemplo de exclusão:  por id
//apagarConsulta(1);
//apagarAnimal(1);
//apagarVeterinario(1);

// Exemplo de atualização:
//atualizarAnimal(2, 'Marley', 'Galinha', 4);
//atualizarVeterinario(2, 'Dr. Miguel', 'Medico');
atualizarConsulta(2, 3, 2, '2023-03-20');


$conn->close();
?>
