<?php

class Controles {

    //envio de arquivos
    function enviarArquivo($temporario, $endereco, $nome) {
        //se o arquivo não for enviado        
        if (!move_uploaded_file($temporario, $endereco)) {
            return 'Erro ao enviar . ' . $nome;
        } else {//conseguiu enviar
            return $nome . ' - enviado com sucesso. ';
        }
    }

    function excluirArquivo($arquivo, $nome){
        if(unlink($arquivo)){
            return $nome . ' - excluído com sucesso ';
        } else{
            return 'Erro ao excluir ' . $nome ;
        }
    }

    public static function montarUrl($str){
        $str = strtr(
        $str,
        array ("À" => "A", "Á" => "A", "Â" => "A", "Ã" => "A", "Ä" => "A", "Å" => "A",
        "Æ" => "A", "Ç" => "C", "È" => "E", "É" => "E", "Ê" => "E", "Ë" => "E",
        "Ì" => "I", "Í" => "I", "Î" => "I", "Ï" => "I", "Ð" => "D", "Ñ" => "N",
        "Ò" => "O", "Ó" => "O", "Ô" => "O", "Õ" => "O", "Ö" => "O", "Ø" => "O",
        "Ù" => "U", "Ú" => "U", "Û" => "U", "Ü" => "U", "Ý" => "Y", "Ŕ" => "R",
        "Þ" => "s", "ß" => "B", "à" => "a", "á" => "a", "â" => "a", "ã" => "a",
        "ä" => "a", "å" => "a", "æ" => "a", "ç" => "c", "è" => "e", "é" => "e",
        "ê" => "e", "ë" => "e", "ì" => "i", "í" => "i", "î" => "i", "ï" => "i",
        "ð" => "o", "ñ" => "n", "ò" => "o", "ó" => "o", "ô" => "o", "õ" => "o",
        "ö" => "o", "ø" => "o", "ù" => "u", "ú" => "u", "û" => "u", "ý" => "y",
        "þ" => "b", "ÿ" => "y", "ŕ" => "r")
        );

        return strtolower(strip_tags( preg_replace( array( "/[`^~\'”]/", "/([\s]{1,})/", "/[-]{2,}/" ), array( null, "-", "-" ), $str ) ) );
    }
}
