@extends('layout.app')
@section('body')
<br>
<a href="/admin/management" class="btn btn-info" >Home</a>


<h1>{{substr(Route::currentRouteName(),9)}} Mathrutvam Form</h1>
<div class="container">
       <div class="panel-group" id="accordion">   
<form class="form-horizontal" action="/vh/@yield('editid')" method="POST">
{{csrf_field()}}
@section('editMethod')
@show
  <fieldset>

    <div class="form-group">
    
<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse30">Lead Details</a>
        </h4>
      </div>
      <div id="collapse30" class="panel-collapse collapse">
        <div class="panel-body">
  @foreach ($leaddata as $lead)

    <b>Lead ID : </b>{{$lead->id}}&emsp;&emsp;
    <b>Created At : </b>{{$lead->created_at}}&emsp;&emsp;
    <b>Created By : </b>{{$lead->createdby}}&emsp;&emsp;
  <b>Client First Name : </b>{{$lead->fName}}&emsp;&emsp;
  <b>Client Middle Name : </b>{{$lead->mName}}&emsp;&emsp;
  <b>Client Last Name : </b>{{$lead->lName}}&emsp;&emsp;
  <b>Client Mobile Number : </b>{{$lead->MobileNumber}}&emsp;&emsp;
  <b>Email Id:</b>{{$lead->EmailId}}&emsp;&emsp;
  <b>Source :</b>{{$lead->Source}}&emsp;&emsp;
  <b>Service Type : </b>{{$lead->ServiceType}}&emsp;&emsp;
  <b>Lead Type : </b>{{$lead->LeadType}}&emsp;&emsp;
  <b>Service Status : </b>{{$lead->ServiceStatus}}&emsp;&emsp;
        <b>Alternate number:</b> {{$lead->Alternatenumber}}&emsp;&emsp;
        <b>Assessment Required: </b>{{$lead->AssesmentReq}}&emsp;&emsp;
        <b>Patient Name:</b> {{$lead->PtfName}}&emsp;&emsp;
        <b>age:</b> {{$lead->age}}&emsp;&emsp;
        <b>Gender:</b> {{$lead->Gender}}&emsp;&emsp;
        <b>Realtionsip:</b> {{$lead->Relationship}}&emsp;&emsp;
        <b>Status:</b> {{$lead->Occupation}}&emsp;&emsp;

        <b>Aadhar number:</b> {{$lead->AadharNum}}&emsp;&emsp;
        
        <b>Service type:</b> {{$lead->ServiceType}}&emsp;&emsp;
        <b>General Condition:</b> {{$lead->GeneralCondition}}&emsp;&emsp;
        <b>Branch:</b> {{$lead->Branch}}&emsp;&emsp;
        <b>Requested Date:</b> {{$lead->RequestDateTime}}&emsp;&emsp;

        <b>Assigned to:</b> {{$lead->AssignedTo}}&emsp;&emsp;
        
        <b>Quoted Price:</b> &#8377; {{$lead->QuotedPrice}}&emsp;&emsp;
        <b>Expected Price:</b> &#8377; {{$lead->ExpectedPrice}}&emsp;&emsp;
        <b>Service Status:</b> {{$lead->ServiceStatus}}&emsp;&emsp;
        <b>Gender Prefered:</b> {{$lead->PreferedGender}}&emsp;&emsp;
        <b>Prefered Languages:</b> {{$lead->PreferedLanguage}}&emsp;&emsp;
        <b>Remarks:</b> {{$lead->Remarks}}&emsp;&emsp;
        
        <!-- <button><a href="{{'/cc/'.$lead->id.'/edit'}}">Edit &emsp;</a></button> -->
   
<br><br>
@if($verc == NULL)

    <label>Assign TO
            <select name="assigned" id="assigned" class="form-control" >
            
             <option value="@yield('editassigned')">@yield('editassigned')</option>
            
            @foreach($emp as $emp)
            <option value="{{ $emp->FirstName }}">{{ $emp->FirstName }}</option>
            @endforeach
           </select>
              </label>&emsp;

@else
        <b>Assigned To: </b>{{ $verc->FirstName }}
@endif

