<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @include('sweetalert::alert')
    @if (session('error'))
        <div class="alert alert-danger" >
          {{session('error')}}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Static navbar -->
            
   
     
        <div class="container">
            <form method="get" action="{{url('/cari')}}">

            <div class="form-group row">
                <div class="col-10">
                <input type="text" class="form-control" name="cari" placeholder="cari…."/> 
               
            </div>

            {{-- <div class="col-1">
                <select class="form-control" name="gram">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    
                </select>
            </div> --}}

            <div class="col-1">
                <input type="submit" value="Search" class="btn btn-success float-right ">
            </div>
                
            </div>
            </form>
            
                <form action="{{url('/upload/')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="fa fa-upload col-4">
                        <input type="file" name="file">
                    </div>
                
                    <div class="col-8">
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </div>
                </div>
                </form>
        </div>
        </div>
            </div>
        </div>
    </div>
</x-app-layout>
 