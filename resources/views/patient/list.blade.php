@extends('layouts.dashboard')

@section('css')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


@endsection

@section('employee-status')
    active-menu
@endsection

@section('body')
    <div class="header">
        <h1 class="page-header">
           Patient List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Manage Patients</a></li>
            <li class="active">Patient List</li>
        </ol>

    </div>


    <div id="page-inner">
        <table id="example" class="table table-striped table-bordered" style="width:100%">




                <button type="button"   data-toggle="modal" class="btn-success button-enroll-enlistment-list" data-target="#exampleModalCenter1"><i class="fas fa-plus-circle"></i></button></td>
              Add Patient




            <thead>
            <tr>
                <th><input id="select-all-enlistment" type="checkbox" onclick="checkAll(this)"></th>
                <th>Name</th>
                <th>
                    Age
                </th>
                <th>
                    Sex
                </th>
                <th>Blood Type</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->age}}</td>
                <td>{{$patient->sex}}</td>
                <td>{{$patient->medical->blood_type}}</td>
                <td>{{$patient->contact}}</td>
                <td>
                    <button type="button"   data-toggle="modal" class="btn-success button-enroll-enlistment-list" data-target="#exampleModal{{$patient->id}}"><i class="fas fa-plus-circle"></i></button>
                    <a href=""><button class="btn-primary"><i class="fas fa-pen"></i></button></a>
                    <button class="btn-danger"><i class="fas fa-trash"></i></button>
                </td>

                <div class="modal fade bd-example-modal-lg" id="exampleModal{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    {!! Form::open(['method'=>'POST','action'=>'TransactionsController@addTransaction','files'=>true]) !!}
                    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Service Transaction of  <strong>{{$patient->name}}</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">

                                <div style="display: none" class="col-lg-2">

                                    {!! Form::number('patient_id',$patient->id) !!}
                                </div>

                                <div style="margin-right: 10%" class="col-lg-2">
                                    {!! Form::label('service_id','Service:') !!}
                                    {!! Form::select('service_id',[null=>'Choose Here',$services],null,['class'=>'']) !!}
                                </div>

                                <div style="margin-right: 5%" class="col-lg-2">
                                    {!! Form::label('cost','Cost:') !!}
                                    {!! Form::number('cost',null,['class'=>'']) !!}
                                </div>

                                <div id="hidden_input" style="display: none;margin-right: 10%" class="col-lg-2">
                                    {!! Form::label('partial','Partial Payment:') !!}
                                    {!! Form::number('partial',null,['class'=>'']) !!}
                                </div>


                                <div style="margin-right: 5%"  class="col-lg-2">
                                    {!! Form::label('mode','Mode of Payment:') !!}
                                    {!! Form::select('mode',[null=>'Choose Here','full'=>'Full','installment'=>'Installment'],null,['onchange'=>'showDiv(this)'],['class'=>'']) !!}
                                </div>


                                <div class="col-lg-2">
                                    {!! Form::label('transaction_date','Date:',['class'=>'patient-name']) !!}
                                    {!! Form::date('transaction_date',null,['class'=>'']) !!}
                                </div>

                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Transaction</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td>Name</td>
                <td>
                    Age
                </td>
                <td>
                    Sex
                </td>
                <td>Blood Type</td>
                <td>Contact Number</td>
                <td>Actions</td>
            </tr>
            </tfoot>
        </table>

    </div>
    {!! Form::open(['method'=>'POST','action'=>'PatientController@addPatient','files'=>true]) !!}
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="patient-form-body">




                    <h4 style="text-align: center;font-weight: bold;margin-bottom: 20px">Patient Info</h4>
                        <div style="margin-bottom: 15px" class="row">

                            <div class="col-lg-5">
                    {!! Form::label('name','Patient Name:',['class'=>'patient-name']) !!}
                    {!! Form::text('name',null,['class'=>'']) !!}
                            </div>
                            <div class="col-lg-2">
                        {!! Form::label('dob','Date of Birth:') !!}
                        {!! Form::date('dob',null,['class'=>'']) !!}
                            </div>
                                <div style="margin-left: 2%" class="col-lg-1">
                        {!! Form::label('age','Age:') !!}
                        {!! Form::number('age',null,['class'=>'patient-age']) !!}
                            </div>

                            <div style="margin-left: 3%" class="col-lg-2">
                                {!! Form::label('sex','Sex:') !!}
                                {!! Form::select('sex',[null=>'Choose Here','Male'=>'Male','Female'=>'Female'],['class'=>'']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 15px"  class="row">
                            <div class="col-lg-4 divider">
                            {!! Form::label('religion','Religion:',['class'=>'patient-name']) !!}
                            {!! Form::text('religion',null,['class'=>'']) !!}
                            </div>



                            <div class="col-lg-4">
                                {!! Form::label('nationality','Nationality:',['class'=>'patient-name']) !!}
                                {!! Form::text('nationality',null,['class'=>'']) !!}
                            </div>

                            <div class="col-lg-4 divider">
                                {!! Form::label('contact','Contact:',['class'=>'patient-name']) !!}
                                {!! Form::text('contact',null,['class'=>'']) !!}
                            </div>

                            <div class="col-lg-4 divider">
                                {!! Form::label('email','Email:',['class'=>'patient-name']) !!}
                                {!! Form::text('email',null,['class'=>'']) !!}
                            </div>


                        </div>

                            <div style="margin-bottom: 15px"  class="row">
                            <div class="col-lg-4">
                                {!! Form::label('address','Address:',['class'=>'patient-name']) !!}
                                {!! Form::text('address',null,['class'=>'address']) !!}
                            </div>

                                <div class="col-lg-2 occupation-divider">
                                    {!! Form::label('occupation','Occupation:',['class'=>'occupation']) !!}
                                    {!! Form::text('occupation',null,['class'=>'']) !!}
                                </div>

                            </div>
                        <div style="margin-bottom: 15px"  class="row">


                            <div class="col-lg-2 divider2">
                                {!! Form::label('dental_insurance','Dental Insurance:',['class'=>'patient-name']) !!}
                                {!! Form::text('dental_insurance',null,['class'=>'']) !!}
                            </div>

                            <div class="col-lg-2">
                                {!! Form::label('effective_date','Effective Date:',['class'=>'patient-name']) !!}
                                {!! Form::date('effective_date',null,['class'=>'']) !!}
                            </div>
                        </div>


<strong style="font-weight: bold">For Minors</strong>
                        <div style="margin-bottom: 15px"  class="row ">

                            <div class="col-lg-4 divider3">
                                {!! Form::label('guardian','Guardian/Parent Name:',['class'=>'patient-name']) !!}
                                {!! Form::text('guardian',null,['class'=>'']) !!}
                            </div>

                            <div class="col-lg-2">
                                {!! Form::label('gOccupation','Occupation',['class'=>'patient-name']) !!}
                                {!! Form::text('gOccupation',null,['class'=>'']) !!}
                            </div>



                        </div>

                        <strong style="font-weight: bold">Referral</strong>
                        <div style="margin-bottom: 15px"  class="row">
                            <div class="col-lg-4  divider3">
                                {!! Form::label('referralName','Referral Name:',['class'=>'patient-name']) !!}
                                {!! Form::text('referralName',null,['class'=>'']) !!}
                            </div>


                            <div class="col-lg-3">
                                {!! Form::label('reason','Dental Reason:',['class'=>'patient-name']) !!}
                                {!! Form::text('reason',null,['class'=>'']) !!}
                            </div>


                        </div>

                        <strong style="font-weight: bold">Dental History</strong>
                        <div style="margin-bottom: 15px"  class="row">
                            <div class="col-lg-4  divider3">
                                {!! Form::label('previous_doctor','Previous: Doctor',['class'=>'patient-name']) !!}
                                {!! Form::text('previous_doctor',null,['class'=>'']) !!}
                            </div>


                            <div class="col-lg-2">
                                {!! Form::label('last_visit','Last Visit:',['class'=>'patient-name']) !!}
                                {!! Form::date('last_visit',null,['class'=>'']) !!}
                            </div>


                        </div>
                        <strong style="font-weight: bold">Medical History</strong>


                            <div style="margin-bottom: 15px"  class="row">


                            <div class="col-lg-4  divider3">
                                {!! Form::label('physician','Physician:',['class'=>'patient-name']) !!}
                                {!! Form::text('physician',null,['class'=>'']) !!}
                            </div>

                            <div class="col-lg-2">
                                {!! Form::label('pSpecialty','Speciality:',['class'=>'patient-name']) !!}
                                {!! Form::text('pSpecialty',null,['class'=>'']) !!}
                            </div>
                            </div>

                            <div style="margin-bottom: 15px"  class="row">
                            <div class="col-lg-4  divider3">
                                {!! Form::label('office_address','Office Address:',['class'=>'patient-name']) !!}
                                {!! Form::text('office_address',null,['class'=>'']) !!}
                            </div>


                            <div class="col-lg-2">
                                {!! Form::label('office_number','Office Number:',['class'=>'patient-name']) !!}
                                {!! Form::text('office_number',null,['class'=>'']) !!}
                            </div>
                            </div>




                            <div style="margin-bottom: 5px"  class="row">
                            <div class="col-lg-2">
                            {!! Form::label('good_health','GoodHealth:',['class'=>'patient-checkbox-label']) !!}
                            {!! Form::checkbox('good_health','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                            </div>

                            <div style="margin-bottom: 5px" class="row">
                            <div class="col-lg-3">
                                {!! Form::label('under_treatment','Under Treatment:',['class'=>'patient-checkbox-label']) !!}

                                {!! Form::checkbox('under_treatment','1',null,false,['class'=>'patient-checkbox']) !!}

                            </div>
                            </div>

                            <div style="margin-bottom: 5px" class="row">
                            <div class="col-lg-9">

                                {!! Form::label('current_treatment','Current Treatment:',['class'=>'form-check-label']) !!}

                                {!! Form::text('current_treatment',null,['class'=>'']) !!}

                            </div>
                            </div>


                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-3">
                                    {!! Form::label('serious_illness','Serious Illness/Surgery:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('serious_illness','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>
                            </div>

                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-9">
                                    {!! Form::label('serious_illness_cause','Serious Illness/Surgery:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::text('serious_illness_cause',null,['class'=>'']) !!}
                                </div>
                            </div>


                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-2">
                                    {!! Form::label('hospitalized','Hospitalized:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('hospitalized','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>
                            </div>


                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-9">
                                    {!! Form::label('hospitalized_cause','Hospitalized Cause:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::text('hospitalized_cause',null,['class'=>'']) !!}
                                </div>
                            </div>

                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-3">
                                    {!! Form::label('prescription','Taking Prescriptions:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('prescription','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>
                            </div>


                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-9">
                                    {!! Form::label('prescription_name','Prescription Name:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::text('prescription_name',null,['class'=>'']) !!}
                                </div>
                            </div>

                            <div style="margin-bottom: 5px" class="row">
                                <div class="col-lg-3">
                                    {!! Form::label('tobacco','Taking Tobacco?:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('tobacco','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>

                                <div style="margin-bottom: 5px" class="row">
                                    <div class="col-lg-3">
                                        {!! Form::label('bisyo','Drugs,Alcohol:',['class'=>'patient-checkbox-label']) !!}
                                        {!! Form::checkbox('bisyo','1',null,false,['class'=>'patient-checkbox']) !!}
                                    </div>
                                </div>

                            </div>

Alergic to Any?
                            <div style="margin-bottom: 5px" class="row">
                                <div style="margin-bottom: 5px" class="col-lg-3">
                                    {!! Form::label('local_anesthetic','Local Anesthetic:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('local_anesthetic','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>

                                <div style="margin-bottom: 5px"  class="col-lg-2">
                                    {!! Form::label('sulfa_drugs','Sulfa Drugs:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('sulfa_drugs','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>

                                <div style="margin-bottom: 5px"  class="col-lg-2">
                                    {!! Form::label('aspirin','Aspirin:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('aspirin','1',false,['class'=>'patient-checkbox']) !!}
                                </div>

                            </div>


                            <div style="margin-bottom: 5px"  class="row">
                                <div style="margin-bottom: 5px"  class="col-lg-3">
                                    {!! Form::label('penicilin','Penicilin:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('penicilin','1',null,false,['class'=>'patient-checkbox']) !!}
                                </div>

                                <div style="margin-bottom: 5px"  class="col-lg-2">
                                    {!! Form::label('latex','Latex:',['class'=>'patient-checkbox-label']) !!}
                                    {!! Form::checkbox('latex','1',null,false,['class'=>'']) !!}
                                </div>

                                <div  style="margin-bottom: 5px" class="col-lg-6">
                                    {!! Form::label('others','Others:',['class'=>'form-check-label']) !!}
                                    {!! Form::text('others',null,['class'=>'']) !!}
                                </div>

                            </div>

                        <div style="margin-bottom: 5px"  class="row">

                            <div  style="margin-bottom: 5px" class="col-lg-6">
                                {!! Form::label('bleeding_time','Bleeding time:',['class'=>'form-check-label']) !!}
                                {!! Form::date('bleeding_time',null,['class'=>'']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 5px"  class="row">

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('pregnant','Pregnant:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('pregnant','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                        </div>

                        <div style="margin-bottom: 5px"  class="row">

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('nursing','Nursing:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('nursing','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                        </div>

                        <div style="margin-bottom: 5px"  class="row">

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('birth_control','Birth Control:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('birth_control','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                        </div>

                        <div style="margin-bottom: 5px"  class="row">
                            <div  style="margin-bottom: 5px" class="col-lg-5">
                                {!! Form::label('blood_type','Blood Type:',['class'=>'form-check-label']) !!}
                                {!! Form::text('blood_type',null,['class'=>'']) !!}
                            </div>

                            <div  style="margin-bottom: 5px" class="col-lg-5">
                                {!! Form::label('blood_pressure','Blood Pressure:',['class'=>'form-check-label']) !!}
                                {!! Form::text('blood_pressure',null,['class'=>'']) !!}
                            </div>

                        </div>
            Patient have any of the following
                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('high_blood','High Blood:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('high_blood','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('low_blood','Low Blood:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('low_blood','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('epilepsy','Epilepsy:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('epilepsy','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('aids','Aids:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('aids','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('std','STD:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('std','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('ulcers','Ulcers:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('ulcers','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('fainting','Fainting:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('fainting','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('rapid_weight_loss','Rapid Weight Loss:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('rapid_weight_loss','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('radiation_therapy','Radiation Therapy:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('radiation_therapy','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('joint_replacement','Joint Replacement:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('joint_replacement','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('heart_surgery','Heart Surgery:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('heart_surgery','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('heart_attack','Heart Attack:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('heart_attack','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>


                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('thyroid_problem','Thyroid Problems:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('thyroid_problem','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('heart_disease','Heart Disease:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('heart_disease','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('heart_murmur','Heart Murmur:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('heart_murmur','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('hepa','Hepatitis:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('hepa','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('rheumatic_fever','Rheumatic Fever:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('rheumatic_fever','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('hay_fever','Hay Fever:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('hay_fever','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('respiratory_problems','Respiratory Problems:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('respiratory_problems','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('jaundice','Jaundice:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('jaundice','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('tb','Tubercolosis:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('tb','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('swollen_ankles','Swollen Ankles:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('swollen_ankles','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('kidney_disease','Kidney Disease:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('kidney_disease','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('diabetes','Diabetes:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('diabetes','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('chest_pain','Chest Pain:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('chest_pain','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('stroke','Stroke:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('stroke','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('cancer','Cancer:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('cancer','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('anemia','Anemia:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('anemia','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('angina','Angina:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('angina','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('asthma','Asthma:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('asthma','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('emphysema','Emphysema:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('emphysema','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('bleeding_problems','Bleeding Problems:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('bleeding_problems','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('blood_diseases','Blood Diseases:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('blood_diseases','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>
                        </div>

                        <div style="margin-bottom: 10px"  class="row">
                            <div style="margin-bottom: 5px"  class="col-lg-3">
                                {!! Form::label('head_injuries','Head Injuries:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('head_injuries','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('arthritis','Arthritis:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::checkbox('arthritis','1',null,false,['class'=>'patient-checkbox']) !!}
                            </div>

                            <div style="margin-bottom: 5px"  class="col-lg-2">
                                {!! Form::label('other_disease','Other:',['class'=>'patient-checkbox-label']) !!}
                                {!! Form::text('other_disease',null,['class'=>'']) !!}
                            </div>
                        </div>


                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="action" value="delete">Submit</button>
                </div>
            </div>
        </div>

    </div>

    {!! Form::close() !!}


@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Blfrtip',

                lengthChange: true,
                orderable:true,


                buttons: [
                    'print'
                ],
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],
                "ordering": false,



            } );
        } );


        $(document).ready(function () {
            let table = $('#example').DataTable({
                dom: 'Blfrtip',
                bFilter: true,
                bDestroy: true,
                bRetrieve: true,
                'processing':true,
                'serverSide': true,
                {{--'ajax': "{{route('admin.listEmployee')}}",--}}
                'columns':[
                    {'data': 'departments'},

                ],
            });


            $('.filter-select').change(function () {
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });

        });


    </script>

    <script>
        function showDiv(select){
            if(select.value== "installment"){
                document.getElementById('hidden_input').style.display = "block";
            } else{
                document.getElementById('hidden_input').style.display = "none";
            }
        }
    </script>

@endsection