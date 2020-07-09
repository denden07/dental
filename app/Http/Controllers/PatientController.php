<?php

namespace App\Http\Controllers;

use App\Medical;
use App\Patient;
use App\Service;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function list ()
    {
        $patients = Patient::all();
        $services = Service::all()->sortBy('name')->pluck('name','id');


        return view('patient.list',compact('patients','services'));
    }


    public function addPatient(Request $request)
    {

        $patient = new Patient();

        $patient->name = $request->name;
        $patient->dob = $request->dob;
        $patient->age = $request->age;
        $patient->sex = $request->sex;
        $patient->contact = $request->contact;
        $patient->email = $request->email;
        $patient->religion = $request->religion;
        $patient->nationality = $request->nationality;
        $patient->address = $request->address;
        $patient->occupation = $request->occupation;
        $patient->dental_insurance = $request->dental_insurance;
        $patient->effective_date = $request->effective_date;
        $patient->guardian = $request->guardian;
        $patient->gOccupation = $request->gOccupation;

        $patient ->save();

        $medical = new Medical();

        $medical->patient_id = $patient->id;
        $medical->referralName = $request->referralName;
        $medical->reason = $request->reason;
        $medical->previous_doctor = $request->previous_doctor;
        $medical->last_visit = $request->last_visit;
        $medical->physician = $request->physician;
        $medical->pSpecialty = $request->pSpecialty;
        $medical->office_address = $request->office_address;
        $medical->office_number = $request->office_number;
        $medical->good_health = $request->good_health;
        $medical->under_treatment = $request->under_treatment;
        $medical->current_treatment = $request->current_treatment;
        $medical->serious_illness = $request->serious_illness;
        $medical->serious_illness_cause = $request->serious_illness_cause;
        $medical->hospitalized = $request->hospitalized;
        $medical->hospitalized_cause = $request->hospitalized_cause;
        $medical->prescription = $request->prescription;
        $medical->prescription_name = $request->prescription_name;
        $medical->tobacco = $request->tobacco;
        $medical->bisyo = $request->bisyo;
        $medical->local_anesthetic = $request->local_anesthetic;
        $medical->sulfa_drugs = $request->sulfa_drugs;
        $medical->aspirin = $request->aspirin;
        $medical->penicilin = $request->penicilin;
        $medical->latex = $request->latex;
        $medical->others = $request->others;
        $medical->bleeding_time = $request->bleeding_time;
        $medical->pregnant = $request->pregnant;
        $medical->nursing = $request->nursing;
        $medical->birth_control = $request->birth_control;
        $medical->blood_type = $request->blood_type;
        $medical->blood_pressure = $request->blood_pressure;
        $medical->high_blood = $request->high_blood;
        $medical->low_blood = $request->low_blood;
        $medical->epilepsy = $request->epilepsy;
        $medical->aids = $request->aids;
        $medical->std = $request->std;
        $medical->ulcers = $request->ulcers;
        $medical->fainting = $request->fainting;
        $medical->rapid_weight_loss = $request->rapid_weight_loss;
        $medical->radiation_therapy = $request->radiation_therapy;
        $medical->joint_replacement = $request->joint_replacement;
        $medical->heart_surgery = $request->heart_surgery;
        $medical->heart_attack = $request->heart_attack;
        $medical->thyroid_problem = $request->thyroid_problem;
        $medical->heart_disease = $request->heart_disease;
        $medical->heart_murmur = $request->heart_murmur;
        $medical->hepa = $request->hepa;
        $medical->rheumatic_fever = $request->rheumatic_fever;
        $medical->hay_fever = $request->hay_fever;
        $medical->respiratory_problems = $request->respiratory_problems;
        $medical->jaundice = $request->jaundice;
        $medical->tb = $request->tb;
        $medical->swollen_ankles = $request->swollen_ankles;
        $medical->kidney_disease = $request->kidney_disease;
        $medical->diabetes = $request->diabetes;
        $medical->chest_pain = $request->chest_pain;
        $medical->stroke = $request->stroke;
        $medical->cancer = $request->cancer;
        $medical->anemia = $request->anemia;
        $medical->angina = $request->angina;
        $medical->asthma = $request->asthma;
        $medical->emphysema = $request->emphysema;
        $medical->bleeding_problems = $request->bleeding_problems;
        $medical->blood_diseases = $request->blood_diseases;
        $medical->head_injuries = $request->head_injuries;
        $medical->arthritis = $request->arthritis;
        $medical->other_disease = $request->other_disease;
        $medical->save();


        return redirect()->back();
    }

















    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
