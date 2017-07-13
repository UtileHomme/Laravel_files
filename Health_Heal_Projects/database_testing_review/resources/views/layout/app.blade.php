<!--This is the basic template for our application this remain same for all pages only content body will change according to page in which we call this template. -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>form</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
        <div class="container">
        <div class="row">
        @section('body')                    <!-- Here @section is used to define the content for different page for our application each page have this Tag and content return in it 
                                                and that page will return the content to this section. Inside we have use body to give id for this section -->
        
        @show                               <!-- @show is used to show the content whatever @section will recieve -->                                  

        </div>
        </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>