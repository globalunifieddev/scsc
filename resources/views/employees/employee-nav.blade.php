<div class="text-center mb-4">
    {{-- TO-DO: add access control for this btn --}}
    <a href="{{ url(route('employees.edit', ['employee' => $employee->id])) }}" class="btn btn-primary btn-sm">Edit records <i class="fas fa-fw fa-pen"></i></a>
    <a href="{{ url(route('transfers.create', ['employee' => $employee->id])) }}" class="btn btn-success btn-sm">Employee transfer <i class="fas fa-fw fa-share"></i></a>
    <a href="{{ url(route('promotions.create', ['employee' => $employee->id])) }}" class="btn btn-secondary btn-sm">Promotions <i class="fa fa-pen"></i></a>
    <a href="{{ url(route('disciplines.create', ['employee' => $employee->id])) }}" class="btn btn-danger btn-sm">Descipline <i class="fas fa-fw fa-hammer"></i></a>
    <a href="{{ url(route('uploads.create', ['employee' => $employee->id])) }}" class="btn btn-warning btn-sm">Upload documents <i class="fas fa-fw fa-upload"></i></a>
    <a href="{{ url(route('employees.show', ['employee' => $employee->id])) }}" class="btn btn-dark btn-sm">Preview employee <i class="fas fa-fw fa-print"></i></a>
</div>
