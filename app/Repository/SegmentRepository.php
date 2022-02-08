<?php 

namespace App\Repository;

use App\Models\Segment;
use App\Repository\ISegmentRepository;
use App\Http\Resources\SegmentResource;
use App\Traits\ImageTrait;

class SegmentRepository implements ISegmentRepository
{   
    use ImageTrait;
    
    protected $segment = null;

    public function getAllSegments()
    {
        $segments = Segment::orderBy('id','DESC')->paginate(config('global.pagination_records'));
        $segmentsResources = SegmentResource::collection($segments);
        return $segmentsResources;
    }

    public function getSegmentById($id)
    {
        return Segment::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {

            $segment = new Segment;
            $segment->name              = $collection['name'];
            $segment->description       = $collection['description'];
            $segment->created_by        = auth()->id();
            
            $result = $segment->save();
            if ($result) {
                $segment->contacts()->attach($collection['contact_id']);
            }

            return $result;
        }
        
        $segment                    = Segment::find($id);
        $segment->name              = $collection['name'];
        $segment->description       = $collection['description'];
        $segment->updated_by        = auth()->id();

        return $segment->save();
    }
    
    public function deleteSegment($id)
    {
        return Segment::find($id)->delete();
    }
}