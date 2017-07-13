@extends('layout.app')
@section('body')
<br>
<a href="/admin/vertical" class="btn btn-info" >Home</a>


<h1>{{substr(Route::currentRouteName(),9)}} Assessment Form</h1>
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsed2">Assessment Details</a>
        </h4>
      </div>
      <div id="collapsed2" class="panel-collapse collapse">
        <div class="panel-body">
<b>Medical Diagnosis</b>
<textarea class="form-control" rows="5" cols="20" name="MedicalDiagnosis" id="MedicalDiagnosis" value="@yield('editMedicalDiagnosis')">@yield('editMedicalDiagnosis')</textarea>
    <br>
<b>Chief reasons for seeking home healthcare:</b>

<textarea class="form-control" rows="5" cols="20" name="q1" id="q1" value="@yield('editq1')">@yield('editq1')</textarea>
<br>






<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Orientation </a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Person <input type="text" class="form-control" rows="5" name="Person" id="Person" value="@yield('editPerson')"></label>
        &emsp;
        <label>Place <input type="text" class="form-control" rows="5" name="Place" id="Place" value="@yield('editPlace')"></label>
        &emsp;
        <label>Time<input type="text" class="form-control" rows="5" name="Time" id="Time" value="@yield('editTime')"></label>
        &emsp;
        
   </div>  
   </div>  
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Memory Intacts </a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
        <div>
        <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse60">Short Term</a>
        </h4>
      </div>
      <div id="collapse60" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Intact 
        <select name="ShortTermIntact" id="ShortTermIntact" class="form-control" value="@yield('editShortTermIntact')">
        <option value="@yield('editShortTermIntact')">@yield('editShortTermIntact')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select></label>
        &emsp;
        <label>Impaired
            <select name="ShortTermImpaired" id="ShortTermImpaired" class="form-control" value="@yield('editShortTermImpaired')">
            <option value="@yield('editShortTermImpaired')">@yield('editShortTermImpaired')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        
   </div>    
   </div>
</div>
 &emsp; &emsp;
        </div>
        <div>
        <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse70">Long term</a>
        </h4>
      </div>
      <div id="collapse70" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Intact
        <select name="LongTermIntact" id="LongTermIntact" class="form-control" value="@yield('editLongTermIntact')">
        <option value="@yield('editLongTermIntact')">@yield('editLongTermIntact')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select></label>
        &emsp;
        <label>Impaired
            <select name="LongTermImpaired" id="LongTermImpaired" class="form-control" value="@yield('editLongTermImpaired')">
            <option value="@yield('editLongTermImpaired')">@yield('editLongTermImpaired')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        
   </div>    
   </div>
</div>

        </div>
        
   </div>    
   </div>
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Communication </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Language 
            <select name="Language" id="Language" class="form-control">
            <option value="@yield('editLanguage')">@yield('editLanguage')</option>
            @foreach($language as $language)
            <option value="{{ $language->Languages}}">{{ $language->Languages}}</option>
            @endforeach
           </select>

        </label>
        &emsp;
        <label>Adequate for All Activities
            <select name="AdequateforAllActivities" id="AdequateforAllActivities" class="form-control" value="@yield('editAdequateforAllActivities')">
            <option value="@yield('editAdequateforAllActivities')">@yield('editAdequateforAllActivities')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Unable To Communicate
            <select name="unableToCommunicate" id="unableToCommunicate" class="form-control" value="@yield('editunableToCommunicate')">
            <option value="@yield('editunableToCommunicate')">@yield('editunableToCommunicate')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
   </div>    
   </div>
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">Vision</a>
        </h4>
      </div>
      <div id="collapse13" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Impared
        <select name="Impared" id="Impared" class="form-control" value="@yield('editImpared')">
        <option value="@yield('editImpared')">@yield('editImpared')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Short-Sight 
        <select name="ShortSight" id="ShortSight" class="form-control" value="@yield('editShortSight')">
        <option value="@yield('editShortSight')">@yield('editShortSight')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Long-Sight
        <select name="LongSight" id="LongSight" class="form-control" value="@yield('editLongSight')">
        <option value="@yield('editLongSight')">@yield('editLongSight')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Wears Glasses 
        <select name="WearsGlasses" id="WearsGlasses" class="form-control" value="@yield('editWearsGlasses')">
        <option value="@yield('editWearsGlasses')">@yield('editWearsGlasses')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        </div>
        </div>
        </div>

        <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse13a">Hearing</a>
        </h4>
      </div>
      <div id="collapse13a" class="panel-collapse collapse">
        <div class="panel-body">

        <label>Impared
        <select name="HImpared" id="HImpared" class="form-control" value="@yield('editHImpared')">
        <option value="@yield('editHImpared')">@yield('editHImpared')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;

        <label>Hearing Aids 
        <select name="HearingAids" id="HearingAids" class="form-control" value="@yield('editHearingAids')">
        <option value="@yield('editHearingAids')">@yield('editHearingAids')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        
   </div> 
   </div>   
