<?php
    // session_start();
    if(isset($_SESSION['alert'])){
        echo' <section class="alert">
                <div>
                '.$_SESSION['alert'].'
                </div>
                <span class="closeAlert" id="closeAlert">&times;</span>
            </section>';
            unset($_SESSION['alert']);
    }

?>