<!DOCTYPE html>
<html>
<head>
<script src="jquery-3.2.1.min.js"></script>
<?php
	$UserIndex = $_GET['index'];
	$Status = $_GET['status'];
	$Filter = $_GET['filter'];
	$selected = $_GET['extraDropdown'];
	
	if (isset($_GET['list'])) {
		echo"{$_GET['list']}";
	}
?>
<title>Main Page</title>
<link rel="stylesheet" href="24.css">
</head>
<body>

<?php
session_start();
$reason = $_GET['reason'];
$_SESSION['reasonInput']=$selected;
$_SESSION['Filter']=$Filter;
$_SESSION['TIndex']=$UserIndex;
$_SESSION['Status']=$Status;

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "mPointsDB");
?>

<h1>WILLETTON SENIOR HIGH SCHOOL</h1>

<input type="text" style="margin-top:20px" id="studentInput" onkeyup="studentFunction()" placeholder="Select students.." title="Type in a name">

<!--- STUDENT LIST STUDENT LIST STUDENT LIST STUDENT LIST -->
  <?php
  	$headerNeeded = false;
	
	$teacherQuery = mysqli_query($link, "select * FROM teacher WHERE UserIndex = $UserIndex")
		or
	die ("Failed to query database".mysqli_error($link));
	$teacherInfo = mysqli_fetch_assoc($teacherQuery);
	$teacherClassList = NULL;
	
	for ($x = 1; $x <= 8; $x++){
		if ($teacherInfo["Class$x"] <> NULL){
			if ($teacherClassList == NULL) {
				$teacherClassList = "\"{$teacherInfo["Class$x"]}\"";
			} else {
				$teacherClassList = "$teacherClassList,\"{$teacherInfo["Class$x"]}\"";
			}
		}
	}
	
	if (($Filter == "taught")&&($teacherClassList <> NULL)) {
		$displayClassQuery = mysqli_query($link, "select * FROM student WHERE ((Class1 IN ($teacherClassList)) OR (Class2 IN ($teacherClassList)) OR (Class3 IN ($teacherClassList)) OR (Class4 IN ($teacherClassList)) OR (Class5 IN ($teacherClassList)) OR (Class6 IN ($teacherClassList)) OR (Class7 IN ($teacherClassList)) OR (Class8 IN ($teacherClassList)) OR (Class9 IN ($teacherClassList)) OR (Class10 IN ($teacherClassList)) OR (Class11 IN ($teacherClassList)) OR (Class12 IN ($teacherClassList)))")
			or
		die ("Failed to query database".mysqli_error($link));
	} else if ($Filter == "all") {
		$displayClassQuery = mysqli_query($link, "select UserIndex FROM student")
			or
		die ("Failed to query database".mysqli_error($link));
	} else {
		$displayClassQuery = mysqli_query($link, "select * FROM student WHERE ((Class1 = \"$Filter\") OR (Class2 = \"$Filter\") OR (Class3 = \"$Filter\") OR (Class4 = \"$Filter\") OR (Class5 = \"$Filter\") OR (Class6 = \"$Filter\") OR (Class7 = \"$Filter\") OR (Class8 = \"$Filter\") OR (Class9 = \"$Filter\") OR (Class10 = \"$Filter\") OR (Class11 = \"$Filter\") OR (Class12 = \"$Filter\"))")
			or
		die ("Failed to query database".mysqli_error($link));
	}
	$studentsStr = NULL;
	
	while($displayClass = mysqli_fetch_assoc($displayClassQuery)) {
		if ($displayClass['UserIndex'] != NULL) {
			if ($studentsStr == NULL) {
				$studentsStr = "{$displayClass['UserIndex']}";
			} else {
				$studentsStr = "$studentsStr,{$displayClass['UserIndex']}";
			}
		}
	}	
	
	$active = false;
	for($check = 1; $check <= 8; $check++){
		$ClassNumCheck = "Class$check";
		if ($teacherInfo[$ClassNumCheck] != NULL) {
  	    	$active = true;
		}
  	}
	
	if (($studentsStr == NULL)&&($active == false)) {
		?><meta http-equiv="refresh" content="0; URL=' <?php echo"MainPage.php?index={$UserIndex}&status={$Status}&filter=all&extraDropdown=NULL&reason=3";?>'"/><?php
	}
	
	if ($studentsStr <> NULL) {
		$result = mysqli_query($link, "select DISTINCT UserIndex,FName,LName,Year FROM student WHERE UserIndex IN ($studentsStr) ORDER BY LName, FName ASC")
   			or 
    	die ("Failed to query database".mysqli_error($link));
    
		$firstLetter = 0;
		$letterList = ".ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		echo"<form id=\"studentUL\" method=\"POST\" action=\"submitDhirren.php\">";
		while(($row = mysqli_fetch_assoc($result)) && ($firstLetter < 27)){	
			if ($row['LName'][0] != $letterList[$firstLetter]) {
				while($row['LName'][0] != $letterList[$firstLetter]){
					$firstLetter ++;
				}
				echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >&nbsp&nbsp{$letterList[$firstLetter]}</a></p>";
			}
			echo"<p><a><input type=\"checkbox\" name=\"list[]\" value=\"{$row['UserIndex']}\" id=\"list[{$row['UserIndex']}]\" style=\"display:none\">
				<label style = \"display:block\" for=\"list[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['Year']}</label></a></p>";
		}
	} else {
		echo"<form id=\"studentUL\" method=\"POST\" action=\"submitDhirren.php\"></form>";
	}

  ?>
 
