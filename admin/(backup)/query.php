<?php
$dir = '../';
include('adminCode.php');

session_start();
//$command = "mysql -uroot -pdaRkN1t3 nyu < test.sql ";
// system($command);

function random_char()
{
	$letters = array(1 => "a", "b", "c", "d", "e", "f", "g", "h" ,"i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z","A", "B", "C", "D", "E", "F", "G", "H" ,"I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z","0","1","2","3","4","5","6","7","8","9");
	$index = Key($letters);
	$element = Current($letters);
	$index = rand(1,62);
	$random_letter = $letters[$index];
	return $random_letter;
}

function genHash()
{
	//create random hash
	$number = 5;
	for ($i=0; $i<$number; $i++)
	{
	    $hash = $hash.(random_char());
	}
	return $hash;
}


if($_GET['h']=="")
{
	$_GET['h']=genHash();
}



if($_GET['reset_qry']!="")
{
	unset($_SESSION['test_query'][$_GET['h']]);
}


if(!(is_array($_SESSION['test_query'][$_GET['h']])))
{
	$_SESSION['test_query'][$_GET['h']]=array();
}

if($_POST['subQuery']!="")
{
	global $conn;

	$db_sel[$_POST['db_name']]=" selected ";
	$ck_csv[$_POST['ck_csv']]=" checked ";
	$ck_quotes[$_POST['ck_quotes']]=" checked ";

	switch($_POST['ck_csv'])
	{
		case "":
			$ck_bool=false;
			$cell1="<td>";
			$cell2="</td>";
			$th1="<th>";
			$th2="</th>";
			$row1="<tr>";
			$row2="</tr>";
			$impl="";
			break;
		default: //  , or |
			$ck_bool=true;
			$impl=$_POST['ck_csv'];
			$row2="\n";
			break;

	}

	if($_POST['ck_quotes']!='')
	{
		$quotes_around='"';
	}

	mysql_select_db($_POST['db_name'],$conn) or die(mysql_error());

	array_push($_SESSION['test_query'][$_GET['h']],$_POST['sql']);


	$result = mysql_query($_POST['sql'], $conn);
	if(mysql_errno($conn)!=0)
	{
		echo "MYSQL ERROR--".mysql_error();
	}
	else
	{
		if($_POST['unser']!='')
		{
			$unser_bl=true;
			$unser_ary1=explode(",",$_POST['unser']);

			foreach($unser_ary1 as $vr)
			{
				$unser_ary[$vr]='Y';

			}
		}

		//mysql_field_name($res, 0)
		$numfields = mysql_num_fields($result);
		$hd=array();
		for ($i=0; $i < $numfields; $i++) // Header
		{
			 $table_name = mysql_field_table($result, $i);
			//$col_name[]= "<th>".mysql_field_name($result, $i)."</th>";
			array_push($hd,$th1.$quotes_around.(mysql_field_name($result, $i)).$quotes_around.$th2);
		}
		$th.=$row1.(implode($impl,$hd)).$row2;

		if(mysql_num_rows($result)>0)
		{
			$res_ct=0;
			while ($row = mysql_fetch_assoc($result)) //if there is a result
			{
				$res_ct++;
				$line=array();
				$v=1;
				foreach($row as $fld)
				{

					if(($unser_bl) && ($unser_ary[$v]!='') && ($fld!=''))
					{

						//$fld='<pre>'.print_r(unserialize($fld)).'</pre>';

						$fld2=str_replace('"','&quot;',$fld);
						$fld='<a href="javascript:popUp(\'./unserialize.php?val='.$fld2.'\')">Click Here</a><br>'.$fld;
					}

					if($ck_bool)
					{
						$fld=str_replace('"','""',$fld); // 2 double quotes are needed for excel to save correctly
					}


					switch($fld)
					{
						case "":
							$fld="FLD_IS_BLANK";
							break;
						case null:
							$fld="FLD_IS_NULL";
							break;
					}

					$fld=str_replace("<","&lt;",$fld);
					$fld=str_replace(">","&gt;",$fld);

					array_push($line,$cell1.$quotes_around.$fld.$quotes_around.$cell2);

					$v++;
				}

				$tbl.=$row1.(implode($impl,$line)).$row2;
			}
			$res_ct_lbl="<br><br>Results Returned: ".$res_ct;

		}
		else
		{
			$tbl.=$row1."<td colspan=".$numfields.">No results returned".$cell2.$row2;
		}

		if($ck_bool)
		{
			$tbl="<input type=\"button\" name=\"cp\" value=\"Copy To Clipboard\" onClick=\"cptc(this.form)\"><br><textarea cols=80 rows=20 name=\"txt\" disabled>".$th.$tbl."</textarea>";
		}
		else
		{
			$tbl="<table colspan=100% border=1 cellpadding=10>".$th.$tbl."</table>";
		}
		$res="Query: ".$_POST['sql']."<br>Tables: ".$table_name."<hr>".$tbl.$res_ct_lbl;

	}
}


