<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('analyst') }}
        </h2>
    </x-slot>
    @include('sweetalert::alert')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Static navbar -->
   
     
        <div class="container">
     
         <h1>analyst</h1>
            <form action="{{url('/analis_doc')}}" method="get">
            <input type="submit" value="Analyst" class="btn btn-primary">        
            </form>
        </div>
            </div>
        </div>
    </div>
</x-app-layout>
 