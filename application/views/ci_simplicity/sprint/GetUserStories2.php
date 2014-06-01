 <?php
for($i=0 ; $i<sizeof($toDOarrayID); $i++)
{
		echo '<li class="sortable-item" id="'.$toDOarrayID[$i].'"><a>'.$toDOarrayList[$i].'</a> <br />';
                echo ' <input  type="hidden" name="id" value="'.$toDOarrayID[$i].'"></input>';
		echo '<div id="thanksToDo'.$toDOarrayID[$i].'"><p>
                 <table width=100% border="0">
  <tr>';
    
    $a=$this->dbModel->getPirority($toDOarrayID[$i]);
    if ($a == 'Blocker') {
        echo ' <td width="6" style="background-color: #d9534f">&nbsp;</td>';
    } elseif ($a == 'Critical') {
        echo ' <td width="6" style="background-color: #f0ad4e">&nbsp;</td>';
    } elseif ($a == 'Major') {
        echo ' <td width="6" style="background-color: #5bc0de">&nbsp;</td>';
    } elseif ($a=='Minor') {
        echo ' <td width="6" style="background-color: #5cb85c">&nbsp;</td>';
     } elseif ($a=='Trivial') {
        echo ' <td width="6" style="background-color: #428bca">&nbsp;</td>';
    }
    

    echo '
</tr>
    </table>
</li>';        
}
?>