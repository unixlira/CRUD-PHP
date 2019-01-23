<?php

$conecta = mysqli_connect('127.0.0.1', 'unixlira', '#', 'new_way');
if (mysqli_connect_errno()) {
    die('Conexão Falhou: '.mysqli_connect_errno());
}
