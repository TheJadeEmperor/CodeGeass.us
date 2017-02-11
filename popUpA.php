<style>
h1 {
    color: #000000;
}

.activeField {
    background: #FFFFFF;
    height: 20px;
}

.activeField:hover  {
    background: #FFFF99;
    heightL 20px; 
}

.formField {
    margin: 0 15px 0 15px;
}

p {
    font-size: 14px; 
    color: #FFFFFF; 
}

.optin {
    background-color: #000000;
}
</style>

<body>
<center>
    <p>&nbsp;</p>
    <h1>Join the Anime Newsletter! </h1><br />
</center>
<table class="optin">
<tr valign="top">
    <td>
        
    <object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/yTC-kemSGCY&amp;hl=en_US&amp;fs=1"></param>
    <param name="allowFullScreen" value="true"></param>
    <param name="allowscriptaccess" value="always"></param>
    <embed src="http://www.youtube.com/v/yTC-kemSGCY&amp;hl=en_US&amp;fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" 
    allowfullscreen="true" width="480" height="385"></embed></object>
    </td
    <td width="10px"></td>
    <td align="left">
        
        <img src="<?=$dir?>images/redArrow.gif" width="260px" />
        <div class="formField">
            <p>Want to download the latest Code Geass Episodes of Bokoku no Akito?
                <br /><br />Then sign up to our newsletters - there's lots of free stuff to
                download!</p><br />
        </div>
        <form method="post" action="http://www.trafficwave.net/cgi-bin/autoresp/inforeq.cgi">
        
        <div class="formField">
        <p>Email address: <br />
            <input type="text" id="da_email" name="da_email" class="activeField" size="30"
            value="Enter your email" onclick="this.value=''"></p>
        </div>
        <br />

        <center><input type="submit" value=" Join Now " id="submit" name="subscribe" class="joinNow"></center>
        
        <input type=hidden name="da_name" value="Anime Fan">
        <input type=hidden name="trwvid" value="theemperor">
        <input type=hidden name="series" value="animeforum">
        <input type=hidden name="da_cust1" value="popUp">
        <input type=hidden name="da_cust2" value="<?=$_SERVER[HTTP_REFERER]?>">
        <input type=hidden name="subscrLandingURL" value="http://codegeass.us/media/downloads/">
        <input type=hidden name="confirmLandingURL" value="http://codegeass.us/media/downloads/">
    </form>
    
    </td>
</tr>
</table>
</body>