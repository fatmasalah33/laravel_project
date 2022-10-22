<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\PhoneRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone;
use Auth;
use App\Http\Resources\PhoneResource;
use App\Http\Resources\PhoneCollection;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Phone::select('id','phone_number')->get();
        // return PhoneResource::collection(Phone::select('id','phone_number')->get());
        // return PhoneResource::collection(Phone::all());
        return new PhoneCollection(Phone::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $usersphone=new Phone();
        $usersphone->phone_number=$request->phone_number;
        $usersphone->user_id=$request->user_id;
        if($usersphone->save()){
            return new PhoneResource($usersphone);
           }
        //  $phone=Auth::User()->phones()->create($request->all());
        // $phone=Auth::User()->phones()->create($request->all());
        // return new PhoneResource($phone);
      
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $phone=Phone::where('id',$id)->select('phone_number')->first();
        // return $phone;
        return new PhoneResource(Phone::find($id));
        
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
        
        $usersphone=Phone::find($id);
        $usersphone ->update($request->all());
        return new PhoneResource($usersphone); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        return new PhoneCollection(Phone::all());
    }
}
