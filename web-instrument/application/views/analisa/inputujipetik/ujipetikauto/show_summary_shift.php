<?php
    //print_r($this->db->last_query());

    $BODY = "";
    
    foreach( $summary as $val ){
        
        $shift = $val->shift;
        $min = $val->min;
        $max = $val->max;
        $avg = $val->avg;
        $sum = $val->sum;
        $under = $val->under;
        $overmax = $val->overmax;
        $conting = $val->conter;
        
        $BODY .= "<tr >
                    <td>$shift</td>
                    <td>$min</td>
                    <td>$max</td>
                    <td>$avg</td>
                    <td>$conting</td>
                    <td>$under</td>
                    <td>$overmax</td>
                </tr >";
    
    }

 ?>

<table id="t1" class="table striped table-border cell-border row-border row-hover "
    data-role="table"
    data-show-activity="false"
    data-show-search="false"
    data-show-rows-steps="false"
    data-rownum = 'false'
    data-rownum-title = 'No'
    data-rows = 15
    data-rows-steps="5, 10, 15"
     >
    <thead>
		<tr >
            <th  data-cls-column="text-center" class="text-center bg-orange" >SHIFT</th>
            <th  data-cls-column="text-center" class="text-center bg-orange" >MIN</th>
            <th  data-cls-column="text-center" class="text-center bg-orange" >MAX</th>
            <th  data-cls-column="text-center" class="text-center bg-orange" >AVG</th>
            <th  data-cls-column="text-center" class="text-center bg-orange" >SUM</th>
            <th  data-cls-column="text-center" class="text-center bg-orange" >UNDER</th>
            <th  data-cls-column="text-center" class="text-center bg-orange" >OVER</th>
		</tr>
    </thead>
  <tbody>
      <?=$BODY?>
  </tbody>
</table>