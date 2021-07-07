<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class receiverController extends Controller
{
    public function receiveReport(){
        $rows = DB::table('sample')
            ->orderBy('id', 'DESC')->Paginate(10);
        return view('receiveReport', ['reports' => $rows]);
    }
    public function getAllSample(Request $request){
        try{
            $rows = DB::table('sample_type')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function getAllEnclosedItem(Request $request){
        try{
            $rows = DB::table('enclosed_item')->get();
            return response()->json(array('data'=>$rows));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function forwardReceivedSample(Request $request){
        try{
            if($request->id) {
                $result =DB::table('sample')
                    ->where('id', $request->id)
                    ->update([
                        'status' => 2,
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
    public function insertNewSample(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->forward == 'forward'){
                        $result =DB::table('sample')
                            ->where('id', $request->id)
                            ->update([
                                'status' => 2,
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
                }
                else {
                    $row = DB::table('sample')->orderBy('id', 'desc')->first();
                    if(empty($row))
                        $id =1;
                    else
                        $id = $row->id+1;
                    $sample = DB::table('sample_type')
                        ->where('id', $request->type)
                        ->first();
                    $barcode = "ID-".$sample->sample. str_pad($id, 6, '0', STR_PAD_LEFT);
                    //dd($barcode);
                    $result = DB::table('sample')->insert([
                        'date' => date('Y-m-d'),
                        'bacode' => $barcode,
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
                    ]);
                    $lastId = DB::getPdo()->lastInsertId();
                    $barcode =DB::table('sample')
                        ->where('id',$lastId)
                        ->first();
                    if ($result) {
                        return back()->with('successMessage', 'Data: '.$barcode->bacode.' Inserted Successfully');
                    } else {
                        return back()->with('errorMessage', 'Please Try Again!!');
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
    public function getSampleListById(Request $request){
        try{
            $rows = DB::table('sample')
                ->where('id', $request->id)
                ->first();
            $methodology = DB::table('methodology')->get();
            return response()->json(array('data'=>$rows,'methodology'=>$methodology));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function deleteReceivedSample (Request $request){
        try{
            if($request->id) {
                $barcode =DB::table('sample')
                    ->where('id', $request->id)
                    ->first();
                $result =DB::table('sample')
                    ->where('id', $request->id)
                    ->delete();
                if ($result) {
                    return back()->with('successMessage', 'Data: '.$barcode->bacode.' Deleted Successfully');
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
    public function barcode ($id){
        $result =DB::table('sample')
            ->where('id', $id)
            ->first();
        return view('printBarcode', ['id' => $id,'barcode'=>$result->bacode]);
    }
}
