<form>
    <div class="row"><div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Staff ID') }}:</strong>
            {{$employee->staff_id}}
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('First Name') }}:</strong>
            {{ $employee->first_name}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Last Name') }}:</strong>
            {{ $employee->last_name}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('File Number') }}:</strong>
            {{ $employee->file_number}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Date of Birth') }}:</strong>
            {{ $employee->dob}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Gender') }}:</strong>
            {{ $employee->gender}}
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Employee status') }}:</strong>
            {{ $employee->status}}
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Status last change') }}:</strong>
            {{ $employee->status_changed_date}}
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('State') }}:</strong>
            {{ $employee->state}}
        </div>
    </div>
    
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Local Government Area') }}:</strong>
            {{ $employee->lga}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('MDA') }}:</strong>
            @if ($employee->name)
              {{ $employee->name }} ( {{ $employee->mda_alias }} )
        @else
            <p>Not available</p>
        @endif

        </div>
    </div>
    
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Highest Qualification') }}:</strong>
            {{ $employee->highest_qualification}}
        </div>
    </div>
    
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Date of First Appointment') }}:</strong>
            {{ $employee->first_appointment_date}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Current Rank') }}:</strong>
            {{ $employee->current_rank}}
        </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>{{ __('Date of Last Promotion') }}:</strong>
            {{ $employee->last_promotion_date}}
        </div>
    </div>
    </div>
</form>