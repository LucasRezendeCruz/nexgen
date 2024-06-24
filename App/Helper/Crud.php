<?php

use App\Library\Session;

/**
 * getStatus
 *
 * @param int $statusRegistro 
 * @return string
 */
function getStatus($statusRegistro)
{
    if ($statusRegistro == 1) {
        return "Ativo";
    } elseif ($statusRegistro == 2) {
        return "Inativo";
    } else {
        return "...";
    }
}

/**
 * formaValor
 *
 * @param float $valor 
 * @param int $decimais 
 * @return string
 */
function formataValor($valor, $decimais = 2)
    {
        // Remove qualquer ponto ou vírgula e converte para float
        $valor = str_replace(',', '.', str_replace('.', '', $valor));
        $valor = (float)$valor;

        // Formata o valor para o padrão brasileiro
        return number_format($valor, $decimais, ',', '.');
    }

/**
 * strNumber
 *
 * @param string $valor 
 * @return float
 */
function strNumber($valor) 
{
    return str_replace(",", ".", str_replace(".", "", $valor));
}

/**
 * setValor
 *
 * @param string $campo 
 * @param mixed $default 
 * @return mixed
 */
function setValor($campo, $default = "")
{
    if (isset($_POST[$campo])) {
        return $_POST[$campo];
    } else {
        return $default;
    }
}


/**
 * setValor
 *
 * @param date $data 
 * @return date
 */
function formataData($data) {
    return date("d/m/Y", strtotime($data));
}