<!-- REASONS REASONS REASONS REASONS REASONS -->
<ul id = "reasonMenu">
	<li><a class="header">Please select a reason</a></li>
	<li><a><input type="radio" id="class" onclick="javascript:check_reason();" name="reason" value="3" <?php echo ($reason=='3')?'checked':'' ?> >In Class</a></li>
	<li><a><input type="radio" id="school" onclick="javascript:check_reason();" name="reason" value="5" <?php echo ($reason=='5')?'checked':'' ?> >In School</a></li>
	<li><a><input type="radio" id="extra_button" onclick="javascript:check_reason();" name="reason" value="10" <?php echo ($reason=='10')?'checked':'' ?> >Extracurricular</a></li>
</ul>

  <div id="cf4a"><img class="bottom" src=
 		   "/img/LoginBackground.jpg" /> <img class="top" src=
 		   "/img/LoginBackground2.jpg" /> <img class="middle" src=
 		   "/img/LoginBackground3.jpg" /> <img class="middle2" src=
 		   "/img/LoginBackground4.jpg" />
    	</div>
 
<!--SUBMIT SUBMIT SUBMIT SUBMIT SUBMIT SUBMIT -->
<input type="Button" value="Submit" id="submitButton" style="top:550px" onclick="submitForms()"/>
</form>

<!-- CLASSES CLASSES CLASSES CLASSES -->
<ul id = "classMenu" style= "top:150px">
<?php
	echo"<li><a href=\"#\" class=\"header\">Classes</a></li>";
	
	$result = mysqli_query($link, "select * FROM teacher WHERE UserIndex = {$_GET['index']}")
		or 
	die ("Failed to query database".mysqli_error($link));
	
	$row = mysqli_fetch_assoc($result);
	
	if ($Filter == "all") {
    	echo "<li><a href=\"?index={$UserIndex}&status={$Status}&filter=all&extraDropdown={$selected}&reason=$reason\" style=\"background-color:#aaf7e9\">All Students</a></li>";
	} else {
		echo "<li><a href=\"?index={$UserIndex}&status={$Status}&filter=all&extraDropdown={$selected}&reason=$reason\">All Students</a></li>";
	}
	
	$active = false;
	for($check = 1; $check <= 8; $check++){
		$ClassNumCheck = "Class$check";
		if ($row[$ClassNumCheck] != NULL) {
  	    	$active = true;
		}
  	}
	
	if ($active == true) {
		if ($Filter == "taught") {
   			echo "<li><a href=\"?index={$UserIndex}&status={$Status}&filter=taught&extraDropdown={$selected}&reason=$reason\" style=\"background-color:#aaf7e9\">All Students Taught</a></li>";
		} else {
			echo "<li><a href=\"?index={$UserIndex}&status={$Status}&filter=taught&extraDropdown={$selected}&reason=$reason\">All Students Taught</a></li>";
		}
	
		for($counter = 1; $counter <= 8; $counter++){
			$ClassNum = "Class$counter";
			if ($row[$ClassNum] != NULL) {
				if ($Filter == $row[$ClassNum]) {
  	    			echo"<li><a href=\"?index={$UserIndex}&status={$Status}&filter={$row[$ClassNum]}&extraDropdown={$selected}&reason=$reason\" style=\"background-color:#aaf7e9\">{$row[$ClassNum]}</a></li>";
				} else {
					echo"<li><a href=\"?index={$UserIndex}&status={$Status}&filter={$row[$ClassNum]}&extraDropdown={$selected}&reason=$reason\" >{$row[$ClassNum]}</a></li>";
				}
			}
  		}
	}
