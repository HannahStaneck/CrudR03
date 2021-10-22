<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Dados pessoas";
   $find = isset($_POST["find"]) ? $_POST["find"] : ""; 
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
        <input type="text"   name="find" id="find" size="37" value="<?php echo $find;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
        <tr><td><b>Id</b></td><td><b>Nome</b></td><td><b>Hora de entrada</b></td><td><b>Hora de saída</b></td> </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            $consulta = $pdo->query("SELECT * FROM pessoa 
                                     WHERE nome LIKE '$find%' 
                                     ORDER BY id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['horaEntrada'];?></td>
            <td><?php echo $linha['horaSaida'];?></td>
        </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>