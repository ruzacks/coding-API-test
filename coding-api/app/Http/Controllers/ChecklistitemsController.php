<?php

namespace App\Http\Controllers;

use App\Models\Checklistitems;
use App\Models\Checklists;
use Illuminate\Http\Request;

class ChecklistitemsController extends Controller
{
    public function index($checklistId)
    {
        $checklistItems = Checklistitems::where('checklist_id',$checklistId)->get();

        return $checklistItems;

    }

    public function saveItem($checklistId, Request $request)
    {
        $save = new Checklistitems([
            'checklist_id' => $checklistId,
            'item_name' => $request->itemName,
        ]);

        if( $save->save()){
            return 'Checlist Item saved Succesfully';
        } else {
            return 'Failed to save checklist Item';
        }
    }

    public function getItem($checklistId, $checklistItemId)
    {
        $checklistItems = Checklistitems::where('checklist_id',$checklistId)->where('id',$checklistItemId)->first();

        return $checklistItems;
    }

    public function updateStatus($checklistId, $checklistItemId)
    {
        $update = Checklistitems::where('checklist_id',$checklistId)->where('id',$checklistItemId)->first();
        if($update->status == 'active'){
            $update->status = 'pasive';
        } else {
            $update->status = 'active';
        }

        if( $update->save()){
            return 'Checlist Item status updated Succesfully';
        } else {
            return 'Failed to update checklist Item status';
        }
    }

    public function deleteItem($checklistId, $checklistItemId)
    {
        $delete = Checklistitems::where('checklist_id',$checklistId)->where('id',$checklistItemId)->first();
        if( $delete->delete()){
            return 'Checlist item'.$delete->item_name.' deleted Succesfully';
        } else {
            return 'Failed to delete checklist';
        }
    }

    public function renameItem($checklistId, $checklistItemId, Request $request)
    {
        $update = Checklistitems::where('checklist_id',$checklistId)->where('id',$checklistItemId)->first();
        $update->item_name = $request->itemName;

        if( $update->save()){
            return 'Checlist Item updated Succesfully';
        } else {
            return 'Failed to update checklist Item';
        }
    }
}
