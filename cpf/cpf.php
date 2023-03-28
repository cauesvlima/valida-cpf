<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Informe o cpf</h1>
    <br>
    <form action="cpf.php" method="post" enctype="multipart/form-data">
    <input type="text" name="cpf">
    <input type="submit" name="enviar">
    </form>
</body>
</html>
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
    
    echo '<br>';
    
    echo '<br>';
    }
    $multcpf[9]=$digitocorreto1*2;
    print_r($multcpf);
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
    echo "CPF VÁLIDO";
}

else{
    echo "CPF INVÁLIDO";
}
}
    ?>