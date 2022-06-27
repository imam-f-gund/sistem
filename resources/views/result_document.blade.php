<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Result similarity document') }}
        </h2>
    </x-slot>
    @include('sweetalert::alert')
      
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <div class="py-12">
    <div class=" mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container">
           <div class="row mt-5">
              <div class="col-md">
                <div class="table-responsive">
                {{-- <table class="table table-bordered data-table" style="width: 100%"> --}}
                  <table id="example" class="table table-striped table-bordered " style="width:100%">
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
                                  <td  class="text-center">{{$no++}}</td>
                                </div>
                                   <div class="col-md-6">
                                        <td class="text-justify">{{$tes}}</td>
                                   </div>
                                <div class="col-md-2">
                                      <td  class="text-center">{{$hasil_dokumen[$key]}}</td>
                                      {{-- <td class="text-center">{{$rata[$key][0]}}</td> --}}
                                </div> 
                                <div class="col-md-3">
                                  <td>
                                    <button>
                                      <button type="button" class="btn btn-info btn-md" value="{{$doc_b[$key]}}" data-id="{{$doc_a[$key]}}"  id="t"  data-toggle="modal" data-target="#myModal">View Document</button>
                                      {{-- <button type="button" class="btn btn-info btn-lg" value="{{$doc_b[$key]}}" onclick="getVal(this.value)" data-toggle="modal" data-target="#myModal">Document 2</button> --}}
                                    </button>
                                  </td>
                                </div>
                          </div>     
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                {{-- tes --}}

                
              </div>
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Document Similarity</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div style="text-align: center">
                          <h3>dokumen mirip</h3>
                        </div>
                          <p id="text1">
                          
                          </p>
                      </div>
                          <div class="col-md-6">
                            <div style="text-align: center">
                              <h3>dokumen yang dicari</h3>
                            </div>
                            <p id="text2">
                            
                            </p>
                          </div>
                    </div>
                  </div>
                  
                  <!-- Modal footer -->
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
    </div>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     --}}
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
      <script>
            $(document).ready( function () {
              $('.table').dataTable({
                bFilter: false, 
                bInfo: false,
                "order": [[ 2, "desc" ]]
                });
              // $('.table').DataTable();
        
        } );
         $(document).on('click','#t',function(){
          value = $(this).data('id'); 
          value2 = $(this).val();
          $("embed").remove();
          $("#text1").append("<embed src='{{url('/cobakpdf/jurnal/')}}/"+value+"' width='100%' height='375' type='application/pdf'></embed>");
          $("#text2").append("<embed src='{{url('/cobakpdf/jurnal/')}}/"+value2+"' width='100%' height='375' type='application/pdf'></embed>");
        // console.log(tes2);
          });
      </script>
    </div>
    
</x-app-layout>

 