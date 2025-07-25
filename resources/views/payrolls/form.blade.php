<div class="mb-4">
    <label class="block mb-1">Employee</label>
    <select name="employee_id" class="w-full border rounded px-3 py-2">
        <option value="">Select Employee</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ old('employee_id', optional($payroll)->employee_id) == $employee->id ? 'selected' : '' }}>
                {{ $employee->name }}
            </option>
        @endforeach
    </select>
    @error('employee_id')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Month</label>
    <input type="month" name="month" value="{{ old('month', optional($payroll)->month) }}" class="w-full border rounded px-3 py-2">
    @error('month')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Basic Salary</label>
    <input type="number" name="basic_salary" value="{{ old('basic_salary', optional($payroll)->basic_salary) }}" class="w-full border rounded px-3 py-2">
    @error('basic_salary')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Allowances</label>
    <input type="number" name="allowances" value="{{ old('allowances', optional($payroll)->allowances) }}" class="w-full border rounded px-3 py-2">
    @error('allowances')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label class="block mb-1">Deductions</label>
    <input type="number" name="deductions" value="{{ old('deductions', optional($payroll)->deductions) }}" class="w-full border rounded px-3 py-2">
    @error('deductions')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>
