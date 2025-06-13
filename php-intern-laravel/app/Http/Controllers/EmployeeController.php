<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $url = null;

        if ($request->hasFile('photo')) {
            try {
                $uploadedFile = $request->file('photo');
                $path = $uploadedFile->store('photos', 'public'); // simpan ke storage/app/public/photos
                $url = Storage::url($path); // hasil: /storage/photos/namafile.jpg
            } catch (\Exception $e) {
                return back()->with('error', 'Upload file gagal: ' . $e->getMessage());
            }
        }

        Employee::create([
            'nomor' => $request->nomor,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'talahir' => $request->talahir,
            'photo_upload_path' => $url,
            'created_on' => now(),
            'created_by' => 'system',
        ]);

        return redirect()->route('employees.index')->with('success', 'Berhasil disimpan.');
    }

    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(StoreEmployeeRequest $request, $id)
    {
        dd('update masuk');

        $employee = Employee::findOrFail($id);

        $url = $employee->photo_upload_path;

        if ($request->hasFile('photo')) {
            try {
                $uploadedFile = $request->file('photo');
                $path = $uploadedFile->store('photos', 'public');
                $url = Storage::url($path);
            } catch (\Exception $e) {
                return back()->with('error', 'Upload file gagal: ' . $e->getMessage());
            }
        }

        $employee->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'talahir' => $request->talahir,
            'photo_upload_path' => $url,
            'updated_on' => now(),
            'updated_by' => 'system',
        ]);

        return redirect()->route('employees.index')->with('success', 'Berhasil diperbarui.');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data berhasil dihapus.');
    }
}
