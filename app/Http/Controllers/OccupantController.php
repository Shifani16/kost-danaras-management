<?php

namespace App\Http\Controllers;

use App\Models\Occupant;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class OccupantController extends Controller
{
    public function allOccupant()
    {
        $allOccupants = DB::table('occupants')->get();
        return view('occupants.allOccupants', compact('allOccupants'));
    }

    public function saveOccupant(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'room' => 'required|string|max:255'
        ]);


        DB::beginTransaction();
        try {
            $occupant = new Occupant();
            $occupant->name = $request->name;
            $occupant->date = $request->date;
            $occupant->address = $request->address;
            $occupant->email = $request->email;
            $occupant->ph_number = $request->phone_number;
            $occupant->room = $request->room;
            $occupant->save();

            $occ_id = Occupant::where('email', $request->email)->value('occ_id');
            if (!$occ_id) {
                throw new \Exception('Failed to retrieve occ_id');
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt('defaultpassword');
            $user->occ_id = $occ_id; 
            $user->save();

            DB::commit();
            return redirect()->route('form/allOccupant/page');
        } catch (\Exception $e) {
            Log::error('Failed to update bill: ' . $e->getMessage());
            DB::rollback();
            return redirect()->back();
        }
    }

    public function addOccupant()
    {
        $rooms = Room::all();
        return view('occupants.addOccupants', compact('rooms'));
    }

    public function updateOccupant($occ_id)
    {
        $occupantEdit = Occupant::find($occ_id);
        $rooms = Room::all();
        if (!$occupantEdit) {
            return redirect()->route('form/allOccupant/page')->with('error', 'Occupant not found');
        }
        return view('occupants.editOccupants', compact('occupantEdit', 'rooms'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'name' => $request->name,
                'date' => $request->date,
                'address' => $request->address,
                'email' => $request->email,
                'ph_number' => $request->phone_number,
                'room' => $request->room
            ];
            Occupant::where('occ_id', $request->occupant_id)->update($update);

            DB::commit();
            return redirect()->route('form/allOccupant/page');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }

    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $occupantId = $request->id;
            $occupant = Occupant::findOrFail($occupantId);

            User::where('email', $occupant->email)->delete();
            $occupant->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Occupant deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to delete occupant.');
        }
    }

    public function showForm()
    {
        $occupants = Occupant::all();
        return view('payments.addBill', compact('occupants'));
    }
}
