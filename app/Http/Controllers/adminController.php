<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use niklasravnsborg\LaravelPdf\Facades\Pdf;

class adminController extends Controller
{
    public function finalReport (){
        $rows = DB::table('sample')
            ->where('status', 3)
            ->orderBy('id', 'DESC')->Paginate(20);
        return view('finalReport', ['reports' => $rows]);
    }
    public function getSampleListByIdAdmin(Request $request){
        try{
            $rows = DB::table('sample')
                ->select('*','sample.id as s_id')
                ->join('enclosed_item','sample.enclosed','=','enclosed_item.id')
                ->where('sample.id', $request->id)
                ->first();
            $tests  = json_decode($rows->tests);
            $test_name = array();
            foreach ($tests as $test){
                $methodology = DB::table('methodology')
                    ->where('id', $test)
                    ->first();
                $test_name[]  =  $methodology->name;
            }
            $designation = DB::table('designation')
                ->first();
            return response()->json(array('data'=>$rows,'methodology'=>$test_name,'designation' => $designation->designation));
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json(array('data'=>$ex->getMessage()));
        }
    }
    public function pdfMaker(Request $request){
        $rows = DB::table('sample')
            ->join('enclosed_item','sample.enclosed','=','enclosed_item.id')
            ->where('sample.id', $request->id)
            ->first();
        $tests  = json_decode($rows->tests);
        $test_name = array();
        foreach ($tests as $test){
            $methodology = DB::table('methodology')
                ->where('id', $test)
                ->first();
            $test_name[]  =  $methodology->name;
        }
        $designation = DB::table('designation')
            ->first();
        $data =['data'=>$rows,'methodology'=>$test_name,'designation' => $designation->designation];
        $pdf = PDF::loadView('reportPdf', $data);
        return $pdf->stream('FinalReport.pdf');
    }
}
