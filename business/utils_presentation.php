<?php
function constructTable($dataSet){
 $dataset_table = "<table>";
 foreach ($dataSet as $row) {
   $dataset_table = $dataset_table."<tr>";
   foreach($row as $col){
     $dataset_table = $dataset_table."<td>$col</td>";
   }
   $dataset_table = $dataset_table."</tr>";
 }
 $dataset_table = $dataset_table."</table>";
 return $dataset_table;
}
?>
