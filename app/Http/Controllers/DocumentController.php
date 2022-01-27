<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Policies\DocumentPolicy;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
//        $this->authorizeResource(DocumentPolicy::class);
    }

    public function index()
    {
        $documents = Document::where('user_id',auth()->id())->get();
        return view('document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('document.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'document_name' => 'required',
           'document_file' => 'required'
       ]);
       
       $path = $request->file('document_file')->store('documents/'.auth()->id());

       try{
       $record = Document::create([
            'user_id' => auth()->id(),
            'name' => $request->document_name,
            'file' => $path
       ]);

       return redirect()->route('documents.index')->with('message','Document Saved Successfully!');
       }
       catch(Exception $e){
       return redirect()->route('documents.index')->with('error','Document saving error '.$e.message());    
       }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $this->authorize('view',$document);
        return view('document.show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $this->authorize('delete',$document);
        $document->delete();

        return redirect()->route('documents.index')->with('message','Dcoment Deleted Successfully!');
    }
}
