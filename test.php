<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function sortlist($arr)
{
global $value;    
for($i=0;$i<count($arr);$i++)
{
 if($i < count($arr))
 {
 $subtract = $arr[$i] - $arr[$i+1]; 
 }
}
echo $subtract;
}

<?php
 /* Enter your code here. Read input from STDIN. Print output to STDOUT */

    function sortlist($arr)
{
global $value,$subtract;    
for($i=0;$i<count($arr);$i++)
{
 if($i == 0)
 {
  $value = $arr[0];   
 }
 else if($i < count($arr) - 1)
 {
 $subtract = $arr[$i-1] - $arr[$i]; 
 if($subtract <= 127 || $subtract >= -127)
 {
      $value = $value." "."-128"; 
      $value = $value." ".$subtract;
 }
     else
  {
       $value = $value." ".$subtract;    
  }
    
 }
 else if($i == count($arr) - 1)
 {
  $subtract = $arr[$i-1] - $arr[$i]; 
      if($subtract <= 127 || $subtract >= -127)
 {
      $value = $value." "."-128"; 
      $value = $value." ".$subtract;
 }
     else
  {
       $value = $value." ".$subtract;    
  }
 }
}
echo $value;
}

$array = [2453,563,2568,2673];
//sortlist($array);
$handle = fopen("php://stdin","r");
$t = fgets($handle);
$lis = explode(' ', fgets($handle));
print($lis)
//echo $lis[0];
//print($lis[0] + $lis[1]) . "\n";
/*for($i=0; $i<$t; $i++)
{
    //$lis = explode(' ', fgets($handle));
    //echo $lis[0];
    // $lis =implode(' ', fgets($handle));
   // print($lis[0] + $lis[1]) . "\n";
    //sortlist($lis) . "\n";
}*/
fclose($handle);

?>
