<?php 
/*
$appointeddate = date("12/25/2020");
$appointeddate->modify('+1 day');
*/
$dateFromDB="07/16/2020";
$TodayDate=date($dateFromDB);
$datetime = new DateTime($TodayDate);
$datetime->modify('+1 day');
$tomorrow=$datetime->format('m-d-Y');
//echo $tomorrow;


$h=10;			//int hour variable
$m=53;     		//int minute variable
$m=$m+15;		//15 min added
$newhour=(int)($h+($m/60));
$newMinute=$m%60;
$newappTime=$newhour.":".$newMinute;
echo $newappTime;


//SELECT e.examID,s.subjectName,s.subjectID,e.totMarks FROM exams e,subjects s WHERE s.semID=61 AND s.subjectID=e.subjectID AND e.status="Result Announced"



/*

SELECT (SELECT (SELECT SUM(marks) FROM answermcq WHERE studID='PESMCA1106' AND examID='100128MCACAC101ISA1') + (SELECT SUM(marks) FROM answerdescriptive WHERE studID='PESMCA1106' AND examID='100128MCACAC101ISA1')) as result 



SELECT (SELECT (SELECT COUNT(studID) FROM answermcq WHERE studID='PESMCA1106' AND examID='100128MCACAC101ISA1') + (SELECT COUNT(studID) FROM answerdescriptive WHERE studID='PESMCA1106' AND examID='100128MCACAC101ISA1')) as result

*/
?>