@endforeach
</div>
</div>
</div>

  
    <div class="form-group">
 <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsed11">General Details</a>
        </h4>
      </div>
      <div id="collapsed11" class="panel-collapse collapse">
        <div class="panel-body">

              <label>Assessor<input type="text" class="form-control" rows="5" name="Assessor" id="Assessor" value="@yield('editAssessor')"></label>&emsp;

               <label>Assess DateTime<input type="datetime-local" class="form-control" rows="5" name="AssessDateTime" id="AssessDateTime" value="@yield('editAssessDateTime')"></label>&emsp;

                <label>Assess Place<input type="text" class="form-control" rows="5" name="AssessPlace" id="AssessPlace" value="@yield('editAssessPlace')"></label>&emsp;

                 <label>Service Start Date<input type="date" class="form-control" rows="5" name="ServiceStartDate" id="ServiceStartDate" value="@yield('editServiceStartDate')"></label>
                 &emsp;
                  <label>Service Pause<input type="text" class="form-control" rows="5" name="ServicePause" id="ServicePause" value="@yield('editServicePause')"></label>
                  &emsp;
                   <label>Service End Date<input type="date" class="form-control" rows="5" name="ServiceEndDate" id="ServiceEndDate" value="@yield('editServiceEndDate')"></label>
                   &emsp;
                    <label>Shift Preference<input type="text" class="form-control" rows="5" name="ShiftPreference" id="ShiftPreference" value="@yield('editShiftPreference')"></label>
                    &emsp;
                     <label>Specific Requirements<input type="text" class="form-control" rows="5" name="SpecificRequirements" id="SpecificRequirements" value="@yield('editSpecificRequirements')"></label>
                     &emsp;
                   <label>Days Worked<input type="text" class="form-control" rows="5" name="DaysWorked" id="DaysWorked" value="@yield('editDaysWorked')"></label>
                    
        &emsp;

          <label>Latitude<input type="text" class="form-control" rows="5" name="Latitude" id="Latitude" value="@yield('editLatitude')"></label>&emsp;


                   <label>Longitude<input type="text" class="form-control" rows="5" name="Longitude" id="Longitude" value="@yield('editLongitude')"></label>&emsp;

        
        <br>
</div>
</div>
</div>
<br>




<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Mother's Details</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        <label>First Name<input type="text" class="form-control" rows="5" name="FName" id="FName" value="@yield('editFName')"></label>
        &emsp;
        <label>Middle Name<input type="text" class="form-control" rows="5" name="MName" id="MName" value="@yield('editMName')"></label>
        &emsp;
        <label>Last Name<input type="text" class="form-control" rows="5" name="LName" id="LName" value="@yield('editLName')"></label>
        &emsp;
        <label>Medications <input type="text" class="form-control" rows="5" name="Medications" id="Medications" value="@yield('editMedications')"></label>
        &emsp;
        <label>Medical Diagnosis<input type="text" class="form-control" rows="5" name="MedicalDiagnosis" id="MedicalDiagnosis" value="@yield('editMedicalDiagnosis')"></label>
        &emsp;
        <label>Delivery Place<input type="text" class="form-control" rows="5" name="DeliveryPlace" id="DeliveryPlace" value="@yield('editDeliveryPlace')"></label>
        &emsp;
        <label>Due Date<input type="text" class="form-control" rows="5" name="DueDate" id="DueDate" value="@yield('editDueDate')"></label>
        &emsp;
        <label>Delivery Type<input type="text" class="form-control" rows="5" name="DeliveryType" id="DeliveryType" value="@yield('editDeliveryType')"></label>
        &emsp;
        <label>No. of Babies
        <select name="NoOfBabies" id="NoOfBabies" class="form-control" value="@yield('editNoOfBabies')">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select></label> &emsp;&emsp;
          <label>No. of attender required
        <select name="NoOfAttenderRequired" id="NoOfAttenderRequired" class="form-control" value="@yield('editNoOfAttenderRequired')">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select></label>
        <br>
        
        <br>
      </div>  
      </div>
