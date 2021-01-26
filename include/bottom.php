<?php

?>
</td>
<td width="5px"></td>
<td align="right" width="220">
    <div id="left">

    <div class="moduleGreen"><h2>Featured Product</h2>
        <div><?=featuredProduct($conn)?></div>
    </div>
        
    <br />

    <?
    if(0) {
    ?>
        <div class="moduleGreen" title="Code Geass Sites">
            <a href="<?=$dir?>allies/list.php"><h2>Top Affiliates</h2></a>
            <div><?=topAllies($dir)?></div>
        </div>
        <br />
    <?
    }
    ?>
  
    <div class="moduleGreen"><a href="<?$dir?>media/music/ost.php" title="Code Geass OST">
        <h2>Featured Track</h2></a>
        <div><?=featuredTrack($dir)?></div>
    </div>
    <br />

    <?
    $headline = 'Donate to Our Cause';
    echo donateButton ($headline);
    ?>
   
    <br />


    <div class="moduleBlack">
        <?php
        echo '
            <a href="'.$dir.'about/fanart" title="Lelouch Fanart"><h2>Featured Fanart</h2></a>
            <center>'.popUpImg('images/menu/emp1.jpg', 'images/menu/emp2.jpg', "The Emperor's Birthday").'
            <br /><p>Picture drawn by Kaito_Shion</p></center>';
        ?>
    </div>
     
    </td>
</tr>
</table>
<br /><br />

<div id="page_footer" title="Code Geass">

    <div class="footer_item copyright"> CodeGeass.info &copy; Copyright by <a href="mailto:<?=$supportEmail?>">TheEmperor</a><br />Concept design by Shadowboy</div>
    
    <div class="footer_item empire">CodeGeass.info is part of the <a href="https://AnimeFanservice.rg">Anime Empire</a></div>
    
    <div class="footer_item social_media">   
        <div class="social_media_header">
            <ul>
                <li><a href="https://www.youtube.com/channel/UCoUMU1nKObhrVmnN7RKdtmg" target="_BLANK"><i class="fa fa-youtube"></i></a></li>
                
                <li><a href="https://www.instagram.com/anime.motivation.quotes/" target="_BLANK"><i class="fa fa-instagram"></i></a></li>

                <li><a href="https://www.etsy.com/shop/AnimeEmpireShop"><i class="fa fa-cart-plus"></i></a></li>
                
                <li><a href="<?php echo $site_url?>/download"><i class="fa fa-envelope-open"></i></a></li>
            </ul>
        </div>
    </div>
 
</div>
</div><!--Container-->
</center>

</body>
</html>