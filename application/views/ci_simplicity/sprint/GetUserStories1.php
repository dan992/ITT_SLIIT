<?php
$this->load->model('dbModel');
for($i=0 ; $i<sizeof($inProcessID); $i++)
{
		echo '<li class="sortable-item" id="'.$inProcessID[$i].'"><a>'.$inProcessList[$i].'</a> <br />';
                echo ' <input  type="hidden" name="id" value="'.$inProcessID[$i].'"></input>';
		echo '<div id="thanksToDo'.$inProcessID[$i].'"><p>
                 <table width=100% border="0">
  <tr>';
    
    $a=$this->dbModel->getPirority($inProcessID[$i]);
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

 
 for($i=0 ; $i<sizeof($inTestingID); $i++)
{
		echo '<li class="sortable-item" id="'.$inTestingID[$i].'"><a>'.$inTestingList[$i].'</a> <br />';
                echo ' <input  type="hidden" name="id" value="'.$inTestingID[$i].'"></input>';
		echo '<div id="thanksToDo'.$inTestingID[$i].'"><p>
                 <table width=100% border="0">
  <tr>';
    
    $a=$this->dbModel->getPirority($inTestingID[$i]);
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