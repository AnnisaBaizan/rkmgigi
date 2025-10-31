<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('konversi_tanggal'))
{
    function konversi_tanggal($tanggal = '')
    {
        return substr($tanggal, 8,2)."/".substr($tanggal, 5,2)."/".substr($tanggal, 0,4);
    }   
}