</div>

   <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Baby Details</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
       <label>Child DOB<input type="text" class="form-control" rows="5" name="ChildDOB" id="ChildDOB" value="@yield('editChildDOB')"></label>
        &emsp;
        <label>Child Medical Diagnosis<input type="text" class="form-control" rows="5" name="ChildMedicalDiagnosis" id="ChildMedicalDiagnosis" value="@yield('editChildMedicalDiagnosis')"></label>
        &emsp;
        <label>Child Medications <input type="text" class="form-control" rows="5" name="ChildMedications" id="ChildMedications" value="@yield('editChildMedications')"></label>
        &emsp;
        <label>Immunization Updated <input type="text" class="form-control" rows="5" name="ImmunizationUpdated" id="ImmunizationUpdated" value="@yield('editImmunizationUpdated')"></label>
        <br>
        <label>Birth Weight <input type="text" class="form-control" rows="5" name="BirthWeight" id="BirthWeight" value="@yield('editBirthWeight')"></label>
        &emsp;
        <label>Discharge Weight <input type="text" class="form-control" rows="5" name="DischargeWeight" id="DischargeWeight" value="@yield('editDischargeWeight')"></label>
        &emsp;
        <label>Feeding Formula <input type="text" class="form-control" rows="5" name="FeedingFormula" id="FeedingFormula" value="@yield('editFeedingFormula')"></label>
        &emsp;
        <label>Feeding Issue 
		<select name="FeedingIssue" id="FeedingIssue" class="form-control" value="@yield('editFeedingIssue')">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Feeding Type <input type="text" class="form-control" rows="5" name="FeedingType" id="FeedingType" value="@yield('editFeedingType')"></label>
        &emsp;
        <label>Feeding Established 
			<select name="FeedingEstablished" id="FeedingEstablished" class="form-control" value="@yield('editFeedingEstablished')">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Feeding Mode <input type="text" class="form-control" rows="5" name="FeedingMode" id="FeedingMode" value="@yield('editFeedingMode')"></label>
        &emsp;
        <label>MedicalConditions <input type="text" class="form-control" rows="5" name="MedicalConditions" id="MedicalConditions" value="@yield('editMedicalConditions')"></label>
        &emsp;
        <label>Length <input type="text" class="form-control" rows="5" name="Length" id="Length" value="@yield('editLength')"></label>
        &emsp;
        <label>Head Circumference <input type="text" class="form-control" rows="5" name="HeadCircumference" id="HeadCircumference" value="@yield('editHeadCircumference')"></label>
        &emsp;
        <label>SleepingPattern <input type="text" class="form-control" rows="5" name="SleepingPattern" id="SleepingPattern" value="@yield('editSleepingPattern')"></label>
        &emsp;

        
        <br>
        </div>
        </div>
        </div>



      
<?php $leadid=$_GET['id']?>
<input type="hidden" name="leadid" value="<?php echo $leadid;?>">


<br>
<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsed12">Product Details</a>
        </h4>
      </div>
      <div id="collapsed12" class="panel-collapse collapse">
        <div class="panel-body">

              <!-- <label>SKU ID<input type="text" class="form-control" rows="5" name="SKUid" id="SKUid" value="@yield('editSKUid')"></label>&emsp; -->

               <label>Product Name<input type="text" class="form-control" rows="5" name="ProductName" id="ProductName" value="@yield('editProductName')"></label>&emsp;

                <label>Demo Required<input type="text" class="form-control" rows="5" name="DemoRequired" id="DemoRequired" value="@yield('editDemoRequired')"></label>&emsp;

                 <label>Availability Status<input type="text" class="form-control" rows="5" name="AvailabilityStatus" id="AvailabilityStatus" value="@yield('editAvailabilityStatus')"></label>
                 &emsp;
                  <label>Availability Address<input type="text" class="form-control" rows="5" name="AvailabilityAddress" id="AvailabilityAddress" value="@yield('editAvailabilityAddress')"></label>
                  &emsp;
                   <label>Selling Price<input type="text" class="form-control" rows="5" name="SellingPrice" id="SellingPrice" value="@yield('editSellingPrice')"></label>
                   &emsp;
                    <label>Rental Price<input type="text" class="form-control" rows="5" name="RentalPrice" id="RentalPrice" value="@yield('editRentalPrice')"></label>
                    &emsp;
                     
        
        <br>
</div></div></div>
<br>
<?php $leadid=$_GET['id'];
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
<input type="hidden" name="leadid" value="<?php echo $leadid;?>">
<input type="hidden" name="sname" value="<?php echo $name;?>">
 <button type="submit" class="btn btn-success">Submit</button>
       
    </div>
  </fieldset>
</form>
</div>
      
  @include('partial.errors')
</div>
@endsection