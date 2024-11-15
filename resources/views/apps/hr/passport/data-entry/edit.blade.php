@php
use Illuminate\Support\Facades\Cache;
@endphp

<x-app-layout>
    <div class="m-3 p-3 xl:m-6 xl:p-6 border-2 border-red-500">

        <form method="POST" action="{{ route('passports.store') }}">
            @csrf
            <x-text-input 
            class=""
            label="File Name"
            id="file_name"
            :error="$errors->first('file_name')"
            icon="document" 
            placeholder="Enter file name" 
            :value="old('file_name')" 
            type="text" 
            name="file_name"
            />



            <input type="hidden" name="employee_id" value="20000">
    
            <button type="submit" class="bg-blue-500 text-white px-2 py-1 my-3 rounded-md">Submit</button>
        </form>


</div>
</x-app-layout>
