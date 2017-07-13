<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\language;
use DB;

class languagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages= language::paginate(100);
        return view('language.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang=$request->Languages;
echo $lang;
        $language = new language;
        $this->validate($request,[
                'Languages'=>'required',
            ]);
       $language->Languages=$request->Languages;
       
       $language->save();


      // $name = $request->input('Languages');
     // DB::insert('insert into languages (Languages) values(?)',[$name]);
    //  
    //DB::table('languages')->save($name)




  
   // $lang = $this->language->newEntity();
    //    if ($this->request->is('language')) {
     //       $lang = $this->Languages->patchEntity($lang, $this->request->getData());
      //      if ($this->languages->save($lang)) {
        //        $this->Flash->success(__('The lang has been saved.'));
//
       //         return $this->redirect(['action' => 'index']);
       //     }
      //      $this->Flash->error(__('The lang could not be saved. Please, try again.'));
     //   }
     //   $this->set(compact('lang'));
    //    $this->set('_serialize', ['lang']);
    
    
    
    
        // $language = new language;
       //  $this->validate($request,[
      //           'Languages'=>'required',
      //       ]);
      //  $language->Languages=$request->Languages;
       
     //   $language->save();
       
       
        // $languages=$request->input('Languages');

        // $data=array('Languages'=>$languages);
        // DB::table('languages')->insert($data);
       // return redirect('/languages');
        
        // $name = $request->input('Languages');
     // DB::insert('insert into languages (Languages) values(?)',[$name]);
    //  
    //DB::table('languages')->save($name);
    //  
      // return redirect('/languages');
      
      
   // return language::create([
     //       'Languages' => $name,
     //   ]);
        
        
       //  $data = Request::all(); //requested data via Facade
        //prepare validatation
       // $validation = Validator::make($data, [ 
       //         'Languages' => 'required|max:45',
       //         ]);
                
      //   if ($validation->fails())
     //   {
     //       return redirect()->back()->withErrors($v->errors());
    //    }
        
    //  language::create([
    //        'Languages' => Request::input('Languages'),
            
     //   ]);
     
     //$data = $request->only('Languages'); // you can use Input::all() too
      //  return App\Person::create($data);
        





       //   $languages=$request->input('Languages');

       //   $data=array('Languages'=>$languages);

        
       //  // DB::table('languages')->insert($data);

       //   language::create([
       //      'Languages' => $data['Languages'],
       //  ]);
       

        return redirect('/languages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = language::find($id);
        return view('language.edit',compact('language'));
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
        $language = language::find($id);
        $language->Languages=$request->Languages;
       $language->save();
       session()->flash('message','Updated Successfully');
       return redirect('/languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language=language::find($id);
       $language->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/languages');
    }
}
