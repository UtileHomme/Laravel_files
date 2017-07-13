@extends('verticalheads.mathrutvam')

@section('editid', $lead->id)


@if($verc == NULL)

@section('editassigned',$verc)

@else
@section('editassigned',$verc->FirstName)

@endif

@section('editrequested_service',$service_request->requested_service)
@section('editServiceStatus',$service_request->ServiceStatus)

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
@section('editother', $mathrutvam->other)
@section('editLength', $mathrutvam->Length)
@section('editHeadCircumference', $mathrutvam->HeadCircumference)
@section('editSleepingPattern', $mathrutvam->SleepingPattern)

@section('editLongTermImpaired', $memoryintact->LongTermImpaired)
@section('editShortTermImpaired', $memoryintact->ShortTermImpaired)
@section('editLongTermIntact', $memoryintact->LongTermIntact)
@section('editShortTermIntact', $memoryintact->ShortTermIntact)


@section('editIntact', $nutrition->Intact)
@section('editType',$nutrition->Type)
@section('editDiet', $nutrition->Diet)
@section('editBFTime', $nutrition->BFTime)
@section('editLunchTime', $nutrition->LunchTime)
@section('editSnacksTime', $nutrition->SnacksTime)
@section('editDinnerTime', $nutrition->DinnerTime)
@section('editTPN', $nutrition->TPN)
@section('editRTFeeding', $nutrition->RTFeeding)
@section('editPEGFeeding', $nutrition->PEGFeeding)

@section('editBP', $vitalsign->BP)
@section('editBP_equipment', $vitalsign->BP_equipment)
@section('editBP_taken_from', $vitalsign->BP_taken_from)
@section('editRR', $vitalsign->RR)
@section('editTemperature', $vitalsign->Temperature)
@section('editTemperatureType', $vitalsign->TemperatureType)
@section('editPulse', $vitalsign->Pulse)



@section('editSOB', $respiratory->SOB)
@section('editCough', $respiratory->Cough)
@section('editColorOfPhlegm', $respiratory->ColorOfPhlegm)
@section('editNebulization', $respiratory->Nebulization)
@section('editTracheostomy', $respiratory->Tracheostomy)
@section('editCPAP_BIPAP', $respiratory->CPAP_BIPAP)
@section('editICD', $respiratory->ICD)
@section('editH_OTB_Asthma_COPD', $respiratory->H_OTB_Asthma_COPD)
@section('editSPO2', $respiratory->SPO2)
@section('editcentral_cynaosis', $respiratory->central_cynaosis)



@section('editMethod')
{{method_field('PUT')}}
@endsection 