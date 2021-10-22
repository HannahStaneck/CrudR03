<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Dados times";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
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
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
        <tr><td><b>Id</b></td><td><b>Nome</b></td><td><b>Cidade</b></td><td><b>Pontos</b></td><td><b>Data de fundação</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            $consulta = $pdo->query("SELECT * FROM timesF 
                                     WHERE nome LIKE '$procurar%' 
                                     ORDER BY id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['cidade'];?></td>
            <td><?php echo $linha['pontos'];?></td>
            <td><?php echo $linha['dataFundação'];?></td>
        </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>