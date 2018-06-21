<?php

namespace App\Http;

class Ajax {
    
    public static function modalView(string $content, $js = null){
        
        return json_encode([
                    "status" => !isset($ajaxStatus) ? "sucesso" : $ajaxStatus ,
                    "message" => !isset($ajaxMessage) ? false : $ajaxMessage,
                    "content" => $content,
            ]);
    }
    
}