<?php include ('./Connections/school.php'); ?>
<?php
//if(!isset($_SESSION[myUserID]) || $_SESSION[myRoleID] > 2) { header("Location: ../UserMgt/index.htm");}
//
//$myUserID = $_SESSION[myUserID];
//$loggedUser = $_SESSION['loggedUser'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Pitch Deck">
	<meta name="keywords" content="Pitch Deck">
  	<meta name="author" content="Mambo Software">
    <title>Student List</title>
	<link rel="stylesheet" type="text/css" href="styles/gridCard.css"/>
    <link rel="stylesheet" type="text/css" href="styles/header.css"/>
  	<link rel="stylesheet" type="text/css" href="styles/footer.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  </head>
<body>
    <div class="header">
      <a href="#default" class="logo">CompanyLogo</a>
      <div class="header-right">
        <a class="active" href="#home">Home</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
      </div>
    </div>
	<?php
		function FKDisplay($table, $display, $PKF, $FKID, $con)
		{
					$SQL = "SELECT $PKF, $display FROM $table ORDER BY $PKF ASC";
					$FKDataSet = mysqli_query($con, $SQL);
					while ($FKRowArray = mysqli_fetch_array($FKDataSet))
					{
						if (!(strcmp($FKRowArray[$PKF], $FKID)))
						{
							return $FKRowArray[$display];
						}
					}
		}
	?>
	<?php
		$r = 0;
        //check if code exists
        //$sql = "SELECT * FROM Student WHERE InActive = 0 LIMIT 0, 7";
        $sql = "SELECT * FROM Student";
        //ONE RECORD
        //$ColArray = mysqli_fetch_assoc( mysqli_query($prischopt,$sql) );
        //Multiple records
        $DataSet = mysqli_query($con, $sql);
				
		//$d=mktime(11, 14, 54, 8, 12, 2014);
		//echo "Created date is " . date("Y-m-d h:i:sa", $d).'<br>';
	?>
    <table width="1000" border="0" cellpadding="0" cellspaci="0">
          <tr>
            <td bgcolor="#99CCFF">SNo</td>
            <td bgcolor="#99CCFF">First Name</td>
            <td bgcolor="#99CCFF">Surname</td>
            <td bgcolor="#99CCFF">Title</td>
            <td bgcolor="#99CCFF">Weight</td>
            <td bgcolor="#99CCFF">Height</td>
            <td bgcolor="#99CCFF">Date Of Birth</td>
            <td bgcolor="#99CCFF">Inactive</td>
            <td bgcolor="#99CCFF">myGuid</td>
            <td bgcolor="#99CCFF">Last Updated</td>
            <td bgcolor="#99CCFF">Edit</td>
            <td bgcolor="#99CCFF">Delete</td>
          </tr>
	<?php //comment this line out if using one record method above
	
	$r = 0;
	while ($ColArray = mysqli_fetch_array($DataSet)) {
	?>
          <tr>
            <td><?php echo $r+1; ?></td>
            <td><?php echo $ColArray['FirstName']; ?></td>
            <td><?php echo $ColArray['Surname']; ?></td>
            <td><?php
				if (!is_null($ColArray['TitleID']))
				{
					echo FKDisplay('Title', 'Title', 'TitleID', $ColArray['TitleID'], $con);
				}
				?>
            </td>
            <td><?php echo $ColArray['Weight']; ?></td>
            <td><?php echo $ColArray['Height']; ?></td>
            <td><?php echo date_format(date_create($ColArray['DateOfBirth']),"d M Y H:i:s"); ?></td>
            <td><?php echo $ColArray['InActive'] == 1 ? "Yes" : "No"; ?></td>
            <td><?php echo $ColArray['MyGuid']; ?></td>
            <td><?php echo date_format(date_create($ColArray['LastUpdated']),"d M Y H:i:s"); ?></td>
            <td><a href="StudentAddForm.php?StudentID=<?php echo $ColArray['StudentID']; ?>">Edit</a></td>
            <td><a href="Connections/StudentDelete.php?StudentID=<?php echo $ColArray['StudentID']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
          </tr>
        <?php
            $r++;
            }//END WHILE
        ?>
          <tr>
            <td>Count</td>
            <td><?php echo $r; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><a href="StudentAddForm.php">Add</a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
</table>
</body>
</html>



