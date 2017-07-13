@extends('management.physiotherapy')

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


@section('editProblemIdentified', $physioreport->ProblemIdentified)
@section('editTreatment', $physioreport->Treatment)
@section('editp1', $physioreport->p1)
@section('editt1', $physioreport->t1)
@section('editp2', $physioreport->p2)
@section('editt2', $physioreport->t2)
@section('editp3', $physioreport->p3)
@section('editt3', $physioreport->t3)
@section('editp4', $physioreport->p4)
@section('editt4', $physioreport->t4)
@section('editp5', $physioreport->p5)
@section('editt5', $physioreport->t5)
@section('editp6', $physioreport->p6)
@section('editt6', $physioreport->t6)
@section('editp7', $physioreport->p7)
@section('editt7', $physioreport->t7)
@section('editp8', $physioreport->p8)
@section('editt8', $physioreport->t8)
@section('editp9', $physioreport->p9)
@section('editt9', $physioreport->t9)


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

@section('editpreviousmedical', $physiotheraphy->previousmedical)
@section('editoccupationalH', $physiotheraphy->occupationalH)
@section('editlabq', $physiotheraphy->labq)
@section('editaffectedq', $physiotheraphy->affectedq)
@section('editpainq', $physiotheraphy->painq)
@section('editenvhistory', $physiotheraphy->envhistory)
@section('editexaminationq', $physiotheraphy->examinationq)
@section('editchiefcomplains', $physiotheraphy->chiefcomplains)
@section('editho_pc', $physiotheraphy->ho_pc)


@section('editMethod')
{{method_field('PUT')}}
@endsection 