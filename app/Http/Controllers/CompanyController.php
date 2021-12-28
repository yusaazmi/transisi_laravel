<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Validator;
use Ramsey\Uuid\Uuid;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);
        return view('admin.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama" => ['required'],
            "email" => ['required','email'],
            "logo" => ['required','image','mimes:png','max:2048','dimensions:min_width=100,min_height=200'],
            "website" => ['required','url'],
        ]);

        if($validator->fails()){
            $request->flash();
            toast($validator->messages()->all()[0], 'error');
            return back()->withInput();
        }
        $logo = $request->logo;
        Storage::disk('company')->put($logo->getClientOriginalName(), 'Contents');


        $company = new Company;
        $company->id = Uuid::uuid4()->toString();
        $company->nama = $request->nama;
        $company->email = $request->email;
        $company->logo = $logo->getClientOriginalName();
        $company->website = $request->website;
        $company->save();
        
        toast('New Company Added', 'success');
        return redirect()->route('admin.company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Company $company)
    {
        $company = Company::find($id);
        // dd($company);
        return view('admin.editCompany',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            "nama" => ['required'],
            "email" => ['required','email'],
            "logo" => ['required','image','mimes:png','max:2048','dimensions:min_width=100,min_height=200'],
            "website" => ['required','url'],
        ]);

        if($validator->fails()){
            $request->flash();
            toast($validator->messages()->all()[0], 'error');
            return back()->withInput();
        }
        $logo = $request->logo;
        Storage::disk('company')->put($logo->getClientOriginalName(), 'Contents');
        $company = Company::find($id);
        $company->nama = $request->nama;
        $company->email = $request->email;
        $company->logo = $logo->getClientOriginalName();
        $company->website = $request->website;
        $company->save();

        toast('Update Success!', 'success');
        return redirect()->route('admin.company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Company $company)
    {
        $delete = Company::find($id);
        $delete->delete();
        toast('Delete Successfull','success');
        return redirect()->back();
    }
}
