<?php

namespace App\Http\Controllers;

use App\Models\ServiceRoom;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRoomRequest;

class ServiceRoomController extends Controller
{
    public function index()
    {
        $service_rooms = ServiceRoom::all();
        return view('service-room.index', compact('service_rooms'));
    }

    public function store(ServiceRoomRequest $request)
    {
        $restored = ServiceRoom::restoreIfExists('name', $request->name);

        if ($restored) {
            return redirect()
                ->route('service-room.index')
                ->with('success', 'Ruang pelayanan berhasil dipulihkan.');
        }

        ServiceRoom::create($request->validated());

        return redirect()
            ->route('service-room.index')
            ->with('success', 'Ruang pelayanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);

        $serviceRoom = ServiceRoom::findOrFail($id);

        $exists = ServiceRoom::whereInsensitive('name', $data['name'])
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Ruang pelayanan sudah ada.');
        }

        $serviceRoom->update(['name' => $data['name']]);

        return redirect()->route('service-room.index')->with('success', 'Ruang pelayanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $serviceRoom = ServiceRoom::findOrFail($id);
        $serviceRoom->delete();

        return redirect()->route('service-room.index')->with('success', 'Ruang pelayanan berhasil dihapus.');
    }
}
