<?php
include "top.php";
?>

<!-- **********************     Body section      ********************** -->
<?php
print '<body id="' . $path_parts['filename'] . '">';
//now print out each record
$query = 'SELECT distinct fldDays, fldStart, fldStop FROM tblSections, tblTeachers
WHERE tblTeachers.pmkNetId = tblSections.fnkTeacherNetId  
AND tblTeachers.fldLastName = "Snapp"
ORDER BY fldStart ASC';
$info2 = $thisDatabaseReader->select($query, "", 0, 0, 2, 0, false, false);
//$test = $thisDatabaseReader->testquery($query, $data, 0, 0, 0, 0, false, false); 
$columns = 3;
print '<h2>Total Records: ' . count($info2) . '</h2>';
print '<h3>SQL: ' . $query . '</h3>';
print '<table>';
print '<tr><th>Days</th><th>Start</th><th>Stop</th></tr>';
$highlight = 0; // used to highlight alternate rows
foreach ($info2 as $rec) {
    $highlight++;
    if ($highlight % 2 != 0) {
        $style = ' odd ';
    } else {
        $style = ' even ';
    }
    print '<tr class="' . $style . '">';
    for ($i = 0; $i < $columns; $i++) {
        print '<td>' . $rec[$i] . '</td>';
    }
    print '</tr>';
}

// all done
print '</table>';
print '</aside>';
?>