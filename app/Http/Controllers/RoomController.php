<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\occupant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function allRoom() {
        $allRoom = Room::all();
        return view('rooms.allRoom', compact('allRoom'));
    }

    public function addRoom() {
        $occupants =Occupant::all();
        return view('rooms.addRoom', compact('occupants'));
    }

    public function saveRoom(Request $request) {
        $request->validate([
            'room_id' => 'required|string|max:255',
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'floor' => 'required|integer|between:0,255',
            'ac' => 'required|string|max:255',
            'shelf' => 'required|string|max:255',
            'bed' => 'required|string|max:255',
            'bathroom' => 'required|string|max:255',
            'capacity' => 'required|integer|between:0,255',
            'rent_charge' => 'required|string|max:255',
            'occupant' => 'nullable|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $room = new Room();
            $room->room_id = $request->room_id;
            $room->room_number = $request->room_number;
            $room->room_type = $request->room_type;
            $room->floor = $request->floor;
            $room->ac = $request->ac;
            $room->shelf = $request->shelf;
            $room->bed = $request->bed;
            $room->bathroom = $request->bathroom;
            $room->capacity = $request->capacity;
            $room->rent_charge = $request->rent_charge;
            $room->occupant = $request->occupant;

            $room->save();

            DB::commit();
            return redirect()->route('form/allRoom/page')->with('success', 'Room added successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to save room: ' . $e->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to save room. Please try again.');
        }
    }

    public function updateRoom($room_id)
    {
        $roomEdit = Room::find($room_id);
        $occupants =Occupant::all();
        if (!$roomEdit) {
            return redirect()->route('form/allRoom/page')->with('error', 'Room not found');
        }
        return view('rooms.editRoom', compact('roomEdit', 'occupants'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'room_type' => $request->room_type,
                'floor' => $request->floor,
                'ac' => $request->ac,
                'shelf' => $request->shelf,
                'bed' => $request->bed,
                'bathroom' => $request->bathroom,
                'capacity' => $request->capacity,
                'rent_charge' => $request->rent_charge,
                'occupant' => $request->occupant,
            ];

            Room::where('room_id', $request->room_id)->update($update);

            DB::commit();
            Log::info('Succeed updated Room with ID: ' . $request->room_id);
            return redirect()->route('form/allRoom/page');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to update room: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $roomId = $request->id;
            $room = Room::findOrFail($roomId);

            $room->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Room deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to delete room: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete room.');
        }
    }
}
