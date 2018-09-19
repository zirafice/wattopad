//Vkládat se bude přes include
 <?php
require_once('Db.php');
Db::connect('127.0.0.1', 'testdb', 'root', '');
if (isset($id))
{
    $rating = Db::queryOne('
            SELECT ratio
            FROM clanky
            WHERE clanek_id=?
            ', $id);
    if ($rating['ratio'] != NULL) {
    $procent = $rating['ratio']*100 . "%";
    }
    else {
        $procent = 0;
        $nehlasovano = '<div class="seda">N/A</div>';
    }
}
?>
<style>
    * {box-sizing: border-box;}
    .cervena {
        width: 100px;
        height: 10px;
        background-color: red;
        margin: -16px 0px -12px 29px;
    }.zelena {
        background-color: green;
        height: 10px;
    }
    .seda {
        background-color: lightgrey;
        height: 10px;
        font: 8px Arial;
        padding: 1px;
        width: 100px;
        text-align: center;
    }
</style>
<script>
           
        </script>
        <a href="rating.php?r=1&id=<?= $id ?>"><img src="voteup.png"></a>
        <div class="cervena">
            <div class="zelena" style="width: <?=$procent?>"><?php if (isset($nehlasovano)) {echo($nehlasovano);} ?></div></div>
        <a style="margin-left: 134px" href="rating.php?r=0&id=<?= $id ?>"><img src="votedown.png"></a>