</div>



<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">Respiratory </a>
        </h4>
      </div>
      <div id="collapse12" class="panel-collapse collapse">
        <div class="panel-body">

        <label>SOB <input type="text" class="form-control" rows="5" name="SOB" id="SOB" value="@yield('editSOB')"></label>
        &emsp;

        <label>SPO2 <input type="text" class="form-control" rows="5" name="SPO2" id="SPO2" value="@yield('editSPO2')"></label>
        &emsp;

        <label>H_OTB_Asthma_COPD <input type="text" class="form-control" rows="5" name="H_OTB_Asthma_COPD" id="H_OTB_Asthma_COPD" value="@yield('editH_OTB_Asthma_COPD')"></label>
        &emsp;
        
        <label>Cough
            <select name="Cough" id="Cough" class="form-control" value="@yield('editCough')">
            <option value="@yield('editCough')">@yield('editCough')</option>
            <option value="Productive">Productive</option>
            <option value="Non-Productive">Non-Productive</option>
            <option value="Productive(Dry)">Productive(Dry)</option>
            <option value="Non-Productive(Dry)">Non-Productive(Dry)</option>
          </select>
        </label>
        &emsp;
        <label>Color Of Phlegm <input type="text" class="form-control" rows="5" name="ColorOfPhlegm" id="ColorOfPhlegm" value="@yield('editColorOfPhlegm')"></label>
        &emsp;
        
        <label>Nebulization
<select name="Nebulization" id="Nebulization" class="form-control" value="@yield('editNebulization')">
      <option value="@yield('editNebulization')">@yield('editNebulization')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Tracheostomy 
<select name="Tracheostomy" id="Tracheostomy" class="form-control" value="@yield('editTracheostomy')">
<option value="@yield('editTracheostomy')">@yield('editTracheostomy')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>CPAP/BIPAP 
            <select name="CPAP_BIPAP" id="CPAP_BIPAP" class="form-control" value="@yield('editCPAP_BIPAP')">
            <option value="@yield('editCPAP_BIPAP')">@yield('editCPAP_BIPAP')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>ICD
            <select name="ICD" id="ICD" class="form-control" value="@yield('editICD')">
            <option value="@yield('editICD')">@yield('editICD')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;

        <label>Central Cynaosis
<select name="central_cynaosis" id="central_cynaosis" class="form-control" value="@yield('editcentral_cynaosis')">
      <option value="@yield('editcentral_cynaosis')">@yield('editcentral_cynaosis')</option>
            <option value="No">No</option>
            <option value="YES">Yes</option>
          </select>
        </label>
        &emsp;
        
       
        
   </div> 
   </div>   
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1a">Position</a>
        </h4>
      </div>
      <div id="collapse1a" class="panel-collapse collapse">
        <div class="panel-body">

        <label>Fowler
            <select name="Fowler" id="Fowler" class="form-control" value="@yield('editFowler')">
            <option value="@yield('editFowler')">@yield('editFowler')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Supine
            <select name="Supine" id="Supine" class="form-control" value="@yield('editSupine')">
            <option value="@yield('editSupine')">@yield('editSupine')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Rt_Lateral
            <select name="Rt_Lateral" id="Rt_Lateral" class="form-control" value="@yield('editRt_Lateral')">
            <option value="@yield('editRt_Lateral')">@yield('editRt_Lateral')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Lt_Lateral
            <select name="Lt_Lateral" id="Lt_Lateral" class="form-control" value="@yield('editLt_Lateral')">
            <option value="@yield('editLt_Lateral')">@yield('editLt_Lateral')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
