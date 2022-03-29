<!DOCTYPE html>
<?php
    $comando = "";
    if(isset($_POST['comando'])){$comando = $_POST['comando'];}else if(isset($_GET['comando'])){$comando = $_GET['comando'];}
    $tabela = "";
    if(isset($_POST['tabela'])){$tabela = $_POST['tabela'];}else if(isset($_GET['tabela'])){$tabela = $_GET['tabela'];}
?>
<html>
<body class="">
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    acao($comando, $tabela);

    function acao($acao, $tabela){
        if($tabela == "cidade"){
            require_once "Cidade.class.php";
        } else if($tabela == "estado"){
            require_once "Estado.class.php";
        }
        if($acao == "insert"){
            if($tabela == "cidade"){
                $cidade = new Cidade("", $_POST['CidadeNome'], $_POST['EstadoID']);
                $cidade->inserir();
            } else if($tabela == "estado") {
                $estado = new Estado("", $_POST['EstadoNome'], $_POST['EstadoSigla']);
                $estado->inserir();
            }
        }
        else if($acao == "deletar"){
            if($tabela == "cidade"){
                $cidade = new Cidade($_GET['id'], "", "");
                $cidade->deletar();
            } else if($tabela == "estado") {
                $estado = new Estado($_GET['id'], "", "");
                $estado->deletar();
            }
        }
        else if($acao == "update"){
            if($tabela == "cidade"){
                $cidade = new Cidade($_POST['id'], $_POST['CidadeNome'], $_POST['EstadoID']);
                $cidade->atualizar();
                header("location:tabelacidade.php");
            } else if($tabela == "estado") {
                $estado = new Estado($_POST['id'], $_POST['EstadoNome'], $_POST['EstadoSigla']);
                $estado->atualizar();
                header("location:tabelaestado.php");
            }
        }
    }




    

    function dados(){
        $dados = array();
        $dados['CidadeID'] = $_POST["CidadeID"];
        $dados['CidadeNome'] = $_POST["CidadeNome"];
        $dados['EstadoID'] = $_POST["EstadoID"];
        $dados['EstadoNome'] = $_POST["EstadoNome"];
        $dados['EstadoSigla'] = $_POST["EstadoSigla"];
        return $dados;
    }


    function buscarDados($id,$tabela){
        $pdo = Conexao::getInstance();
        $dados = array();
    if($tabela == 'cidade'){
        $consulta = $pdo->query("SELECT * FROM cidade, estado WHERE CidadeID = $id");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['CidadeNome'] = $linha['CidadeNome'];
            $dados['EstadoID'] = $linha['EstadoID'];
        }
    } else if($tabela == 'estado'){
        $consulta = $pdo->query("SELECT * FROM estado WHERE EstadoID = $id");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['EstadoNome'] = $linha['EstadoNome'];
            $dados['EstadoSigla'] = $linha['EstadoSigla'];
        }
    }
        return $dados;
    }
?>
</body>
</html>