@extends('layout.app')
@section('body')
<br>
<a href="/admin/vertical" class="btn btn-info" >Home</a>


<h1>{{substr(Route::currentRouteName(),9)}} Physiotheraphy Form</h1>
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


<label>Lead Status
            <select name="ServiceStatus" id="ServiceStatus" class="form-control" >
            <option value="{{$lead->ServiceStatus}}">{{$lead->ServiceStatus}}</option>
          
            @foreach($service1 as $service1)
           
            <option value="{{ $service1->status}}">{{ $service1->status}}</option>
            @endforeach
          </select>
        </label>
        &emsp;


        <label>Service Requested
            <select name="requested_service" id="requested_service" class="form-control" value="@yield('editrequested_service')">
            <option value="@yield('editrequested_service')">@yield('editrequested_service')</option>
            @foreach($service as $service)
            <option value="{{ $service->servicetype}}">{{ $service->servicetype}}</option>
            @endforeach
          </select>
        </label>
        &emsp;


        
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



 <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsed11">General Details</a>
        </h4>
      </div>
      <div id="collapsed11" class="panel-collapse collapse">
        <div class="panel-body">

              <label>Assessor<input type="text" class="form-control" rows="5" name="Assessor" id="Assessor" value="@yield('editAssessor')"></label>&emsp;

               <label>Assess DateTime<input type="datetime-local" class="form-control" rows="5" name="AssessDateTime" id="AssessDateTime" value="@yield('editAssessDateTime')">
               </label>&emsp;

                <label>Assess Place<input type="text" class="form-control" rows="5" name="AssessPlace" id="AssessPlace" value="@yield('editAssessPlace')"></label>&emsp;

                 <label>Service Start Date<input type="date" class="form-control" rows="5" name="ServiceStartDate" id="ServiceStartDate" value="@yield('editServiceStartDate')"></label>
                 &emsp;
                  <label>Service Pause<input type="text" class="form-control" rows="5" name="ServicePause" id="ServicePause" value="@yield('editServicePause')"></label>
                  &emsp;
                   <label>Service End Date<input type="date" class="form-control" rows="5" name="ServiceEndDate" id="ServiceEndDate" value="@yield('editServiceEndDate')"></label>
                   &emsp;
                    <label>Shift Preference
                      <select name="ShiftPreference" id="ShiftPreference" class="form-control">
                      <option value="@yield('editShiftPreference')">@yield('editShiftPreference')</option>
            @foreach($shift as $shift)
            <option value="{{ $shift->shiftrequired}}">{{ $shift->shiftrequired}}</option>
            @endforeach
           </select>
                    </label>
                    &emsp;
                     
                   <!-- <label>Days Worked<input type="text" class="form-control" rows="5" name="DaysWorked" id="DaysWorked" value="@yield('editDaysWorked')"></label>&emsp; -->

                   <label>Latitude<input type="text" class="form-control" rows="5" name="Latitude" id="Latitude" value="@yield('editLatitude')"></label>&emsp;


                   <label>Longitude<input type="text" class="form-control" rows="5" name="Longitude" id="Longitude" value="@yield('editLongitude')"></label>
                   &emsp;
                   <label>Specific Requirements <textarea class="form-control" rows="5" cols="20" name="SpecificRequirements" id="SpecificRequirements" value="@yield('editSpecificRequirements')">@yield('editSpecificRequirements')</textarea></label>
                     &emsp;
                    
        &emsp;
        
        <br>