?>
</ul>

<!--EXTRACURRICULAR REASON-->
<?php
	$extraDepartmentQuery = mysqli_query($link, "select * FROM extraDepartment ORDER BY Department ASC")
		or
	die ("Failed to query database".mysqli_error($link));
		
	$extraStr = array();
	$selectedNum = 0;
	$current = "";
	while ($extraDepartmentRow = mysqli_fetch_assoc($extraDepartmentQuery)) {
		if ($current !== $extraDepartmentRow['Department']) {
			array_push($extraStr,"{$extraDepartmentRow['Department']}");
			$current = $extraDepartmentRow['Department'];
		}
		
		if ($selected == $extraDepartmentRow['Department']) {
			$selectedNum = count($extraStr) - 1;
		}
	}
	$_SESSION['Department'] = $extraStr[$selectedNum];
	
	$i = 0;
	$test = "temp";
	if ($reason == 10) {
		echo"<input type=\"text\" id=\"extraInput\" onkeyup=\"extraFunction()\" placeholder=\"Select Field..\" title=\"Type in a name\">";
		
		echo"<form id=\"extraAddFieldForm\" method=\"POST\" action=\"ExtraAddField.php\">";
			echo"<input type=\"submit\" value=\"Add Field\" id=\"addFieldButton\" style=\"display:block\">";
			echo"<input type=\"text\" placeholder=\"Name of field to add..\" id=\"addFieldText\" name=\"addField\">";
		echo"</form>";
		
		echo"<form id=\"extraAddDepartmentForm\" method=\"POST\" action=\"ExtraAddDepartment.php\">";
			echo"<input type=\"submit\" value=\"Add Department\" id=\"addDepartmentButton\" style=\"display:block\">";
			echo"<input type=\"text\" placeholder=\"Name of subject to add..\" id=\"addDepartmentText\" name=\"addDepartment\">";
		echo"</form>";
		
		echo"<div id=\"extraDropButton\" class=\"dropdown\" style=\"display:block\">";
			echo"<button class=\"dropbtn\">$extraStr[$selectedNum]</button>";
			echo"<div id=\"extraDropdown\" name=\"extraDropdown\" class=\"dropdown-content\" value=\"$selected\">";
			while (isset($extraStr[$i])) {
				if ($i != $selectedNum) {
					echo"<a href=\"?index={$UserIndex}&status={$Status}&filter=$Filter&extraDropdown={$extraStr[$i]}&reason=10\">{$extraStr[$i]}</a>";
				}
				$i = $i + 1;
			}
			echo"</div>";
		echo"</div>";
	} else {
		echo"<input type=\"text\" id=\"extraInput\" onkeyup=\"extraFunction()\" placeholder=\"Select Field..\" title=\"Type in a name\" style=\"display:none\">";
		
		echo"<form id=\"extraAddFieldForm\" method=\"POST\" action=\"ExtraAddField.php\">";
			echo"<input type=\"submit\" value=\"Add Field\" id=\"addFieldButton\" style=\"display:none\">";
			echo"<input type=\"text\" placeholder=\"Name of field to add..\" id=\"addFieldText\" name=\"addField\" style=\"display:none\">";
		echo"</form>";
		
		echo"<form id=\"extraAddDepartmentForm\" method=\"POST\" action=\"ExtraAddDepartment.php\">";
			echo"<input type=\"button\" value=\"Add Department\" id=\"addDepartmentButton\" style=\"display:none\">";
			echo"<input type=\"text\" placeholder=\"Name of Department to add..\" id=\"addDepartmentText\" name=\"addDepartment\" style=\"display:none\">";
		echo"</form>";
		
		echo"<div id=\"extraDropButton\" class=\"dropdown\" style=\"display:none\">";
			echo"<button class=\"dropbtn\">$extraStr[$selectedNum]</button>";
			echo"<div id=\"extraDropdown\" name=\"extraDropdown\" class=\"dropdown-content\" value=\"$selected\">";
			while (isset($extraStr[$i])) {
				if ($i != $selectedNum) {
					echo"<a href=\"?index={$UserIndex}&status={$Status}&filter=$Filter&extraDropdown={$extraStr[$i]}&reason=10\">{$extraStr[$i]}</a>";
				}
				$i = $i + 1;
			}
			echo"</div>";
		echo"</div>";
	}
	
	$extracurricularULQuery = mysqli_query($link, "select * FROM extracurricular WHERE Department = \"{$extraStr[$selectedNum]}\" ORDER BY Field ASC")
		or
	die ("Failed to query database".mysqli_error($link));
	
	echo"<br>";
	
	if ($reason == 10) {
		echo"<form id=\"extraUL\" method=\"POST\" action=\"submitDhirren.php\" style=\"display:block\">";
		echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >Field</a></p>";
		while ($row = mysqli_fetch_assoc($extracurricularULQuery)) {
			echo"<p><a><input type=\"radio\" name=\"listExtra[]\" value=\"{$row['extraIndex']}\" id=\"listExtra[{$row['extraIndex']}]\" style=\"display:none\">
				<label style = \"display:block\" for=\"listExtra[{$row['extraIndex']}]\">{$row['Field']}</label></a></p>";
		}
		echo"</form>";
	} else {
		echo"<form id=\"extraUL\" method=\"POST\" action=\"submitDhirren.php\" style=\"display:none\">";
		echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >Field</a></p>";
		while ($row = mysqli_fetch_assoc($extracurricularULQuery)) {
			echo"<p><a><input type=\"radio\" name=\"listExtra[]\" value=\"{$row['extraIndex']}\" id=\"listExtra[{$row['extraIndex']}]\" style=\"display:none\">
				<label style = \"display:block\" for=\"listExtra[{$row['extraIndex']}]\">{$row['Field']}</label></a></p>";
		}
		echo"</form>";
	}
    