//query history list
for($i=sizeof($_SESSION['test_query'][$_GET['h']])-1; $i >= 0; $i--)
{
	$thisQuery = $_SESSION['test_query'][$_GET['h']][$i]; 
	
	$dispQuery = str_replace("\"","&quot;", $thisQuery); //replace quotes
	$dispQuery = shortenText($dispQuery, 50);   //shorten the query 
	
	if($thisQuery != $_SESSION['test_query'][$_GET['h']][$i+1])//show only unique queries
	{
		$history_opt.="<option value=\"".str_replace("\"","&quot;",$thisQuery).'">'.$dispQuery.'</option>';
	}
}

//grab table list based on database selected




echo '<html><title>Test Query</title>
<head>
<script>
function popUp(URL)
{
	window.open(URL);
}

function copyQuery(sl,v)
{
	switch(v)
	{
		case 1:
			sl.form.sql.value=sl.options[sl.selectedIndex].value;
			break;
		case 2:
			document.query.sql.value=sl;
			break;
	}
}

function cptc(frm)
{
	var field;

	frm.txt.select();
	field=frm.txt.createTextRange();
	field.execCommand(\'copy\'); 
}
</script>
</head>
<body>
<form name="query" action="?h='.$_GET['h'].'" method=POST>
<a href="?h='.genHash().'" target=_blank><input type=button value="Open New Session"></a> :: 
<a href="?h='.$_GET['h'].'&reset_qry=1" ><input type=button value="Reset Query History"></a><br>

<table border=1>
<tr valign="top">
	<td>
	<table border=1>
	<tr>
		<td>Database</td><td><select name="db_name">';

$dbList = array('codegeas_refrain', 'codegeas_fanlist', 'codegeas_smf');
		
foreach($dbList as $db)
{
	echo '<option value="'.$db.'" '.$db_sel[$db].'>'.$db.'</option>';
}

echo '		</select>
		</td>
	</tr><tr>
	<td>Query: </td><td>';


?>
		<textarea name="sql" rows=10 cols=70><?=str_replace("\"","&quot;",$_POST['sql'])?></textarea></td>
	</tr><tr>
		<td>Query History</td>
		<td>
		<select name="previous_queries" onChange="copyQuery(this,1)">
			<option value="">---Query History----</option>
			<?=$history_opt?>
		</select>

		</td>
	</tr><tr>
		<td colspan=2><input type="submit" name="subQuery" value="Submit Query"></td>
	</tr>
	</table>
</td><td>
	<table border=0 height=100%>
	<tr valign=top>
		<td>
			<input type="radio" name="ck_csv" value="" checked> Not Delimited<br>
			<input type="radio" name="ck_csv" value="," <?=$ck_csv[',']?>> Comma Delimited<br>
			<input type="radio" name="ck_csv" value="|" <?=$ck_csv['|']?>> Pipe Delimited<br>
			<input type="checkbox" name="ck_quotes" value="Y" <?=$ck_quotes['Y']?>> Quotes around fields<br>
			<hr>
		</td>
	</tr><tr>
		<td>Syntax Shortcuts:<br>
			<a href="#" onClick="copyQuery('select * from ',2)">Select * from</a><br>
			<a href="#" onClick="copyQuery('show tables ',2)">Show Tables</a><br>
			<a href="#" onClick="copyQuery('desc ',2)">Describe Table</a><br>
			<a href="#" onClick="copyQuery('insert into () values () ',2)">Insert Into</a>
			<hr>
		</td>
	</tr><tr>
		<td>
			Unserialize Column #s:<br>
			<input type='text' name='unser'  value='<?=$_POST['unser']?>' size=10> i.e.  '1,2,10,15'
		</td>
	</tr>
	</table>
</td>
</tr>
</table>

<? 
echo '<div width=100%>';

echo $res;

echo '</div>
</form>
</body></html>';  ?>