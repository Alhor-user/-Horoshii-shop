<?php 
    function closesession() {
        session_abort ();
    }
?>
<div style="height: 30px; background-color: #39f; position: relative;">
    <a style="color: white; margin-right: 10px; margin-top: 2px; position: absolute; right: 10px; font-size: 18px;" onclick="closesession()">Выйти</a>
</div>