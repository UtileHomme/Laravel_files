@extends('verticalheads.mathrutvam')

@section('editid', $lead->id)


@if($verc == NULL)

@section('editassigned',$verc)

@else
@section('editassigned',$verc->FirstName)

@endif



@section('editAssessor',$assessment->Assessor)
@section('editAssessDateTime',$assessment->AssessDateTime)
@section('editAssessPlace',$assessment->AssessPlace)
@section('editServiceStartDate',$assessment->ServiceStartDate)
@section('editServicePause',$assessment->ServicePause)
@section('editServiceEndDate',$assessment->ServiceEndDate)
@section('editShiftPreference',$assessment->ShiftPreference)
@section('editSpecificRequirements',$assessment->SpecificRequirements)
@section('editDaysWorked',$assessment->DaysWorked)

@section('editSKUid', $product->SKUid)
@section('editProductName', $product->ProductName)
@section('editDemoRequired', $product->DemoRequired)
@section('editAvailabilityStatus', $product->AvailabilityStatus)
@section('editAvailabilityAddress', $product->AvailabilityAddress)
@section('editSellingPrice', $product->SellingPrice)
@section('editRentalPrice', $product->RentalPrice)


@section('editFName', $mother->FName)
@section('editMName', $mother->MName)
@section('editLName', $mother->LName)
@section('editMedications', $mother->Medications)
@section('editMedicalDiagnosis', $mother->MedicalDiagnosis)
@section('editDeliveryPlace', $mother->DeliveryPlace)
@section('editDueDate', $mother->DueDate)
@section('editDeliveryType', $mother->DeliveryType)
@section('editNoOfBabies', $mother->NoOfBabies)
@section('editNoOfAttenderRequired', $mother->NoOfAttenderRequired)


@section('editChildDOB', $mathrutvam->ChildDOB)
@section('editChildMedicalDiagnosis', $mathrutvam->ChildMedicalDiagnosis)
@section('editChildMedications', $mathrutvam->ChildMedications)
@section('editImmunizationUpdated', $mathrutvam->ImmunizationUpdated)
@section('editBirthWeight', $mathrutvam->BirthWeight)
@section('editDischargeWeight', $mathrutvam->DischargeWeight)
@section('editFeedingFormula', $mathrutvam->FeedingFormula)
@section('editFeedingIssue', $mathrutvam->FeedingIssue)
@section('editFeedingType', $mathrutvam->FeedingType)
@section('editFeedingEstablished', $mathrutvam->FeedingEstablished)
@section('editFeedingMode', $mathrutvam->FeedingMode)
@section('editMedicalConditions', $mathrutvam->MedicalConditions)
@section('editLength', $mathrutvam->Length)
@section('editHeadCircumference', $mathrutvam->HeadCircumference)
@section('editSleepingPattern', $mathrutvam->SleepingPattern)


@section('editMethod')
{{method_field('PUT')}}
@endsection 