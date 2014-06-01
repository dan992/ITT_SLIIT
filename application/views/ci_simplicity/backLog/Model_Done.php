<?php
$this->load->model('dbModel');
for($i=0 ; $i<sizeof($doneID); $i++)
{
				//echo $toDOarrayList[$i];
		echo '<li class="sortable-item" id="'.$doneID[$i].'"><br /><a>'.$doneList[$i].'</a> <br />';
                echo ' <input  type="hidden" name="id" value="'.$doneID[$i].'"></input>';
		echo '<div id="thanksToDo'.$doneID[$i].'"><p><a style="color: #000"  href="'.site_url('BackLogController/moveToUpdate?issueid='.$doneID[$i]).'" >Edit</a>
                    <a>||</a>
                    <a style="color: #000"   href="#" onclick="deleteIssueFunction('.$doneID[$i].')" >Delete</a></p></div>
                 	   <table width=100% border="0">
  <tr>';
    
    $a=$this->dbModel->getPirority($doneID[$i]);
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