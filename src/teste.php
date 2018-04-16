<?php 

function getAvatar() {
    $email   = 'ebertton@gmail.com'; // e-mail de cadastro para pegar as imagens
    $default = ''; // imagem alternativa para se não existir
    $size    = 200; // tamanho da imagem
    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) .
    "?d=" . urlencode( $default ) . "&s=" . $size;
    return $grav_url;
}

$teste = getAvatar();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<img src="<?php echo $teste; ?>" alt="" />
</body>
</html>


