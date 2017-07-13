<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>form</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="intlTelInput.css">
  <link rel="stylesheet" href="demo.css">


<script>
$(document).ready(function(){
    $("#LabOrRadiologicalReport").change(function(){
    var value= $("#LabOrRadiologicalReport").val();
    if(value == "Yes")
    {
      $("#remark").show();
    }else
    {
      $("#remark").hide();
    }
});

    $("#AffectedArea").change(function(){
    var value= $("#AffectedArea").val();

    if(value == "Upper Limb" || value == "Lower Limb" || value == "Back" || value == "Face")
    {
      $("#remark1").show();
    }else
    {
      $("#remark1").hide();
    }
});


     $("#PainPattern").change(function(){
    var value= $("#PainPattern").val();


    if(value == "Agravating" || value == "Alleviating Factor" || value == "Night Pain" || value == "Intensity" || value == "Duration")
    {
      $("#remark2").show();
    }else
    {
      $("#remark2").hide();
    }
});

     $("#ExaminationReport").change(function(){
    var value= $("#ExaminationReport").val();


    if(value == "Yes")
    {
      $("#remark3").show();
    }else
    {
      $("#remark3").hide();
    }
});



});
</script>

  
</head>
<body>
        <div class="container">
        <div class="row">
        @section('body')
        @show

        </div>
        </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>