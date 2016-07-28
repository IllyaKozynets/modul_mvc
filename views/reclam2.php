<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>
</head>
<div class="col-md-2 col-fix">
    <?php $b=$reclam[1]['id'];?>
    <div class="img link-1" onClick="document.location='/reclam/<?php echo $b?>'">
        <?php echo $reclam[1]['name']?><br>
        <?php echo $reclam[1]['firm']?><br>
        <?php echo '<p class="1">'.$reclam[1]['price'].'</p>'?> грн.<br><br>
    </div>
    <div class="hidden2" style="display: none;">
        <p>Вам начислен купон на скидку -10%</p>
    </div>
    <?php for ($i=5;$i<=7;$i++):?>
        <?php $b=reclam[$i]['id'];?>
        <div onClick="document.location='/reclam/<?php echo $b?>'" class="img link-<?php echo $i?>">
            <?php echo $reclam[$i]['name']?><br>
            <?php echo $reclam[$i]['firm']?><br>
            <br>
            <p class="<?php echo $i?>"><?php echo $reclam[$i]['price']?></p>грн
        </div>
    <?php endfor;?>
</div>

