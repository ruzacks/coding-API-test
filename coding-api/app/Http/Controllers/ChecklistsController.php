<?php

namespace App\Http\Controllers;

use App\Models\Checklists;
use Illuminate\Http\Request;
use Psy\VersionUpdater\Checker;

class ChecklistsController extends Controller
{
    public function index()
    {
        $checklists = Checklists::get();

        return $checklists;
    }

    public function saveChecklist(Request $request)
    {
        $checklist = new Checklists([
            'checklist_name' => $request->name, 
        ]);
       
        if( $checklist->save()){
            return 'Checlist saved Succesfully';
        } else {
            return 'Failed to save checklist';
        }
    }

    public function deleteChecklist($checklistId)
    {
        $checklist = Checklists::where('id',$checklistId)->first();

        if( $checklist->delete()){
            return 'Checlist '.$checklist->checklist_name.' deleted Succesfully';
        } else {
            return 'Failed to delete checklist';
        }

    }
}