</div>
</div>
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Circulatory</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Chest Pain<input type="text" class="form-control" rows="5" name="ChestPain" id="ChestPain" value="@yield('editChestPain')"></label>
        &emsp;
        <label>H/O DM/IHD/HTN/CAD/CHF <input type="text" class="form-control" rows="5" name="hoHTNCADCHF" id="hoHTNCADCHF" value="@yield('edithoHTNCADCHF')"></label>
        &emsp;
        <label>Heart Rate<input type="text" class="form-control" rows="5" name="HR" id="HR" value="@yield('editHR')"><div><p style="margin-right: 9px;
    margin-top: -26px;
    float: right;">BPM</p></div>
    </label>
        &emsp;


        <label>Peripheral Cyanosis
        <select name="PeripheralCyanosis" id="PeripheralCyanosis" class="form-control" value="@yield('editPeripheralCyanosis')">
            <option value="@yield('editPeripheralCyanosis')">@yield('editPeripheralCyanosis')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
          </label>
        &emsp;
        <label>Jugular Vein
          <select name="JugularVein" id="JugularVein" class="form-control" value="@yield('editJugularVein')">
            <option value="@yield('editJugularVein')">@yield('editJugularVein')</option>
            <option value="Flat">Flat</option>
            <option value="Distended">Distended</option>
          </select>

        </label>
        &emsp;
        <label>Surgery History 
          <textarea class="form-control" rows="5" cols="20" name="SurgeryHistory" id="SurgeryHistory" value="@yield('editSurgeryHistory')">@yield('editSurgeryHistory')</textarea>
        </label>
        <br>

      </div>  
      </div>
</div>




<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Vital Signs</a>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse">
        <div class="panel-body">


        <label>BP <input type="text" class="form-control" rows="5" name="BP" id="BP" value="@yield('editBP')"></label>
        &emsp;

        
         <label>BP taken from
          <select name="BP_taken_from" id="BP_taken_from" class="form-control" value="@yield('editBP_taken_from')">
            <option value="@yield('editBP_taken_from')">@yield('editBP_taken_from')</option>
            <option value="Left Arm">Left Arm</option>
            <option value="Right Arm">Right Arm</option>
          </select>
</label>


 <label>BP Equipment
          <select name="BP_equipment" id="BP_equipment" class="form-control" value="@yield('editBP_equipment')">
            <option value="@yield('editBP_equipment')">@yield('editBP_equipment')</option>
            <option value="Electronic Device">Electronic Device</option>
            <option value="Manually">Manually</option>
          </select>
</label>


        <label>RR <input type="text" class="form-control" rows="5" name="RR" id="RR" value="@yield('editRR')"></label>
        &emsp;
        <label>Temperature <input type="text" class="form-control" rows="5" name="Temperature" id="Temperature" value="@yield('editTemperature')"></label>
        &emsp;
        <label>TemperatureType 
          <select name="TemperatureType" id="TemperatureType" class="form-control" value="@yield('editTemperatureType')">
      <option value="@yield('editTemperatureType')">@yield('editTemperatureType')</option>
            <option value="Armpit">Armpit</option>
            <option value="Oral">Oral</option>
            <option value="Groin">Groin</option>
            <option value="Rectal">Rectal</option>
            <option value="Axilla">Axilla</option>
            
          </select>


        </label>
        &emsp;
        <br><br>
        <label>Provocation</label><br><br>
        <label>What causes pain?  <textarea class="form-control" rows="5" cols="20" name="P1" id="P1" value="@yield('editP1')">@yield('editP1')</textarea></label>
        &emsp;
        <label>What makes it better? <textarea class="form-control" rows="5" cols="20" name="P2" id="P2" value="@yield('editP2')">@yield('editP2')</textarea></label>
        &emsp;
        <label>Worse? <textarea class="form-control" rows="5" cols="20" name="P3" id="P3" value="@yield('editP3')">@yield('editP3')</textarea></label>
        &emsp;
        <br><br>
        <label>Region</label><br><br>
        <label>Where does the pain radiate? <textarea class="form-control" rows="5" cols="20" name="R1" id="R1" value="@yield('editR1')">@yield('editR1')</textarea></label>
        &emsp;
        <label>Is it in one place? <textarea class="form-control" rows="5" cols="20" name="R2" id="R2" value="@yield('editR2')">@yield('editR2')</textarea></label>
        &emsp;
        <label>Does it go anywhere else? <textarea class="form-control" rows="5" cols="20" name="R3" id="R3" value="@yield('editR3')">@yield('editR3')</textarea></label>
        &emsp;
        <label>Did it start elsewhere and now localised to one spot? <textarea  class="form-control" rows="5" cols="20" name="R4" id="R4" value="@yield('editR4')">@yield('editR4')</textarea></label>
        &emsp;
        <br><br>
        <label>Timing</label><br><br>
        <label>Time pain started? <textarea class="form-control" rows="5" cols="20" name="T1" id="T1" value="@yield('editT1')">@yield('editT1')</textarea></label>
        &emsp;
        <label>How long did it last? <textarea class="form-control" rows="5" cols="20" name="T2" id="T2" value="@yield('editT2')">@yield('editT2')</textarea></label>
        &emsp;

        <br><br>
        <label>Pulse <input type="text" class="form-control" rows="5" cols="20" name="Pulse" id="Pulse" value="@yield('editPulse')"></label>
        &emsp;

        <label>Quality 
        <select name="Quality" id="Quality" class="form-control" value="@yield('editQuality')">
      <option value="@yield('editQuality')">@yield('editQuality')</option>
            <option value="Sharp">Sharp</option>
            <option value="Dull">Dull</option>
            <option value="Stabbing">Stabbing</option>
            <option value="Burning">Burning</option>
            <option value="Crushing">Crushing</option>
          </select>

        </label>
        &emsp;

          <label>Pain Scale 
        <select name="PainScale" id="PainScale" class="form-control" value="@yield('editPainScale')">
      <option value="@yield('editPainScale')">@yield('editPainScale')</option>
            <option value="Face Reading Scale ">Face Reading Scale </option>
            <option value="Numeric Reading Scale">Numeric Reading Scale</option>
          </select>
        </label>
        &emsp;

        <label>Severity Scale 
          <select name="SeverityScale" id="SeverityScale" class="form-control" value="@yield('editSeverityScale')">
      <option value="@yield('editSeverityScale')">@yield('editSeverityScale')</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </label>
        &emsp;
        
        </div>
   </div>    
