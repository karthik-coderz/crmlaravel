<?php 

namespace App\Repository;

use App\Models\Contact;
use App\Repository\IContactRepository;
// use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ContactResource;
use App\Traits\ImageTrait;

class ContactRepository implements IContactRepository
{   
    use ImageTrait;
    
    protected $contact = null;

    public function getAllContacts()
    {
        $contacts = Contact::paginate(config('global.pagination_records'));
        $contactsResources = ContactResource::collection($contacts);
        return $contactsResources;
        // return response([ 'projects' => ProjectResource::collection($projects), 'message' => 'Retrieved successfully'], 200);
    }

    public function getContactById($id)
    {
        return Contact::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        // echo "<PRE>";
        // print_r($collection);
        // die;

        if(is_null($id)) {

            $contact = new Contact;
            $contact->name              = $collection['name'];
            $contact->email             = $collection['email'];
            $contact->phone             = $collection['phone'];
            $contact->address           = $collection['address'];
            $contact->organization_id   = $collection['hiddenOrganizationId']?:'0';
            $contact->visiblity         = $collection['visiblity'];
            $contact->created_by        = auth()->id();
            $contact->image             = '';
            $contact->directory         = '';
            // $contact->owner_id = $collection['owner_id'];
            // $contact->subowner_id = $collection['subowner_id'];
            
            $field = 'image';
            if( ( $collection ) && (!empty($collection['image'])) ) {
                $contact->directory     = 'Person';
                $contact->image         = $this->verifyAndUpload( $collection, $field, $contact->directory);
                if( $contact->image == 'error') {
                    // return redirect()->route('contact.create')->with('error','error');
                }
            }
            
            return $contact->save();
        }
        
        $contact                    = Contact::find($id);
        $contact->name              = $collection['name'];
        $contact->email             = $collection['email'];
        $contact->phone             = $collection['phone'];
        $contact->address           = $collection['address'];
        $contact->organization_id   = $collection['hiddenOrganizationId']?:'0';
        $contact->visiblity         = $collection['visiblity'];
        $contact->updated_by        = auth()->id();

        $field = 'image';
        if( ( $collection ) && (!empty($collection['image'])) ) {
            $contact->directory     = 'Person';
            $contact->image         = $this->verifyAndUpload( $collection, $field, $contact->directory);
            if( $contact->image == 'error') {
                // return redirect()->route('contact.create')->with('error','error');
            }
            else {
                if(!empty($collection['hiddenImageName'])) {
                    unlink(storage_path('app/'.$contact->directory.'/'.$collection['hiddenImageName']));
                }
            }
        }

        return $contact->save();
    }
    
    public function deleteContact($id)
    {
        return Contact::find($id)->delete();
    }
}