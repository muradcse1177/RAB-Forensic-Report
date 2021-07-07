<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class analystController extends Controller
{
    public function analysisReport(){
        $rows = DB::table('sample')
            ->where('status','>', 1)
            ->orderBy('id', 'DESC')->Paginate(10);
        return view('analysisReport', ['reports' => $rows]);
    }
    public function directorDesignation(){
        $rows = DB::table('designation')->first();
        //dd($rows);
        return view('directorDesignation' ,['designation' => $rows]);
    }
    public function sampleType(){
        try{
            $rows = DB::table('sample_type')
                ->orderBy('id', 'DESC')->Paginate(10);
            return view('sampleType', ['samples' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertDesignation(Request $request){
        try{
            if($request) {
                DB::table('designation')
                    ->delete();
                $result = DB::table('designation')->insert([
                    'designation' => $request->editorText
                ]);
                $lastId = DB::getPdo()->lastInsertId();
                $barcode =DB::table('designation')
                    ->where('id',$lastId)
                    ->first();
                if ($result) {
                    return back()->with('successMessage', 'Data Inserted Successfully.');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertSample(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('sample_type')
                        ->where('id', $request->id)
                        ->update([
                            'sample' =>  $request->name,
                        ]);
                    if ($result) {
                        return back()->with('successMessage', 'Data Updated Successfully.');
                    } else {
                        return back()->with('errorMessage', 'Please Try Again!!');
                    }
                }
                else{
                    $rows = DB::table('sample_type')->select('sample')->where([
                        ['sample', '=', $request->name]
                    ])->distinct()->get()->count();
                    if ($rows > 0) {
                        return back()->with('errorMessage', 'Data Already Exit!!');
                    } else {
                        $result = DB::table('sample_type')->insert([
                            'sample' => $request->name
                        ]);
                        if ($result) {
                            return back()->with('successMessage', 'Data Inserted Successfully.');
                        } else {
                            return back()->with('errorMessage', 'Please Try Again!!');
                        }
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function getSampleList(Request $request){
        try{
            $rows = DB::table('sample_type')->where('id', $request->id)->first();

            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function deleteSample(Request $request){
        try{

            if($request->id) {
                $result =DB::table('sample_type')
                    ->where('id', $request->id)
                    ->delete();
                if ($result) {
                    return back()->with('successMessage', 'Data Deleted Successfully.');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteReceivedSample(Request $request){
        try{

            if($request->id) {
                $result =DB::table('sample')
                    ->where('id', $request->id)
                    ->delete();
                if ($result) {
                    return back()->with('successMessage', 'Data Deleted Successfully.');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function users(){
        try{
            $rows = DB::table('users')
                ->orderBy('id', 'DESC')->Paginate(10);
            return view('users', ['users' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertUser(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'name' =>  $request->name,
                            'email' =>  $request->email,
                            'password' =>  $request->password,
                            'role' =>  $request->role,
                        ]);
                    if ($result) {
                        return back()->with('successMessage', 'Data Updated Successfully.');
                    } else {
                        return back()->with('errorMessage', 'Please Try Again!!');
                    }
                }
                else{
                    $rows = DB::table('users')->select('name')->where([
                        ['email', '=', $request->email]
                    ])->distinct()->get()->count();
                    if ($rows > 0) {
                        return back()->with('errorMessage', ' Data Already Exit!!');
                    } else {
                        $result = DB::table('users')->insert([
                            'name' =>  $request->name,
                            'email' =>  $request->email,
                            'password' =>  $request->password,
                            'role' =>  $request->role,
                        ]);
                        if ($result) {
                            return back()->with('successMessage', 'Data Inserted Successfully.');
                        } else {
                            return back()->with('errorMessage', 'Please Try Again!!');
                        }
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function getUserList(Request $request){
        try{
            $rows = DB::table('users')->where('id', $request->id)->first();

            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function deleteUser(Request $request){
        try{

            if($request->id) {
                $result =DB::table('users')
                    ->where('id', $request->id)
                    ->delete();
                if ($result) {
                    return back()->with('successMessage', 'Data Deleted Successfully.');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function enclosedItem(){
        try{
            $rows = DB::table('enclosed_item')
                ->orderBy('id', 'DESC')->Paginate(10);
            return view('enclosedItem', ['enclosedItems' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertEnclosedItem(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('enclosed_item')
                        ->where('id', $request->id)
                        ->update([
                            'name' =>  $request->name,
                        ]);
                    if ($result) {
                        return back()->with('successMessage', 'Data Updated Successfully.');
                    } else {
                        return back()->with('errorMessage', 'Please Try Again!!');
                    }
                }
                else{
                    $rows = DB::table('enclosed_item')->select('name')->where([
                        ['name', '=', $request->name]
                    ])->distinct()->get()->count();
                    if ($rows > 0) {
                        return back()->with('errorMessage', ' Data Already Exit!!');
                    } else {
                        $result = DB::table('enclosed_item')->insert([
                            'name' => $request->name
                        ]);
                        if ($result) {
                            return back()->with('successMessage', 'Data Inserted Successfully.');
                        } else {
                            return back()->with('errorMessage', 'Please Try Again!!');
                        }
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function getEnclosedItemList(Request $request){
        try{
            $rows = DB::table('enclosed_item')->where('id', $request->id)->first();

            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function deleteEnclosedItem(Request $request){
        try{

            if($request->id) {
                $result =DB::table('enclosed_item')
                    ->where('id', $request->id)
                    ->delete();
                if ($result) {
                    return back()->with('successMessage', 'Data Deleted Successfully.');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function methodology(){
        try{
            $rows = DB::table('methodology')
                ->orderBy('id', 'DESC')->Paginate(10);
            return view('methodology', ['methodologys' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function insertMethodology(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('methodology')
                        ->where('id', $request->id)
                        ->update([
                            'name' =>  $request->name,
                        ]);
                    if ($result) {
                        return back()->with('successMessage', 'Data Updated Successfully.');
                    } else {
                        return back()->with('errorMessage', 'Please Try Again!!');
                    }
                }
                else{
                    $rows = DB::table('methodology')->select('name')->where([
                        ['name', '=', $request->name]
                    ])->distinct()->get()->count();
                    if ($rows > 0) {
                        return back()->with('errorMessage', ' Data Already Exit!!');
                    } else {
                        $result = DB::table('methodology')->insert([
                            'name' => $request->name
                        ]);
                        if ($result) {
                            return back()->with('successMessage', 'Data Inserted Successfully.');
                        } else {
                            return back()->with('errorMessage', 'Please Try Again!!');
                        }
                    }
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function getMethodologyList(Request $request){
        try{
            $rows = DB::table('methodology')->where('id', $request->id)->first();

            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function deleteMethodology(Request $request){
        try{
            if($request->id) {
                $result =DB::table('methodology')
                    ->where('id', $request->id)
                    ->delete();
                if ($result) {
                    return back()->with('successMessage', 'Data Deleted Successfully.');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function getDataByBarcode(Request $request){
        try{
            $rows = DB::table('sample')
                ->where('bacode', $request->id)
                ->orWhere('id', $request->id)
                ->first();
            $methodology = DB::table('methodology')->get();
            $count = DB::table('sample')
                ->select('bacode')
                ->where('bacode',  $request->id)
                ->orWhere('id', $request->id)
                ->get()
                ->count();
            return response()->json(array('data'=>$rows,'count'=>$count,'methodology'=>$methodology));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function UpdateResultAnalysis(Request $request){
        try{
            if($request) {
                $result =DB::table('sample')
                    ->where('id', $request->id)
                    ->update([
                        'type' => $request->type,
                        'year' => $request->year,
                        'letterNo' => $request->letterNo,
                        'receivedFrom' => $request->receivedFrom,
                        'receivedBy' => $request->receivedBy,
                        'receivedDate' => $request->receivedDate,
                        'description' => $request->description,
                        'consisted' => $request->consisted,
                        'enclosed' => $request->enclosed,
                        'impression' => $request->impression,
                        'contained' => $request->contained,
                        'caseNo' => $request->caseNo,
                        'designation' => $request->designation,
                        'tests' => $request->tests,
                        'analysis' => $request->analysis,
                        'editor_ext' => $request->editorText,
                        'analysis_by' => $request->analysisBy,
                    ]);
                $barcode =DB::table('sample')
                    ->where('id', $request->id)
                    ->first();
                if ($result) {
                    return back()->with('successMessage', 'Data: '.$barcode->bacode.' Updated Successfully');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function forwardAdminSample(Request $request){
        try{
            if($request->id) {
                $result =DB::table('sample')
                    ->where('id', $request->id)
                    ->update([
                        'status' => 3,
                    ]);
                $barcode =DB::table('sample')
                    ->where('id', $request->id)
                    ->first();

                if ($result) {
                    return back()->with('successMessage', 'Data: '.$barcode->bacode.' Forward Successfully');
                } else {
                    return back()->with('errorMessage', 'Please Try Again!!');
                }

            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
}
