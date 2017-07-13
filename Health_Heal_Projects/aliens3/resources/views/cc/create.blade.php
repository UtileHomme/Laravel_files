@extends('layout.app')
@section('body')
<div>


<br>
<a href="/admin/customercare" class="btn btn-info" >Home</a>

<div class="">
<h1>{{substr(Route::currentRouteName(),9)}} Lead Registration</h1>
<form class="form-horizontal" action="/cc" method="POST">
{{csrf_field()}}
@section('editMethod')
@show
  <fieldset>
     <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Client Details</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">

       <label>Client First Name<input type="text" class="form-control" rows="5" name="clientfname" id="clientfname" value="@yield('editclientfname')"></label>
        &emsp;
         <label>Middle Name<input type="text" class="form-control" rows="5" name="clientmname" id="clientmname" value="@yield('editclientmname')"></label>
        &emsp;
         <label>Last Name<input type="text" class="form-control" rows="5" name="clientlname" id="clientlname" value="@yield('editclientlname')"></label>
        &emsp;
        <label>Client Email ID <input type="text" class="form-control" rows="5" name="clientemail" id="clientemail" value="@yield('editclientemail')"></label>
        &emsp;
        <label>Source <input type="text" class="form-control" rows="5" name="source" id="source" value="@yield('editsource')"></label>
        &emsp;
        <label>Client Mob. no. 
        &emsp;



        <select id="country">
        <option value="">Select Code</option>
          <option value="+91">India</option>
          <option value="+1">US</option>
          <option value="+44 ">UK</option>
          </select>
        <input type="text" id="phone" class="form-control" rows="5" name="clientmob" id="clientmob" value="@yield('editclientmob')">

        </label>
        &emsp;
        <label>Client Alternate no. <input type="text" class="form-control" rows="5" name="clientalternateno" id="clientalternateno" value="@yield('editclientalternateno')"></label>
        &emsp;
        <label>Emergency Contact no. <input type="text" class="form-control" rows="5" name="EmergencyContact" id="EmergencyContact" value="@yield('editEmergencyContact')"></label>
        &emsp;
        <label>Assessment Required 
          <select name="assesmentreq" id="assesmentreq" class="form-control">
            <option value="yes">YES</option>
            <option value="no">NO</option>
          </select>
        </label>
        &emsp;
        <label>Reference ID 
        <select name="reference" id="reference" class="form-control">
            @foreach($reference as $reference)
            <option value="{{ $reference->Reference}}">{{ $reference->Reference}}</option>
            @endforeach
           </select>
           </label>
        &emsp;
        <br>
<h2>Permanent Address</h2>

<label>Address Line 1<input type="text" class="form-control" rows="5" name="Address1" id="Address1" value="@yield('editAddress1')"></label>
        &emsp;
