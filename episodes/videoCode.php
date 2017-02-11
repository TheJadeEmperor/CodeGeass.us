<? 
include($dir.'episodes/episodeCode.php');
include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);

switch($season)
{
	case "1":
	{

		switch($episode)
		{
 
			case "2":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/BR4P85eFu0w&hl=en&fs=1'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/BR4P85eFu0w&hl=en&fs=1' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=BR4P85eFu0w";
				$main[jap] = "http://www.youtube.com/watch?v=1SRqtNVca0U";
				
				$second[video] = embedStageVu("bcwaivznlgiy", 720, 596);				
				$second[jap] = "http://stagevu.com/video/bcwaivznlgiy";
				break;
			case "3":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/BT7Svu9p4GY&hl=en&fs=1'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/BT7Svu9p4GY&hl=en&fs=1' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=BT7Svu9p4GY";
				$main[jap] = "http://www.youtube.com/watch?v=O1zeRGApv2k";
				
				$second[video] = embedStageVu("xzodfqbhgeca", 720, 596);
				$second[jap] = "http://stagevu.com/video/xzodfqbhgeca";
				break;	
			case "3.25": 
				$main[video] = '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/mMb8Q5hv5AU&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/mMb8Q5hv5AU&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
				$main[eng] = "http://www.youtube.com/watch?v=mMb8Q5hv5AU";
				break;
			case "4":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/OjJ7NBAxyic&hl=en&fs=1'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/OjJ7NBAxyic&hl=en&fs=1' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=OjJ7NBAxyic";
				$main[jap] = "http://www.youtube.com/watch?v=WyrYyXwo_Co";
				
				$second[video] = embedStageVu("grnhkotyjpkt", 720, 590);
				$second[jap] = "http://stagevu.com/video/grnhkotyjpkt";				
				break; 
			case "4.33":
				$main[video] = '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/oSJw6vUgs1A&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/oSJw6vUgs1A&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
				$main[eng] = 'http://www.youtube.com/watch?v=oSJw6vUgs1A';
				break;
			case "5":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/oVZSAfCJsys&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/oVZSAfCJsys&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=oVZSAfCJsys";
				$main[jap] = "http://www.youtube.com/watch?v=AnLq7yObbwc";

				$second[video] = embedStageVu("ubmnetrecmmz", 720, 560);
				$second[jap] = "http://stagevu.com/video/ubmnetrecmmz";
				break;
			case "6":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/xmzBuZObtaM&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/xmzBuZObtaM&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[jap] = "http://www.youtube.com/watch?v=TwsrHmGMJTY";
				$main[eng] = "http://www.youtube.com/watch?v=xmzBuZObtaM";

				$second[video] = embedStageVu("uicssctfshdb", 720, 560);
				$second[jap] = "http://stagevu.com/video/uicssctfshdb";
				break;
			case "6.75":
				$string = "XxfdTQZYaOs";
				$main[video] = embedYoutube($string, 560, 340);
				$main[eng] = 'http://www.youtube.com/watch?v='.$string;
				break;
			case "7":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/ue2RAR8IusU&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/ue2RAR8IusU&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=ue2RAR8IusU";
				$main[jap] = "http://www.youtube.com/watch?v=C-FH_CXnP_E";

				$second[video] = embedStageVu("lawmmewefwqv", 720, 560);
				$second[jap] = "http://stagevu.com/video/lawmmewefwqv";
				break;
			case "8":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/ksLkPS965dM&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/ksLkPS965dM&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=ksLkPS965dM";
				$main[jap] = "http://www.youtube.com/watch?v=pWvNJbJ4S_A";

				$second[video] = embedStageVu("dtdrvaqvwvqi", 720, 560);
				$second[jap] = "http://stagevu.com/video/dtdrvaqvwvqi";
				break; 
			case "8.75":
				$string = "hog9II9Vm2o";
				$main[video] = embedYoutube($string, 560, 340);
				$main[eng] = 'http://www.youtube.com/watch?v='.$string;
				break;
			case "9":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/KwptOVewWVY&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/KwptOVewWVY&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=KwptOVewWVY";
				$main[jap] = "http://www.youtube.com/watch?v=qqL4hwxM4n4";
				
				$second[video] = embedStageVu("mbewpjlqsprs", 720, 560);
				$second[jap] = "http://stagevu.com/video/mbewpjlqsprs";
				break;
			case "9.33":
				$string = "DCBHA4mnNnE";
				$main[video] = embedYoutube($string, 560, 340);
				$main[eng] = 'http://www.youtube.com/watch?v='.$string;
				break;
			case "9.75":
				$string = "PfeAph-NYbg";
				$main[video] = embedYoutube($string, 560, 340);
				$main[eng] = 'http://www.youtube.com/watch?v='.$string;
				break;
			case "10":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/xrpX0ud-yWo&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/xrpX0ud-yWo&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=xrpX0ud-yWo";
				$main[jap] = "http://www.youtube.com/watch?v=N3nl36FfMq8";
				
				$second[video] = embedStageVu("dihulpqkygqs", 720, 560);
				$second[jap] = "http://stagevu.com/video/dihulpqkygqs";
				break;
			case "11":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/pZra2GW9oK4&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/pZra2GW9oK4&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=pZra2GW9oK4";
				$main[jap] = "http://www.youtube.com/watch?v=eAR8hERL3Ko";
				
				$string = "gwveglstnmaa";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "12":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/_GS0ftz44Zw&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/_GS0ftz44Zw&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=_GS0ftz44Zw";
				$main[jap] = "http://www.youtube.com/watch?v=OcRzOn2M23w";
				
				$string = "aakcknquslmf";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "13":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/_sL2W7SRM7U&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/_sL2W7SRM7U&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=_sL2W7SRM7U";
				$main[jap] = "http://www.youtube.com/watch?v=Bwo7oTUwCbg";
				
				$string = "equmkexpwkxo";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "14":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/A2kCBQDvsk4&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/A2kCBQDvsk4&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=A2kCBQDvsk4";
				$main[jap] = "http://www.youtube.com/watch?v=_fTprZ-2sBc";
				
				$string = "gcgmmmfetqow";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "15":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/HJ3YaL8Eh-o&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/HJ3YaL8Eh-o&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=HJ3YaL8Eh-o";
				$main[jap] = "http://www.youtube.com/watch?v=xuCNHFMKwEA";
				
				$string = "hufpmrdlxyhl";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "16":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/rwSvqxCj_Fk&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/rwSvqxCj_Fk&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=rwSvqxCj_Fk";
				$main[jap] = "http://www.youtube.com/watch?v=YQgD8VwZjII";
				
				$string = "qgsctacyveaf";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "17":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/h3EbYHHpwXs&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/h3EbYHHpwXs&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=h3EbYHHpwXs";
				$main[jap] = "http://www.youtube.com/watch?v=-C4Mj68Bdzw";
				
				$string = "oxkwgqothkhm";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "18":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/--aPYvA0Fvc&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/--aPYvA0Fvc&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=--aPYvA0Fvc";
				$main[jap] = "http://www.youtube.com/watch?v=t8jz8PFHdZg";
				
				$string = "vuxldrgxgeeg";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "19":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/3oUokhLOSrg&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/3oUokhLOSrg&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=3oUokhLOSrg";
				$main[jap] = "http://www.youtube.com/watch?v=0s3c-DMomGM";
				
				$string = "fjixljmclpns";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "20":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/cjBODI5-auc&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/cjBODI5-auc&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=cjBODI5-auc";
				$main[jap] = "http://www.youtube.com/watch?v=JmpoQqMYL5g";
				
				$string = "uid=sulnwchzgwly";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "21":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/MuR-t4aNFJ4&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/MuR-t4aNFJ4&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=MuR-t4aNFJ4";
				$main[jap] = "http://www.youtube.com/watch?v=_h-vq-c0oDI";
				
				$string = "sqmtulzxotil";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "22":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/78CzAROPlok&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/78CzAROPlok&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=78CzAROPlok";
				$main[jap] = "http://www.youtube.com/watch?v=P9tyW2TBim8";
				
				$string = "bpkamlenowre";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "22.25":
				$string = "";
				$main[video] = embedYoutube($string, 560, 340);
				$main[eng] = 'http://www.youtube.com/watch?v='.$string;
				break;	
			case "23":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/KeKn91zt5SA&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/KeKn91zt5SA&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=KeKn91zt5SA";
				$main[jap] = "http://www.youtube.com/watch?v=Xz0fIJF-tZM";
				
				$string = "nrmnkrcqelik";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "23.95":
				$string = "OY2mlScYvDA";
				$main[video] = embedYoutube($string, 560, 340);
				$main[eng] = 'http://www.youtube.com/watch?v='.$string;
				break;
			case "24":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/7cZFzrkTW7c&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/7cZFzrkTW7c&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=7cZFzrkTW7c";
				$main[jap] = "http://www.youtube.com/watch?v=VFHe7sR5lLY";
				
				$string = "tthvgzzcstwq";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			case "25":
				$main[video] = "<object width='560' height='340'><param name='movie' value='http://www.youtube.com/v/IatgCftcqpM&hl=en&fs=1&'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/IatgCftcqpM&hl=en&fs=1&' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='560' height='340'></embed></object>";
				$main[eng] = "http://www.youtube.com/watch?v=IatgCftcqpM";
				$main[jap] = "http://www.youtube.com/watch?v=N98OJSmAlh8";
				
				$string = "tthvgzzcstwq";
				$second[video] = embedStageVu($string, 720, 560);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
		}//switch
		break;
	}//case "1":
	case "2":
	{
		$source = "http://www.megavideo.com";
		$second[source] = "http://www.stagevu.com";
		switch($episode)
		{
 
			case "1":
			{	
 
				$string = "iuopuzewolva";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//case "1":
			case "2":
			{
 
				$string = "avlzhmyrcfey";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//case "2":
			case "3":
			{
 
				$string = "ajukdvvdqlzr";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "4":
			{
 
				$string = "fsqvdysovybb";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "5":
			{
 
				$string = "kzvtkctwrteo";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;break;
			}
			case "6":
			{
 
				$string = "fqdjlqizsqkn";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;break;
			}
			case "7":
			{
 
				
				$string = "fveegoubrlxg";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "7.19":
			{
 
				break;
			}
			case "8":
			{				
				$main[video] = embedMegaVideo("VLJT92SU076551757072c5a351c58be479c072a8");
				$main[eng] = "http://www.megavideo.com/?v=VLJT92SU";
				
				$string = "gnevbsdiwxkh";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "9":
			{
				$main[video] = embedMegaVideo("0V16BNB5b8271cfbb48790ba887da7e9dbaf6f3e");
				$main[eng] = "http://www.megavideo.com/?v=0V16BNB5";
				
				$string = "gdcpynywddtw";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "10":
			{
				$main[video] = embedMegaVideo("NUNF4ULHf62b0abef430b24d51b6cb776ded3376");
				$main[eng] = "http://www.megavideo.com/?v=NUNF4ULH";
				
				$string = "ueygrfwkrdrl";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "11":
			{
 
				$string = "vdgfwzbudclh";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "12":
			{
 
				$string = "zeojeczfwjag3";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "12.31":
			{
 
				break;
			}
			case "13":
			{
 
				$string = "btyfizesafdv";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "14":
			{
 
				$string = "prmzaitzmwgb";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}
			case "15":
			{
 
				$string = "iqmzihjehbck";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//15
			case "16":
			{
 
				$string = "ztynrmtyuwsy";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;				
				break;
			}//16
			case "17":
			{
 
				$string = "odykeipgytpe";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//17
			case "18":
			{
 
				
				$string = "fplkfzatcrit";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//18
			case "19":
			{
 
				$string = "ajlnygblprmx";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//19
			case "20":
			{
 
				
				$string = "qwereljtancp";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//20
			case "21":
			{
 
				$string = "pnsuwmzzewym";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//21
			case "22":
			{
				$main[video] = embedMegaVideo("S92CUYTVa499ef13043dd56ab08d7906362745ec");
				$main[eng] = "http://www.megavideo.com/?v=S92CUYTV";

				$string = "atscotwxrbqh";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//22
			case "23":
			{
				$main[video] = embedMegaVideo("VD4QFZFR42e0d285d38376ae7d390cbe6111e1db");
				$main[eng] = "http://www.megavideo.com/?v=VD4QFZFR";
				
				$string = "lfdebjiwnpod";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//23
			case "24":
			{
 
				$string = "nkpkgrsefcks";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//24
			case "25":
			{
 
				$string = "ehxjrkgovzdk";
				$second[video] = embedStageVu($string, 720, 465);
				$second[jap] = "http://stagevu.com/video/".$string;
				break;
			}//25
		}//switch
	}//case "2":
}//switch

		$source = "http://youtube.com/BandaiEntertainment";
		$second[source] = "http://www.stagevu.com";

$videoText = '<strong>Discuss Episode '.$episode.' at the Anime Forum</strong><br>
	<a href="http://codegeass.us/forum/index.php?board=5.0" title="'.$links[forum][title].'" 
		class="downloadLink">'.$tvEpisodes[$season][$episode][eng].'</a>
	<br><br>
	<strong>Stream Episode 1</strong><br>
	<a href="'.$links[forum][link].'" title="'.$links[forum][title].'" class="downloadLink">
	'.$links[forum][title].'</a>';


if($info[videoType] == 'youtube')
{
	$opt = array(
		'src' => $info[video],
		'videoType' => 'youtube',
		'source' => 'http://youtube.com/BandaiEntertainment',
		'width' => 560,
		'height' => 340,
		'videoText' => $videoText
	);
}
else if($info[videoType] == 'stageVu')
{
	$opt = array(
		'src' => $info[video],
		'videoType' => 'stageVu',
		'source' => 'http://www.stagevu.com',
		'width' => 560,
		'height' => 340,
		'videoText' => $videoText
	);
}
else
{
	$opt = array(
		'src' => $info[video],
		'videoType' => 'stageVu',
		'source' => 'http://www.megavideo.com',
		'width' => 560,
		'height' => 340,
		'videoText' => $videoText
	);
}

$mainVideo = videoModule($opt);

$videoContent = '<br>
<table border="0">
<tr valign="top">
	<td align="center">'.$nextPreviousButtons.'</td>
</tr><tr valign="top">
	<td>'.$mainVideo.'</td>
</tr><tr>
	<td align="center">'.$nextPreviousButtons.'</td>
</tr>
</table><br><br><br>';


$videoContent .= chatRoom('640', '500').'<br><br>'.forumAd($links).'<br><br>'.randomStuff();  

echo $videoContent; 

include($dir.'include/bottom.php'); ?>