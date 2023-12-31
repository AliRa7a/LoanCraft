@extends('admin.dashboard')

@section('content')
<style>
    /* Custom styles for the toggle switch */
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 17px;
        /* Make the slider rounded */
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        border-radius: 50%;
        /* Make the circle rounded */
        transition: 0.4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }
</style>
<div class="p-6 mx-auto max-w-xl">
    <div class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div>
                    <!-- User details -->
                    <h2 class="text-2xl font-semibold">{{ $loan->name }}</h2>
                    <p class="text-gray-500">{{ $loan->email }}</p>
                </div>
            </div>
            <div>
                <!-- Toggle switch for changing status -->
                <b>Change Status</b>
                <form action="{{ route('loan.update-status', $loan->id) }}" method="post">
                    @csrf
                    <label class="switch">
                        <input type="checkbox" name="status" onchange="this.form.submit()" {{ $loan->status === 'approved' ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </form>
            </div>
        </div>
        <hr class="my-4 border-t border-gray-300">
        <div>
            <h3 class="text-xl font-semibold mb-2">Loan Application Details</h3>
            <!-- Display loan application details -->
            <p class="font-semibold mb-2">Amount: {{ $loan->amount }}</p>
            <p class="font-semibold mb-2">Bank: {{ $loan->bank }}</p>
            <p class="font-semibold mb-2">Account No: {{ $loan->account_number }}</p>
            <p class="font-semibold mb-2"> Installment: {{ $loan->installment_amount }}</p>
            <p class="font-semibold mb-2">Amount + Interest: {{ $loan->amount_payable }}</p>
            <p class="font-semibold mb-2">Status: {{ $loan->status }}</p>
        </div>
    </div>
</div>

@endsection