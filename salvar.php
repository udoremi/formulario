<?php
    include 'conexao.php';

    date_default_timezone_set('America/Sao_Paulo');
    //verifica se os dados foram enviados
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $date = $_POST['data-nascimento'];
        $email = $_POST['email'];
        $whatsapp = $_POST['whatsapp'];
        $senha = $_POST['senha'];
        $dataHoraAtual = date('Y-m-d H:i:s');

        //criando uma nova váriavel para receber a data de nascimento
        $datanascimento = $date;
        //convertendo a nova váriavel para o objeto DateTime
        $datanascimento = new DateTime($datanascimento);
        $hoje = new DateTime('today');
        //comparando com o dia atual e tirando a diferença
        $idade = $hoje->diff($datanascimento)->y;

        if($idade < 18){
            echo "<script>alert('Apenas maiores de 18 anos podem abrir uma conta.');</script>";
            echo "<script>window.location.href = 'http://localhost/NKN_ex/index.html'</script>";
            exit;
        }

        //verificar se o email já está cadastrado, mas não é a forma mais segura
        //salva a consulta do banco na variavel result
        $result = $con->query("SELECT COUNT(*) as count FROM lead WHERE email = '$email'");
        //obtem a proxima linha do conjunto de resultados e armazena em um array associativo
        $row = $result->fetch_assoc();

        //se a contagem for maior q 0, já existe no banco
        if ($row['count'] > 0) {
            echo "<script>alert('Email já cadastrado! Por favor, use outro.');</script>";
            echo "<script>window.location.href = 'http://localhost/NKN_ex/index.html'</script>";
            exit;
        }
            

        $sql = "insert into lead (nome, dataNasc, email, senha, whatsapp, datalog) 
        values ('$nome', '$date', '$email', '$senha', '$whatsapp', '$dataHoraAtual')";

        if($con->query($sql) === true){
            echo "<script>alert('Obrigado!');
            window.location.href = 'https://www.nknbank.com.br/.';
            </script>";
        } else{
            echo "Erro ao inserir no BD";
        }

        $con->close();
    }


?>