</div>





<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Denture</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">

    
        <label>Upper 
            <select name="Upper" id="Upper" class="form-control" value="@yield('editUpper')">
            <option value="@yield('editUpper')">@yield('editUpper')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Lower
        <select name="Lower" id="Lower" class="form-control" value="@yield('editLower')">
        <option value="@yield('editLower')">@yield('editLower')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Need assistance in cleaning
            <select name="Cleaning" id="Cleaning" class="form-control" value="@yield('editCleaning')">
            <option value="@yield('editCleaning')">@yield('editCleaning')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
   </div>
   </div>    
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Nutrition</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse">
        <div class="panel-body">

        <label>Adequate
        <select name="Adequate" id="Adequate" class="form-control" value="@yield('editAdequate')">
        <option value="@yield('editAdequate')">@yield('editAdequate')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select></label>
        &emsp;

        <label>Inadequate
        <select name="Inadequate" id="Inadequate" class="form-control" value="@yield('editInadequate')">
        <option value="@yield('editInadequate')">@yield('editInadequate')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select></label>
        &emsp;
        <label>Veg
        <select name="Veg" id="Veg" class="form-control" value="@yield('editVeg')">
        <option value="@yield('editVeg')">@yield('editVeg')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select></label>
        &emsp;
        <label>Non-Veg
        <select name="Non_Veg" id="Non_Veg" class="form-control" value="@yield('editNon_Veg')">
        <option value="@yield('editNon_Veg')">@yield('editNon_Veg')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select></label>
        &emsp;
</div>
</div>
</div>

