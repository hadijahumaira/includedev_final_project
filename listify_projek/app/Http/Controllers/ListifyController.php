<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Listify;
use App\Exports\ListifyExport;
use App\Imports\ListifyImport;
use Illuminate\Http\Request;
use App\Models\Deadline;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class ListifyController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Listify::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = listify::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        $notif = listify::where('deadline', 'LIKE', '%'.Carbon::now()->addDay()->format('Y-m-d').'%')->orWhere('deadline', 'LIKE', '%'.Carbon::now()->format('Y-m-d').'%')->get();          
        return view('datatugas',compact('data', 'notif'));
    }

    public function tambahtugas(){
        $deadline = Listify::all();
        $notif = Listify::where('deadline', 'LIKE', '%'.Carbon::now()->addDay()->format('Y-m-d').'%')->orWhere('deadline', 'LIKE', '%'.Carbon::now()->format('Y-m-d').'%')->get();  
        return view('tambahdata',compact('deadline', 'notif'));
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $this->validate($request,[
                'nama' => 'required|min:7|max:20',
         ]);

        $data = listify::create($request->all());
        return redirect()->route('tugas')->with('success',' Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        
        $data = listify::find($id);
        $notif = listify::where('deadline', 'LIKE', '%'.Carbon::now()->addDay()->format('Y-m-d').'%')->orWhere('deadline', 'LIKE', '%'.Carbon::now()->format('Y-m-d').'%')->get();  
        //dd($data);
        return view('tampildata', compact('data', 'notif'));
    }

    public function updatedata(Request $request, $id){
        $data = listify::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success',' Data Berhasil Di Update');
        }

        return redirect()->route('tugas')->with('success',' Data Berhasil Di Update');

    }

    public function updatecalendar(Request $request){
        $id = $request->id;
        $data = listify::find($id);
        $data->nama = $request->nama;
        $data->status = $request->status;
        $data->deadline = $request->deadline;
        $data->save();
        
        return redirect()->back()->with('success',' Data Berhasil Di Update');
    }

    public function delete($id){
        $data = listify::find($id);
        $data->delete();
        return redirect()->route('tugas')->with('success',' Data Berhasil Di Hapus');
    }

    public function deletecalendar(Request $request){
        $id = $request->id;
        $data = listify::find($id);
        $data->delete();
        return redirect()->back()->with('success',' Data Berhasil Di Hapus');
    }

    public function exportpdf(){
        $data = listify::all();

        view()->share('data', $data);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('datatugas-pdf');
        return $pdf->download('data.pdf');
    }


    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('listifyData', $namafile);

        Excel::import(new ListifyImport, \public_path('/listifyData/'.$namafile));
        return \redirect()->back();
    }

}
