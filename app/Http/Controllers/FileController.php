<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('act2.fileIndex')->with([
            'files'=> $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(File $file)
    {
        return view('act2.addFile')->with([
            'file'=> $file,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $file)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
       # $file = $validate['file'];
        $extension = $request->file('file')->getClientOriginalExtension();
        $fname = $request->file('file')->getClientOriginalName();
        $name = pathinfo($fname, PATHINFO_FILENAME);
        $imagePath = $request->file('file')->store('uploads', 'public');

        #$file = new File;
        $file->name = $name;
        $file->type = $extension;
        $file->path = $imagePath;
        $file->save();
        
        if( $file->save()){
            return redirect('file')->with('success', 'File has been uploaded successfully');
        }
        else{
            return redirect()->route('file.create')->with('error', 'Error in uploading the File');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('act2.show')->with([
            'file' => $file,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('act2.edit')->with([
            'file' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|max:2048',
        ]);
        $extension = $request->file('file')->getClientOriginalExtension();
        $name = $request->name;
        $imagePath = $request->file('file')->store('uploads', 'public');
        
        $file->name = $name;
        $file->type = $extension;
        $file->path = $imagePath;
       
        if( $file->save()){
            return redirect('file')->with('success', 'File has been updated successfully');
        }
        else{
            return redirect()->route('file.edit')->with('error', 'Error updating the File');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if( $file->delete()){
            return redirect('file')->with('success', 'File has been deleted successfully');
        }
        else{
            return redirect()->route('file')->with('error', 'Error in deleting the File');
        }
    }
}
