<?php

function conexion($canal, $url)
{
    curl_setopt($canal, CURLOPT_URL, $url);
    curl_setopt($canal, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($canal);
}
