<head>

</head>
<div class="col-md-2 col-fix">
    <?php $b=$reclam[0]['id'];?>
    <div class="img link-0" onClick="document.location='/reclam/<?php echo $b?>'">
        <?php echo $reclam[0]['name']?><br>
        <?php echo $reclam[0]['firm']?><br>
        <?php echo '<p class="0">'.$reclam[0]['price'].'</p>'?> грн.<br><br>
    </div>
    <div class="hidden1" style="display: none;">
        <p>Kупон на скидку ffht Примените и получите скидку -10%</p>
    </div>
    <?php for ($i=2;$i<=4;$i++):?>
        <?php $b=$reclam[$i]['id'];?>
        <div onClick="document.location='/reclam/<?php echo $b?>'" class="img link-<?php echo $i?>">
            <?php echo $reclam[$i]['name']?><br>
            <?php echo $reclam[$i]['firm']?><br>
            <br>
            <p class="<?php echo $i?>"><?php echo $reclam[$i]['price']?></p>грн
        </div>
    <?php endfor;?>
</div>