<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9a">Diet</a>
        </h4>
      </div>
      <div id="collapse9a" class="panel-collapse collapse">
        <div class="panel-body">


        <label>Diet 
        <select name="Diet" id="Diet" class="form-control" value="@yield('editDiet')">
        <option value="@yield('editDiet')">@yield('editDiet')</option>
            <option value="Bland">Bland</option>
            <option value="Minced">Minced</option>
            <option value="Liquid">Liquid</option>
            <option value="Diabetic">Diabetic</option>
            <option value="Salt Restricted">Salt Restricted</option>
            <option value="Protein Restricted">Protein Restricted</option>
            <option value="Fat Free">Fat Free</option>
            <option value="NBM">NBM</option>
          </select>

        </label>
        &emsp;
        <label>BF Time<input type="text" class="form-control" rows="5" name="BFTime" id="BFTime" value="@yield('editBFTime')"></label>
        &emsp;
        
        <label>Lunch Time <input type="text" class="form-control" rows="5" name="LunchTime" id="LunchTime" value="@yield('editLunchTime')"></label>
        &emsp;
         <label>Snacks Time <input type="text" class="form-control" rows="5" name="SnacksTime" id="SnacksTime" value="@yield('editSnacksTime')"></label>
        &emsp;
        <label>Dinner Time<input type="text" class="form-control" rows="5" name="DinnerTime" id="DinnerTime" value="@yield('editDinnerTime')"></label>
        &emsp;
        <label>TPN<input type="text" class="form-control" rows="5" name="TPN" id="TPN" value="@yield('editTPN')"></label>
        <label>RT Feeding <input type="text" class="form-control" rows="5" name="RTFeeding" id="RTFeeding" value="@yield('editRTFeeding')"></label>
        &emsp;
        <label>PEG Feeding<input type="text" class="form-control" rows="5" name="PEGFeeding" id="PEGFeeding" value="@yield('editPEGFeeding')"></label>
        &emsp;
        
        
    </div>    
   </div>    
</div>


   <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Abdomen</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">

       <label>Inspection<input type="text" class="form-control" rows="5" name="Inspection" id="Inspection" value="@yield('editInspection')"></label>
        &emsp;
        <label>Ausculation of Bowel Sound

        <!-- $title = app()->view->getSections()['title']; -->

        
             <select name="AusculationofBS" id="AusculationofBS" class="form-control" >
             <option value="@yield('editAusculationofBS')">@yield('editAusculationofBS')</option>

            <option value="Absent" >Absent</option>
            <option value="Present">Present</option>
          </select>
        </label>
        &emsp;
        <label>Palpation <input type="text" class="form-control" rows="5" name="Palpation" id="Palpation" value="@yield('editPalpation')"></label>
        &emsp;
        <label>Percussion <input type="text" class="form-control" rows="5" name="Percussion" id="Percussion" value="@yield('editPercussion')"></label>
        <br>
        <label>Ileostomy 
             <select name="Ileostomy" id="Ileostomy" class="form-control" value="@yield('editIleostomy')">
             <option value="@yield('editIleostomy')">@yield('editIleostomy')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Colostomy 
            <select name="Colostomy" id="Colostomy" class="form-control" value="@yield('editColostomy')">
             <option value="@yield('editColostomy')">@yield('editColostomy')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Functioning 
            <select name="Functioning" id="Functioning" class="form-control" value="@yield('editFunctioning')">
             <option value="@yield('editFunctioning')">@yield('editFunctioning')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        <br>
        
        <br>
        </div>
        </div>
        </div>



<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Genitos Urinary</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">


        <label>H/O UTI<input type="text" class="form-control" rows="5" name="HoUTI" id="HoUTI" value="@yield('editHoUTI')"></label>
        &emsp;
        <label>H/O Post TURP<input type="text" class="form-control" rows="5" name="HoPOSTTURP" id="HoPOSTTURP" value="@yield('editHoPOSTTURP')"></label>
        &emsp;
        </div>
        </div>
        </div>
       


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6a">Urinary Continence</a>
        </h4>
      </div>
      <div id="collapse6a" class="panel-collapse collapse">
        <div class="panel-body">

<label>Urinary Continent 
<select name="UrinaryContinent" id="UrinaryContinent" class="form-control" value="@yield('editUrinaryContinent')">
            <option value="@yield('editUrinaryContinent')">@yield('editUrinaryContinent')</option>
            <option value="Completely Continet">Completely Continet</option>
            <option value="Incontinent Urine Occasionally">Incontinent Urine Occasionally</option>
            <option value="Incontinent Urine Night Only">Incontinent Urine Night Only</option>
            <option value="Incontinent Urine Always">Incontinent Urine Always</option>
          </select>
