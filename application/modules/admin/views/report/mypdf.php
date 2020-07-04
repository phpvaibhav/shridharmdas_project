<!DOCTYPE HTML>
<html lang="hi">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="Shree dharmdas,श्री धर्मदास गण परिषद"><meta name="description" content="Shree dharmdas,श्री धर्मदास गण परिषद"><title><?= $gyan; ?></title>
<style>
    p, td { font-family: freeserif; }

</style>
</head>

<body>
 <!--  <div style="width:100%;height: 100px;">
    <p>
       <div style="text-align:left"><img width="80" height="88" src="<?= APP_ADMIN_ASSETS_IMG.'logo.png'; ?>"/></div>
    </p>
   <p><span style="width:50%;text-align: left;">Date: <?= date('d-m-Y'); ?></span><span style="width:50%;text-align: right;">By: <?= $_SESSION[ADMIN_USER_SESS_KEY]['fullName']; ?></span></p>
  </div>

    
             
            -->  
            
<table width="100%">
    <tr>
        <td width="33%"><img width="65" height="60" src="<?= APP_ADMIN_ASSETS_IMG.'logo.png'; ?>"/></td>
        <td width="33%" align="center" style=" font-size: 20px; font-weight: bold;font-family: freeserif;" ><?= lang('site_name'); ?></td>
        <td width="33%" style="text-align: right;"></td>
    </tr> 
    <tr>
        <td width="33%">Date: <?= date('j-m-Y'); ?></td>
        <td width="33%" align="center" style="font-weight: bold;font-family: freeserif;" ><?= $gyan; ?></td>
        <td width="33%" style="text-align: right;">By: <?= $_SESSION[ADMIN_USER_SESS_KEY]['fullName']; ?></td>
    </tr>
</table>
<table border="1" cellspacing="1" cellpadding="2" style="width:100%;font-size: 12px;">
<tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
        <th>S.No.</th>
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
        $religiousKnowledge      = display_placeholder_text(str_replace($gyan,"<b><a href='javascript:void(0);' style='text-decoration:none'>".$gyan."</a></b>",$serData->religiousKnowledge));          
        $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
        
            $content .= '<td>'.$id.'</td>';
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