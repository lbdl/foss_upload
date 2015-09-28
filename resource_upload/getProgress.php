<?php
/**
 * Created by BITE-Software Ltd.
 * User: timS
 * Date: 29/09/15
 * Time: 00:08
 */

if(isset($_GET['progress_key'])) {

    $status = apc_fetch('upload_'.$_GET['progress_key']);
    echo $status['current']/$status['total']*100;

}