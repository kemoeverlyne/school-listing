<?php include ('./Connections/school.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Student</title>
</head>
<body>
<?php
		
		$StudentID ='';
		$FirstName ='';
		$Surname ='';
		$TitleID ='';
		$DateOfBirth ='';
		$Height ='';
		$Weight ='';
		$InActive ='';
		$myGuid ='';
		$LastUpdated ='';
		
		//echo $_GET['StudentID'].'<br>';
		//echo isset($_GET['StudentID']).'<br>';
		if(isset($_GET['StudentID'])) {
			//echo 'set';
			//$r = 0;
			//check if code exists
			//$sql = "SELECT * FROM Student WHERE InActive = 0 LIMIT 0, 7";
			$sql = "SELECT * FROM Student WHERE StudentID = ".$_GET['StudentID'];
			//ONE RECORD
			$colArray = mysqli_fetch_assoc( mysqli_query($con,$sql) );
			//echo $colArray['FirstName'].'<br>';
			$StudentID = $colArray['StudentID'];
			$FirstName = $colArray['FirstName'];
			$Surname = $colArray['Surname'];
			$TitleID = $colArray['TitleID'];
			$DateOfBirth = $colArray['DateOfBirth'];
			$Height = $colArray['Height'];
			$Weight = $colArray['Weight'];
			$InActive = $colArray['InActive'];
			$MyGuid = $colArray['MyGuid'];
			$LastUpdated = $colArray['LastUpdated'];
		}
        //Multiple records
        //$results = mysqli_query($con, $sql);
		//echo $colArray['StudentID'];
        ?>
<form id="StudentForm" name="StudentForm" method="post" action="StudentAdd.php">
  <table width="400" border="1">
    <tr>
      <td colspan="3" bgcolor="#99CCFF"><input type="hidden" placeholder="StudentID" name="StudentID" id="StudentID"  value="<?php echo $StudentID; ?>"/>
        <strong>Student Details</strong></td>
    </tr>
    <tr>
      <td><strong>First Name</strong></td>
      <td colspan="2"><input type="text" placeholder="FirstName" name="FirstName" id="FirstName" value="<?php echo $FirstName; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Surname</strong></td>
      <td colspan="2"><input type="text" placeholder="Surname" name="Surname" id="Surname" value="<?php echo $Surname; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Title</strong></td>
      <td colspan="2">
		<select>
			<option selected="selected">Choose one</option>
			<?php
			$TitleSQL = "SELECT * FROM Title";
			$TitleDataSet = mysqli_query($con, $TitleSQL);
            while ($TitleColArray = mysqli_fetch_array($TitleDataSet)) {
                $value = $TitleColArray['TitleID'].'<br>';
                $display = $TitleColArray['Title'].'<br>';
                echo "<option value='strtolower($value)'> $display </option>";
            }
            ?>
		</select>
    </tr>
    <tr>
      <td><strong>Date Of Birth</strong></td>
      <td colspan="2"><input type="text" placeholder="DateOfBirth" name="DateOfBirth" id="DateOfBirth" value="<?php echo $DateOfBirth; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Height</strong></td>
      <td colspan="2"><input type="text" placeholder="Height" name="Height" id="Height" value="<?php echo $Height; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Weight</strong></td>
      <td colspan="2"><input type="text" placeholder="Weight" name="Weight" id="Weight" value="<?php echo $Weight; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Inactive</strong></td>
      <td colspan="2"><input type="radio" name="YesInactiveRadioButton" id="YesInactiveRadioButton"
        value=1  <?php if ($InActive == '1') {echo 'checked';} ?> />
        <label for="YesInactiveRadioButton">Yes</label>
        <input type="radio" name="NoInactiveRadioButton" for="complete_yes" id="NoInactiveRadioButton" value=1  <?php if ($InActive == '0') {echo 'checked';} ?>  />
      <label for="NoInactiveRadioButton">No</label>
      </td>
    </tr>
    <tr>
      <td><strong>My Guid</strong></td>
      <td colspan="2"><input type="text" placeholder="MyGuid" name="MyGuid" id="MyGuid" value="<?php echo $MyGuid; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Last Updated</strong></td>
      <td colspan="2"><input type="text" placeholder="LastUpdated" name="LastUpdated" id="LastUpdated" value="<?php echo $LastUpdated; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="CancelButton" id="CancelButton" value="Cancel" /></td>
      <td><input type="submit" name="AddButton" id="AddButton" value="Submit" /></td>
    </tr>
  </table>
</form>
<script> 
	if(document.getElementById('NoInactiveRadioButton').checked) { 
    } else if(document.getElementById('NoInactiveRadioButton').checked) { 
    } else { 
      alert ("You must select a button"); 
    }
	 </script>
</body>
</html>
