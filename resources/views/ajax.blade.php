<?php

if (!isset($ajaxStatus)) {
    $status = "sucesso";
} else {
    $status = $ajaxStatus;
}

if (!isset($ajaxMessage)) {
    $message = 'false';
} else {
    $message = $ajaxMessage;
}

/*if (isset($js)) {
    $content .= " " . $js;
}

if (isset($css)) {
    $content .= " " . $css;
}*/

?>

{
    "status" => "{{$status}}",
    "message" => {{$message}},
    "content" => '@yield('content')'
}