</div>
</div>
</div>
<br>

      

   <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Physiotherapy Details</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">

  <b>Chief complains:</b>
      <textarea class="form-control" rows="5" cols="20" name="chiefcomplains" id="chiefcomplains" value="@yield('editchiefcomplains')">@yield('editMedicalDisgnosis')</textarea>
      <br>
       <b>History of presenting complaints:</b>
      <textarea class="form-control" rows="5" cols="20" name="ho_pc" id="ho_pc" value="@yield('editho_pc')">@yield('editho_pc')</textarea>
      <br>

      <b>Any previous history/surgical/physiotherapy treatment:</b>
      <textarea class="form-control" rows="5" cols="20" name="previousmedical" id="previousmedical" value="@yield('editpreviousmedical')">@yield('editpreviousmedical')</textarea>
      <br>

      <b>Occupational History:</b>
      <textarea class="form-control" rows="5" cols="20" name="occupationalH" id="occupationalH" value="@yield('editoccupationalH')">@yield('editoccupationalH')</textarea>
      <br>
      

      <b>Environment History:</b>
      <textarea class="form-control" rows="5" cols="20" name="envhistory" id="envhistory" value="@yield('editenvhistory')">@yield('editenvhistory')</textarea>
      <br>

       <label>Physiotheraphy Type
          <select name="PhysiotheraphyType" id="PhysiotheraphyType" class="form-control" value="@yield('editPhysiotheraphyType')">
          <option value="@yield('editPhysiotheraphyType')">@yield('editPhysiotheraphyType')</option>
          <option value="Post-Surgical Rehabilatation">Post-Surgical Rehabilatation</option>
            <option value="Pediatric Physio">Pediatric Physio</option>
             <option value="Neurological Disorder/Stroke Rehabilitation">Neurological Disorder/Stroke Rehabilitation</option>
            <option value="Treat and Manage CRIs and SRIs">Treat and Manage CRIs and SRIs</option>
            <option value="OBG">OBG</option>
            <option value="Gedeatric">Gedeatric</option>
            <option value="Cancer">Cancer</option>
            <option value="Osteoporosis">Osteoporosis</option>
            <option value="Sports Injury">Sports Injury</option>
            <option value="Orthopedic">Orthopedic</option>
           
          </select>

       </label>
        &emsp;
        <label>Metal Implant
          <select name="MetalImplant" id="MetalImplant" class="form-control" value="@yield('editMetalImplant')">
          <option value="@yield('editMetalImplant')">@yield('editMetalImplant')</option>
             <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
        </label>
        &emsp;
        <label>Hypertension
          <select name="Hypertension" id="Hypertension" class="form-control" value="@yield('editHypertension')">
          <option value="@yield('editHypertension')">@yield('editHypertension')</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
        </label>
        &emsp;
        <label>Medications
          <select name="Medications" id="Medications" class="form-control" value="@yield('editMedications')">
          <option value="@yield('editMedications')">@yield('editMedications')</option>
            < <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>          
        </label>
        &emsp;
       
        <label>Pregnant OrBreast Feeding
          <select name="PregnantOrBreastFeeding" id="PregnantOrBreastFeeding" class="form-control" value="@yield('editPregnantOrBreastFeeding')">
          <option value="@yield('editPregnantOrBreastFeeding')">@yield('editPregnantOrBreastFeeding')</option>
             <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
        </label>
        &emsp;
        <label>Diabetes
        <select name="Diabetes" id="Diabetes" class="form-control" value="@yield('editDiabetes')">
        <option value="@yield('editDiabetes')">@yield('editDiabetes')</option>
             <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
        </label>
        &emsp;
        <label>Chronic Infection
        <select name="ChronicInfection" id="ChronicInfection" class="form-control" value="@yield('editChronicInfection')">
        <option value="@yield('editChronicInfection')">@yield('editChronicInfection')</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
        </label>
        &emsp;
        <label>Heart Disease
          <select name="HeartDisease" id="HeartDisease" class="form-control" value="@yield('editHeartDisease')">
          <option value="@yield('editHeartDisease')">@yield('editHeartDisease')</option>
             <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
          </label>
        &emsp;
        <label>Epilepsy
        <select name="Epilepsy" id="Epilepsy" class="form-control" value="@yield('editEpilepsy')">
        <option value="@yield('editEpilepsy')">@yield('editEpilepsy')</option>
             <option value="Present">Present</option>
            <option value="Absent">Absent</option>
             <option value="Patient is not Aware">Patient is not Aware</option>
          </select>
        </label>
        &emsp;
        <label>Past/Present Surgery Details

          <select name="SurgeryUndergone" id="SurgeryUndergone" class="form-control" value="@yield('editSurgeryUndergone')">
          <option value="@yield('editSurgeryUndergone')">@yield('editSurgeryUndergone')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Assesment Date<input type="date" class="form-control" rows="5" name="AssesmentDate" id="AssesmentDate" value="@yield('editAssesmentDate')"></label>
        &emsp;
        <label>Short Term Goal<input type="text" class="form-control" rows="5" name="ShortTermGoal" id="ShortTermGoal" value="@yield('editShortTermGoal')"></label>
        &emsp;
         <label>Long Term Goal<input type="text" class="form-control" rows="5" name="LongTermGoal" id="LongTermGoal" value="@yield('editLongTermGoal')"></label>
        &emsp;
        <br>
         <label>Medical Diagnosis
          <textarea class="form-control" rows="5" cols="20" name="MedicalDisgnosis" id="MedicalDisgnosis" value="@yield('editMedicalDisgnosis')">@yield('editMedicalDisgnosis')</textarea>
        </label>
        &emsp;
        <label>Physiotherapeutic Diagnosis
           <textarea class="form-control" rows="5" cols="20" name="PhysiotherapeuticDiagnosis" id="PhysiotherapeuticDiagnosis" value="@yield('editPhysiotherapeuticDiagnosis')">@yield('editPhysiotherapeuticDiagnosis')</textarea>


        </label>
        &emsp;
        <div class="col-sm-12"></div>
        <div class="col-sm-3">
        <label>Affected Area
           <select name="AffectedArea" id="AffectedArea" class="form-control" value="@yield('editAffectedArea')">
           <option value="@yield('editAffectedArea')">@yield('editAffectedArea')</option>
            <option value="Upper Limb">Upper Limb</option>
            <option value="Lower Limb">Lower Limb</option>
            <option value="Back">Back</option>
            <option value="Face">Face</option>
          </select>
        </label>
        &emsp;
        </div>

         <div class="col-sm-4">
                <div class="form-group" id="remark1" style="display: none">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name="affectedq" value="@yield('editaffectedq')">@yield('editaffectedq')</textarea>

</div>
        </div>

