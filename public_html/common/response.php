<?php
/**
 * function for sendning response to uesr
 */
function sendResponse($resp_code,$data,$message){
    http_response_code($resp_code);
    echo json_encode(array('code'=>$resp_code,'message'=>$message,'data'=>$data));
}
