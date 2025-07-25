@csrf

<div class="mb-4">
    <label>Name</label>
    <input type="text" name="name" class="form-input w-full" value="{{ old('name', $employee->name ?? '') }}">
</div>

<div class="mb-4">
    <label>Email</label>
    <input type="email" name="email" class="form-input w-full" value="{{ old('email', $employee->email ?? '') }}">
</div>

<div class="mb-4">
    <label>Phone</label>
    <input type="text" name="phone" class="form-input w-full" value="{{ old('phone', $employee->phone ?? '') }}">
</div>

<div class="mb-4">
    <label>Designation</label>
    <input type="text" name="designation" class="form-input w-full" value="{{ old('designation', $employee->designation ?? '') }}">
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($employee) ? 'Update' : 'Save' }}
</button>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
