<?php

namespace App\Http\Controllers;
use App\Http\Requests\PhoneRequest;
use Illuminate\Http\Request;
use App\Models\Phone;
use Auth;
class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $usersphone= Auth::User()->phones;
        $usersphone=new Phone();

        return view('phones.index',['usersphone'=>$usersphone->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        // if($request->user()->cannot('create', Phone::class)) {
        //     abort(403);
        // };
       $usersphone=new Phone();
       $usersphone->phone_number=$request->phone_number;
       $usersphone->user_id=Auth::id();
       if($usersphone->save()){
        return redirect()->route('phones.index')->with('success','phone created successfully');
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

        $usersphone=Phone::find($id);
        return view('phones.edit',['usersphone'=>$usersphone]);

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        $usersphone=Phone::find($id);
        if ($request->user()->cannot('update', $usersphone)) {
            abort(403);
        }
        
        $usersphone->phone_number=$request->phone_number;
        if($usersphone->save()){
            return redirect()->route('phones.index');
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
        // //
   
        if (Auth::User()->cannot('delete', Phone::find($id))) {
            abort(403);
        }
        Phone::find($id)->delete();
        return redirect()->route('phones.index');
    }
}