?>

<!-- STUDENT OF THE WEEK CHOOSE -->
<?php
	/*if (($Status == 7)||($Status == 8)||($Status == 9)||($Status == 10)) {
		$studentOTWQuery = mysqli_query($link, "select DISTINCT weeklyMerits, UserIndex, Year FROM student WHERE Year = $Status ORDER BY weeklyMerits DESC LIMIT 10")
			or
		die ("Failed to query database".mysqli_error($link));

		$studentOTWStr = NULL;
		$lowestMerit = 0;
		
		while($studentOTW = mysqli_fetch_assoc($studentOTWQuery)) {
			$lowestMerit = $studentOTW['weeklyMerits'];
		}
		
		$result = mysqli_query($link, "select DISTINCT UserIndex, FName, LName, weeklyMerits, ObtainedSOTW FROM student WHERE weeklyMerits >= $lowestMerit ORDER BY weeklyMerits DESC")
			or
		die ("Failed to query database".mysqli_error($link));
		
		echo"<form id=\"studentOTW_UL\" method=\"POST\" action=\"confirm.php\">";
		echo"<p style=\"padding-bottom: 0px; margin-bottom: 0px; padding:12px; background-color:#e2e2e2\"><a class=\"header\" >Student Of The Week</a></p>";
		
		while ($row = mysqli_fetch_assoc($result)) {
			if($row['weeklyMerits'] > 0) {
				if ($row['ObtainedSOTW'] == 0) {
					echo"<b><p><a><input type=\"radio\" name=\"SOTWCheck[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck[{$row['UserIndex']}]\" style=\"display:none\">
						<label style = \"display:block\" for=\"SOTWCheck[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p></b>";
				} else {
					echo"<p><a><input type=\"radio\" name=\"SOTWCheck[]\" value=\"{$row['UserIndex']}\" id=\"SOTWCheck[{$row['UserIndex']}]\" style=\"display:none\">
						<label style = \"display:block\" for=\"SOTWCheck[{$row['UserIndex']}]\">{$row['LName']}, {$row['FName']}, {$row['weeklyMerits']}</label></a></p>";
				}
			}
		} 
		if ($reason == 10) {
			echo"<input type=\"Submit\" value=\"Confirm\" id=\"confirmButton\" style=\"top:1130px\"/>";
		} else {
			echo"<input type=\"Submit\" value=\"Confirm\" id=\"confirmButton\" style=\"top:702px\"/>";
		}
		
		echo"</form>";
	}*/
