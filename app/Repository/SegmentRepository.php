<?php 

namespace App\Repository;

use App\Models\Segment;
use App\Repository\ISegmentRepository;
// use Illuminate\Support\Facades\Hash;
use App\Http\Resources\SegmentResource;
use App\Traits\ImageTrait;

class SegmentRepository implements ISegmentRepository
{   
    use ImageTrait;
    
    protected $segment = null;

    public function getAllSegments()
    {
        $segments = Segment::paginate(config('global.pagination_records'));
        $segmentsResources = SegmentResource::collection($segments);
        return $segmentsResources;
        // return response([ 'projects' => ProjectResource::collection($projects), 'message' => 'Retrieved successfully'], 200);
    }

    public function getSegmentById($id)
    {
        return Segment::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        // echo "<PRE>";
        // print_r($collection);
        // die;

        if(is_null($id)) {

            $segment = new Segment;
            $segment->name              = $collection['name'];
            $segment->email             = $collection['email'];
            $segment->phone             = $collection['phone'];
            $segment->address           = $collection['address'];
            $segment->organization_id   = $collection['hiddenOrganizationId']?:'0';
            $segment->visiblity         = $collection['visiblity'];
            $segment->created_by        = auth()->id();
            $segment->image             = '';
            $segment->directory         = '';
            // $segment->owner_id = $collection['owner_id'];
            // $segment->subowner_id = $collection['subowner_id'];
            
            $field = 'image';
            if( ( $collection ) && (!empty($collection['image'])) ) {
                $segment->directory     = 'Person';
                $segment->image         = $this->verifyAndUpload( $collection, $field, $segment->directory);
                if( $segment->image == 'error') {
                    // return redirect()->route('segment.create')->with('error','error');
                }
            }
            
            return $segment->save();
        }
        
        $segment                    = Segment::find($id);
        $segment->name              = $collection['name'];
        $segment->email             = $collection['email'];
        $segment->phone             = $collection['phone'];
        $segment->address           = $collection['address'];
        $segment->organization_id   = $collection['hiddenOrganizationId']?:'0';
        $segment->visiblity         = $collection['visiblity'];
        $segment->updated_by        = auth()->id();

        $field = 'image';
        if( ( $collection ) && (!empty($collection['image'])) ) {
            $segment->directory     = 'Person';
            $segment->image         = $this->verifyAndUpload( $collection, $field, $segment->directory);
            if( $segment->image == 'error') {
                // return redirect()->route('segment.create')->with('error','error');
            }
            else {
                if(!empty($collection['hiddenImageName'])) {
                    unlink(storage_path('app/'.$segment->directory.'/'.$collection['hiddenImageName']));
                }
            }
        }

        return $segment->save();
    }
    
    public function deleteSegment($id)
    {
        return Segment::find($id)->delete();
    }
}