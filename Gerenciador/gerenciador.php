<?php

session_start();

if ( !isset($_SESSION['tasks']) ) {
    $_SESSION['tasks'] = array();
}

if ( isset($_GET['task_name']) ) {
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if ( isset($_GET['clear']) ) {
    unset($_SESSION['tasks']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <title>Gerenciador de Tartefas</title>
    <style>
    {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #f3f3f5;
    color: #333;
    font-family: "Trirong", serif;
}

.container {
    background: #fff;
    max-width: 450px;
    margin-top: 5%;
    margin-left: auto;
    margin-right: auto;
    padding: 12px;
}

.header {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 4px;
    margin-bottom: 4px;
}

.form{
    margin-top: 4px;
    margin-bottom: 4px;
}

.form form {
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.form label{
    font-weight: bold;
    margin-top: 4px;
    margin-bottom: 4px;
}

.form input{
    height: 32px;
    margin-top: 4px;
    margin-bottom: 4px;
    padding-left: 12px;
    border: 1px solid #999;
    border-radius: 4px;
}

.form input:focus{
    /* Muda a cor da caixa de texto quando pressiona o cursor emcima */
    background: #f0f0f5;
}

.form button{
    background: #AB47BC;
    height: 32px;
    border: none;
    border-radius: 4px;
    color: #FFF;
    margin-top: 4px;
    margin-bottom: 4px;

    transition: background 0.3s;
}

.form button:hover{
    background: #CE93D8;
}

.separator{
    /* Linha separatória embaixo do botão */
    background: #bbb;
    height: 2px;
    border-radius: 1px;
}

.list-tasks{
    margin-top: 12px;
    margin-bottom: 12px;
}

.list-tasks ul{
    list-style: none;
}

.list-tasks ul li {
    background: #4DB6AC;
    height: 54px;
    border-radius: 4px;
    color: #FFF;
    margin-top: 4px;
    margin-bottom: 4px;
    padding: 12px;

    display: flex;
    justify-content: left;
    align-items: center;

    transition: background 0.3s;
}

.list-tasks ul li:hover {
    background: #88CBC4;
}

.btn-clear{
    background: #EF5350;
    height: 32px;
    border: none;
    border-radius: 4px;
    padding: 0 12px;
    color: #fff;

    transition: background 0.3s;
}

.btn-clear:hover{
    background: #EF9A9A;
}

.footer{
    background: #f0f0f5;
    border-radius: 4px;
    padding: 12px;
}

.footer p {
    color: 999;
    font-size: 12px;
}
</style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="form">
            <form action="" method="get">
                <label for="task_name">Tarefa:</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="separator">
        </div>
        <div class="list-tasks">
            <?php
            if ( isset($_SESSION['tasks']) ) {
                echo "<ul>";

                foreach ( $_SESSION['tasks'] as $key => $task ) {
                    echo "<li>$task</li>";
                }

                echo "</ul>";
            }

            ?>

            <form action="" method="get">
                <input type="hidden" name="clear" value="clear">
                <button type="submit" class="btn-clear">Limpar Tarefas</button>
            </form>
        </div>
        <div class="footer">
            <p>Desenvolvido por @nomedodev</p>
        </div>
    </div>

</body>

</html>