<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
    <style>
        .tbl-border{border-collapse: collapse;}
        .title1{background:#43B75C; border:1px #43B75C; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td1{border:1px solid #43B75C;} .tdfry1{background:#D6EBDC;}
        .title2{background:#ED1F6D; border:1px #ED1F6D; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td2{border:1px solid #ED1F6D;} .tdfry2{background:#FEDDE9;}
        .title3{background:#FF602E; border:1px #FF602E; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td3{border:1px solid #FF602E;} .tdfry3{background:#FFE7DF;}
        .title4{background:#238CCD; border:1px #238CCD; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td4{border:1px solid #238CCD;} .tdfry4{background:#D5F2F0;}
        .title5{background:#32B9AA; border:1px #32B9AA; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td5{border:1px solid #32B9AA;} .tdfry5{background:#D5F2F0;}
        .title6{background:#FF3A2C; border:1px #FF3A2C; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td6{border:1px solid #FF3A2C;} .tdfry6{background:#FFDFE1;}
        .title7{background:#163A9E; border:1px #163A9E; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td7{border:1px solid #163A9E;} .tdfry7{background:#DFE5F0;}
        .title8{background:#9B51A9; border:1px #9B51A9; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td8{border:1px solid #9B51A9;} .tdfry8{background:#F5E6F2;}
        .title9{background:#36B8E8; border:1px #36B8E8; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td9{border:1px solid #36B8E8;} .tdfry9{background:#D5F3F9;}
        .title10{background:#FF7844; border:1px #FF7844; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td10{border:1px solid #FF7844;} .tdfry10{background:#FFEBE4;}
        .title11{background:#A5D259; border:1px #A5D259; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td11{border:1px solid #A5D259;} .tdfry11{background:#F3F8E4;}
        .title12{background:#F541A0; border:1px #F541A0; color:#FFFFFF; font-size:1.1em; font-weight:bold;} .td12{border:1px solid #F541A0;} .tdfry12{background:#FEDFED;}
        .inntbl, inntbl tr td{background:none; border:none;}
   </style>
</head>
<body>
    
      <?php 
        $result = array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        ?>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl-border">
        <?php
        echo '<tr>';
        for($i=1; $i<count($result); $i++){
            echo '<td align="center" class=" title'.$i.'">'.$result[$i].'</td>';	
        } 
        echo '</tr>';
        $eventYear = 2024;
        for($i=1; $i<=31; $i++){
            echo '<tr>';
            for($j=1; $j<count($result); $j++){
                $dc = cal_days_in_month(CAL_GREGORIAN,$j,$eventYear);
                $date = $eventYear.'-'.$j.'-'.$i;
                $day = date('D', strtotime($date));
                
                echo '<td align="center" class="td'.$j.' '.(($day=='Fri' && $i<=$dc)?'tdfry'.$j.'':'').' ">';
                if($i<=$dc) echo '<span>'.$i.'<BR>'.$day.'</span>';
                echo '</td>';	
                
            }
            echo '</tr>'; 
        }
        print_r($result);?>
        </table>
</body>
</html>