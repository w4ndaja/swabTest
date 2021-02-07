<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('doctor')->whereDate('created_at', now()->format('Y-m-d'))->paginate(10);
        return view('pages.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $lastPatient = Patient::latest()->first();
        $newPatientNo = ($lastPatient ? $lastPatient->id : 0) + 1;
        $queueNo = Patient::whereDate('created_at', now()->format('Y-m-d'))->count() + 1;
        return view('pages.patient.create', compact('doctors', 'newPatientNo', 'queueNo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'identity' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'job' => 'required|string',
            'address' => 'required|string',
            'doctor_id' => 'required|string',
        ]);
        $patient = Patient::create(request()->only(
            'name',
            'identity',
            'birth_place',
            'birth_date',
            'gender',
            'job',
            'address',
            'doctor_id',
            'queue_no',
        ));
        return redirect(route('patient.create-barcode', $patient->id));
    }

    public function createBarcode(Patient $patient)
    {
        return view('pages.patient.create-barcode', compact('patient'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $doctors = Doctor::all();
        return view('pages.patient.edit', compact('patient', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'result'=>'required|string',
            'interpretation'=>'required|string',
        ]);
        $patient->update([
            'result' => $request->result,
            'interpretation' => $request->interpretation,
            'received' => $request->received,
        ]);
        return back()->with('success', 'Pasien Berhasil diperbaharui');
    }

    public function printResult(Patient $patient)
    {
        $interpretations = \Str::of($patient->interpretation)->split('/[\n\r]+/');
        $romanceMonth = $this->numberToRomanRepresentation(now()->format('n'));
        return view('pages.patient.result', compact('patient', 'interpretations', 'romanceMonth'));
    }

    public function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function search()
    {
        $patients = Patient::whereIdentity(request('identity'))->paginate(10);
        return view('pages.patient.search', compact('patients'));
    }
}
