<!DOCTYPE html>
<html>
<head>
    <title>Pincode | Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css"> #pincoderrormsg{ color: red; }</style>
</head>
<body>
    <div class="container">
        <h2>&nbsp;&nbsp;<br></h2>
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="post">
                    <label for="zip">Pin code search by ajax: </label><br>
                    <input type="text" minlength="5" maxlength="6" name="pinCode" required="" placeholder="Enter Pin Code" value="" id="pinCodeId">
                    <input type="button" value="Reset" id="resetId">
                    <div id='loader' style='display: none;'>
                        <img src='<?= base_url();?>frontend_assets/giphy.gif' width='100px' height='100px'>
                    </div>
                    <br>
                    <span id="pincoderrormsg"></span>
                </form>
            </div>

            <div class="col-sm-6">
                <p>Use Pin Code for testing</p>            
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>City</th>
                        <th>Pin Code</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Indore</td>
                        <td>452001, 452002, 452003, 452020</td>
                       
                      </tr>
                      <tr>
                        <td>BHOPAL</td>
                        <td>462001, 462002, 462008,462010</td>
                      </tr>
                      <tr>
                        <td>UJJAIN</td>
                        <td>456001, 456006, 456010, 456664</td>
                      </tr>
                      <tr>
                        <td>Betul</td>
                        <td>460001, 460004,460447, 460449</td>
                      </tr>

                    </tbody>
                </table>
            </div>
        </div>

       
        <h2>Pin Code</h2>
        <div class="row">

            <div class="col-sm-4">
                <label for="office">Officename: </label>
                <select id="pinCodeRes1">
                    <option>Officename (BO/SO/HO)</option>
                    <?= $r1; ?>
                </select>
            </div>
        </div>
     
        
        <div class="row">&nbsp;&nbsp;</div>

        <div class="row">
            <div class="col-sm-4">
                <label for="sub-distname">Sub Distname: </label>
                <input type="text" required="" name="subDistname" placeholder="Sub Distname" title="Sub Distname" value="" id="pinCodeRes3">
            </div>

            <div class="col-sm-4">
                <label for="sistrictName">District Name: </label>
                <input type="text" name="districtname" placeholder="District Name" title="District Name" value="" id="pinCodeRes4">
            </div>

            <div class="col-sm-4">
                <label for="stateName">State Name: </label>
                <input type="text" name="stateName" placeholder="State Name" title="State Name" value="" id="pinCodeRes5">
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#pinCodeId').blur(function(){
            var pin = $('#pinCodeId').val();
            if(pin != '')
            {
                $('#pincoderrormsg').text('');
                $.ajax({
                    url: "<?= base_url()?>pin/pincodeajax",
                    cache: false,
                    data: {'pinCode':pin},
                    type: "POST",
                    beforeSend: function(){
                        // Show image container
                        $("#loader").show();
                    },
                    success: function(result){
                        //$('#pinCodeRes0').empty().append(result.res0);
                        $('#pinCodeRes1').empty().append(result.res1);
                        // $('#pinCodeRes2').empty().append(result.res2);
                        $('#pinCodeRes3').empty().val(result.res3);
                        $('#pinCodeRes4').empty().val(result.res4);
                        $('#pinCodeRes5').empty().val(result.res5);
                    },
                    complete:function(result){
                        // Hide image container
                        $("#loader").hide();
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            }
            else
            {
                $('#pincoderrormsg').text('Please enter pin code.');
            }    
        });

        $('#resetId').click(function(){
            var pin = $('#pinCodeId').val();
            if(pin != '')
            {
                location.reload();
            }
            else
            {
                $('#pincoderrormsg').text('Please enter pin code.');
            }
        });
    });
</script>

</body>
</html>