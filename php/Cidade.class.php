<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CIDADE</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='../css/cadastro.css'>
    <script src='../js/main.js'></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
</head>
<body>
    <header>
        <?php include_once "menu.php"; ?>
    </header>
    <div style="padding: 0vw 10vw;">
    <?php 
        include_once "../conf/default.inc.php";
        require_once "../conf/Conexao.php";
        $x = 0;

        class Cidade {
            private $id;
            private $nome;
            private $estadoId;

            public function __construct($id, $nome, $estadoId) {
                $this->id = $id;
                $this->nome = $nome;
                $this->estadoId = $estadoId;
            }

            public function __toString() {
                $str = "<br>\n ID: ".$this->id."<br>\n Nome: ".$this->nome."<br>\n EstadoID: ".$this->estadoId;
                return $str;
            }

            public function inserir() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('INSERT INTO Cidade (CidadeNome, EstadoID) VALUES(:CidadeNome, :EstadoID)');
                $stmt->bindParam(':CidadeNome', $this->nome, PDO::PARAM_STR);
                $stmt->bindParam(':EstadoID', $this->estadoId, PDO::PARAM_INT);
                return $stmt->execute();
            }

            public function atualizar() {
                $pdo = Conexao::getInstance();
                $id = $this->id;
                $cidadenome = $this->nome;
                $estadoid = $this->estadoId;
                $stmt = $pdo->query("UPDATE `auladia15`.`Cidade` SET `CidadeNome` = '$cidadenome', `EstadoID` = '$estadoid' WHERE (`CidadeID` = '$id');");
                // $stmt->bindParam(':CidadeID', $this->id, PDO::PARAM_INT);
                // $stmt->bindParam(':CidadeNome', $this->nome, PDO::PARAM_STR);
                // $stmt->bindParam(':EstadoID', $this->estadoId, PDO::PARAM_INT);
                $stmt->execute();
            }

            public function deletar() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare("DELETE FROM `auladia15`.`Cidade` WHERE CidadeID = :CidadeID");
                $stmt->bindParam(':CidadeID', $this->id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->execute();
            }
        }

        // $pdo = Conexao::getInstance();
        // $consulta = $pdo->query("SELECT * FROM cidade, estado
        //                         WHERE cidade.EstadoID = estado.EstadoID");

        // while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        //     $x++;
        //     $cidade[$x] = new Cidade($linha['CidadeNome'], $linha['CidadeNome'], $linha['EstadoID']);
        //     echo $cidade[$x]."<br>\n";

        // }

    ?>
    </div>
</body>
</html>