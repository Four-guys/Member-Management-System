<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2015/11/7
 * Time: 14:10
 */
function alertMes($mes,$url){
    echo "
        <script type='text/javascript'>
        alert('{$mes}');
        location.href = '{$url}';
        </script>";
    exit;
}
?>