<label>Address Line 2<input type="text" class="form-control" rows="5" name="Address2" id="Address2" value="@yield('editAddress2')"></label>
        &emsp;
        <label>City
          <select name="City" id="City" class="form-control">
          <option value="@yield('editCity')">@yield('editCity')</option>
            @foreach($city as $city)
            <option value="{{ $city->name}}">{{ $city->name}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
         <label>District<input type="text" class="form-control" rows="5" name="District" id="District" value="@yield('editDistrict')"></label>
        &emsp;
        <label>State<input type="text" class="form-control" rows="5" name="State" id="State" value="@yield('editState')"></label>
        &emsp;
        <label>PinCode<input type="text" class="form-control" rows="5" name="PinCode" id="PinCode" value="@yield('editPinCode')"></label>
        &emsp;
<br>
<br>
<input type="checkbox" name="presentcontact" value="same"> Same as Permanent Address<br>
<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Present Address</a>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse">
        <div class="panel-body">

<label>Address Line 1<input type="text" class="form-control" rows="5" name="PAddress1" id="PAddress1" value="@yield('editPAddress1')"></label>
        &emsp;
<label>Address Line 2<input type="text" class="form-control" rows="5" name="PAddress2" id="PAddress2" value="@yield('editPAddress2')"></label>
        &emsp;
        <label>City
        <select name="PCity" id="PCity" class="form-control">
          <option value="@yield('editPCity')">@yield('editPCity')</option>
            @foreach($pcity as $pcity)
            <option value="{{ $pcity->name}}">{{ $pcity->name}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
         <label>District<input type="text" class="form-control" rows="5" name="PDistrict" id="PDistrict" value="@yield('editPDistrict')"></label>
        &emsp;
        <label>State<input type="text" class="form-control" rows="5" name="PState" id="PState" value="@yield('editPState')"></label>
        &emsp;
        <label>PinCode<input type="text" class="form-control" rows="5" name="PPinCode" id="PPinCode" value="@yield('editPPinCode')"></label>
     

        </div>
        </div>
        </div>

<input type="checkbox" name="emergencycontact" value="same"> Same as Permanent Address<br>
        <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse21">Emergency Address</a>
        </h4>
      </div>
      <div id="collapse21" class="panel-collapse collapse">
        <div class="panel-body">

<label>Address Line 1<input type="text" class="form-control" rows="5" name="EAddress1" id="EAddress1" value="@yield('editEAddress1')"></label>
        &emsp;
<label>Address Line 2<input type="text" class="form-control" rows="5" name="EAddress2" id="EAddress2" value="@yield('editEAddress2')"></label>
        &emsp;
        <label>City
          <select name="ECity" id="ECity" class="form-control">
          <option value="@yield('editECity')">@yield('editECity')</option>
            @foreach($ecity as $ecity)
            <option value="{{ $ecity->name}}">{{ $ecity->name}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
         <label>District<input type="text" class="form-control" rows="5" name="EDistrict" id="EDistrict" value="@yield('editEDistrict')"></label>
        &emsp;
        <label>State<input type="text" class="form-control" rows="5" name="EState" id="EState" value="@yield('editEState')"></label>
        &emsp;
        <label>PinCode<input type="text" class="form-control" rows="5" name="EPinCode" id="EPinCode" value="@yield('editEPinCode')"></label>
     

        </div>
        </div>
        </div>



        </div>
        </div>
        </div>

       <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Service Required For</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

        <label>Patient First Name<input type="text" class="form-control" rows="5" name="patientfname" id="patientfname" value="@yield('editpatientfname')"></label>
        &emsp;
        <label>Middle Name<input type="text" class="form-control" rows="5" name="patientmname" id="patientmname" value="@yield('editpatientmname')"></label>
        &emsp;
        <label>Last Name<input type="text" class="form-control" rows="5" name="patientlname" id="patientlname" value="@yield('editpatientlname')"></label>
        &emsp;
        <label>Age <input type="text" class="form-control" rows="5" name="age" id="age" value="@yield('editage')"></label>
        &emsp;
        <label>Gender
        <select name="gender" id="gender" class="form-control">
            @foreach($gender as $gender)
            <option value="{{ $gender->gendertypes}}">{{ $gender->gendertypes}}</option>
            @endforeach
           </select></label>
        &emsp;
        <label>Relationship
        <select name="relationship" id="relationship" class="form-control">
            @foreach($relation as $relation)
            <option value="{{ $relation->relationshiptype}}">{{ $relation->relationshiptype}}</option>
            @endforeach
           </select></label>
        &emsp;
        <label>Occupation <input type="text" class="form-control" rows="5" name="Occupation" id="Occupation" value="@yield('editOccupation')"></label>
        &emsp;
        <label>Aadhar Number <input type="text" class="form-control" rows="5" name="aadhar" id="aadhar" value="@yield('editaadhar')"></label>
        &emsp;

       <label>Alternate UHID Type <input type="text" class="form-control" rows="5" name="AlternateUHIDType" id="AlternateUHIDType" value="@yield('editAlternateUHIDType')"></label>
        &emsp;
        <label>Alternate UHID Number <input type="text" class="form-control" rows="5" name="AlternateUHIDNumber" id="AlternateUHIDNumber" value="@yield('editAlternateUHIDNumber')"></label>
        &emsp;
        <label>Patient Aware of Disease 
        <select name="PTAwareofDisease" id="PTAwareofDisease" class="form-control" value="@yield('editPTAwareofDisease')">
           <option value="@yield('editPTAwareofDisease')">@yield('editPTAwareofDisease')</option>
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Service Details</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

        <label>Service Type 
        <select name="servicetype" id="servicetype" class="form-control">
            @foreach($vertical as $vertical)
            <option value="{{ $vertical->verticaltype}}">{{ $vertical->verticaltype}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
        <label>General Condition 
          <select name="GeneralCondition" id="GeneralCondition" class="form-control">
            @foreach($condition as $condition)
            <option value="{{ $condition->conditiontypes}}">{{ $condition->conditiontypes}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
        

        <label>Branch 
          <select name="branch" id="branch" class="form-control">
          <option value="@yield('editbranch')">@yield('editbranch')</option>
            @foreach($branch as $branch)
            <option value="{{ $branch->name}}">{{ $branch->name}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
        <label>requested Date and Time <input type="datetime-local" class="form-control" rows="5" name="requesteddate" id="requesteddate" value="@yield('editrequesteddate')"></label>
        &emsp;
        <label>Assigned TO 
          <select name="assignedto" id="assignedto" class="form-control">
            @foreach($emp as $emp)
            <option value="{{ $emp->FirstName}}">{{ $emp->FirstName}}  {{ $emp->Designation}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
        <label>Quoted Price <input type="text" class="form-control" rows="5" name="quotedprice" id="quotedprice" value="@yield('editquotedprice')"></label>
        &emsp;
        <label>Expected Price <input type="text" class="form-control" rows="5" name="expectedprice" id="expectedprice" value="@yield('editexpectedprice')"></label>
        &emsp;
        <!-- <label>Lead Status 
          <select name="servicestatus" id="servicestatus" class="form-control">
          <option value="@yield('editservicestatus')">@yield('editservicestatus')</option>
            @foreach($status as $status)
            <option value="{{ $status->status}}">{{ $status->status}}</option>
            @endforeach
           </select>
        </label>
        &emsp; -->
        <input type="hidden" name="servicestatus" id="servicestatus" value="New">



        <label>Prefered Gender 
          <select name="preferedgender" id="preferedgender" class="form-control">
            @foreach($gender1 as $gender1)
            <option value="{{ $gender1->gendertypes}}">{{ $gender1->gendertypes}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
        <label>Prefered Language 
          <select name="preferedlanguage" id="preferedlanguage" class="form-control">
           <option value=""></option>
            @foreach($language as $language)
            <option value="{{ $language->Languages}}">{{ $language->Languages}}</option>
            @endforeach
           </select>
        </label>
        &emsp;
        <br>
        <label>Remarks <textarea class="form-control" rows="5" name="remarks" id="remarks" value="@yield('editremarks')"></textarea> </label>
        &emsp;

       
</div>
</div>
</div>

<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapsed12">Product Details</a>
        </h4>
      </div>
      <div id="collapsed12" class="panel-collapse collapse">
        <div class="panel-body">

              <!-- <label>SKU ID<input type="text" class="form-control" rows="5" name="SKUid" id="SKUid" value="@yield('editSKUid')"></label>&emsp;
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
<?php $loginname=$_GET['name'];
?>

<input type="hidden" name="loginname" value="<?php echo $loginname;?>">

 <button type="submit" class="btn btn-success">Submit</button>
       </div>
     </div> 
    </div>
  </fieldset>
</form>
  @include('partial.errors')
</div>


  <script>
$(function() {
    $('#country').on('change', function() {
        $('#phone').val($(this).val());
    });
});  </script>





</div>
@endsection