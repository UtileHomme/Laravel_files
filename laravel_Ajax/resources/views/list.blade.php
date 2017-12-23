<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax ToDo list project</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ajax Todo list                           <a href="#" id="addNew" class="pull-right" data-toggle="modal" data-target="#myModal">  <i class="fa fa-plus" aria-hidden="true"></i></a></h3>

                    </div>
                    <div class="panel-body" id="items">
                        <ul class="list-group">
                            @foreach($items as $item)
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$item->item}}
                                <input type="hidden" name="" value="{{$item->id}}" id="itemId">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <input type="text" name="item" id="searchItem" value="" class="form-control" placeholder="Search">
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id ="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title">Add New Item</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="" id="id">
                            <p><input type="text" name="" value="" placeholder="Write Item here" id="addItem" class="form-control"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="delete" style="display:none;">Delete</button>
                            <button type="button" class="btn btn-primary" id="saveChanges" style="display:none;"  data-dismiss="modal">Save changes</button>
                            <button type="button" class="btn btn-primary" id="AddButton" data-dismiss="modal">Add Item</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
    {{csrf_field()}}


    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click','.ourItem',function(event)
        {

            var text = $(this).text();
            var id = $(this).find('#itemId').val();
            // alert(id);
            $('#title').text('Edit Item');
            var text = $.trim(text);
            $('#addItem').val(text);
            $('#delete').show('400');
            $('#saveChanges').show('400');
            $('#AddButton').hide('400');
            var id1 = $('#id').val(id);
            console.log(text);

        });




        $(document).on('click', '#addNew',function(event)
        {
            $('#title').text('Add New Item');

            $('#addItem').val("");
            $('#delete').hide('400');
            $('#saveChanges').hide('400');
            $('#AddButton').show('400');
        });



        $('#AddButton').click(function(event) {
            /* Act on the event */
            var text = $('#addItem').val();


            if(text=="")
            {
                alert('Please type anything for item');
            }
            else
            {
                $.post('list', {'text':text, '_token': $('input[name=_token]').val()}, function(data) {
                    /*optional stuff to do after success */
                    console.log(data);

                    $('#items').load(location.href + ' #items')
                });
            }

        });

        $('#delete').click(function(event)
        {
            var id = $('#id').val();

            $.post('delete', {'id':id, '_token': $('input[name=_token]').val()}, function(data) {
                /*optional stuff to do after success */
                console.log(data);

                $('#items').load(location.href + ' #items')

            });

        }
    );


    $('#saveChanges').click(function(event)
    {
        var id = $('#id').val();
        var value = $.trim($('#addItem').val());

        $.post('update', {'id':id,'value':value, '_token': $('input[name=_token]').val()}, function(data) {
            /*optional stuff to do after success */
            console.log(data);

            $('#items').load(location.href + ' #items')

        });

    }
);

$( function() {
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
    $( "#searchItem" ).autocomplete({
        source: 'http://localhost:8000/search'
    });
} );

});
</script>
</body>
</html>
