<?php

?>
</td>
<td width="5px"></td>
<td align="right" width="220">
    <div id="left">

    <div class="moduleGreen"><h2>Featured Product</h2>
        <div><?=featuredAmazon($conn)?></div>
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
    <table border="0" width="900px">
        <tr valign="middle">
            <td>
                <table border="0" height="" width="100%">
                    <tr valign="top">
                        <td width="5px"></td>
                        <td id="rights" width="300px">
                            CodeGeass.info &copy; Copyright by <a href="mailto:<?=$supportEmail?>">TheEmperor</a><br />
                            Concept design by Shadowboy
                        </td><td width="20px"></td>
                        <td>
                            
                            CodeGeass.info is part of the <a href="https://AnimeFanservice.rg">Anime Empire</a>
                            
                        </td><td width="150px">
                        </td>
                        <td align="right" valign="center" rowspan="2">

                            <div id="eXTReMe"><a href="http://extremetracking.com/open?login=geass" target="_blank">
                                <img src="https://t1.extreme-dm.com/i.gif" style="border: 0;"
                                    height="38" width="41" id="EXim" alt="eXTReMe Tracker" /></a>
                                <script type="text/javascript"><!--
                                var EXlogin='geass' // Login
                                var EXvsrv='s10' // VServer
                                EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
                                EXb=EXs.colorDepth:EXb=EXs.pixelDepth;EXsrc="src";
                                navigator.javaEnabled()==1?EXjv="y":EXjv="n";
                                EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
                                EXd.write("<img "+EXsrc+"=http://e1.extreme-dm.com",
                                "/"+EXvsrv+".g?login="+EXlogin+"&amp;",
                                "jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
                                "l="+escape(EXd.referrer)+" height=1 width=1>");//-->
                                </script><noscript><div id="neXTReMe"><img height="1" width="1" alt="" src="http://e1.extreme-dm.com/s10.g?login=geass&amp;j=n&amp;jv=n" />
                                </div></noscript></div>

                        </td> 
                    </tr> 
                </table>        
            </td>
        </tr>
    </table>
</div>
</div><!--Container-->
</center>

</body>
</html>