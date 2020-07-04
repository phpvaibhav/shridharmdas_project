<!DOCTYPE html>
<html lang="hi">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="Shree dharmdas,श्री धर्मदास गण परिषद"><meta name="description" content="Shree dharmdas,श्री धर्मदास गण परिषद"><title>Shree dharmdas</title>
<style>
    p, td { font-family: freeserif; }

</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            

      <table class="table" cellspacing="1" cellpadding="1">
    <thead>
      <tr style="background-color:#707070;color:#FFFFFF;font-size: 12px;"  nobr="true">
          <th>Full Name</th>
          <th>S/O|W/O</th>
          <th>Family Head Name</th>
          <th>Shree Shangh</th>
          <th>Religious knowledge</th>
      </tr>
    </thead>
    <tbody>
     
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
      $content .='<tr>';
        $content .='<td colspan="6" align="center">No user found.</td>';   
      $content .='</tr>';
     
    }
     echo $content;

     ?>
     
    </tbody>
  </table>
  
</div>

</body>
</html>