</label>
        &emsp;


        <label>Completely Continet

        <select name="CompletelyContinet" id="CompletelyContinet" class="form-control" value="@yield('editCompletelyContinet')">
            <option value="@yield('editCompletelyContinet')">@yield('editCompletelyContinet')</option>
            <option value="Indepentdent">Indepentdent</option>
            <option value="Urinal/Bedpan">Urinal/Bedpan</option>
            <option value="BathroomRoutine">BathroomRoutine</option>
          </select>
        </label>
        &emsp;
        
        <label>Incontinent Urine Occasionally
          <select name="IncontinentUrineOccasionally" id="IncontinentUrineOccasionally" class="form-control" value="@yield('editIncontinentUrineOccasionally')">
            <option value="@yield('editIncontinentUrineOccasionally')">@yield('editIncontinentUrineOccasionally')</option>
            <option value="Assistance">Assistance</option>
            <option value="Daiper/Breifs">Daiper/Breifs</option>
          </select>

        </label>
        &emsp;

        <label>Incontinent Urine Night Only

          <select name="IncontinentUrineNightOnly" id="IncontinentUrineNightOnly" class="form-control" value="@yield('editIncontinentUrineNightOnly')">
            <option value="@yield('editIncontinentUrineNightOnly')">@yield('editIncontinentUrineNightOnly')</option>
            <option value="Assistance">Assistance</option>
            <option value="Soaking pad and Diaper">Soaking pad and Diaper</option>
          </select>
        </label>
        &emsp;


        <label>Incontinent Urine Always

        <select name="IncontinentUrineAlways" id="IncontinentUrineAlways" class="form-control" value="@yield('editIncontinentUrineAlways')">
            <option value="@yield('editIncontinentUrineAlways')">@yield('editIncontinentUrineAlways')</option>
            <option value="Condom Catheter">Condom Catheter</option>
            <option value="Catheter">Catheter</option>
          </select>
        </label>
        &emsp;
   </div>   
   </div> 
</div>



<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5a">Fecal Continent</a>
        </h4>
      </div>
      <div id="collapse5a" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Continent
            <select name="Continent" id="Continent" class="form-control" value="@yield('editContinent')">
            <option value="@yield('editContinent')">@yield('editContinent')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Incontinent
            <select name="Incontinent" id="Incontinent" class="form-control" value="@yield('editIncontinent')">
            <option value="@yield('editIncontinent')">@yield('editIncontinent')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            
          </select>
        </label>
        &emsp;
       
        <label>Incontinent Occasionally
            <select name="IncontinentOccasionally" id="IncontinentOccasionally" class="form-control" value="@yield('editIncontinentOccasionally')">
            <option value="@yield('editIncontinentOccasionally')">@yield('editIncontinentOccasionally')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </label>
        &emsp;
        <label>Incontinent Always
            <select name="IncontinentAlways" id="IncontinentAlways" class="form-control" value="@yield('editIncontinentAlways')">
            <option value="@yield('editIncontinentAlways')">@yield('editIncontinentAlways')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            
          </select>
        </label>
        &emsp;

        
<label>Commode chair
            <select name="Commodechair" id="Commodechair" class="form-control" value="@yield('editCommodechair')">
            <option value="@yield('editCommodechair')">@yield('editCommodechair')</option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            
            
          </select>
        </label>
        &emsp;


   </div>   
   </div> 
</div>

 
 <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Extremities</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
        <label>Upper Extremities ROM 
            <select name="UppROM" id="UppROM" class="form-control" value="@yield('editUppROM')">
            <option value="@yield('editUppROM')">@yield('editUppROM')</option>
            <option value="Limited">Limited</option>
            <option value="Restricted">Restricted</option>
          </select>
        </label>
        &emsp;
        <label>Upper Muscle Strength
            <select name="UppMuscleStrength" id="UppMuscleStrength" class="form-control" value="@yield('editUppMuscleStrength')">
            <option value="@yield('editUppMuscleStrength')">@yield('editUppMuscleStrength')</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </label>
        &emsp;
       
        <label>Lower Extremities ROM
            <select name="LowROM" id="LowROM" class="form-control" value="@yield('editLowROM')">
            <option value="@yield('editLowROM')">@yield('editLowROM')</option>
            <option value="Limited">Limited</option>
            <option value="Restricted">Restricted</option>
          </select>
        </label>
        &emsp;
        <label>Lower Muscle Strength
            <select name="LowMuscleStrength" id="LowMuscleStrength" class="form-control" value="@yield('editLowMuscleStrength')">
            <option value="@yield('editLowMuscleStrength')">@yield('editLowMuscleStrength')</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            
          </select>
        </label>
        &emsp;
   </div>   
   </div> 
</div>


