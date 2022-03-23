<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro Cidade</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/cadastro.css'>
    <script src='../js/main.js'></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "acao.php";
    $comando = isset($_GET['comando']) ? $_GET['comando'] : "";
    $tabela = "cidade";
    $dados;
    if ($comando == 'update'){
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id, $tabela);
    }
    $cidadeid = isset($_POST['CidadeID']) ? $_POST['CidadeID'] : "";
    $cidadenome = isset($_POST['CidadeNome']) ? $_POST['CidadeNome'] : "";
    $estadoid = isset($_POST['EstadoID']) ? $_POST['EstadoID'] : "";
?>
    <header>
        <?php include_once "menu.php"; ?>
    </header>
    <content>
    <form action="acao.php" method="post" id="form" style="padding-left: 5vw; padding-right: 5vw;">
        <h1>Cadastro Cidade</h1>
        <br>
        <div class="form-group">
        <label for="">Nome da cidade:</label>
        <input type="text" class="form-control" required type="text" name="CidadeNome" id="CidadeNome" placeholder="Digite a cidade" value="<?php if ($comando == "update"){echo $dados['CidadeNome'];}?>">
        </div>
        <label class="formItem formText" id="">Estado:</label>
        <select class="form-select" aria-label="Escolha o estado" name="EstadoID" value="">  
            <?php
                $pdo = Conexao::getInstance();
                $consulta = $pdo->query("SELECT * FROM estado");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option name="" value="<?php echo $linha['EstadoID']; ?>" <?php if ($comando == "update" && $linha['EstadoID'] == $dados['EstadoID']){echo "selected";}?>><?php echo $linha['EstadoNome'];?></option>
            <?php } ?>
        </select>
        <br>
        <input type="hidden" name="comando" id="" value="<?php if($comando == "update"){echo "update";}else{echo "insert";}?>">
        <input type="hidden" id="tabela" name="tabela" class="tabela" value="cidade">
        <input type="hidden" name="id" id="" value="<?php if($comando == "update"){echo $id;}?>">
        <button type="submit" class="btn btn-dark" id="acao" value="ENVIAR">Enviar</button>
    </form>
    </content>
    <footer class="" id="">
    </footer>
</body>
</html>