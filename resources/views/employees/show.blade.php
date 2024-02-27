@extends('adminlte::page')

@section('title', 'Employee data')

@section('content_header')
    <h4>Employee</h4>
@stop

@section('content')
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i>
            <a class="btn btn-success text-right" href="{{ url('employees') }}"> Back</a>
        </h3>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <img src="" alt="Passprt">
                                </th>
                                <th colspan="3" class="text-center">
                                    <h1>NASARAWA STATE CIVIL SERVICE COMMISSION</h1>
                                    <br>
                                    <h4>STAFF BIO-DATA</h4>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><strong>{{ __('Staff ID') }}:</strong></td>
                                <td>{{$employee->staff_id}}</td>

                                <td><strong>{{ __('First Name') }}:</strong></td>
                                <td>{{ $employee->first_name}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('Last Name') }}:</strong></td>
                                <td>{{ $employee->last_name}}</td>

                                <td><strong>{{ __('File Number') }}:</strong></td>
                                <td>{{ $employee->file_number}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('Date of Birth') }}:</strong></td>
                                <td>{{ $employee->dob}}</td>

                                <td><strong>{{ __('Gender') }}:</strong></td>
                                <td>{{ $employee->gender}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('Employee status') }}:</strong></td>
                                <td>{{ $employee->status}}</td>

                                <td><strong>{{ __('Status last change') }}:</strong></td>
                                <td>{{ $employee->status_changed_date}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('State') }}:</strong></td>
                                <td>{{ $employee->state}}</td>

                                <td><strong>{{ __('Local Government Area') }}:</strong></td>
                                <td>{{ $employee->lga}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('MDA') }}:</strong></td>
                                <td>
                                    @if ($employee->name)
                                        {{ $employee->name }} ( {{ $employee->mda_alias }} )
                                    @else
                                        <p>Not available</p>
                                    @endif
                                </td>

                                <td><strong>{{ __('Highest Qualification') }}:</strong></td>
                                <td>{{ $employee->highest_qualification}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('Date of First Appointment') }}:</strong></td>
                                <td>{{ $employee->first_appointment_date}}</td>

                                <td><strong>{{ __('Current Rank') }}:</strong></td>
                                <td>{{ $employee->current_rank}}</td>
                            </tr>

                            <tr>
                                <td><strong>{{ __('Date of Last Promotion') }}:</strong></td>
                                <td>{{ $employee->last_promotion_date}}</td>

                                <td></td>
                                <td>
                                    <!--small>
                                        {{--TO-DO: fetch names of staff--}}
                                        Created by:  {{ $employee->added_by}} on {{ $employee->created_at}}
                                        <br>
                                        Last update by:  {{ $employee->last_update_by}} on {{ $employee->updated_at}}
                                    </small-->
                                </td>
                            </tr>

                            {{--TRANSFER--}}
                            <tr>
                                <td colspan="4">
                                    <h3 class="text-center">TRANSFER HISTORY</h3>
                                </td>

                            @foreach($transfers as $transfer)
                                <tr style="border-top: 2px solid #000;border-left: 2px solid #000;">
                                    <td><strong>Application date</strong></td>
                                    <td>{{$transfer->application_date}}</td>

                                    <td><strong>Transfer date</strong></td>
                                    <td>{{$transfer->transfer_date}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Employee MDA</strong></td>
                                    <td>{{$transfer->from_MDA}}</td>

                                    <td><strong>Transfer MDA</strong></td>
                                    <td>{{$transfer->to_MDA}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Appointment</strong></td>
                                    <td>{{$transfer->present_appointment}}</td>

                                    <td><strong>Status</strong></td>
                                    <td>{{$transfer->status}}</td>
                                </tr>
                                @endforeach
                            </tr>

                                {{--Promotion--}}
                                <tr>
                                    <td colspan="4">
                                        <h3 class="text-center">PROMOTION HISTORY</h3>
                                    </td>
                                </tr>

                                @foreach($promotions as $promotion)
                                    <tr style="border-top: 2px solid #000;border-left: 2px solid #000;">
                                        <td><strong>Promotion Date</strong></td>
                                        <td>{{ $promotion->promotion_date }}</td>

                                        <td><strong>Previous Rank</strong></td>
                                        <td>{{ $promotion->previous_rank }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>New Rank</strong></td>
                                        <td>{{ $promotion->new_rank }}</td>

                                        <td><strong>Status</strong></td>
                                        <td>{{ $promotion->status }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
