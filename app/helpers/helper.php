<?php

use function GuzzleHttp\Promise\exception_for;

function getUniquefilename($filepath,$file)
{
// $tmp="user-file_" . time() . '.' . $file->extension();
$tmp="";
try
{
$f=$file->getClientOriginalName();
$tmp=substr($f,0,strlen($f)-4) . "_" . time() . '.' . $file->extension();
$file->move($filepath,$tmp);

}
catch(\Exception $e)
{
    $tmp=null;
}
    return $tmp;
}


function get_photo_path()
{

    return "Uploads/Users/";
}

function get_Products_photo_Upload_path()
{

    return "Uploads/Products/";
}
function get_Products_photo_URL_path()
{

    return "/Uploads/Products/";
}