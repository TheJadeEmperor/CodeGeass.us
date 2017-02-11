<?php
$dir = '../';
session_start();

include($dir.'admin/adminCode.php');

$db_list = array('codegeas_refrain', 'codegeas_admin',  'codegeas_fanlist', 'codegeas_smf' );


function get_db_table($table_name)
{
	global $conn;
	$table[0] = $table_name;

	$table_list .= "<table border = '0'>
	<tr><td bgcolor = FFFFCC colspan = 6 align = \"center\"><a href = \"".$_SERVER[PHP_SELF]."?db=".$_POST[select_db]."&table=".$table[0]."
	\">".$table[0]."</a></td></tr>";

	mysql_select_db($_POST[select_db], $conn);//use this database
	$sub_query = "desc ".$table_name;//describe this table
	$sub_result = mysql_query($sub_query, $conn) or die(mysql_error()." (Line ".__LINE__.")");

	//get the number of rows (records from this table)
	$num_rows_query = "select count(*) from ".$table_name;
	$num_rows_result = mysql_query($num_rows_query, $conn) or die(mysql_error()." (Line ".__LINE__.")");
	$num_rows = mysql_fetch_row($num_rows_result);

	$table_list .= "<tr><td colspan = 3>Fields: ".mysql_num_rows($sub_result)." </td><td colspan = 3>Rows: ".$num_rows[0]."</td></tr>";
	$table_list .= "<tr><td>Field</td><td>Type</td><td>Null</td><td>Key</td><td>Default</td><td>Extra</td></tr>";

	$database_array[  $_POST[select_db]  ][   $table_name   ][num_fields] = mysql_num_rows($sub_result);
	$database_array[  $_POST[select_db]  ][   $table_name   ][num_rows] = $num_rows[0];
	$field_count = 0;
	while($field = mysql_fetch_row($sub_result))
	{

		$database_array[  $_POST[select_db]  ][   $table_name   ][r][$field_count]['field'] = $field[0];
		$database_array[  $_POST[select_db]  ][   $table_name   ][r][$field_count]['type'] = $field[1];
		$database_array[  $_POST[select_db]  ][   $table_name   ][r][$field_count]['null'] = $field[2];
		$database_array[  $_POST[select_db]  ][   $table_name   ][r][$field_count]['key'] = $field[3];
		$database_array[  $_POST[select_db]  ][   $table_name   ][r][$field_count]['default'] = $field[4];
		$database_array[  $_POST[select_db]  ][   $table_name   ][r][$field_count]['extra'] = $field[5];

		$table_list .= "<tr><td>".$field[0]."</td><td>".$field[1]."</td><td>".$field[2]."</td><td>".$field[3]."</td>
		<td>".$field[4]."</td><td>".$field[5]."</td>";
		$field_count++;
	}//while
	$table_list .= "</table><br/><br/>";	
	
	return $table_list; 
}//function


if($_POST[select_db] )//pick database from drop down menu
{
	unset($_SESSION[selected]);
	$_SESSION[selected][  $_POST[select_db]   ]   = "selected";//pre-select the drop down menu
	
	$database_array = array();
	
	if($_POST[select_db] != "all")//one database is selected
	{	
		$query = "show tables from ".$_POST[select_db];
		
		$result = mysql_query($query, $conn) or die(mysql_error()." (Line ".__LINE__.")");
		
		while($table = mysql_fetch_row($result))//list of tables in mysql
		{	
			$table_list .= get_db_table($table[0]);
		}//while
	}//if
	else	//select all databases
	{	
		foreach($db_list as $database)
		{
			$query = "show tables from ".$database;
			$result = mysql_query($query, $conn) or die(mysql_error()." (Line ".__LINE__.")");
			
			$table_list .= "<br/><br/>
			<table width = 20%><tr><td><fieldset><legend align = center>Database: $database</legend>";
			while($table = mysql_fetch_row($result))//list of tables in mysql
			{	
				$table_list .= "<table border = 1>
				<tr><td colspan = 6 align = \"center\">".$table[0]."</td></tr>";
				
				mysql_select_db($database, $conn);//use this database
				$sub_query = "desc ".$table[0];//describe this table
				$sub_result = mysql_query($sub_query, $conn) or die(mysql_error()." (Line ".__LINE__.")");
				
				//get the number of rows (records from this table)
				$num_rows_query = "select count(*) from ".$table[0];
				$num_rows_result = mysql_query($num_rows_query, $conn) or die(mysql_error()." (Line ".__LINE__.")");
 				$num_rows = mysql_fetch_row($num_rows_result);
 
				$table_list .= "<tr><td colspan = 3>Fields: ".mysql_num_rows($sub_result)." </td><td colspan = 3>Rows: ".$num_rows[0]."</td></tr>";
				$table_list .= "<tr><td>Field</td><td>Type</td><td>Null</td><td>Key</td><td>Default</td><td>Extra</td></tr>";

//echo mysql_num_rows($sub_result);
				$database_array[  $database  ][   $table[0]   ][num_fields] = mysql_num_rows($sub_result);
				$database_array[  $database  ][   $table[0]   ][num_rows] = $num_rows[0];
				
				$field_count = 0;
				while($field = mysql_fetch_row($sub_result))
				{
					$database_array[  $database  ][   $table[0]   ][r][$field_count][field] = $field[0];
					$database_array[  $database  ][   $table[0]   ][r][$field_count][type] = $field[1];
					$database_array[  $database  ][   $table[0]   ][r][$field_count]['null'] = $field[2];
					$database_array[  $database  ][   $table[0]   ][r][$field_count][key] = $field[3];
					$database_array[  $database  ][   $table[0]   ][r][$field_count]['default'] = $field[4];
					$database_array[  $database  ][   $table[0]   ][r][$field_count][extra] = $field[5];
					
					$table_list .= "<tr><td>".$field[0]."</td><td>".$field[1]."</td><td>".$field[2]."</td><td>".$field[3]."</td><td>".$field[4]."</td><td>".$field[5]."</td>";
					
					$field_count ++;
				}//while
				$table_list .= "</table><br/>";
			}//while		
			$table_list .= "</fieldset></td></tr></table>";
		}//foreach
	}//else
}//if