<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Mobility</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">
        

        <label>Independent
        <select name="Independent" id="Independent" class="form-control" value="@yield('editIndependent')">
        <option value="@yield('editIndependent')">@yield('editIndependent')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;

        <label>Need Assistance
        <select name="NeedAssistance" id="NeedAssistance" class="form-control" value="@yield('editNeedAssistance')">
        <option value="@yield('editNeedAssistance')">@yield('editNeedAssistance')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Walker
        <select name="Walker" id="Walker" class="form-control" value="@yield('editWalker')">
        <option value="@yield('editWalker')">@yield('editWalker')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        <label>WheelChair 
            <select name="WheelChair" id="WheelChair" class="form-control" value="@yield('editWheelChair')">
            <option value="@yield('editWheelChair')">@yield('editWheelChair')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Crutch
            <select name="Crutch" id="Crutch" class="form-control" value="@yield('editCrutch')">
            <option value="@yield('editCrutch')">@yield('editCrutch')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
      
        <label>Cane 
        <select name="Cane" id="Cane" class="form-control" value="@yield('editCane')">
        <option value="@yield('editCane')">@yield('editCane')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
       
      <label>Chair Fast
 
        <select name="ChairFast" id="ChairFast" class="form-control" value="@yield('editChairFast')">
        <option value="@yield('editChairFast')">@yield('editChairFast')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;
        <label>Bed Fast 
        <select name="BedFast" id="BedFast" class="form-control" value="@yield('editBedFast')">
        <option value="@yield('editBedFast')">@yield('editBedFast')</option>
            <option value="No">NO</option>
            <option value="YES">YES</option>
          </select>
        </label>
        &emsp;

   </div>    
   </div>
</div>





 



<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse19">General Condition </a>
        </h4>
      </div>
      <div id="collapse19" class="panel-collapse collapse">
        <div class="panel-body">
       <label>Weight<input type="text" class="form-control" rows="5" name="Weight" id="Weight" value="@yield('editWeight')"></label>
        &emsp;
        <label>Height
             <input type="text" class="form-control" rows="5" name="Height" id="Height" value="@yield('editHeight')"></label>
        
        &emsp;
        
       
        <label>Medical History 
          <textarea class="form-control" rows="5" cols="20" name="MedicalHistory" id="MedicalHistory" value="@yield('editMedicalHistory')">@yield('editMedicalHistory')</textarea>
        </label>
        &emsp;

      
        <br>
        
        <br>
        </div>
        </div>
        </div>

<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1000">General History</a>
        </h4>
      </div>
      <div id="collapse1000" class="panel-collapse collapse">
        <div class="panel-body">

        <label>Present History 
          <textarea class="form-control" rows="5" cols="20" name="PresentHistory" id="PresentHistory" value="@yield('editPresentHistory')">@yield('editPresentHistory')</textarea>
        </label>
        &emsp;
        <label>Past History 
           <textarea class="form-control" rows="5" cols="20" name="PastHistory" id="PastHistory" value="@yield('editPastHistory')">@yield('editPastHistory')</textarea>
        </label>
        &emsp;
        <label>Family History 
          <textarea class="form-control" rows="5" cols="20" name="FamilyHistory" id="FamilyHistory" value="@yield('editFamilyHistory')">@yield('editFamilyHistory')</textarea>
        </label>
        &emsp;
        <label>Mensuration & OBG History 
          <textarea class="form-control" rows="5" cols="20" name="Mensural_OBGHistory" id="Mensural_OBGHistory" value="@yield('editMensural_OBGHistory')">@yield('editMensural_OBGHistory')</textarea>
        </label>
        &emsp;
        <label>Allergic History 
           <textarea class="form-control" rows="5" cols="20" name="AllergicHistory" id="AllergicHistory" value="@yield('editAllergicHistory')">@yield('editAllergicHistory')</textarea>
        </label>
        &emsp;
        <label>Allergic Status 
          <textarea class="form-control" rows="5" cols="20" name="AllergicStatus" id="AllergicStatus" value="@yield('editAllergicStatus')">@yield('editAllergicStatus')</textarea>
        </label>
        &emsp;
        <label>Allergic Severity 
          <textarea class="form-control" rows="5" cols="20" name="AllergicSeverity" id="AllergicSeverity" value="@yield('editAllergicSeverity')">@yield('editAllergicSeverity')</textarea>
        </label>
        &emsp;

      
        <br>
        
        <br>
        </div>
        </div>
        </div>













 
 


 



 



 




</div>
</div>
</div>
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


<br>
<br>
 <button type="submit" class="btn btn-success">Submit</button>
       
    </div>
  </fieldset>
</form>
</div>
      
  @include('partial.errors')
</div>
@endsection