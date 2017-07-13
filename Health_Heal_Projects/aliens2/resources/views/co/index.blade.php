@extends('layout.app');

@section('title','Gender')
@section('body')



<br>


<a href="/admin/coordinator" class="btn btn-info">Home</a>
<div>
<center><h1>Leads list</h1></center>
@include('partial.message')

<table>
<tr>
	<td><b>S.no&emsp;</td>
  	<td><b>Lead No. &emsp;</td>
  	<td><b>Created Date&emsp;</td>
  	<td><b>Created By&emsp;&emsp;&emsp;&emsp;</td>
	<td><b> Client Name&emsp;</td>
	   <td><b>MobileNumber&emsp;</td>
	   <td><b>Email ID&emsp;</td>
	   <td><b>Source&emsp;</td>

	      <td><b>City&emsp;</td>
	      <td><b>Service Type&emsp;</td>
	      <td><b>Lead Type &emsp;</td>
	      <td><b>Status &emsp;</td>
</tr>
<tr><br><?php $i=1 ?></tr>
  @foreach ($lead as $lead)
<tr>

<?php 
if(session()->has('name'))
{
	$name=session()->get('name');
}else
{
if(isset($_GET['name'])){
   $name=$_GET['name'];
}else{
   $name=NULL;
}
}
?>

  	<td>{{$i++}}</td>
  	<td><a href="/vh/create?id={{$lead->id}}&name=<?php echo $name?>">{{$lead->id}}</a>&emsp;&emsp;&emsp;&emsp;</td>
  	<td>{{$lead->created_at}}</td>
  	<td>{{$lead->createdby}}</td>
	<td>{{$lead->fName}}&emsp;&emsp;</td>
	<td>{{$lead->MobileNumber}}&emsp;&emsp;&emsp;</td>
	<td>{{$lead->EmailId}}&emsp;</td>
	<td>{{$lead->Source}}&emsp;</td>
	<td>{{$lead->ServiceType}}&emsp;&emsp;</td>
	<td>{{$lead->LeadType}}&emsp;&emsp;</td>
	<td>{{$lead->ServiceStatus}}&emsp;</td>
	<td>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#{{$lead->id}}">More</a>
        </h4>
      </div>
    </td>
</tr>   
<tr>
<td colspan="12">

	
		<div id="{{$lead->id}}" class="panel-collapse collapse">
        <div class="panel-body" >
        <div style="text-align: left;">
	      <b>Alternate number:</b> {{$lead->Alternatenumber}}&emsp;
	      <b>Assessment Required: </b>{{$lead->AssesmentReq}}&emsp;
	      <b>Patient Name:</b> {{$lead->PtfName}}&emsp;
	      <b>age:</b> {{$lead->age}}&emsp;&emsp;&emsp;
	      <b>Gender:</b> {{$lead->Gender}}&emsp;&emsp;</br></br>
	      <b>Realtionsip:</b> {{$lead->Relationship}}&emsp;
	      <b>Status:</b> {{$lead->Occupation}}&emsp;

	      <b>Aadhar number:</b> {{$lead->AadharNum}}&emsp;&emsp;
	      <br><br><b>Permanent Address: </b><br><br>
	      <b>Address1: </b>{{$lead->Address1}}
	      <b>Address2: </b>{{$lead->Address2}}
	      <b>City: </b>{{$lead->City}}
	      <b>District: </b>{{$lead->District}}
	      <b>State: </b>{{$lead->State}}
	      <b>Pincode: </b>{{$lead->PinCode}}

	      <br><br>
	      <b>Emergency Address: </b><br><br>
	      <b>Address1: </b>{{$lead->EAddress1}}
	      <b>Address2: </b>{{$lead->EAddress2}}
	      <b>City: </b>{{$lead->ECity}}
	      <b>District: </b>{{$lead->EDistrict}}
	      <b>State: </b>{{$lead->EState}}
	      <b>Pincode: </b>{{$lead->EPinCode}}
<br><br>
	      
	      <b>Service type:</b> {{$lead->ServiceType}}&emsp;&emsp;
	      <b>General Condition:</b> {{$lead->GeneralCondition}}&emsp;&emsp;</br></br>
	      <b>Branch:</b> {{$lead->Branch}}&emsp;
	      <b>Requested Date:</b> {{$lead->RequestDateTime}}&emsp;

	      <b>Assigned to:</b> {{$lead->AssignedTo}}&emsp;
	      
	      <b>Quoted Price:</b> &#8377; {{$lead->QuotedPrice}}&emsp;
	      <b>Expected Price:</b> &#8377; {{$lead->ExpectedPrice}}&emsp;</br></br>
	      <b>Service Status:</b> {{$lead->ServiceStatus}}&emsp;
	      <b>Gender Prefered:</b> {{$lead->PreferedGender}}&emsp;
	      <b>Prefered Languages:</b> {{$lead->PreferedLanguage}}&emsp;
	      <b>Remarks:</b> {{$lead->Remarks}}&emsp;
	      </div>
	    	<!-- <button><a href="{{'/cc/'.$lead->id.'/edit'}}">Edit &emsp;</a></button> -->
		</div>
		</div>
		</div>
		
	</td>
</tr>


<!-- 
<td>

<form action="{{'/cc/'.$lead->id}}" method="post">
{{csrf_field()}}
{{ method_field('DELETE') }}
<input type="submit" value="Delete">

</form>

    </td> -->
   <!--  </tr> -->

@endforeach
</table>
</div>
</div>

@endsection


@section('body')

@endsection