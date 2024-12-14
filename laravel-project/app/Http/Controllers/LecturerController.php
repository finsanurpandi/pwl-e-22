<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Http\Requests\LecturerRequest;
use App\Http\Requests\LecturerUpdateRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::withCount('students')->paginate(10);
        $lecturers->withPath('/lecturer');

        $data['lecturers'] = $lecturers;

        return view('lecturer.index', $data);
        // dd($lecturer->is_active->getLabel());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LecturerRequest $request)
    {
        // Lecturer::create($request->all());
        // $validated = $request->validate([
        //     'nidn' => 'required|numeric|digits:10',
        //     'firstname' => 'required|max:30',
        //     'lastname' => 'required|max:30',
        //     'department_id' => 'required'
        // ]);

        Lecturer::create($request->validated());

        return redirect()->route('lecturer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['lecturer'] = Lecturer::find($id);
        return view('lecturer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LecturerUpdateRequest $request, string $id)
    {
        Lecturer::where('id', $id)
            ->update($request->validated());

        return redirect()->route('lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lecturer::find($id)
            ->delete();

        return redirect()->back();
    }

    // Relationship
    public function students(string $id)
    {
        $data['students'] = Lecturer::find($id)->students()->paginate(15);
        $data['lecturer'] = Lecturer::find($id);
        
        return view('lecturer.students', $data);
        // $students = Department::find(2)->students;
        // dd($students);
    }

    // SEND MAIL
    public function sendmail(string $id)
    {
        $lecturer = Lecturer::find($id);
        $penerima = [
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
            'penerima1@gmail.com',
            'penerima2@gmail.com',
            'penerima3@gmail.com',
            'penerima4@gmail.com',
            'penerima5@gmail.com',
            'penerima6@gmail.com',
            'penerima7@gmail.com',
            'penerima8@gmail.com',
            'penerima9@gmail.com',
            'penerima10@gmail.com',
        ];
        foreach ($penerima as $pen) {
            Mail::to($pen)->queue(new TestMail($lecturer));
        }
        
        return redirect()->back();
        // return (new TestMail($lecturer))->render();
    }
}