<div class="col-sm-12"></div>

 <div class="col-sm-12"></div>
        <div class="col-sm-3">
        <label>Pain Pattern
          <select name="PainPattern" id="PainPattern" class="form-control" value="@yield('editPainPattern')">
          <option value="@yield('editPainPattern')">@yield('editPainPattern')</option>
            <option value="Agravating">Agravating</option>
            <option value="Alleviating Factor">Alleviating Factor</option>
            <option value="Night Pain">Night Pain</option>
            <option value="Intensity">Intensity</option>
            <option value="Duration">Duration</option>
          </select>
        </label>
        &emsp;

        </div>

         <div class="col-sm-4">
                <div class="form-group" id="remark2" style="display: none">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name="painq" value="@yield('editpainq')">@yield('editpainq')</textarea>
</div>
        </div>

<div class="col-sm-12"></div>

 <div class="col-sm-12"></div>
        <div class="col-sm-3">
        <label>Examination Report
      <select name="ExaminationReport" id="ExaminationReport" class="form-control" value="@yield('editExaminationReport')">
      <option value="@yield('editExaminationReport')">@yield('editExaminationReport')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;

        </div>

         <div class="col-sm-4">
                <div class="form-group" id="remark3" style="display: none">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name="examinationq" value="@yield('editexaminationq')" >@yield('editexaminationq')</textarea>
</div>
        </div>

<div class="col-sm-12"></div>



        <div class="col-sm-12"></div>
        <div class="col-sm-3">
        <label>Lab Or Radiological Report
        <select name="LabOrRadiologicalReport" id="LabOrRadiologicalReport" class="form-control" value="@yield('editLabOrRadiologicalReport')">
            <option value="@yield('editLabOrRadiologicalReport')">@yield('editLabOrRadiologicalReport')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
</div>
 <div class="col-sm-4">
                <div class="form-group" id="remark" style="display: none">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment" name="labq" value="@yield('editlabq')">@yield('editlabq')</textarea>
</div>
        </div>

<div class="col-sm-12"></div>
        
       
        
        
        <br>
        
        <br>
        </div>
        </div>
        </div>

<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Physiotherapy Report Details</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
      1&emsp;<label>Problem Identified<input type="text" class="form-control" rows="5" name="ProblemIdentified" id="ProblemIdentified" value="@yield('editProblemIdentified')"></label>
        &emsp;
        <label>Treatment<input type="text" class="form-control" rows="5" name="Treatment" id="Treatment" value="@yield('editTreatment')"></label>
        &emsp;
        <br>
       2&emsp;<label><input type="text" class="form-control" rows="5" name="p1" id="p1" value="@yield('editp1')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t1" id="t1" value="@yield('editt1')"></label>
        &emsp;
        
        <br>
       3&emsp;<label><input type="text" class="form-control" rows="5" name="p2" id="p2" value="@yield('editp2')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t2" id="t2" value="@yield('editt2')"></label>
        &emsp;
        <br>
      4&emsp;<label><input type="text" class="form-control" rows="5" name="p3" id="p3" value="@yield('editp3')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t3" id="t3" value="@yield('editt3')"></label>
        &emsp;
        <br>
       5&emsp;<label><input type="text" class="form-control" rows="5" name="p4" id="p4" value="@yield('editp4')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t4" id="t4" value="@yield('editt4')"></label>
        &emsp;
        <br>
       6&emsp;<label><input type="text" class="form-control" rows="5" name="p5" id="p5" value="@yield('editp4')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t5" id="t5" value="@yield('editt5')"></label>
        &emsp;
        <br>
       7&emsp;<label><input type="text" class="form-control" rows="5" name="p6" id="p6" value="@yield('editp6')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t6" id="t6" value="@yield('editt6')"></label>
        &emsp;
        <br>
       8&emsp;<label><input type="text" class="form-control" rows="5" name="p7" id="p7" value="@yield('editp7')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t7" id="t7" value="@yield('editt7')"></label>
        &emsp;
        <br>
       9&emsp;<label><input type="text" class="form-control" rows="5" name="p8" id="p8" value="@yield('editp8')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t8" id="t8" value="@yield('editt8')"></label>
        &emsp;
        <br>
       10&emsp;<label><input type="text" class="form-control" rows="5" name="p9" id="p9" value="@yield('editp9')"></label>
        &emsp;
        <label><input type="text" class="form-control" rows="5" name="t9" id="t9" value="@yield('editt9')"></label>
        &emsp;
        <br>
<!-- 
        <div id="div">
 <button onclick ="appendRow()" value="Add Row">Add Row</button>
 <br>
 </div>
<script type="text/javascript">
  var x=1
function appendRow()
{
   var d = document.getElementById('div');
   d.innerHTML += "<label><input type='text' class='form-control' name='p"+ x +"' id='p"+ x +"'></label>&emsp;<label><input type='text' class='form-control' name='t"+ x +"' id='t"+ x++ +"'></label><br >";
}

</script> -->

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

             <!--  <label>SKU ID<input type="text" class="form-control" rows="5" name="SKUid" id="SKUid" value="@yield('editSKUid')"></label>&emsp;
 -->
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