<?php
    require_once __DIR__ . "/../vendor/autoload.php";

    use App\Models\Usuario;
    use App\Controllers\UsuarioController;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Document</title>
</head>
<body>
<nav>
    <div class="nav-wrapper cyan">
        <a href="#" class="brand-logo">Cadastro de Cliente</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Cadastro de Cliente</a></li>
            <li><a href="#">Cadastro de Produto</a></li>
            <li><a href="#">Vendas</a></li>
        </ul>
    </div>
</nav>
<div class="row">

    <?php
    //singleton
    //insert into cliente (nome, telefone, email, endereco) values ('renato', '64992481630', 'renato.abreu@ifg.edu.br', 'Rua x Ny')
        if (isset($_POST['enviar'])){

            $usuario = new Usuario();
            $usuario->setNome($_POST['nome']);
            $usuario->setTelefone($_POST['telefone']);
            $usuario->setEmail($_POST['email']);
            $usuario->setSenha($_POST['senha']);


            echo "Nome: " . $_POST['nome'] . "<br>";
            echo "Telefone: " . $_POST['telefone'] . "<br>";
            echo "Email: " . $_POST['email'] . "<br>";
            echo "Senha: " . $_POST['senha'] . "<br>";

            echo UsuarioController::getInstance()->inserir($usuario);
        }
    ?>
    <form action="#" method="post" class="col s6 offset-s3">
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" name="nome">
                <label for="icon_prefix">Nome</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">phone</i>
                <input id="icon_prefix" type="text" class="validate" name="telefone">
                <label for="icon_prefix">Telefone</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="icon_prefix" type="email" class="validate" name="email">
                <label for="icon_prefix">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="senha" type="password" class="validate" name="senha">
                <label for="senha">Senha</label>
            </div>
        </div>
        <div class="row">
            <a href="#" class="btn waves-effect waves-light red"><i class="material-icons left">cancel</i>Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit" name="enviar">Enviar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
