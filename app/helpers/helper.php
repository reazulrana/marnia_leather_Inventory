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