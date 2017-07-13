<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\lead;
use App\personneldetail;
use App\service;
use App\address;
use App\language;
use App\product;
use App\enquiryproduct;
use App\verticalcoordination;
use App\Activity;

class VerticalheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name=$_GET['name'];
       $reference=DB::table('references')->get();
        $gender=DB::table('genders')->get();
        $gender1=DB::table('genders')->get();
        $city=DB::table('cities')->get();
        $pcity=DB::table('cities')->get();
        $ecity=DB::table('cities')->get();
        $branch=DB::table('cities')->get();
        $leadtype=DB::table('leadtypes')->get();
         $condition=DB::table('ptconditions')->get();
        $language=DB::table('languages')->get();
        $relation=DB::table('relationships')->get();
        $vertical=DB::table('verticals')->get();




        $empid=DB::table('employees')->where('FirstName',$name)->select('id')->get();
        $empid=json_decode($empid);
        $eid= $empid[0]->id;
        $emp=DB::table('employees')->where('Designation','Coordinator')->where('under',$eid)->get();

        return view('vh.create',compact('reference','gender','relation','city','branch','pcity','ecity','language','gender1','leadtype','condition','vertical','emp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ref=DB::table('references')->where('Reference',$request->reference)->value('id');

        $empid=Null;
        $name1123=$request->loginname;
echo $name1123;
$empid=DB::table('employees')->where('FirstName',$request->assignedto)->value('id');




  $lead = new lead;
        // $this->validate($request,[
        //         'Languages'=>'required',
        //     ]);


       $lead->fName=$request->clientfname;
       $lead->mName=$request->clientmname;
       $lead->lName=$request->clientlname;
       $lead->EmailId=$request->clientemail;
       $lead->Source=$request->source;
       $lead->MobileNumber=$request->clientmob;
       $lead->Alternatenumber=$request->clientalternateno;
       $lead->EmergencyContact =$request->EmergencyContact;
       $lead->AssesmentReq=$request->assesmentreq;
       $lead->createdby=$request->loginname;
       $lead->Referenceid=$ref;
       $lead->empid=$empid;




       $lead->save();
       $leadid=DB::table('leads')->max('id');

         $address = new address;

       $address->Address1=$request->Address1;
       $address->Address2=$request->Address2;
       $address->City=$request->City;
       $address->District=$request->District;
       $address->State=$request->State;
       $address->PinCode=$request->PinCode;

$same1=$request->presentcontact;
       if($same1=='same')
       {
        $address->PAddress1=$request->Address1;
       $address->PAddress2=$request->Address2;
       $address->PCity=$request->City;
       $address->PDistrict=$request->District;
       $address->PState=$request->State;
       $address->PPinCode=$request->PinCode;
         }

else
{
   $address->PAddress1=$request->PAddress1;
       $address->PAddress2=$request->PAddress2;
       $address->PCity=$request->PCity;
       $address->PDistrict=$request->PDistrict;
       $address->PState=$request->PState;
       $address->PPinCode=$request->PPinCode;
}

$same=$request->emergencycontact;
       if($same=='same')
       {
       $address->EAddress1=$request->Address1;
       $address->EAddress2=$request->Address2;
       $address->ECity=$request->City;
       $address->EDistrict=$request->District;
       $address->EState=$request->State;
       $address->EPinCode=$request->PinCode;
     }

else
{
  $address->EAddress1=$request->EAddress1;
       $address->EAddress2=$request->EAddress2;
       $address->ECity=$request->ECity;
       $address->EDistrict=$request->EDistrict;
       $address->EState=$request->EState;
       $address->EPinCode=$request->EPinCode;
}

       $address->leadid=$leadid;
       $address->empid=$empid;
       $address->save();
       $addressid=DB::table('addresses')->max('id');







       $personnel = new personneldetail;
        // $this->validate($request,[
        //         'Languages'=>'required',
        //     ]);

       $personnel->PtfName=$request->patientfname;
       $personnel->PtmName=$request->patientmname;
       $personnel->PtlName=$request->patientlname;
       $personnel->age=$request->age;
       $personnel->Gender=$request->gender;
       $personnel->Relationship=$request->relationship;
       $personnel->Occupation=$request->Occupation;
       $personnel->AadharNum=$request->aadhar;
       $personnel->AlternateUHIDType=$request->AlternateUHIDType;
       $personnel->AlternateUHIDNumber=$request->AlternateUHIDNumber;
       $personnel->PTAwareofDisease=$request->PTAwareofDisease;
       $personnel->Addressid=$addressid;
       $personnel->Leadid=$leadid;

       $personnel->save();



$l=DB::table('languages')->where('Languages',$request->preferedlanguage)->value('id');
        $langid=json_decode($l);

        $service = new service;
        // $this->validate($request,[
        //         'Languages'=>'required',
        //     ]);

        $service->ServiceType=$request->servicetype;
        $service->GeneralCondition=$request->GeneralCondition;
        $service->LeadType=$request->leadtype;
        $service->Branch=$request->branch;
        $service->RequestDateTime=$request->requesteddate;
        $service->AssignedTo=$request->assignedto;
        $service->QuotedPrice=$request->quotedprice;
        $service->ExpectedPrice=$request->expectedprice;
        $service->ServiceStatus=$request->servicestatus;
        $service->PreferedGender=$request->preferedgender;
        $service->PreferedLanguage=$request->preferedlanguage;
        $service->Remarks=$request->remarks;
        $service->langId=$langid;
        $service->LeadId=$leadid;

        $service->save();


        $products = new product;
           $products->SKUid=$request->SKUid;
           $products->ProductName=$request->ProductName;
           $products->DemoRequired=$request->DemoRequired;
           $products->AvailabilityStatus=$request->AvailabilityStatus;
           $products->AvailabilityAddress=$request->AvailabilityAddress;
           $products->SellingPrice=$request->SellingPrice;
           $products->RentalPrice=$request->RentalPrice;
           $products->Leadid=$leadid;
           $productid=NULL;
           if($products->SKUid !=NULL || $products->ProductName !=NULL)
           {
             $products->save();
             $productid=DB::table('products')->max('id');


              $enquiryproducts = new enquiryproduct;
              $enquiryproducts->Productid=$productid;
              $enquiryproducts->leadid=$leadid;
              $enquiryproducts->save();

           }

 $e=DB::table('employees')->where('FirstName',$request->assigned)->value('id');
 //$e=json_decode($e);
  //      $e1=$e[0]->id;

     $verticalcoordination = new verticalcoordination;
     $verticalcoordination->empid=$e;
     $verticalcoordination->leadid=$leadid;
     $verticalcoordination->save();

     /*
     Code for creation log starts here -- by jatin
     */
     //We are trying to retrive the session id for the person who is logged in


     $log_session_id = DB::table('logs')->where('session_id', session()->getId())->value('session_id');
     $username = DB::table('logs')->where('session_id', session()->getId())->value('name');

     $emp_id = DB::table('employees')->where('FirstName', $username)->value('id');
     $log_id = DB::table('logs')->where('session_id',session()->getId())->value('id');

     $activity = new Activity;
     $activity->emp_id = $emp_id;
     $activity->activity = "Lead Created";
     $activity->activity_time = new \DateTime();
     $activity->log_id = $log_id;
     $activity->save();

     /*
     Code for creation log ends here -- by jatin
     */


$name=DB::table('leads')->where('id',$leadid)->select('createdby','id')->get();
$name=json_decode($name);
        $name1=$name[0]->createdby;
        $id=$name[0]->id;

$n=DB::table('admins')->where('name',$name1)->select('id')->get();
$n=json_decode($n);
        $n1=$n[0]->id;

$a=DB::table('role_admins')->where('admin_id',$n1)->select('role_id')->get();
$a=json_decode($a);
         $a1=$a[0]->role_id;

$b=DB::table('roles')->where('id',$a1)->select('name')->get();
$b=json_decode($b);
         $b1=$b[0]->name;
        if($b1=="vertical")
        {
//             $name2=DB::table('services')->where('leadid',$leadid)->select('AssignedTo')->get();
// $name2=json_decode($name2);
//         $name2=$name2[0]->AssignedTo;



            session()->put('name',$name1123);
            return redirect('/vh');
        }
else{
       return redirect('/cc');
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
        //
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
        //
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
