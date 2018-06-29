<?php

namespace App\Http;

class Ajax {
    
    public static function modalView(string $content, $ajaxStatus = null, $ajaxMessage= null){
        
        return json_encode([
                    "status" => $ajaxStatus == null ? "sucesso" : $ajaxStatus ,
                    "message" => $ajaxMessage == null ? false : $ajaxMessage,
                    "content" => $content,
            ]);
    }
    
}