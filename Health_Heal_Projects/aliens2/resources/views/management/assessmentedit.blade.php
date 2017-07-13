@extends('verticalheads.create')

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
@section('editLongitude',$assessment->Longitude)
@section('editLatitude',$assessment->Latitude)


@section('editInspection', $abdomen->Inspection)
@section('editAusculationofBS', $abdomen->AusculationofBS)
@section('editPalpation', $abdomen->Palpation)
@section('editPercussion', $abdomen->Percussion)
@section('editIleostomy', $abdomen->Ileostomy)
@section('editColostomy', $abdomen->Colostomy)
@section('editFunctioning', $abdomen->Functioning)


@section('editChestPain', $circulatory->ChestPain)
@section('edithoHTNCADCHF', $circulatory->hoHTNCADCHF)
@section('editHR', $circulatory->HR)
@section('editPeripheralCyanosis', $circulatory->PeripheralCyanosis)
@section('editJugularVein', $circulatory->JugularVein)
@section('editSurgeryHistory', $circulatory->SurgeryHistory)


@section('editLanguage', $communication->Language)
@section('editAdequateforAllActivities', $communication->AdequateforAllActivities)
@section('editunableToCommunicate', $communication->unableToCommunicate)


@section('editUpper', $denture->Upper)
@section('editLower', $denture->Lower)
@section('editCleaning', $denture->Cleaning)


@section('editUppROM', $extremitie->UppROM)
@section('editUppMuscleStrength', $extremitie->UppMuscleStrength)
@section('editLowROM', $extremitie->LowROM)
@section('editLowMuscleStrength', $extremitie->LowMuscleStrength)

@section('editContinent', $fecal->Continent)
@section('editIncontinent', $fecal->Incontinent)
@section('editIncontinentOccasionally', $fecal->IncontinentOccasionally)
@section('editIncontinentAlways', $fecal->IncontinentAlways)
@section('editCommodechair', $fecal->Commodechair)


@section('editUrinaryContinent', $genito->UrinaryContinent)
@section('editHoPOSTTURP', $genito->HoPOSTTURP)
@section('editHoUTI', $genito->HoUTI)
@section('editCompletelyContinet', $genito->CompletelyContinet)
@section('editIncontinentUrineOccasionally', $genito->IncontinentUrineOccasionally)
@section('editIncontinentUrineNightOnly', $genito->IncontinentUrineNightOnly)
@section('editIncontinentUrineAlways', $genito->IncontinentUrineAlways)


@section('editWeight', $generalcondition->Weight)
@section('editHeight', $generalcondition->Height)
@section('editMobility', $generalcondition->Mobility)
@section('editUrinaryPattern', $generalcondition->UrinaryPattern)
@section('editConsciousness', $generalcondition->Consciousness)
@section('editMemoryIntact', $generalcondition->MemoryIntact)
@section('editVision', $generalcondition->Vision)
@section('editHearing', $generalcondition->Hearing)
@section('editDiet', $generalcondition->Diet)
@section('editMedicalHistory', $generalcondition->MedicalHistory)


@section('editLongTermImpaired', $memoryintact->LongTermImpaired)
@section('editShortTermImpaired', $memoryintact->ShortTermImpaired)
@section('editLongTermIntact', $memoryintact->LongTermIntact)
@section('editShortTermIntact', $memoryintact->ShortTermIntact)


@section('editIndependent', $mobility->Independent)
@section('editNeedAssistance', $mobility->NeedAssistance)
@section('editWalker', $mobility->Walker)
@section('editWheelChair', $mobility->WheelChair)
@section('editCrutch', $mobility->Crutch)
@section('editCane', $mobility->Cane)
@section('editChairFast', $mobility->ChairFast)
@section('editBedFast', $mobility->BedFast)

@section('editPresentHistory', $generalhistory->PresentHistory)
@section('editPastHistory', $generalhistory->PastHistory)
@section('editFamilyHistory', $generalhistory->FamilyHistory)
@section('editMensural_OBGHistory', $generalhistory->Mensural_OBGHistory)
@section('editAllergicHistory', $generalhistory->AllergicHistory)
@section('editAllergicStatus', $generalhistory->AllergicStatus)
@section('editAllergicSeverity', $generalhistory->AllergicSeverity)


@section('editAdequate', $nutrition->Adequate)
@section('editInadequate',$nutrition->Inadequate)
@section('editVeg',$nutrition->Veg)
@section('editNon_Veg',$nutrition->Non_Veg)
@section('editDiet', $nutrition->Diet)
@section('editBFTime', $nutrition->BFTime)
@section('editLunchTime', $nutrition->LunchTime)
@section('editSnacksTime', $nutrition->SnacksTime)
@section('editDinnerTime', $nutrition->DinnerTime)
@section('editTPN', $nutrition->TPN)
@section('editRTFeeding', $nutrition->RTFeeding)
@section('editPEGFeeding', $nutrition->PEGFeeding)



@section('editPerson', $orientation->Person)
@section('editPlace', $orientation->Place)
@section('editTime', $orientation->Time)


@section('editBP', $vitalsign->BP)
@section('editRR', $vitalsign->RR)
@section('editTemperature', $vitalsign->Temperature)
@section('editTemperatureType', $vitalsign->TemperatureType)
@section('editP1', $vitalsign->P1)
@section('editP2', $vitalsign->P2)
@section('editP3', $vitalsign->P3)
@section('editR1', $vitalsign->R1)
@section('editR2', $vitalsign->R2)
@section('editR3', $vitalsign->R3)
@section('editR4', $vitalsign->R4)
@section('editT1', $vitalsign->T1)
@section('editT2', $vitalsign->T2)
@section('editPulse', $vitalsign->Pulse)
@section('editPainScale', $vitalsign->PainScale)
@section('editQuality', $vitalsign->Quality)
@section('editSeverityScale', $vitalsign->SeverityScale)
@section('editMedicalDiagnosis', $vitalsign->MedicalDiagnosis)
@section('editq1', $vitalsign->q1)




@section('editSOB', $respiratory->SOB)
@section('editCough', $respiratory->Cough)
@section('editColorOfPhlegm', $respiratory->ColorOfPhlegm)
@section('editNebulization', $respiratory->Nebulization)
@section('editTracheostomy', $respiratory->Tracheostomy)
@section('editCPAP_BIPAP', $respiratory->CPAP_BIPAP)
@section('editICD', $respiratory->ICD)
@section('editH_OTB_Asthma_COPD', $respiratory->H_OTB_Asthma_COPD)
@section('editSPO2', $respiratory->SPO2)


@section('editFowler',$position->Fowler)
@section('editSupine',$position->Supine)
@section('editRt_Lateral',$position->Rt_Lateral)
@section('editLt_Lateral',$position->Lt_Lateral)



@section('editImpared', $visionhearing->Impared)
@section('editHImpared', $visionhearing->HImpared)
@section('editShortSight', $visionhearing->ShortSight)
@section('editLongSight', $visionhearing->LongSight)
@section('editWearsGlasses', $visionhearing->WearsGlasses)
@section('editHearingAids', $visionhearing->HearingAids)

@section('editSKUid', $product->SKUid)
@section('editProductName', $product->ProductName)
@section('editDemoRequired', $product->DemoRequired)
@section('editAvailabilityStatus', $product->AvailabilityStatus)
@section('editAvailabilityAddress', $product->AvailabilityAddress)
@section('editSellingPrice', $product->SellingPrice)
@section('editRentalPrice', $product->RentalPrice)




@section('editMethod')
{{method_field('PUT')}}
@endsection 