<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Dados de vendedores";
   $achar = isset($_POST["achar"]) ? $_POST["achar"] : ""; 
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
    <?php include "menu.php"; ?>
    <form method="post">
    <fieldset>
        <legend><?php echo $title ?></legend>
        <input type="text"   name="achar" id="achar" size="37" value="<?php echo $achar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
        <tr><td><b>Id</b></td><td><b>Nome</b></td><td><b>Usuário</b></td><td><b>Senha</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            $consulta = $pdo->query("SELECT * FROM vendedor 
                                     WHERE nome LIKE '$achar%' 
                                     ORDER BY id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['usuario'];?></td>
            <td><?php echo $linha['senha'];?></td>
        </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>