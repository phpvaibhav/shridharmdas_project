<!DOCTYPE HTML>
<html lang="hi">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="Shree dharmdas,श्री धर्मदास गण परिषद"><meta name="description" content="Shree dharmdas,श्री धर्मदास गण परिषद"><title>Shree dharmdas</title>
<link href="https://fonts.googleapis.com/css2?family=Hind&display=swap&subset=devanagari,latin-ext" rel="stylesheet"> 
<style>
* { 
 font-family: 'Hind', sans-serif;
}
</style>
</head>

<body>


<h1>Codeigniter 3 - Generate PDF from view using dompdf library with example</h1>

<table border="0" cellspacing="1" cellpadding="2" style="width:100%;">
<tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
        <th>Full Name</th>
        <th>S/O|W/O</th>
        <th>Family Head Name</th>
        <th>Shree Shangh</th>
        <th>Religious knowledge</th>
        </tr>
	
<?php $content="";
	if(!empty($users)){

     foreach ($users as $k => $serData) {
       if($k++%2 == 1){
          $colr = "background-color:#f1f1f1;";
        }else{
          $colr = "background-color:#fff;";
        }
        $id      = $k;

        $fullName      = display_placeholder_text($serData->hindiFullName); 
        $parentName      = display_placeholder_text($serData->hindiParentName); 
        $familyHeadName      = display_placeholder_text($serData->hindiFamilyHeadName); 
        $sanghName      = display_placeholder_text($serData->unionName).(!empty($serData->otherUnionName) ? ' ('.display_placeholder_text($serData->otherUnionName).')':""); 
        $religiousKnowledge      = display_placeholder_text(str_replace($gyan,"<b><a href='javascript:void(0);'>".$gyan."</a></b>",$serData->religiousKnowledge));          
        $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
        
            $content .= '<td>'.$fullName.'</td>';
            $content .= '<td>'.$parentName.'</td>';
            $content .= '<td>'.$familyHeadName.'</td>';  
            $content .= '<td>'.$sanghName.'</td>';  
            $content .= '<td>'.$religiousKnowledge.'</td>';  
        $content .='</tr>';
      }
        }else{
      $colr     = "background-color:#f1f1f1;";
      $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
        $content .='<td colspan="6" align="center">No user found.</td>';   
      $content .='</tr>';
     
    }
     echo $content;

     ?>
</table>


</body>

</html>