<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Pesquisa carros";
   $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
   $achar = isset($_POST["achar"]) ? $_POST["achar"] : 1;
   $porcentagem = "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
</head>
<body>

    <form method="post">

    <fieldset>

        <legend><?php echo $title ?></legend>
        <input type="text"   name="pesquisa" id="pesquisa" size="37" value="<?php echo $pesquisa;?>">
        <input type="submit" name="acao"     id="acao">
        <br>
        <table>
        
        <tr>
            <td><b>Id</b></td>
            <td><b>Nome</b></td>
            <td><b>Valor</b></td>
            <td><b>Quilometragem</b></td>
            <td><b>Data fabricação</b></td> 
            <td><b>Idade do veículo</b></td> 
            <td><b>Média de km por ano</b></td>
            <td><b>Desconto</b></td>
            <td><b>Valor revenda</b></td>
        </tr>

      <form method="post">
      <legend>Método de busca: </legend>
        <input type="radio" name="achar" value="1" <?php if ($achar == 1){echo 'checked';}?>> 
        <label for="nome">Nome</label>
        <input type="radio" name="achar" value="2" <?php if ($achar == 2){echo 'checked';}?>>
        <label for="valor">Valor</label>
        <input type="radio" name="achar" value="3" <?php if ($achar == 3){echo 'checked';}?>>
        <label for="km">Quilometro</label>
      </form>

        <?php
         $pdo = Conexao::getInstance();
            if ($achar == 1 ) 
           
            $consulta = $pdo->query("SELECT * FROM carro 
                                     WHERE nome LIKE '$pesquisa%' 
                                     ORDER BY nome");
            elseif($achar == 2 )
            $consulta = $pdo->query("SELECT * FROM carro 
                                     WHERE valor <= $pesquisa
                                     ORDER BY valor");
            else
            $consulta = $pdo->query("SELECT * FROM carro 
                                     WHERE quilometro <= $pesquisa
                                     ORDER BY quilometro");

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
               
               $data = date("Y");
               $datafabricacao=date("Y",strtotime($linha['dataFabricação']));
               $idadeveculo = $data-$datafabricacao;

               $media = $linha['quilometro']/$idadeveculo;


               if ($linha['quilometro'] >= 100000) {
                  $porcentagem = "10%";
                  $revenda = $linha['valor'] - ($linha['valor'] / 100 * 10);
               }
               elseif ($idadeveculo >= 10) {
                  $porcentagem = "10%";
                  $revenda = $linha['valor'] - ($linha['valor'] / 100 * 10);
               }else{
                  $revenda = 0;
                  $porcentagem = "";
               }



               if ($linha['quilometro'] >= 100000 and $idadeveculo >= 10) {
                  $porcentagem = "20%";
               }

         ?>
        <tr>
            <td>
               <?php echo $linha['id'] ;?>
            </td>
            <td>
               <?php echo $linha['nome'];?>
            </td>
            <td>
               <?php echo number_format($linha['valor'], 3, '.' , ',');?>
            </td>
            <td class="<?php echo $classe;?>">
            <?php echo number_format($linha['quilometro'], 3, '.' , ',');?>
            </td>
            <td>
               <?php echo date("d/m/Y",strtotime($linha['dataFabricação']));?>
            </td>
            <td class="<?php echo $classe;?>">
               <?php echo $idadeveculo; ?>
            </td>
            <td>
               <?php echo number_format($media, 3, '.' , ','); ?>
            </td>
            <td>
               <?php echo $porcentagem; ?>
            </td>
            <td>
               <?php echo number_format($revenda, 3, '.' , ',');"."; ?>
           </td>
        </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>