if(false)
{echo "<pre>";
print_r($database_array);
echo "</pre>";}
 
//drop down list of databases
foreach($db_list as $database)
{
	$drop_down .= "<option value = \"".$database."\" ".$_SESSION[selected][$database].">$database</option>";
}//foreach

$drop_down = "<select name = select_db onChange = \"submit();\">
	<option value = \"all\">--Pick a database--</option>
	<option value = \"all\" ".$_SESSION[selected][all].">-All Databases-</option>
	".$drop_down."</select>";

if($_POST[get_database])//export to excel button is clicked
{
	if($_POST[select_db] != "all")
	{
		unset($db_list); 
		$db_list = array( $_POST[select_db] );
		$file_name = $_POST[select_db]."_".date("Y-m-d", time()).".csv";	
	}//if
	else
	{
		$file_name = "all_databases_".date("Y-m-d", time()).".csv";
	}//else
	$export = 1;
	if($export == 1)
	{
		//$file ="dabatase_list.csv";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment;filename=".$file_name );
		header('Pragma: no-cache');
		header('Expires: 0');
	}//if
	
	foreach($database_array as $database => $database_name)
	{
		echo "Tables in ".$database."\n";
		
		foreach($database_name as $table => $table_name)
		{
			echo "\n".$table."\n";
			echo "Fields: ".$table_name[num_fields].", Rows: ".$table_name[num_rows]."\n";

			echo "Field,Type,Null,Key,Default,Extra\n";
			
			foreach($table_name[r] as $key => $element) 
				echo $element[field].",".$element[type].",".$element[null].",".$element[key].",".$element['default'].",".$element[extra]."\n";
		}//foreach
	}//foreach
 
	exit;
}//if

if($_POST[get_sql])//save as sql file
{
	//echo $_GET[table];
echo	$dump = "mysqldump --opt -hlocalhost -uroot -pdaRkN1t3 ".$_GET[db]." ".$_GET[table]."  > ./file.sql";
	system($dump);
}//


//$restore = "mysql -uroot -pdaRkN1t3 nyu < file.sql";
//system($restore);

if($_GET[table] != '')
{
	mysql_select_db($_GET[db], $conn);//use this database
	//$table[0] = $_GET[table];
	
 	$table_list = get_db_table($_GET[table]);
}//





if($_POST[show_tables])
{
	$query = "show tables";
	$result = mysql_query($query, $conn) or die(mysql_error()."(Line: ".__LINE__.")" );
	
	$count[r] = 0;
	while($rowT = mysql_fetch_assoc($result))
	{ 
		if($count[r] % 25 == 0)
			$show_tables .= "</table></td><td><table>";
		
		$show_tables .= "<tr><td><a href = \"".$_SERVER[PHP_SELF]."?db=".$_POST[select_db]."&table=".$rowT["Tables_in_".$_POST[select_db]]."
		\">".$rowT["Tables_in_".$_POST[select_db]]."</a></td></tr>";
		
		$count[r] ++;
	}//while
	$table_list = "<table><tr valign = top><td><table>".$show_tables."</table></td></tr></table>";
}//

if($_GET[db] && $_GET[table])
{	
	$var = "?db=".$_GET[db]."&table=".$_GET[table];
}
?>

<form action = "<?=$var ?>" method = post>
<?=$drop_down?>
<input type = submit name = "get_database" value = "Export to Excel"/>
<input type = submit name = "get_sql" value = "Export to SQL File"/>
<input type = submit name = "show_tables" value = "Show Tables"/>
</form>

<?=$table_list?>
</body></html>