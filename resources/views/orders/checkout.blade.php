@extends('welcome')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <h1>Welcome, {{ Auth::user()->name }}!</h1>
            <p class="mb-4"><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <h2><strong>Please give you shipping address below</strong></h2>
            <form method="POST" action="{{ route('order.create') }}">
                @csrf
                <div class="mt-4">
                    <label for="address">{{ __('Address') }}</label><br>
                    <textarea id="address" class="block mt-1 w-full" name="address" rows="3" required>{{ old('address') }}</textarea>
                    @error('address')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-4 py-2 btn btn-dark text-white rounded">
                        {{ __('Place Order') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection