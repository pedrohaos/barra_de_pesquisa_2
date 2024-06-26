<?php

include('conexao.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema de busca</title>

</head>
<body>
    <h1>Lista de Veículos</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text" id="searchInput">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Marca</th>
            <th>Veículo</th>
            <th>modelo</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM tab_avioes 
                WHERE marca LIKE '%$pesquisa%' 
                OR veiculo LIKE '%$pesquisa%'
                OR cor LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['marca']; ?></td>
                        <td><?php echo $dados['veiculo']; ?></td>
                        <td><?php echo $dados['cor']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>


</body>
</html>