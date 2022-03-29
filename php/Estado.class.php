<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ESTADO</title>
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

        class Estado {
            public $id;
            public $nome;
            public $sigla;

            public function __construct($id, $nome, $sigla) {
                $this->setId($id);
                $this->setNome($nome);
                $this->setSigla($sigla);
            }

            // public function __toString() {
            //     $str = "<br>\n ID: ".$this->id."<br>\n Nome: ".$this->nome."<br>\n Sigla: ".$this->sigla;
            //     return $str;
            // }

            public function setId($newId) {
                return $this->id = $newId;
            }

            public function setNome($newNome) {
                return $this->nome = $newNome;
            }

            public function setSigla($newSigla) {
                return $this->sigla = $newSigla;
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

            public function getSigla() {
                if($this->sigla != "") {
                    return $this->sigla;
                } else {
                    return "Não informado";
                }
            }

            public function inserir(){
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('INSERT INTO Estado (EstadoNome, EstadoSigla) VALUES(:EstadoNome, :EstadoSigla)');
                $stmt->bindParam(':EstadoNome', $this->getNome(), PDO::PARAM_STR);
                $stmt->bindParam(':EstadoSigla', $this->getSigla(), PDO::PARAM_STR);
                return $stmt->execute();
            }

            public function atualizar() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare("UPDATE `auladia15`.`Estado` SET `EstadoNome` = :EstadoNome, `EstadoSigla` = :EstadoSigla WHERE (`EstadoID` = :CidadeID);");
                $stmt->bindParam(':CidadeID', $this->id, PDO::PARAM_INT);
                $stmt->bindParam(':EstadoNome', $this->nome, PDO::PARAM_STR);
                $stmt->bindParam(':EstadoSigla', $this->sigla, PDO::PARAM_STR);
                $stmt->execute();
            }

            public function deletar() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare("DELETE FROM `auladia15`.`Estado` WHERE EstadoID = :EstadoID");
                $stmt->bindParam(':EstadoID', $this->id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->execute();
            }
        }

        // $pdo = Conexao::getInstance();
        // $consulta = $pdo->query("SELECT * FROM estado");

        // while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        //     $x++;
        //     $estado[$x] = new Estado($linha['EstadoID'], $linha['EstadoNome'], $linha['EstadoSigla']);
        //     echo $estado[$x]."<br>\n";

        // }

    ?>
    </div>
</body>
</html>