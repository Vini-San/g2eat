<!DOCTYPE HTML>
<html lang="en-US">

<head>

    <meta charset="UTF-8">
    <title>Calculadora</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">    
</head>

<body>
	
    <div class="container">
		
        <div class="row main">
		
            <div class=" col-xs-12  col-sm-offset-4 col-sm-12  col-md-offset-3 col-md-6  col-lg-offset-3 col-lg-6  ">
                <form name="form" class="well calculatorcontainer col-xs-12  col-sm-offset-4 col-sm-12  col-md-offset-3 col-md-6  col-lg-offset-3 col-lg-6" method="post" action="">
					
					<?php  echo validation_errors(); ?>

					<?php echo form_open('form');
					if (isset($msgerror)) {
						echo $msgerror;
						echo "<br>";
					}
					?>
                  

                    <input class=" form-control " id="btnValue" name="btnValue" value="<?php if(isset($resultado)){ echo $resultado;} else { echo set_value('btnValue');} ?>"><br/>

                    

                    <input class="form-group btn btn-default bttn" type="button" name="bttn7" value="7">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn8" value="8">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn9" value="9">
                    <input class="form-group btn btn-danger bttn" type="button" name="bttnplus" value="+"><br/>
                    <input class="form-group btn btn-default bttn" type="button" name="bttn4" value="4">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn5" value="5">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn6" value="6">
                    <input class="form-group btn btn-danger bttn" type="button" name="bttnminus" value="-"><br/>

                    <input class="form-group btn btn-default bttn" type="button" name="bttn1" value="1">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn2" value="2">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn3" value="3">
                    <input class="form-group btn btn-danger bttn" type="button" name="bttnmulti" value="*"><br/>
                    <input class="form-group btn btn-default bttn" type="button" name="bttndot" value=".">
                    <input class="form-group btn btn-default bttn" type="button" name="bttn0" value="0">
                    <input class="form-group btn btn-danger bttn" type="button" name="bttnmod" value="%">
                    <input class="form-group btn btn-danger bttn" type="button" name="bttndiv" value="/"><br/>

                    
                    <input class="form-group btn btn-info bttn bttne" type="button" value="CE">

                    <input class="form-group btn btn-success bttn bttne" type="submit" name="calculate" value="=">


                </form>


            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript">
	$('input[type=button]').on('click',function(){
		if($('#btnValue').val()==''){
	$('#btnValue').val($(this).val());
	}else{
	$('#btnValue').val($('#btnValue').val()+($(this).val()));
	}

	})
	</script>
    
</body>

</html>