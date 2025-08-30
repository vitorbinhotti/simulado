<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addTurma'])) {
        $nome = $_POST['nome'];
        $serie = $_POST['serie'];

        $sql = "INSERT INTO turmas(nome, serie) VALUES ('$nome', '$serie')";

        if ($conn->query($sql) == true) {
            echo "Registro Adicionado";
            $conn->close();
            exit();
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
            $conn->close();
        };
    };

    if (isset($_POST['addProfessor'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $materia = $_POST['materia'];
        $fk_turma = $_POST['fk_turma'];

        $sql = "INSERT INTO professores(nome, email, materia, fk_turma) VALUES ('$nome', '$email', '$materia', '$fk_turma')";

        if ($conn->query($sql) == true) {
            echo "Registro Adicionado";
            $conn->close();
            header('Location: read.php');
            exit();
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
            $conn->close();
        };
    };

    if (isset($_POST['addAluno'])) {
        $nome = $_POST['nome'];
        $fk_turma = $_POST['fk_turma'];

        $sql = "INSERT INTO alunos(nome, fk_turma) VALUES ('$nome', '$fk_turma')";

        if ($conn->query($sql) == true) {
            echo "Registro Adicionado";
            $conn->close();
            exit();
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
            $conn->close();
        };
    };

    if (isset($_POST['addAtividade'])) {
        $descricao = $_POST['descricao'];
        $fk_turma = $_POST['fk_turma'];
        $fk_professor = $_POST['fk_professor'];

        $sql = "INSERT INTO atividades(descricao, fk_turma, fk_professor) VALUES ('$descricao', '$fk_turma', '$fk_professor')";

        if ($conn->query($sql) == true) {
            echo "Registro Adicionado";
            $conn->close();
            exit();
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
            $conn->close();
        };
    };
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Registro</title>
    <link rel="stylesheet" href="./estilos/style.css">
    <link rel="stylesheet" href="./estilos/reset.css">
</head>

<body>
    <form method="POST" class="form-container">
        <label for="">
            <p>Adicionar Turma:</p>
        </label>
        <br><br>
        <input type="text" name="nome" placeholder="Digite o Nome da Turma">
        <br><br>
        <input type="text" name="serie" placeholder="Digite a Série da Turma">
        <br><br>
        <button type="submit" name="addTurma">Adicionar Turma</button>
    </form>

    <br><br>

    <form method="POST" class="form-container">
        <label for="">
            <p>Adicionar Professor:</p>
        </label>
        <br><br>
        <input type="text" name="nome" placeholder="Digite o Nome do Professor">
        <br><br>
        <input type="email" name="email" placeholder="Digite o email">
        <br><br>
        <input type="text" name="fk_turma" placeholder="ID turma">
        <br><br>
        <select name="materia">
            <option selected disabled>Selecione uma materia</option>
            <option value="ciencias">Ciências</option>
            <option value="historia">História</option>
            <option value="portugues">Português</option>
            <option value="matematica">Matemática</option>
        </select>
        <br><br>
        <button type="submit" name="addProfessor">Adicionar Turma</button>
    </form>

    <br>

    <form method="POST" class="form-container">
        <label for="">
            <p>Adicionar Aluno:</p>
        </label>
        <br><br>
        <input type="text" name="nome" placeholder="Digite o Nome do Aluno">
        <br><br>
        <input type="text" name="fk_turma" placeholder="Digite a Turma">
        <br><br>
        <button type="submit" name="addAluno">Adicionar Turma</button>
    </form>

    <br>

    <form method="POST" class="form-container">
        <label for="">
            <p>Adicionar Atividade:</p>
        </label>
        <br><br>
        <input type="text" name="descricao" placeholder="Digite a descrição">
        <br><br>
        <input type="text" name="fk_turma" placeholder="Digite a turma (ID)">
        <br><br>
        <input type="text" name="fk_professor" placeholder="Digite o professor (ID)">
        <br><br>
        <button type="submit" name="addAtividade">Adicionar Atividade</button>
    </form>
</body>

</html>