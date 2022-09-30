<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once("config.php");
require_once("process.php"); 
$mpdf = new \Mpdf\Mpdf();

$fres = mysqli_query($mysqli, "SELECT * FROM payslipdata WHERE id= '$id'");
if($res = mysqli_fetch_array($fres))
{
$employee_name = $res['employee_name']; 
$gross_emp = $res['gross_emp']; 
$deduction_emp = $res['deduction_emp']; 
$nett_emp = $res['nett_emp']; 
}
$mpdf->WriteHTML($employee_name);
$mpdf->Output();