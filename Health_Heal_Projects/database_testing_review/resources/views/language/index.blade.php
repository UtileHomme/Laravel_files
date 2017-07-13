@extends('layout.app');                <!-- @extend is used to include the other file with this file. Here we are including our template file
                                            which is in layout folder with app.blade.php file name -->

                <!--this @section is used to change the title of page when this page is call. for this page our title should be language.  -->

@section('body')                            <!-- This @section we have used to pass the content to template file to show the details related to this page. -->
Language

<br>                                                    <!-- here we can write HTML Code to format the details acoordingly and the inforantion we want to give -->
<a href="langs/create" class="btn btn-info">Add</a>
<div class="col-lg-4 col-lg-offset-4">
<center><h1>Language list</h1></center>
<ul class="list-group">
    @foreach ($langs as $lang)                           <!-- foreach is used to loop the things here we have loop the li tag -->
  <li class="list-group-item">

   	</br>{{$lang->id}}                                  <!-- This is to show the data from the database. he have to give the field names and it shows the details related to it. -->
	{{$lang->name}}
  </li>
 @endforeach                                            <!-- end of foreach -->
</ul>
</div>
{{$langs->links()}}                                     <!-- This will show the pagination with page number and links on it -->

@endsection                                             <!-- end of section -->
