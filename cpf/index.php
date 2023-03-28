<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Cauê Silveira Vaz de Lima">
    <meta name="reply-to" content=" cauesvlima@gmail.com">
    <meta name="description"
        content="Fiz este código em php como um portifólio para deminstrar parte das minhas habilidades nas linguagens php, html e css">
    <meta name="keywords" content="Cauê, Validação de cpf, portifólio, github">
    <title>Validação Cpf</title>

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <!--Importação de css personalizado-->
    <link rel="stylesheet" href="./style/style.css">

    <!--Importação favicon-->
    <link rel="icon" type="image/png" href="./favicon.ico">
</head>

    <body>
        <!--Cabeçalho-->
        <header id="cabecalho">
        <h1>
                <code>
                Site que realiza a verificação de validação de CPF
                </code>
            </h1>  
        </header>
        <main>
            <form action="index.php" method="post" enctype="multipart/form-data">

                
                    <div class="corpo">
                        <div></div>
                        <p>Informe o CPF</p>
                        <input type="text" class="cpf" name="cpf">
                        <input type="submit" class="enviar" name="enviar" value="Verificar">

                       <div class="php">
                <?php
                    if(isset($_POST['enviar'])){

                    $cpf=$_POST["cpf"];
                    $cpfseparado= str_replace ('.', "", $cpf);
                    echo '<br>';
                    $multdigito=0;
                    $digitocpf=0;
                    $num_mult=10;

                    function validacao_digito1($cpfseparado){
                    $multdigito=0;
                    $digitocpf=0;
                    $num_mult=10;
                        for($multdigito=0; $multdigito<=8; $multdigito++){
                            $multcpf[$multdigito]=$cpfseparado[$digitocpf]*$num_mult;
                            $num_mult--;
                            $digitocpf++;

                    
                        }
                        $somacpf=$multcpf[0]+$multcpf[1]+$multcpf[2]+$multcpf[3]+$multcpf[4]+$multcpf[5]+$multcpf[6]+$multcpf[7]+$multcpf[8];
                    $restocpf=$somacpf%11;

                    if ($restocpf<2){
                        $digito=0;
                    }
                    else{
                        $digito=11-$restocpf;
                    }
                    return $digito;
                    }

                    $digitocorreto1= validacao_digito1($cpfseparado);


                    function validacao_digito2($cpfseparado, $digitocorreto1){
                        $multdigito=0;
                    $digitocpf=0;

                        $num_mult=11;
                    for($multdigito=0; $multdigito<=8; $multdigito++){
                        $multcpf[$multdigito]=$cpfseparado[$digitocpf]*$num_mult;
                        $num_mult--;
                        $digitocpf++;
                        
                        }
                        $multcpf[9]=$digitocorreto1*2;
                        $somacpf=$multcpf[0]+$multcpf[1]+$multcpf[2]+$multcpf[3]+$multcpf[4]+$multcpf[5]+$multcpf[6]+$multcpf[7]+$multcpf[8]+$multcpf[9];
                        $restocpf=$somacpf%11;

                        if ($restocpf<2){
                            $digito=0;
                        }
                        else{
                            $digito=11-$restocpf;
                        }
                        return $digito;
                    }
                    $digitocorreto2= validacao_digito2($cpfseparado, $digitocorreto1);

                    if($digitocorreto1==$cpfseparado[10] && $digitocorreto2==$cpfseparado[11]){
                        echo "<hr>CPF VÁLIDO<hr>";
                    }

                    else{
                        echo "<hr>CPF INVÁLIDO<hr>";
                    }
                    }
                 ?>
                </div>

               
                    
                    </div>

                    <div class="copyright">
                        <p>Desenvolvedor: Cauê Silveira Vaz de Lima</p>
                    </div>
                 
                
            
            </form>
        </main>
    </body>
</html>