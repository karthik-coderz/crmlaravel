<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use App\Http\Controllers\Controller;
use App\Repository\ISegmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SegmentController extends Controller
{
    public function __construct(ISegmentRepository $segment)
    {
        $this->segment = $segment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function showSegments()
    {
        // $segments = $this->segment->getAllSegments();
        // return View::make('admin.segment.segment', compact('segments'));
        return 'hi';
        // return response()->json($segments, '200');
    }
    
    /**
     * Show the form for creating or updating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createSegment()
    {
        return View::make('admin.segment.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */

    public function getSegment($id)
    {
        $segment = $this->segment->getSegmentById($id);
        return View::make('admin.segment.form', compact('segment'));
    }
    
    /**
     * Add or Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */

    public function saveSegment(Request $request, $id = null)
    {   
        $collection = $request->except(['_token','_method']);
        
        if( ! is_null( $id ) ) 
        {
            $this->segment->createOrUpdate($id, $collection);
            $message =  __('app.segments.person.update-success');
        }
        else
        {
            $data = $this->segment->createOrUpdate($id = null, $collection);
            $message =  __('app.segments.person.create-success');
        }
// die;
        return redirect()->route('segment.list')->with('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */

    public function deleteSegment($id)
    {
        $this->segment->deleteSegment($id);
        return redirect()->route('segment.list');
    }
    
}
