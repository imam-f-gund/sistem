<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Result search document') }}
        </h2>
    </x-slot>
    @include('sweetalert::alert')
     @if (session('error'))
        <div class="alert alert-danger" >
          {{session('error')}}
        </div>
    @endif
    
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" > --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row container info">
                    <div class=" text-center ">
                      <b id="notif">  </b> 
                    </div>
                </div>
            <div class="row mt-5">
              <div class="col-md">
                    <div class=" text-center ">
                      <b> Query </b> :<td> {{$query}}</td>
                    </div>
              </div>
            </div> 
            <div class="container">
              <div class="row mt-5">
                <div class="col-md"> 
                  <div class="table-responsive">
                    {{-- <table class="table table-bordered data-table" style="width: 100%"> --}}
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Document</th>
                          <th scope="col">Similarity Result</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @php
                           $no = 1;   
                          @endphp
                          @foreach ($dokumen as $key => $tes)    
                        <tr>
                            <div class="row">
                                    <div class="col-md-1">
                                        <td class="text-center">{{$no++}}</td>
                                    </div>
                                    <div class="col-md-6">
                                          <td  class="text-justify">{{ substr($tes,0,200)}} .......</td>
                                          {{-- <td  class="text-justify">{{ $tes}}</td> --}}
                                    </div>
                                    <div class="col-md-2">
                                          {{-- <td class="text-center">{{$hasil_dokumen[$key]}}</td> --}}
                                          <td class="text-center">{{$rata[$key][0]}}</td>
                                    </div> 
                                    </div> 
                                    <div class="col-md-3">
                                      <td>
                                        <button type="button" class="btn btn-success btn-md" value="{{$nama_dokumen[$key]}}" onclick="getVal(this.value)" data-toggle="modal" data-target="#myModal">View Document</button>
                                        <hr>
                                          <a type="button" class="btn btn-info btn-md" href="{{url('/analis_doc/'.$dokumen_id[$key])}}" value="{{$nama_dokumen[$key]}}" >Relevansi</a>
                                      </td>   
                                    </div>
                            </div> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Document View</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                    <div class="modal-body">
                      <p>     
                      </p>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script>
            $(document).ready( function () {
              $('.table').dataTable({bFilter: false, bInfo: false, "order": [[ 2, "desc" ]]});
            $('.table').DataTable();
          });
          function getVal(value)
          {
            // alert(value);
            // window.location.assign(url('/analis_doc'))
            $("embed").remove();
            $("p").append("<embed src='{{url('/cobakpdf/jurnal/')}}/"+value+"' width='100%' height='375' type='application/pdf'></embed>");
            // console.log(value);
          }
        </script>
    </div>
    
</x-app-layout>

 