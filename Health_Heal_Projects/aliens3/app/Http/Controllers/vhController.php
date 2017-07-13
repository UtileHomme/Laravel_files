<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use DB;
use App\abdomen;
use App\communication;
use App\circulatory;
use App\denture;
use App\extremitie;
use App\fecal;
use App\genito;
use App\memoryintact;
use App\mobility;
use App\nutrition;
use App\orientation;
use App\vitalsign;
use App\respiratory;
use App\visionhearing;
use App\mother;
use App\mathruthvam;
use App\physiotheraphy;
use App\physioreport;
use App\assessment;
use App\product;
use App\generalcondition;
use App\verticalref;
use App\reference;
use App\generalhistory;
use App\lead;
use App\address;
use App\verticalcoordination;
use App\employee;
use App\service;
use App\position;


class vhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if (session()->has('name'))
      {

  $name1=session()->get('name');
}
else{
  $name1=$_GET['name'];
}

$empname=DB::table('employees')->where('FirstName',$name1)->select('id','Designation')->get();
$empname=json_decode($empname);
        $empname1= $empname[0]->id;
        $empname2= $empname[0]->Designation;

if($empname2=='Vertical Head')
{
        $lead=DB::table('leads')
            ->select('services.*','personneldetails.*','addresses.*','leads.*')
            ->join('personneldetails', 'leads.id', '=', 'personneldetails.Leadid')
            ->join('addresses', 'leads.id', '=', 'addresses.leadid')
            ->join('services', 'leads.id', '=', 'services.LeadId')
            ->where('services.AssignedTo',$name1)
            ->orderBy('leads.id', 'DESC')
            ->get();
       


        return view('verticalheads.index',compact('lead'));
      }
      else
        if($empname2=='Management')
        {


                 $lead=DB::table('leads')
            ->select('services.*','personneldetails.*','addresses.*','leads.*')
            ->join('personneldetails', 'leads.id', '=', 'personneldetails.Leadid')
            ->join('addresses', 'leads.id', '=', 'addresses.leadid')
            ->join('services', 'leads.id', '=', 'services.LeadId')
            ->orderBy('leads.id', 'DESC')
            ->get();
       


        return view('management.index',compact('lead'));



        }
        else
      {
        $lead=DB::table('leads')
            ->select('services.*','personneldetails.*','addresses.*','verticalcoordinations.*','leads.*')
            ->join('verticalcoordinations', 'leads.id', '=', 'verticalcoordinations.leadid')
            ->join('personneldetails', 'leads.id', '=', 'personneldetails.Leadid')
            ->join('addresses', 'leads.id', '=', 'addresses.leadid')
            ->join('services', 'leads.id', '=', 'services.LeadId')
            ->where('verticalcoordinations.empid',$empname1)
            ->orderBy('leads.id', 'DESC')
            ->get();
       


        return view('co.index',compact('lead'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name=input::get('name');
        //echo $name;
        $id=input::get('id');
       
        $reference=DB::table('references')->get();
        $gender=DB::table('genders')->get();
        $gender1=DB::table('genders')->get();
        $city=DB::table('cities')->get();
        $leadtype=DB::table('leadtypes')->get();
        $condition=DB::table('ptconditions')->get();
        $language=DB::table('languages')->get();
        $relation=DB::table('relationships')->get();
        $vertical=DB::table('verticals')->get();
        $shift=DB::table('shiftrequireds')->get();

       
          $service_request=DB::table('services')->where('leadid',$id)->select('id')->get();
                    $service_request=json_decode($service_request);
                    $service_request= $service_request[0]->id;
                    $service_request=service::find($service_request);



        $empid=DB::table('leads')->where('id',$id)->select('empid')->get();
        $empid=json_decode($empid);
        $eid= $empid[0]->empid;

        $emp=DB::table('employees')->where('Designation','Coordinator')->where('under',$eid)->get();
        $emp123=DB::table('employees')->where('Designation','Coordinator')->where('under',$eid)->get();

        $s=DB::table('services')->where('leadid',$id)->value('servicetype');

        $service=DB::table('verticals')->where('verticaltype',$s)->get();
        $service1=DB::table('leadstatus')->get();


        $leaddata=DB::table('leads')
            ->select('services.*','personneldetails.*','leads.*')
            ->join('personneldetails', 'leads.id', '=', 'personneldetails.Leadid')
            ->join('services', 'leads.id', '=', 'services.LeadId')
            ->where('leads.id','=',$id)
            ->orderBy('leads.id', 'DESC')
            ->get();



        $r=DB::table('role_admins')->where('role_id',2)->orwhere('role_id',6)->select('admin_id')->get();
        
         $l=DB::table('leads')->where('id',$id)->select('id')->get();
        $l=json_decode($l);
        $l= $l[0]->id;
        $lead=lead::find($l);

       // $vci=DB::table('verticalcoordinations')->where('leadid',$id)->select('empid')->get();
       // $vci=json_decode($vci);
       //  $vci= $vci[0]->empid;

       //  $assignto=DB::table('employees')->where('id',$vci)->select('FirstName')->get();

        
    
        // $osi=json_decode($id1);
      
        // $b= $osi[0]->id; 

         // echo "other";
         // echo $medicalcondition;
 
         // echo "abdomen\n";
         // echo $abdomen;
        
        $vc=DB::table('verticalcoordinations')->where('leadid',$id)->select('empid')->get();
                        $vc=json_decode($vc);
                        if($vc == [])
                        {
                          $verc=NULL;
                        }
                        else
                        {
                          $vc= $vc[0]->empid;
                          $verc=employee::find($vc);
                        }

        $servicetype=DB::table('services')->where('leadid',$id)->select('ServiceType')->get();
        $servicetype=json_decode($servicetype);
        $servicetype=$servicetype[0]->ServiceType;
        // echo $servicetype;

         $aid=DB::table('abdomens')->where('leadid',$id)->select('leadid')->get();
          $mid=DB::table('mothers')->where('Leadid',$id)->select('Leadid')->get();
           $pid=DB::table('physiotheraphies')->where('Leadid',$id)->select('Leadid')->get();
        // echo $servicetype;
        // echo $id;
        // echo $servicetype;
        // echo $aid;
        // echo $mid;
     // echo $pid;


        if($aid=='[{"leadid":'.$id.'}]' || $mid=='[{"Leadid":'.$id.'}]' || $pid=='[{"Leadid":'.$id.'}]')
        {



           if($servicetype == "Mathrutvam - Baby Care")
         {


                     $as=DB::table('assessments')->where('Leadid',$id)->select('id')->get();
                    $as=json_decode($as);
                    $as= $as[0]->id;
                    $assessment=assessment::find($as);


                    $mother=DB::table('mothers')->where('Leadid',$id)->select('id')->get();
                    $mother=json_decode($mother);
                    $motherid= $mother[0]->id;
                    $mother = mother::find($motherid);
                    // echo $motherid;
                    // echo $mother;
                    

                    $ma=DB::table('mathruthvams')->where('Motherid',$motherid)->select('id')->get();
                    $ma=json_decode($ma);
                    $ma= $ma[0]->id;
                    $mathrutvam = mathruthvam::find($ma);

                    $me=DB::table('memoryintacts')->where('leadid',$id)->select('id')->get();
                        $me=json_decode($me);
                        $me= $me[0]->id;
                        $memoryintact=memoryintact::find($me);
                    $nu=DB::table('nutrition')->where('leadid',$id)->select('id')->get();
                        $nu=json_decode($nu);
                        $nu= $nu[0]->id;
                        $nutrition=nutrition::find($nu);
                    $pa=DB::table('vitalsigns')->where('leadid',$id)->select('id')->get();
                        $pa=json_decode($pa);
                        $pa= $pa[0]->id;
                        $vitalsign=vitalsign::find($pa);
                    $re=DB::table('respiratories')->where('leadid',$id)->select('id')->get();
                        $re=json_decode($re);
                        $re= $re[0]->id;
                        $respiratory=respiratory::find($re);




        $p1=DB::table('assessments')->where('Leadid',$id)->select('Productid')->get();
        $p1=json_decode($p1);
        $p1= $p1[0]->Productid;
        // echo $p1;
        $product=product::find(1);
        if($p1 != NULL)
        {
            $p=DB::table('products')->where('Leadid',$id)->select('id')->get();
            $p=json_decode($p);
            $p= $p[0]->id;
            $product=product::find($p);
        }


$nid=DB::table('employees')->where('FirstName',$name)->select('Designation')->get();
        $nid=json_decode($nid);
                        $nid= $nid[0]->Designation;
                        if($nid=="Vertical Head")
                        {

                     return view('verticalheads.mathrutvamedit',compact('mathrutvam','mother','assessment','product','lead','r','leaddata','emp','verc','shift','vertical','service','service_request','service1','memoryintact','nutrition','vitalsign','respiratory'));

                   }
                   else
                    if($nid=="Management")
                    {
                          return view('management.mathrutvamedit',compact('mathrutvam','mother','assessment','product','lead','r','leaddata','emp','verc','shift','vertical','service','service_request','service1','memoryintact','nutrition','vitalsign','respiratory'));
                    }
                    else
                   {
                    return view('co.mathrutvamedit',compact('mathrutvam','mother','assessment','product','lead','r','leaddata','emp','verc','shift','vertical','service','service_request','service1','memoryintact','nutrition','vitalsign','respiratory'));
                   }




        

         }else{
                if($servicetype =="Physiotherapy - Home")
                 {

                    $as=DB::table('assessments')->where('Leadid',$id)->select('id')->get();
                    $as=json_decode($as);
                    $as= $as[0]->id;
                    $assessment=assessment::find($as);

                    $phy=DB::table('physiotheraphies')->where('leadid',$id)->select('id')->get();
                    $phy=json_decode($phy);
                    $phy= $phy[0]->id;
                    $physiotheraphy = physiotheraphy::find($phy);

                    $phr=DB::table('physioreports')->where('Physioid',$phy)->select('id')->get();
                    $phr=json_decode($phr);
                    $phr= $phr[0]->id;
                    $physioreport = physioreport::find($phr);

        $p1=DB::table('assessments')->where('Leadid',$id)->select('Productid')->get();
        $p1=json_decode($p1);
        $p1= $p1[0]->Productid;
        // echo $p1;
        $product=product::find(1);
        if($p1 != NULL)
        {
            $p=DB::table('products')->where('Leadid',$id)->select('id')->get();
            $p=json_decode($p);
            $p= $p[0]->id;
            $product=product::find($p);
        }


        $nid=DB::table('employees')->where('FirstName',$name)->select('Designation')->get();
        $nid=json_decode($nid);
                        $nid= $nid[0]->Designation;
                        if($nid=="Vertical Head")
                        {

                     return view('verticalheads.physiotherapyedit',compact('physiotheraphy','lead','physioreport','assessment','product','r','leaddata','emp','verc','shift','vertical','service','service_request','service1'));
                   }
                   else
                    if($nid=="Management")
                    {
                          return view('management.physiotherapyedit',compact('physiotheraphy','lead','physioreport','assessment','product','r','leaddata','emp','verc','shift','vertical','service','service_request','service1'));
                    }
                    else
                   {
                    return view('co.physiotherapyedit',compact('physiotheraphy','lead','physioreport','assessment','product','r','leaddata','emp','verc','shift','vertical','service','service_request','service1'));
                   }


        

                 }
                 else{
                     

        $as=DB::table('assessments')->where('Leadid',$id)->select('id')->get();
        $as=json_decode($as);
        $as= $as[0]->id;
        $assessment=assessment::find($as);


        $p1=DB::table('assessments')->where('Leadid',$id)->select('Productid')->get();
        $p1=json_decode($p1);
        $p1= $p1[0]->Productid;
        // echo $p1;
        $product=product::find(1);
        if($p1 != NULL)
        {
            $p=DB::table('products')->where('Leadid',$id)->select('id')->get();
            $p=json_decode($p);
            $p= $p[0]->id;
            $product=product::find($p);
        }



                        $ab=DB::table('abdomens')->where('leadid',$id)->select('id')->get();
                        $ab=json_decode($ab);
                        $ab= $ab[0]->id;
                        $abdomen=abdomen::find($ab);
       
                        $co=DB::table('communications')->where('leadid',$id)->select('id')->get();
                        $co=json_decode($co);
                        $co= $co[0]->id;
                        $communication=communication::find($co);


                        $ci=DB::table('circulatories')->where('leadid',$id)->select('id')->get();
                        $ci=json_decode($ci);
                        $ci= $ci[0]->id;
                        $circulatory=circulatory::find($ci);

                        $de=DB::table('dentures')->where('leadid',$id)->select('id')->get();
                        $de=json_decode($de);
                        $de= $de[0]->id;
                        $denture=denture::find($de);


                        $ex=DB::table('extremities')->where('leadid',$id)->select('id')->get();
                        $ex=json_decode($ex);
                        $ex= $ex[0]->id;
                        $extremitie=extremitie::find($ex);

                        $f=DB::table('fecals')->where('leadid',$id)->select('id')->get();
                        $f=json_decode($f);
                        $f= $f[0]->id;
                        $fecal=fecal::find($f);
        

                        $ge=DB::table('genitos')->where('leadid',$id)->select('id')->get();
                        $ge=json_decode($ge);
                        $ge= $ge[0]->id;
                        $genito=genito::find($ge);


                        $me=DB::table('memoryintacts')->where('leadid',$id)->select('id')->get();
                        $me=json_decode($me);
                        $me= $me[0]->id;
                        $memoryintact=memoryintact::find($me);

                        $mo=DB::table('mobilities')->where('leadid',$id)->select('id')->get();
                        $mo=json_decode($mo);
                        $mo= $mo[0]->id;
                        $mobility=mobility::find($mo);

                        $nu=DB::table('nutrition')->where('leadid',$id)->select('id')->get();
                        $nu=json_decode($nu);
                        $nu= $nu[0]->id;
                        $nutrition=nutrition::find($nu);

                        $or=DB::table('orientations')->where('leadid',$id)->select('id')->get();
                        $or=json_decode($or);
                        $or= $or[0]->id;
                        $orientation=orientation::find($or);

                        $pa=DB::table('vitalsigns')->where('leadid',$id)->select('id')->get();
                        $pa=json_decode($pa);
                        $pa= $pa[0]->id;
                        $vitalsign=vitalsign::find($pa);


                        $re=DB::table('respiratories')->where('leadid',$id)->select('id')->get();
                        $re=json_decode($re);
                        $re= $re[0]->id;
                        $respiratory=respiratory::find($re);

                        $po=DB::table('positions')->where('leadid',$id)->select('id')->get();
                        $po=json_decode($po);
                        $po= $po[0]->id;
                        $position=position::find($po);


                        $vh=DB::table('visionhearings')->where('leadid',$id)->select('id')->get();
                        $vh=json_decode($vh);
                        $vh= $vh[0]->id;
                        $visionhearing=visionhearing::find($vh);

                        $gh=DB::table('generalhistories')->where('leadid',$id)->select('id')->get();
                        $gh=json_decode($gh);
                        $gh= $gh[0]->id;
                        $generalhistory=generalhistory::find($gh);

                        $mc=DB::table('generalconditions')->where('Leadid',$id)->select('id')->get();
                        $mc=json_decode($mc);
                        $mc= $mc[0]->id;
                        $generalcondition=generalcondition::find($mc);


        $nid=DB::table('employees')->where('FirstName',$name)->select('Designation')->get();
        $nid=json_decode($nid);
                        $nid= $nid[0]->Designation;
                        if($nid=="Vertical Head")
                        {

                     return view('verticalheads.assessmentedit',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','abdomen','communication','circulatory','denture','extremitie','genito','fecal','memoryintact','mobility','nutrition','orientation','vitalsign','respiratory','visionhearing','position','assessment','product','generalcondition','lead','generalhistory','r','leaddata','emp','verc','shift','service','service_request','service1'));
                   }
                   else
                    if($nid=="Management")
                    {
                          return view('management.assessmentedit',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','abdomen','communication','circulatory','denture','extremitie','genito','fecal','memoryintact','mobility','nutrition','orientation','vitalsign','respiratory','position','visionhearing','assessment','product','generalcondition','lead','generalhistory','r','leaddata','emp','verc','shift','service','service_request','service1'));
                    }
                    else
                   {
                    return view('co.assessmentedit',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','abdomen','communication','circulatory','denture','extremitie','genito','fecal','memoryintact','mobility','nutrition','orientation','vitalsign','respiratory','position','visionhearing','assessment','product','generalcondition','lead','generalhistory','r','leaddata','emp','verc','shift','service','service_request','service1'));
                   }
                }
              }
        




        }else
        {

         if($servicetype == "Mathrutvam - Baby Care")
         {
           

            $emid=DB::table('employees')->where('FirstName',$name)->select('Designation')->get();
            $emid=json_decode($emid);
            $emid=$emid[0]->Designation;
// $emid="Vertical Head";
          if($emid=="Vertical Head")
            {
         
                     return view('verticalheads.mathrutvam',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
      
              }
            else
              if($emid=="Management")
                    {
                           return view('management.mathrutvam',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
                    }
              else
            {
                    return view('co.mathrutvam',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
      
              }




            
         }else{
                if($servicetype == "Physiotherapy - Home")
                 {



                  $emid=DB::table('employees')->where('FirstName',$name)->select('Designation')->get();
$emid=json_decode($emid);
$emid=$emid[0]->Designation;
// $emid="Vertical Head";

if($emid== "Vertical Head")
{
         
                     return view('verticalheads.physiotherapy',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
      
      }
      else
        if($emid=="Management")
                    {
                             return view('management.physiotherapy',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
                    }
              else
      {
                     return view('co.physiotherapy',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
      
      }



                 }
                 else{
                    
$emid=DB::table('employees')->where('FirstName',$name)->select('Designation')->get();
$emid=json_decode($emid);
$emid=$emid[0]->Designation;
// $emid="Vertical Head";

if($emid=="Vertical Head")
{
         
         return view('verticalheads.create',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
       

      }
      else

        if($emid=="Management")
                    {
            return view('management.create',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));
                    }
        else


      {
              return view('co.create',compact('reference','gender','relation','city','language','gender1','leadtype','condition','vertical','r','leaddata','emp','verc','shift','service','service_request','service1'));

      }



                   
                }
              }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leadid=$request->leadid;
        $name1=$request->sname;
//echo $name1;
//         $name=DB::table('services')->where('leadid',$leadid)->select('AssignedTo')->get();
// $name=json_decode($name);

// $vcid=DB::table('verticalcoordinations')->where('leadid',$leadid)->select('empid')->get();
// $vcid=json_decode($vcid);

// $name=DB::table('employees')->where('FirstName',$name12345)->select('Designation')->get();
// $name=json_decode($name);
// $Des=$name[0]->Designation;

// if($Des == "Vertical Head")
// {
//         $name1= $name[0]->AssignedTo;
// }
// else
// {
//   $vcid=$vcid[0]->empid;
// $vid=DB::table('employees')->where('id',$vcid)->select('FirstName')->get();
// $vid=json_decode($vid);
// $name1=$vid[0]->FirstName;

// }



         $products = new product;
           $products->SKUid=$request->SKUid;
           $products->ProductName=$request->ProductName;
           $products->DemoRequired=$request->DemoRequired;
           $products->AvailabilityStatus=$request->AvailabilityStatus;
           $products->AvailabilityAddress=$request->AvailabilityAddress;
           $products->SellingPrice=$request->SellingPrice;
           $products->RentalPrice=$request->RentalPrice;
           
           

           $productid=NULL;
           

           if($products->SKUid !=NULL || $products->ProductName !=NULL)
           {
            $products->Leadid=$leadid;
             $products->save();
             $productid=DB::table('products')->max('id');
           }
           


  $assessment = new assessment;
        $assessment->Assessor=$request->Assessor;
        $assessment->AssessDateTime=$request->AssessDateTime;
        $assessment->AssessPlace=$request->AssessPlace;
        $assessment->ServiceStartDate=$request->ServiceStartDate;
        $assessment->ServicePause=$request->ServicePause;
        $assessment->ServiceEndDate=$request->ServiceEndDate;
        $assessment->ShiftPreference=$request->ShiftPreference;
        $assessment->SpecificRequirements=$request->SpecificRequirements;
        $assessment->DaysWorked=$request->DaysWorked;
        $assessment->Latitude=$request->Latitude;
        $assessment->Longitude=$request->Longitude;
        $assessment->Productid=$productid;
        $assessment->Leadid=$leadid;
        $assessment->save();



DB::table('services')
            ->where('id', $leadid)
            ->update(['requested_service' => $request->requested_service]);

if($request->ServiceStatus == "New")
{
        DB::table('services')
            ->where('id', $leadid)
            ->update(['ServiceStatus' => "In Progress"]);
}
else
{
        DB::table('services')
            ->where('id', $leadid)
            ->update(['ServiceStatus' => $request->ServiceStatus]);
}
         
        
      $servicetype=DB::table('services')->where('leadid',$leadid)->select('ServiceType')->get();
       $servicetype=json_decode($servicetype);
        $servicetype=$servicetype[0]->ServiceType;
        echo $servicetype;


if($servicetype == "Mathrutvam - Baby Care")
        {
            
                $mother = new mother;
                
                $mother->FName=$request->FName;
                $mother->MName=$request->MName;
                $mother->LName=$request->LName;
                $mother->Medications=$request->Medications;
                $mother->MedicalDiagnosis=$request->MedicalDiagnosis;
                $mother->DeliveryPlace=$request->DeliveryPlace;
                $mother->DueDate=$request->DueDate;
                $mother->DeliveryType=$request->DeliveryType;
                $mother->NoOfBabies=$request->NoOfBabies;
                $mother->NoOfAttenderRequired=$request->NoOfAttenderRequired;
                $mother->Leadid=$leadid;
                $mother->save();

                  $motherid=DB::table('mothers')->max('id');
               

                    $mathruthvam = new mathruthvam;
                  $mathruthvam->ChildDOB=$request->ChildDOB;
                  $mathruthvam->ChildMedicalDiagnosis=$request->ChildMedicalDiagnosis;
                  $mathruthvam->ChildMedications=$request->ChildMedications;
                  $mathruthvam->ImmunizationUpdated=$request->ImmunizationUpdated;
                  $mathruthvam->BirthWeight=$request->BirthWeight;
                  $mathruthvam->DischargeWeight=$request->DischargeWeight;
                  $mathruthvam->FeedingFormula=$request->FeedingFormula;
                  $mathruthvam->FeedingIssue=$request->FeedingIssue;
                  $mathruthvam->FeedingType=$request->FeedingType;
                  $mathruthvam->FeedingEstablished=$request->FeedingEstablished;
                  $mathruthvam->other=$request->other;
                  $mathruthvam->Length=$request->Length;
                  $mathruthvam->HeadCircumference=$request->HeadCircumference;
                  $mathruthvam->SleepingPattern=$request->SleepingPattern;
                  $mathruthvam->Motherid=$motherid;
                  $mathruthvam->save();




            $memoryintact= new memoryintact;
            $memoryintact->ShortTermIntact=$request->ShortTermIntact;
            $memoryintact->LongTermIntact=$request->LongTermIntact;
            $memoryintact->ShortTermImpaired=$request->ShortTermImpaired;
            $memoryintact->LongTermImpaired=$request->LongTermImpaired;
            $memoryintact->leadid=$leadid;
            $memoryintact->save();
            $memoryintact=DB::table('memoryintacts')->max('id');

           $vitalsigns=new vitalsign; 
           $vitalsigns->BP=$request->BP;
           $vitalsigns->BP_equipment=$request->BP_equipment;
           $vitalsigns->BP_taken_from=$request->BP_taken_from;
           $vitalsigns->RR=$request->RR;
           $vitalsigns->Temperature=$request->Temperature;
           $vitalsigns->TemperatureType=$request->TemperatureType;
           $vitalsigns->Pulse=$request->Pulse;
           $vitalsigns->leadid=$leadid;
           $vitalsigns->save();
           $vitalsigns=DB::table('vitalsigns')->max('id');

           $respiratory =new respiratory;
           $respiratory->SOB=$request->SOB;
           $respiratory->Cough=$request->Cough;
           $respiratory->ColorOfPhlegm=$request->ColorOfPhlegm;
           $respiratory->Nebulization=$request->Nebulization;
           $respiratory->Tracheostomy=$request->Tracheostomy;
           $respiratory->CPAP_BIPAP=$request->CPAP_BIPAP;
           $respiratory->ICD=$request->ICD;
           $respiratory->H_OTB_Asthma_COPD=$request->H_OTB_Asthma_COPD;
           $respiratory->SPO2=$request->SPO2;
           $respiratory->central_cynaosis=$request->central_cynaosis;
           $respiratory->leadid=$leadid;
           $respiratory->save();
           $respiratory=DB::table('respiratories')->max('id');



            $nutrition =new nutrition; 
            $nutrition->Intact=$request->Intact;
            $nutrition->Type=$request->Type;
            $nutrition->Diet=$request->Diet;
            $nutrition->BFTime=$request->BFTime;
            $nutrition->LunchTime=$request->LunchTime;
            $nutrition->SnacksTime=$request->SnacksTime;
            $nutrition->DinnerTime=$request->DinnerTime;
            $nutrition->TPN=$request->TPN;
            $nutrition->RTFeeding=$request->RTFeeding;
            $nutrition->PEGFeeding=$request->PEGFeeding;
            $nutrition->leadid=$leadid;
            $nutrition->save();
            $nutrition=DB::table('nutrition')->max('id');








                   $e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');
 //$e=json_decode($e);
  //      $e1=$e[0]->id;

    
$e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');
 //$e=json_decode($e);
  //      $e1=$e[0]->id;

            $verticalcoordination = new verticalcoordination;
     $verticalcoordination->empid=$e;
     $verticalcoordination->leadid=$leadid;

$w=DB::table('verticalcoordinations')->where('leadid',$leadid)->value('empid');
$v=DB::table('verticalcoordinations')->where('leadid',$leadid)->value('leadid');
if($leadid != $v)
{
        $verticalcoordination->save(); 
}
else
{
  if($w == NULL)
  {

    $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$leadid)->select('id')->get();
      $verticalcoordination=json_decode($verticalcoordination);
             $verticalcoordination=$verticalcoordination[0]->id;

    $verticalcoordination=verticalcoordination::find($verticalcoordination);
      $verticalcoordination->empid=$e;

      $verticalcoordination->save(); 

  }
}






       session()->put('name',$name1);
                return redirect('/vh');
        }
        else
        {
             if($servicetype == "Physiotherapy - Home")
                 {


                     $physiotheraphy = new physiotheraphy;
            // $this->validate($request,[
            //         'Languages'=>'required',
            //     ]);


        $physiotheraphy->PhysiotheraphyType=$request->PhysiotheraphyType;
        $physiotheraphy->MetalImplant=$request->MetalImplant;
        $physiotheraphy->Hypertension=$request->Hypertension;
        $physiotheraphy->Medications=$request->Medications;

        $physiotheraphy->PregnantOrBreastFeeding=$request->PregnantOrBreastFeeding;
        $physiotheraphy->Diabetes=$request->Diabetes;
        $physiotheraphy->ChronicInfection=$request->ChronicInfection;
        $physiotheraphy->HeartDisease=$request->HeartDisease;
        $physiotheraphy->Epilepsy=$request->Epilepsy;
        $physiotheraphy->SurgeryUndergone=$request->SurgeryUndergone;
        $physiotheraphy->AffectedArea=$request->AffectedArea;
        $physiotheraphy->AssesmentDate=$request->AssesmentDate;
        $physiotheraphy->PainPattern=$request->PainPattern;
        $physiotheraphy->ExaminationReport=$request->ExaminationReport;
        $physiotheraphy->LabOrRadiologicalReport=$request->LabOrRadiologicalReport;
        $physiotheraphy->MedicalDisgnosis=$request->MedicalDisgnosis;
        $physiotheraphy->PhysiotherapeuticDiagnosis=$request->PhysiotherapeuticDiagnosis;
        $physiotheraphy->ShortTermGoal=$request->ShortTermGoal;
        $physiotheraphy->LongTermGoal=$request->LongTermGoal;
        $physiotheraphy->chiefcomplains=$request->chiefcomplains;
        $physiotheraphy->ho_pc=$request->ho_pc;
        $physiotheraphy->previousmedical=$request->previousmedical;
        $physiotheraphy->occupationalH=$request->occupationalH;
        $physiotheraphy->labq=$request->labq;
        $physiotheraphy->affectedq=$request->affectedq;
        $physiotheraphy->painq=$request->painq;
        $physiotheraphy->envhistory=$request->envhistory;
        $physiotheraphy->examinationq=$request->examinationq;
        $physiotheraphy->Leadid=$leadid;
         $physiotheraphy->save();



        $Physioid=DB::table('physiotheraphies')->max('id');


            $physioreport = new physioreport;
            $physioreport->ProblemIdentified=$request->ProblemIdentified;
            $physioreport->Treatment=$request->Treatment;
            $physioreport->Physioid=$Physioid;
            $physioreport->p1=$request->p1;
            $physioreport->t1=$request->t1;
            $physioreport->p2=$request->p2;
            $physioreport->t2=$request->t2;
            $physioreport->p3=$request->p3;
            $physioreport->t3=$request->t3;
            $physioreport->p4=$request->p4;
            $physioreport->t4=$request->t4;
            $physioreport->p5=$request->p5;
            $physioreport->t5=$request->t5;
            $physioreport->p6=$request->p6;
            $physioreport->t6=$request->t6;
            $physioreport->p7=$request->p7;
            $physioreport->t7=$request->t7;
            $physioreport->p8=$request->p8;
            $physioreport->t8=$request->t8;
            $physioreport->p9=$request->p9;
            $physioreport->t9=$request->t9;
            
            $physioreport->save();



           $e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');
 //$e=json_decode($e);
  //      $e1=$e[0]->id;

    

$e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');
 //$e=json_decode($e);
  //      $e1=$e[0]->id;

            $verticalcoordination = new verticalcoordination;
     $verticalcoordination->empid=$e;
     $verticalcoordination->leadid=$leadid;

$w=DB::table('verticalcoordinations')->where('leadid',$leadid)->value('empid');
$v=DB::table('verticalcoordinations')->where('leadid',$leadid)->value('leadid');
if($leadid != $v)
{
        $verticalcoordination->save(); 
}
else
{
  if($w == NULL)
  {

    $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$leadid)->select('id')->get();
      $verticalcoordination=json_decode($verticalcoordination);
             $verticalcoordination=$verticalcoordination[0]->id;

    $verticalcoordination=verticalcoordination::find($verticalcoordination);
      $verticalcoordination->empid=$e;

      $verticalcoordination->save(); 

  }
}





       session()->put('name',$name1);
                return redirect('/vh');

                 }
                 else
                 {


          



        $abdomen = new abdomen;
            // $this->validate($request,[
            //         'Languages'=>'required',
            //     ]);

        $abdomen->Inspection=$request->Inspection;
        $abdomen->AusculationofBS=$request->AusculationofBS;
        $abdomen->Palpation=$request->Palpation;
        $abdomen->Percussion=$request->Percussion;
        $abdomen->Ileostomy=$request->Ileostomy;
        $abdomen->Colostomy=$request->Colostomy;
        $abdomen->Functioning=$request->Functioning;
        $abdomen->leadid=$leadid;
        $abdomen->save();
        $abdomen=DB::table('abdomens')->max('id');

       
      
         $circulatory =new circulatory;
         $circulatory->ChestPain=$request->ChestPain;
         $circulatory->hoHTNCADCHF=$request->hoHTNCADCHF;
         $circulatory->HR=$request->HR;
         $circulatory->PeripheralCyanosis=$request->PeripheralCyanosis;
         $circulatory->JugularVein=$request->JugularVein;
         $circulatory->SurgeryHistory=$request->SurgeryHistory;
         $circulatory->leadid=$leadid;
         $circulatory->save();
         $circulatory=DB::table('circulatories')->max('id');


           $communication = new communication;
           $communication->Language=$request->Language;
           $communication->AdequateforAllActivities=$request->AdequateforAllActivities;
           $communication->unableToCommunicate=$request->unableToCommunicate;
           $communication->leadid=$leadid;
           $communication->save();
           $communication=DB::table('communications')->max('id');


            $dentures= new denture;
            $dentures->Upper=$request->Upper;
            $dentures->Lower=$request->Lower;
            $dentures->Cleaning=$request->Cleaning;
            $dentures->leadid=$leadid;
            $dentures->save();
            $dentures=DB::table('dentures')->max('id');


            $extremitie =new extremitie;
            $extremitie->UppROM=$request->UppROM;
            
            $extremitie->UppMuscleStrength=$request->UppMuscleStrength;
            $extremitie->LowROM=$request->LowROM;
          
            $extremitie->LowMuscleStrength=$request->LowMuscleStrength;
            $extremitie->leadid=$leadid;
            $extremitie->save();

            $extremitie=DB::table('extremities')->max('id');


            $fecal= new fecal;
            $fecal->FecalType=$request->FecalType;
            $fecal->IncontinentOccasionally=$request->IncontinentOccasionally;
            $fecal->IncontinentAlways=$request->IncontinentAlways;
            $fecal->Commodechair=$request->Commodechair;
            $fecal->leadid=$leadid;
            $fecal->save();
            $fecal=DB::table('fecals')->max('id');

            $genito = new genito;
            $genito->UrinaryContinent=$request->UrinaryContinent;
            $genito->HoUTI=$request->HoUTI;
            $genito->HoPOSTTURP=$request->HoPOSTTURP;
            $genito->CompletelyContinet=$request->CompletelyContinet;
            $genito->IncontinentUrineOccasionally=$request->IncontinentUrineOccasionally;
            $genito->IncontinentUrineNightOnly=$request->IncontinentUrineNightOnly;
            $genito->IncontinentUrineAlways=$request->IncontinentUrineAlways;
            $genito->leadid=$leadid;
            $genito->save();
            $genito=DB::table('genitos')->max('id');


            $generalcondition = new generalcondition;
            $generalcondition->Weight=$request->Weight;
            $generalcondition->Height=$request->Height;
            $generalcondition->MedicalHistory=$request->MedicalHistory;
            $generalcondition->Leadid=$leadid;
            $generalcondition->save();
            $generalcondition=DB::table('generalconditions')->max('id');


              $generalhistory= new generalhistory;
              $generalhistory->PresentHistory=$request->PresentHistory;
              $generalhistory->PastHistory=$request->PastHistory;
              $generalhistory->FamilyHistory=$request->FamilyHistory;
              $generalhistory->Mensural_OBGHistory=$request->Mensural_OBGHistory;
              $generalhistory->AllergicHistory=$request->AllergicHistory;
              $generalhistory->AllergicStatus=$request->AllergicStatus;
              $generalhistory->AllergicSeverity=$request->AllergicSeverity;
              $generalhistory->leadid=$leadid;
              $generalhistory->save();
            $generalhistory=DB::table('generalhistories')->max('id');


            $memoryintact= new memoryintact;
            $memoryintact->ShortTermIntact=$request->ShortTermIntact;
            $memoryintact->LongTermIntact=$request->LongTermIntact;
            $memoryintact->ShortTermImpaired=$request->ShortTermImpaired;
            $memoryintact->LongTermImpaired=$request->LongTermImpaired;
            $memoryintact->leadid=$leadid;
            $memoryintact->save();
            $memoryintact=DB::table('memoryintacts')->max('id');


            $mobility= new mobility;
            $mobility->Independent=$request->Independent;
            $mobility->NeedAssistance=$request->NeedAssistance;
            $mobility->Walker=$request->Walker;
            $mobility->WheelChair=$request->WheelChair;
            $mobility->Crutch=$request->Crutch;
            $mobility->Cane=$request->Cane;
            $mobility->ChairFast=$request->ChairFast;
            $mobility->BedFast=$request->BedFast;
            $mobility->leadid=$leadid;
            $mobility->save();
            $mobility=DB::table('mobilities')->max('id');


            $orientation=new orientation;
            $orientation->Person=$request->Person;
           $orientation->Place=$request->Place;
           $orientation->Time=$request->Time;
           $orientation->leadid=$leadid;
           $orientation->save();
           $orientation=DB::table('orientations')->max('id');

           $vitalsigns=new vitalsign; 
           $vitalsigns->BP=$request->BP;
           $vitalsigns->BP_equipment=$request->BP_equipment;
           $vitalsigns->BP_taken_from=$request->BP_taken_from;
           $vitalsigns->RR=$request->RR;
           $vitalsigns->Temperature=$request->Temperature;
           $vitalsigns->TemperatureType=$request->TemperatureType;
           $vitalsigns->P1=$request->P1;
           $vitalsigns->P2=$request->P2;
           $vitalsigns->P3=$request->P3;
           $vitalsigns->R1=$request->R1;
           $vitalsigns->R2=$request->R2;
           $vitalsigns->R3=$request->R3;
           $vitalsigns->R4=$request->R4;
           $vitalsigns->T1=$request->T1;
           $vitalsigns->T2=$request->T2;
           $vitalsigns->Pulse=$request->Pulse;
           $vitalsigns->PainScale=$request->PainScale;
           $vitalsigns->Quality=$request->Quality;
           $vitalsigns->SeverityScale=$request->SeverityScale;
           $vitalsigns->MedicalDiagnosis=$request->MedicalDiagnosis;
           $vitalsigns->q1=$request->q1;
           $vitalsigns->leadid=$leadid;
           $vitalsigns->save();
           $vitalsigns=DB::table('vitalsigns')->max('id');

           

           $respiratory =new respiratory;
           $respiratory->SOB=$request->SOB;
           $respiratory->Cough=$request->Cough;
           $respiratory->ColorOfPhlegm=$request->ColorOfPhlegm;
           $respiratory->Nebulization=$request->Nebulization;
           $respiratory->Tracheostomy=$request->Tracheostomy;
           $respiratory->CPAP_BIPAP=$request->CPAP_BIPAP;
           $respiratory->ICD=$request->ICD;
           $respiratory->H_OTB_Asthma_COPD=$request->H_OTB_Asthma_COPD;
           $respiratory->SPO2=$request->SPO2;
           $respiratory->central_cynaosis=$request->central_cynaosis;
           $respiratory->leadid=$leadid;
           $respiratory->save();
           $respiratory=DB::table('respiratories')->max('id');


            $position =new position;
            $position->Fowler=$request->Fowler;
            $position->Supine=$request->Supine;
            $position->Rt_Lateral=$request->Rt_Lateral;
            $position->Lt_Lateral=$request->Lt_Lateral;
            $position->leadid=$request->leadid;
            $position->save();

            $position=DB::table('positions')->max('id');




           $visionhearing =new visionhearing;
           $visionhearing->Impared=$request->Impared;
           $visionhearing->HImpared=$request->HImpared;
           $visionhearing->ShortSight=$request->ShortSight;
           $visionhearing->LongSight=$request->LongSight;
           $visionhearing->WearsGlasses=$request->WearsGlasses;
           $visionhearing->HearingAids=$request->HearingAids;
           $visionhearing->leadid=$leadid;
           $visionhearing->save();
           $visionhearing=DB::table('visionhearings')->max('id');


                   
            $nutrition =new nutrition; 
            $nutrition->Intact=$request->Intact;
            $nutrition->Type=$request->Type;
            $nutrition->Diet=$request->Diet;
            $nutrition->BFTime=$request->BFTime;
            $nutrition->LunchTime=$request->LunchTime;
            $nutrition->SnacksTime=$request->SnacksTime;
            $nutrition->DinnerTime=$request->DinnerTime;
            $nutrition->TPN=$request->TPN;
            $nutrition->RTFeeding=$request->RTFeeding;
            $nutrition->PEGFeeding=$request->PEGFeeding;
            $nutrition->leadid=$leadid;
            $nutrition->save();
            $nutrition=DB::table('nutrition')->max('id');



                $verticalref=new verticalref;
            $verticalref->AbdomenId=$abdomen;
            $verticalref->CirculatoryId=$circulatory;
            $verticalref->CommunicationId=$communication;
            $verticalref->DentureId=$dentures;
            $verticalref->ExtremitiesId=$extremitie;
            $verticalref->GenitoId=$genito;
            $verticalref->generalconditionId=$generalcondition;
            $verticalref->MemoryIntactId=$memoryintact;
            $verticalref->MobilityId=$mobility;
            $verticalref->NutitionId=$nutrition;
            $verticalref->vitalsignId=$vitalsigns;
            $verticalref->RespiratoryId=$respiratory;
            $verticalref->VisionHearingId=$visionhearing;
            $verticalref->OrientationId=$orientation;
            $verticalref->generalhistoryId=$generalhistory;
            $verticalref->leadid=$leadid;
            $verticalref->save();


            $e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');
 //$e=json_decode($e);
  //      $e1=$e[0]->id;

            $verticalcoordination = new verticalcoordination;
     $verticalcoordination->empid=$e;
     $verticalcoordination->leadid=$leadid;

$w=DB::table('verticalcoordinations')->where('leadid',$leadid)->value('empid');
$v=DB::table('verticalcoordinations')->where('leadid',$leadid)->value('leadid');
if($leadid != $v)
{
        $verticalcoordination->save(); 
}
else
{
  if($w == NULL)
  {

    $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$leadid)->select('id')->get();
      $verticalcoordination=json_decode($verticalcoordination);
             $verticalcoordination=$verticalcoordination[0]->id;

    $verticalcoordination=verticalcoordination::find($verticalcoordination);
      $verticalcoordination->empid=$e;

      $verticalcoordination->save(); 

  }
}

   
    
    



       session()->put('name',$name1);
                return redirect('/vh');

            }
            } 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assessment = assessment::find($id);
        return view('verticalheads.assessmentedit',compact('assessment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $lead = DB::table('leads')->where('id',$id)->select('id')->get();
       $lead=json_decode($lead);
       $lead=$lead[0]->id;
       //echo $lead;

       $name1=$request->sname;
//echo $name1;


//  $name=DB::table('services')->where('leadid',$id)->select('AssignedTo')->get();
// $name=json_decode($name);

// $vcid=DB::table('verticalcoordinations')->where('leadid',$id)->select('empid')->get();
// $vcid=json_decode($vcid);

// if($vcid == [])
// {
//         $name1= $name[0]->AssignedTo;
// }
// else
// {
//   $vcid=$vcid[0]->empid;
// $vid=DB::table('employees')->where('id',$vcid)->select('FirstName')->get();
// $vid=json_decode($vid);
// $name1=$vid[0]->FirstName;

// }

           
$p2=DB::table('products')->where('Leadid',$lead)->select('id')->get();
$p2=json_decode($p2);
//echo $p2;
//echo $lead;
            if($p2 == NULL){


           $products = new product;
           $products->SKUid=$request->SKUid;
           $products->ProductName=$request->ProductName;
           $products->DemoRequired=$request->DemoRequired;
           $products->AvailabilityStatus=$request->AvailabilityStatus;
           $products->AvailabilityAddress=$request->AvailabilityAddress;
           $products->SellingPrice=$request->SellingPrice;
           $products->RentalPrice=$request->RentalPrice;
           $products->Leadid=$lead;
           $pid=NULL;
           if($products->SKUid !=NULL || $products->ProductName !=NULL)
           {
             $products->save();
             $pid=DB::table('products')->max('id');
           }

}
else{
           
            $products=DB::table('products')->where('Leadid',$lead)->select('id')->get();
           $products=json_decode($products);
           $products=$products[0]->id;
           $pid=$products;
            echo $pid;
           $products=product::find($products);
           $products->SKUid=$request->SKUid;
           $products->ProductName=$request->ProductName;
           $products->DemoRequired=$request->DemoRequired;
           $products->AvailabilityStatus=$request->AvailabilityStatus;
           $products->AvailabilityAddress=$request->AvailabilityAddress;
           $products->SellingPrice=$request->SellingPrice;
           $products->RentalPrice=$request->RentalPrice;

                if($products->SKUid !=NULL || $products->ProductName !=NULL)
                {
                      $products->save();
                      
                }
                
       
 }

DB::table('services')
            ->where('id', $lead)
            ->update(['requested_service' => $request->requested_service]);


DB::table('services')
            ->where('id', $lead)
            ->update(['ServiceStatus' => $request->ServiceStatus]);



        $assessment=DB::table('assessments')->where('Leadid',$lead)->select('id')->get();
        $assessment=json_decode($assessment);
        $assessment=$assessment[0]->id;
        $assessment=assessment::find($assessment);
        $assessment->Assessor=$request->Assessor;
        $assessment->AssessDateTime=$request->AssessDateTime;
        $assessment->AssessPlace=$request->AssessPlace;
        $assessment->ServiceStartDate=$request->ServiceStartDate;
        $assessment->ServicePause=$request->ServicePause;
        $assessment->ServiceEndDate=$request->ServiceEndDate;
        $assessment->ShiftPreference=$request->ShiftPreference;
        $assessment->SpecificRequirements=$request->SpecificRequirements;
        $assessment->DaysWorked=$request->DaysWorked;
        $assessment->Latitude=$request->Latitude;
        $assessment->Longitude=$request->Longitude;
        $assessment->Productid=$pid;
        
        $assessment->save();

$servicetype=DB::table('services')->where('Leadid',$lead)->select('ServiceType')->get();
 $servicetype=json_decode($servicetype);
        $servicetype=$servicetype[0]->ServiceType;
        echo $servicetype;


if($servicetype == "Mathrutvam - Baby Care")
        {
            
                $mother=DB::table('mothers')->where('Leadid',$lead)->select('id')->get();
                $mother=json_decode($mother);
                $motherid=$mother[0]->id;
                $mother=mother::find($motherid);
               echo $mother;

                $mother->FName=$request->FName;
                $mother->MName=$request->MName;
                $mother->LName=$request->LName;
                $mother->Medications=$request->Medications;
                $mother->MedicalDiagnosis=$request->MedicalDiagnosis;
                $mother->DeliveryPlace=$request->DeliveryPlace;
                $mother->DueDate=$request->DueDate;
                $mother->DeliveryType=$request->DeliveryType;
                $mother->NoOfBabies=$request->NoOfBabies;
                $mother->NoOfAttenderRequired=$request->NoOfAttenderRequired;

                $mother->save();

        $mathruthvam=DB::table('mathruthvams')->where('Motherid',$motherid)->select('id')->get();
                $mathruthvam=json_decode($mathruthvam);
                $mathruthvam=$mathruthvam[0]->id;
                $mathruthvam=mathruthvam::find($mathruthvam);
                  $mathruthvam->ChildDOB=$request->ChildDOB;
                  $mathruthvam->ChildMedicalDiagnosis=$request->ChildMedicalDiagnosis;
                  $mathruthvam->ChildMedications=$request->ChildMedications;
                  $mathruthvam->ImmunizationUpdated=$request->ImmunizationUpdated;
                  $mathruthvam->BirthWeight=$request->BirthWeight;
                  $mathruthvam->DischargeWeight=$request->DischargeWeight;
                  $mathruthvam->FeedingFormula=$request->FeedingFormula;
                  $mathruthvam->FeedingIssue=$request->FeedingIssue;
                  $mathruthvam->FeedingType=$request->FeedingType;
                  $mathruthvam->FeedingEstablished=$request->FeedingEstablished;
                  $mathruthvam->other=$request->other;
                  $mathruthvam->Length=$request->Length;
                  $mathruthvam->HeadCircumference=$request->HeadCircumference;
                  $mathruthvam->SleepingPattern=$request->SleepingPattern;
                  $mathruthvam->save();



            $memoryintact=DB::table('memoryintacts')->where('leadid',$lead)->select('id')->get();
            $memoryintact=json_decode($memoryintact);
            $memoryintact=$memoryintact[0]->id;
            $memoryintact=memoryintact::find($memoryintact);
            $memoryintact->ShortTermIntact=$request->ShortTermIntact;
            $memoryintact->LongTermIntact=$request->LongTermIntact;
            $memoryintact->ShortTermImpaired=$request->ShortTermImpaired;
            $memoryintact->LongTermImpaired=$request->LongTermImpaired;
            
            $memoryintact->save();


            $vitalsigns=DB::table('vitalsigns')->where('leadid',$lead)->select('id')->get();
           $vitalsigns=json_decode($vitalsigns);
           $vitalsigns=$vitalsigns[0]->id;
           $vitalsigns=vitalsign::find($vitalsigns);
           $vitalsigns->BP=$request->BP;
           $vitalsigns->BP_equipment=$request->BP_equipment;
           $vitalsigns->BP_taken_from=$request->BP_taken_from;
           $vitalsigns->RR=$request->RR;
           $vitalsigns->Temperature=$request->Temperature;
           $vitalsigns->TemperatureType=$request->TemperatureType;
           $vitalsigns->Pulse=$request->Pulse;
           $vitalsigns->save();
         

           

           $respiratory=DB::table('respiratories')->where('leadid',$lead)->select('id')->get();
           $respiratory=json_decode($respiratory);
           $respiratory=$respiratory[0]->id;
           $respiratory=respiratory::find($respiratory);
           $respiratory->SOB=$request->SOB;
           $respiratory->Cough=$request->Cough;
           $respiratory->ColorOfPhlegm=$request->ColorOfPhlegm;
           $respiratory->Nebulization=$request->Nebulization;
           $respiratory->Tracheostomy=$request->Tracheostomy;
           $respiratory->CPAP_BIPAP=$request->CPAP_BIPAP;
           $respiratory->ICD=$request->ICD;
           $respiratory->H_OTB_Asthma_COPD=$request->H_OTB_Asthma_COPD;
           $respiratory->SPO2=$request->SPO2;
           $respiratory->central_cynaosis=$request->central_cynaosis;
           
           $respiratory->save();


            $nutrition=DB::table('nutrition')->where('leadid',$lead)->select('id')->get();
            $nutrition=json_decode($nutrition);
            $nutrition=$nutrition[0]->id;
            $nutrition=nutrition::find($nutrition);
            $nutrition->Intact=$request->Intact;
            $nutrition->Type=$request->Type;
            $nutrition->Diet=$request->Diet;
            $nutrition->BFTime=$request->BFTime;
            $nutrition->LunchTime=$request->LunchTime;
            $nutrition->SnacksTime=$request->SnacksTime;
            $nutrition->DinnerTime=$request->DinnerTime;
            $nutrition->TPN=$request->TPN;
            $nutrition->RTFeeding=$request->RTFeeding;
            $nutrition->PEGFeeding=$request->PEGFeeding;
        
            $nutrition->save();



$e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');

$w=DB::table('verticalcoordinations')->where('leadid',$lead)->value('empid');
if($w == NULL)
{

  $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$lead)->select('id')->get();
      $verticalcoordination=json_decode($verticalcoordination);
             $verticalcoordination=$verticalcoordination[0]->id;

        $verticalcoordination=verticalcoordination::find($verticalcoordination);
      $verticalcoordination->empid=$e;

      $verticalcoordination->save(); 
}

       session()->put('name',$name1);
       return redirect('/vh');



  }
  else
 {
   if($servicetype == "Physiotherapy - Home")
   {

   
       $physiotheraphy=DB::table('physiotheraphies')->where('Leadid',$lead)->select('id')->get();
        $physiotheraphy=json_decode($physiotheraphy);
        $Physioid=$physiotheraphy[0]->id;
        $physiotheraphy=physiotheraphy::find($Physioid);
      
        $physiotheraphy->PhysiotheraphyType=$request->PhysiotheraphyType;
        $physiotheraphy->MetalImplant=$request->MetalImplant;
        $physiotheraphy->Hypertension=$request->Hypertension;
        $physiotheraphy->Medications=$request->Medications;
        $physiotheraphy->chiefcomplains=$request->chiefcomplains;
        $physiotheraphy->ho_pc=$request->ho_pc;
        $physiotheraphy->previousmedical=$request->previousmedical;
        $physiotheraphy->occupationalH=$request->occupationalH;
        $physiotheraphy->labq=$request->labq;
        $physiotheraphy->affectedq=$request->affectedq;
        $physiotheraphy->painq=$request->painq;
        $physiotheraphy->envhistory=$request->envhistory;
        $physiotheraphy->examinationq=$request->examinationq;
        $physiotheraphy->PregnantOrBreastFeeding=$request->PregnantOrBreastFeeding;
        $physiotheraphy->Diabetes=$request->Diabetes;
        $physiotheraphy->ChronicInfection=$request->ChronicInfection;
        $physiotheraphy->HeartDisease=$request->HeartDisease;
        $physiotheraphy->Epilepsy=$request->Epilepsy;
        $physiotheraphy->SurgeryUndergone=$request->SurgeryUndergone;
        $physiotheraphy->AffectedArea=$request->AffectedArea;
        $physiotheraphy->AssesmentDate=$request->AssesmentDate;
        $physiotheraphy->PainPattern=$request->PainPattern;
        $physiotheraphy->ExaminationReport=$request->ExaminationReport;
        $physiotheraphy->LabOrRadiologicalReport=$request->LabOrRadiologicalReport;
        $physiotheraphy->MedicalDisgnosis=$request->MedicalDisgnosis;
        $physiotheraphy->PhysiotherapeuticDiagnosis=$request->PhysiotherapeuticDiagnosis;
        $physiotheraphy->ShortTermGoal=$request->ShortTermGoal;
        $physiotheraphy->LongTermGoal=$request->LongTermGoal;
         $physiotheraphy->save();



          $physioreport=DB::table('physioreports')->where('Physioid',$Physioid)->select('id')->get();
                $physioreport=json_decode($physioreport);
                $physioreport=$physioreport[0]->id;
                $physioreport=physioreport::find($physioreport);
            $physioreport->ProblemIdentified=$request->ProblemIdentified;
            $physioreport->Treatment=$request->Treatment;
            $physioreport->p1=$request->p1;
            $physioreport->t1=$request->t1;
            $physioreport->p2=$request->p2;
            $physioreport->t2=$request->t2;
            $physioreport->p3=$request->p3;
            $physioreport->t3=$request->t3;
            $physioreport->p4=$request->p4;
            $physioreport->t4=$request->t4;
            $physioreport->p5=$request->p5;
            $physioreport->t5=$request->t5;
            $physioreport->p6=$request->p6;
            $physioreport->t6=$request->t6;
            $physioreport->p7=$request->p7;
            $physioreport->t7=$request->t7;
            $physioreport->p8=$request->p8;
            $physioreport->t8=$request->t8;
            $physioreport->p9=$request->p9;
            $physioreport->t9=$request->t9;

            $physioreport->save();



               $e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');

$w=DB::table('verticalcoordinations')->where('leadid',$lead)->value('empid');
if($w == NULL)
{

  $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$lead)->select('id')->get();
      $verticalcoordination=json_decode($verticalcoordination);
             $verticalcoordination=$verticalcoordination[0]->id;

        $verticalcoordination=verticalcoordination::find($verticalcoordination);
      $verticalcoordination->empid=$e;

      $verticalcoordination->save(); 
}




       session()->put('name',$name1);
       return redirect('/vh');


     }
      else
     {

       $abdomen=DB::table('abdomens')->where('leadid',$lead)->select('id')->get();
       $abdomen=json_decode($abdomen);
       $abdomen=$abdomen[0]->id;
       $abdomen=abdomen::find($abdomen);
        $abdomen->Inspection=$request->Inspection;
        $abdomen->AusculationofBS=$request->AusculationofBS;
        $abdomen->Palpation=$request->Palpation;
        $abdomen->Percussion=$request->Percussion;
        $abdomen->Ileostomy=$request->Ileostomy;
        $abdomen->Colostomy=$request->Colostomy;
        $abdomen->Functioning=$request->Functioning;
       $abdomen->save();


        $circulatory=DB::table('circulatories')->where('leadid',$lead)->select('id')->get();
         $circulatory=json_decode($circulatory);
         $circulatory=$circulatory[0]->id;
         $circulatory=circulatory::find($circulatory);
         $circulatory->ChestPain=$request->ChestPain;
         $circulatory->hoHTNCADCHF=$request->hoHTNCADCHF;
         $circulatory->HR=$request->HR;
         $circulatory->PeripheralCyanosis=$request->PeripheralCyanosis;
         $circulatory->JugularVein=$request->JugularVein;
         $circulatory->SurgeryHistory=$request->SurgeryHistory;
        
         $circulatory->save();

         $communication=DB::table('communications')->where('leadid',$lead)->select('id')->get();
           $communication=json_decode($communication);
           $communication=$communication[0]->id;
           $communication=communication::find($communication);
           $communication->Language=$request->Language;
           $communication->AdequateforAllActivities=$request->AdequateforAllActivities;
           $communication->unableToCommunicate=$request->unableToCommunicate;
           
           $communication->save();
           


            $dentures=DB::table('dentures')->where('leadid',$lead)->select('id')->get();
            $dentures=json_decode($dentures);
            $dentures=$dentures[0]->id;
            $dentures=denture::find($dentures);
            $dentures->Cleaning=$request->Cleaning;
           
            $dentures->save();
           

            $extremitie=DB::table('extremities')->where('leadid',$lead)->select('id')->get();
            $extremitie=json_decode($extremitie);
            $extremitie=$extremitie[0]->id;
            $extremitie=extremitie::find($extremitie);
            $extremitie->UppROM=$request->UppROM;
            $extremitie->UppMuscleStrength=$request->UppMuscleStrength;
            $extremitie->LowROM=$request->LowROM;
            $extremitie->LowMuscleStrength=$request->LowMuscleStrength;
           
            $extremitie->save();
            


            $fecal=DB::table('fecals')->where('leadid',$lead)->select('id')->get();
            $fecal=json_decode($fecal);
            $fecal=$fecal[0]->id;
            $fecal=fecal::find($fecal);

            $fecal->FecalType=$request->FecalType;
            $fecal->IncontinentOccasionally=$request->IncontinentOccasionally;
            $fecal->IncontinentAlways=$request->IncontinentAlways;
            $fecal->Commodechair=$request->Commodechair;
            $fecal->save();





            $genito=DB::table('genitos')->where('leadid',$lead)->select('id')->get();
            $genito=json_decode($genito);
            $genito=$genito[0]->id;
            $genito=genito::find($genito);
            $genito->UrinaryContinent=$request->UrinaryContinent;
            $genito->HoPOSTTURP=$request->HoPOSTTURP;
            $genito->HoUTI=$request->HoUTI;
            $genito->CompletelyContinet=$request->CompletelyContinet;
            $genito->IncontinentUrineOccasionally=$request->IncontinentUrineOccasionally;
            $genito->IncontinentUrineNightOnly=$request->IncontinentUrineNightOnly;
            $genito->IncontinentUrineAlways=$request->IncontinentUrineAlways;
           
            $genito->save();
            


            $generalcondition=DB::table('generalconditions')->where('leadid',$lead)->select('id')->get();
            $generalcondition=json_decode($generalcondition);
            $generalcondition=$generalcondition[0]->id;
            $generalcondition=generalcondition::find($generalcondition);
            $generalcondition->Weight=$request->Weight;
            $generalcondition->Height=$request->Height;
            $generalcondition->MedicalHistory=$request->MedicalHistory;
            
            $generalcondition->save();
            


               $generalhistory=DB::table('generalhistories')->where('leadid',$lead)->select('id')->get();
            $generalhistory=json_decode($generalhistory);
            $generalhistory=$generalhistory[0]->id;
            $generalhistory=generalhistory::find($generalhistory);

             
              $generalhistory->PresentHistory=$request->PresentHistory;
              $generalhistory->PastHistory=$request->PastHistory;
              $generalhistory->FamilyHistory=$request->FamilyHistory;
              $generalhistory->Mensural_OBGHistory=$request->Mensural_OBGHistory;
              $generalhistory->AllergicHistory=$request->AllergicHistory;
              $generalhistory->AllergicStatus=$request->AllergicStatus;
              $generalhistory->AllergicSeverity=$request->AllergicSeverity;
              $generalhistory->save();


            $memoryintact=DB::table('memoryintacts')->where('leadid',$lead)->select('id')->get();
            $memoryintact=json_decode($memoryintact);
            $memoryintact=$memoryintact[0]->id;
            $memoryintact=memoryintact::find($memoryintact);
            $memoryintact->ShortTermIntact=$request->ShortTermIntact;
            $memoryintact->LongTermIntact=$request->LongTermIntact;
            $memoryintact->ShortTermImpaired=$request->ShortTermImpaired;
            $memoryintact->LongTermImpaired=$request->LongTermImpaired;
            
            $memoryintact->save();


            $mobility=DB::table('mobilities')->where('leadid',$lead)->select('id')->get();
            $mobility=json_decode($mobility);
            $mobility=$mobility[0]->id;
            $mobility=mobility::find($mobility);
            $mobility->Independent=$request->Independent;
            $mobility->NeedAssistance=$request->NeedAssistance;
            $mobility->Walker=$request->Walker;
            $mobility->WheelChair=$request->WheelChair;
            $mobility->Crutch=$request->Crutch;
            $mobility->Cane=$request->Cane;
            $mobility->ChairFast=$request->ChairFast;
            $mobility->BedFast=$request->BedFast;
            
            $mobility->save();
            


           $orientation=DB::table('orientations')->where('leadid',$lead)->select('id')->get();
           $orientation=json_decode($orientation);
           $orientation=$orientation[0]->id;
           $orientation=orientation::find($orientation);
           $orientation->Person=$request->Person;
           $orientation->Place=$request->Place;
           $orientation->Time=$request->Time;
          
           $orientation->save();
           



           $vitalsigns=DB::table('vitalsigns')->where('leadid',$lead)->select('id')->get();
           $vitalsigns=json_decode($vitalsigns);
           $vitalsigns=$vitalsigns[0]->id;
           $vitalsigns=vitalsign::find($vitalsigns);
           $vitalsigns->BP=$request->BP;
           $vitalsigns->BP_equipment=$request->BP_equipment;
           $vitalsigns->BP_taken_from=$request->BP_taken_from;
           $vitalsigns->RR=$request->RR;
           $vitalsigns->Temperature=$request->Temperature;
           $vitalsigns->TemperatureType=$request->TemperatureType;
           $vitalsigns->P1=$request->P1;
           $vitalsigns->P2=$request->P2;
           $vitalsigns->P3=$request->P3;
           $vitalsigns->R1=$request->R1;
           $vitalsigns->R2=$request->R2;
           $vitalsigns->R3=$request->R3;
           $vitalsigns->R4=$request->R4;
           $vitalsigns->T1=$request->T1;
           $vitalsigns->T2=$request->T2;
           $vitalsigns->Pulse=$request->Pulse;
           $vitalsigns->PainScale=$request->PainScale;
           $vitalsigns->Quality=$request->Quality;
           $vitalsigns->SeverityScale=$request->SeverityScale;
            $vitalsigns->MedicalDiagnosis=$request->MedicalDiagnosis;
           $vitalsigns->q1=$request->q1;
           $vitalsigns->save();
         

           

           $respiratory=DB::table('respiratories')->where('leadid',$lead)->select('id')->get();
           $respiratory=json_decode($respiratory);
           $respiratory=$respiratory[0]->id;
           $respiratory=respiratory::find($respiratory);
           $respiratory->SOB=$request->SOB;
           $respiratory->Cough=$request->Cough;
           $respiratory->ColorOfPhlegm=$request->ColorOfPhlegm;
           $respiratory->Nebulization=$request->Nebulization;
           $respiratory->Tracheostomy=$request->Tracheostomy;
           $respiratory->CPAP_BIPAP=$request->CPAP_BIPAP;
           $respiratory->ICD=$request->ICD;
           $respiratory->H_OTB_Asthma_COPD=$request->H_OTB_Asthma_COPD;
           $respiratory->SPO2=$request->SPO2;
           $respiratory->central_cynaosis=$request->central_cynaosis;
           
           $respiratory->save();



            $position=DB::table('positions')->where('leadid',$lead)->select('id')->get();
            $position=json_decode($position);
            $position=$position[0]->id;
            $position=position::find($position);
            $position->Fowler=$request->Fowler;
            $position->Supine=$request->Supine;
            $position->Rt_Lateral=$request->Rt_Lateral;
            $position->Lt_Lateral=$request->Lt_Lateral;
            
            $position->save();
           


          $visionhearing=DB::table('visionhearings')->where('leadid',$lead)->select('id')->get();
           $visionhearing=json_decode($visionhearing);
           $visionhearing=$visionhearing[0]->id;
           $visionhearing=visionhearing::find($visionhearing);
           $visionhearing->Impared=$request->Impared;
           $visionhearing->HImpared=$request->HImpared;
           $visionhearing->ShortSight=$request->ShortSight;
           $visionhearing->LongSight=$request->LongSight;
           $visionhearing->WearsGlasses=$request->WearsGlasses;
           $visionhearing->HearingAids=$request->HearingAids;
          
           $visionhearing->save();
           

                   
            $nutrition=DB::table('nutrition')->where('leadid',$lead)->select('id')->get();
            $nutrition=json_decode($nutrition);
            $nutrition=$nutrition[0]->id;
            $nutrition=nutrition::find($nutrition);
            $nutrition->Intact=$request->Intact;
            $nutrition->Type=$request->Type;
            $nutrition->Diet=$request->Diet;
            $nutrition->BFTime=$request->BFTime;
            $nutrition->LunchTime=$request->LunchTime;
            $nutrition->SnacksTime=$request->SnacksTime;
            $nutrition->DinnerTime=$request->DinnerTime;
            $nutrition->TPN=$request->TPN;
            $nutrition->RTFeeding=$request->RTFeeding;
            $nutrition->PEGFeeding=$request->PEGFeeding;
        
            $nutrition->save();

          

$e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');

$w=DB::table('verticalcoordinations')->where('leadid',$lead)->value('empid');
if($w == NULL)
{

  $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$lead)->select('id')->get();
      $verticalcoordination=json_decode($verticalcoordination);
             $verticalcoordination=$verticalcoordination[0]->id;

        $verticalcoordination=verticalcoordination::find($verticalcoordination);
      $verticalcoordination->empid=$e;

      $verticalcoordination->save(); 
}




     //        

     // $verticalcoordination=DB::table('verticalcoordinations')->where('leadid',$lead)->select('id')->get();
     // $verticalcoordination=json_decode($verticalcoordination);
     //        $verticalcoordination=$verticalcoordination[0]->id;
     //        $verticalcoordination=verticalcoordination::find($verticalcoordination);
     // $verticalcoordination->empid=$e;

     // $verticalcoordination->save(); 


       session()->put('name',$name1);
       return redirect('/vh');


          }
        }

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