?>
</ul>

<script type="text/javascript">
function check_reason() {
    if (document.getElementById('extra_button').checked) {
        document.getElementById('extraUL').style.display = "";
		document.getElementById('extraDropButton').style.display = "";
		document.getElementById('extraInput').style.display = "";
		document.getElementById('addFieldButton').style.display = "";
		document.getElementById('addFieldText').style.display = "";
		document.getElementById('addDepartmentButton').style.display = "";
		document.getElementById('addDepartmentText').style.display = "";
		
		document.getElementById('confirmButton').style.top = "1130px";
    } else {
        document.getElementById('extraUL').style.display = "none";
		document.getElementById('extraDropButton').style.display = "none";
		document.getElementById('extraInput').style.display = "none";
		document.getElementById('addFieldButton').style.display = "none";
		document.getElementById('addFieldText').style.display = "none";
		document.getElementById('addDepartmentButton').style.display = "none";
		document.getElementById('addDepartmentText').style.display = "none";
		
		document.getElementById('confirmButton').style.top = "702px";
    }
}

function studentFunction() {
    var input, filter, form, p, a, i;
    input = document.getElementById("studentInput");
    filter = input.value.toUpperCase();
    form = document.getElementById("studentUL");
    p = form.getElementsByTagName("p");
    for (i = 0; i < p.length; i++) {
        a = p[i].getElementsByTagName("a")[0];
        if (a.textContent.toUpperCase().indexOf(filter) > -1) {
            p[i].style.display = "";
        } else {
            p[i].style.display = "none";
        }
    }
}

function extraFunction() {
    var input, filter, form, p, a, i;
    input = document.getElementById("extraInput");
    filter = input.value.toUpperCase();
    form = document.getElementById("extraUL");
    p = form.getElementsByTagName("p");
    for (i = 0; i < p.length; i++) {
        a = p[i].getElementsByTagName("a")[0];
        if (a.textContent.toUpperCase().indexOf(filter) > -1) {
            p[i].style.display = "";
        } else {
            p[i].style.display = "none";
        }
    }
}

function submitForms(){
	var extra_value = document.getElementsByName("listExtra[]");
	var arrayExtraValue = [];
	for (i = 0; i < extra_value.length; i++) {
		if (extra_value[i].checked) {
			arrayExtraValue.push(extra_value[i].value);
		}
	}
	
	var student_value = document.getElementsByName("list[]");
	var arrayStudentValue = [];
	for (i = 0; i < student_value.length; i++) {
		if (student_value[i].checked) {
			arrayStudentValue.push(student_value[i].value);
		}
	}
	
	var mpinc_value = document.getElementsByName("reason");
	for (i = 0; i < 3; i++) {
		if (mpinc_value[i].checked == true) {
			var mpinc = mpinc_value[i].value;
		}
	}
    
	if (arrayStudentValue.length == 0) {
		alert("Please select a student to award merits to before submitting");
	} else {
		$.ajax({
			success: function(data) {window.location.href = "submitDhirren.php?listExtra=" + arrayExtraValue + "&list=" + arrayStudentValue + "&mpinc=" + mpinc;},
			error: function(request, error) {alert("error: " + error);}
		}); 
	}
}

</script>

</body>
</html>