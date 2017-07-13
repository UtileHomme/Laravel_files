@extends('verticalheads.physiotherapy')

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


@section('editProblemIdentified', $physioreport->ProblemIdentified)
@section('editTreatment', $physioreport->Treatment)


@section('editPhysiotheraphyType', $physiotheraphy->PhysiotheraphyType)
@section('editMetalImplant', $physiotheraphy->MetalImplant)
@section('editHypertension', $physiotheraphy->Hypertension)
@section('editMedications', $physiotheraphy->Medications)
@section('editOsteoporosis', $physiotheraphy->Osteoporosis)
@section('editCancer', $physiotheraphy->Cancer)
@section('editPregnantOrBreastFeeding', $physiotheraphy->PregnantOrBreastFeeding)
@section('editDiabetes', $physiotheraphy->Diabetes)
@section('editChronicInfection', $physiotheraphy->ChronicInfection)
@section('editHeartDisease', $physiotheraphy->HeartDisease)
@section('editEpilepsy', $physiotheraphy->Epilepsy)
@section('editSurgeryUndergone', $physiotheraphy->SurgeryUndergone)
@section('editAffectedArea', $physiotheraphy->AffectedArea)
@section('editAssesmentDate', $physiotheraphy->AssesmentDate)
@section('editPainPattern', $physiotheraphy->PainPattern)
@section('editExaminationReport', $physiotheraphy->ExaminationReport)
@section('editLabOrRadiologicalReport', $physiotheraphy->LabOrRadiologicalReport)
@section('editMedicalDisgnosis', $physiotheraphy->MedicalDisgnosis)
@section('editPhysiotherapeuticDiagnosis', $physiotheraphy->PhysiotherapeuticDiagnosis)
@section('editShortTermGoal', $physiotheraphy->ShortTermGoal)
@section('editLongTermGoal', $physiotheraphy->LongTermGoal)

@section('editMethod')
{{method_field('PUT')}}
@endsection 