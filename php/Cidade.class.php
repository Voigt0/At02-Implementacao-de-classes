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
                $this->setId($id);
                $this->setNome($nome);
                $this->setEstadoId($estadoId);
            }

            // public function __toString() {
            //     $str = "<br>\n ID: ".$this->id."<br>\n Nome: ".$this->nome."<br>\n EstadoID: ".$this->estadoId;
            //     return $str;
            // }

            public function setId($newId) {
                return $this->id = $newId;
            }

            public function setNome($newNome) {
                return $this->nome = $newNome;
            }

            public function setEstadoId($newEstadoId) {
                return $this->estadoid = $newEstadoId;
            }

            public function getId() {
                if($this->id != "") {
                    return $this->id;
                } else {
                    return "Não informado";
                }
            }

            public function getNome() {
                if($this->nome != "") {
                    return $this->nome;
                } else {
                    return "Não informado";
                }
            }

            public function getEstadoId() {
                if($this->estadoid != "") {
                    return $this->estadoid;
                } else {
                    return "Não informado";
                }
            }


            public function inserir() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('INSERT INTO Cidade (CidadeNome, EstadoID) VALUES(:CidadeNome, :EstadoID)');
                $stmt->bindParam(':CidadeNome', $this->getNome(), PDO::PARAM_STR);
                $stmt->bindParam(':EstadoID', $this->getEstadoId(), PDO::PARAM_INT);
                return $stmt->execute();
            }

            public function atualizar() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare("UPDATE `auladia15`.`Cidade` SET `CidadeNome` = :CidadeNome, `EstadoID` = :EstadoID WHERE (`CidadeID` = :CidadeID);");
                $stmt->bindParam(':CidadeID', $this->setId($this->id), PDO::PARAM_INT);
                $stmt->bindParam(':CidadeNome', $this->setNome($this->nome), PDO::PARAM_STR);
                $stmt->bindParam(':EstadoID', $this->setEstadoId($this->estadoid), PDO::PARAM_INT);
                return $stmt->execute();
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
        //     $cidade[$x] = new Cidade($linha['CidadeID'], $linha['CidadeNome'], $linha['EstadoID']);
        //     echo $cidade[$x]."<br>\n";

        // }

    ?>
    </div>
</body>
</html>