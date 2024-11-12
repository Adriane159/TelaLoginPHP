<?php
    require_once '../Classes/usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>TELA CADASTRO USUÁRIO</h2>
    <form method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" placeholder="Digite o nome completo."><br>
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Digite o email."><br>
        <label>Telefone:</label><br>
        <input type="tel" name="telefone" placeholder="Digite o número do telefone."><br>
        <label>Senha:</label><br>
        <input type="password" name="senha" placeholder="Crie uma senha."><br>
        <label>Confirmar Senha:</label><br>
        <input type="password" name="confSenha" placeholder="Confirmar sua senha."><br>

        <input type="submit" value="Cadastrar">

        <p>Já cadastrado? Clique <a href="login.php">aqui</a> para acessar.</p>
 
    </form>


    <?php
        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $confirmarSenha = addslashes($_POST['confSenha']);

            if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confirmarSenha))
            {
                $usuario->conectar("cadastro140","localhost","devweb","suporte@22");
                if($usuario->msgErro == "")
                {
                    if($senha == $confirmarSenha)
                    {
                        if($usuario->cadastroUsuario($nome, $email, $telefone, $senha))
                        {
                            ?>
                            <div class="msg-erro">
                            <p>Cadastro realizado com sucesso.</p>
                            <p>Clique aqui para <a href="login.php">logar.</a></p>
                            </div>
                        <?php
                        }
                        else
                        {
                            ?>
                            <div class="msg-erro">
                                <p>Usuário já cadastado.</p>
                            </div>
                            <?php
                        }
                    
                    }
                    else
                    {
                    ?>
                        <div class="msg-erro">
                            <p>Senha e confirmar senha não conferem.</p>
                        </div>
                    <?php
                    }
                }
                else
                {
                    ?>
                        <div clas="msg-erro">
                            <?php echo "Erro:".$usuario->msgErro;?>
                        </div>
                    <?php

                }
            }
            else
            {
                ?>
                    <div class="msg-erro">
                        <p>Preencha todos os campos.</p>
                     </div>
                <?php
            }
        }

    ?>
    
</body>
</html>