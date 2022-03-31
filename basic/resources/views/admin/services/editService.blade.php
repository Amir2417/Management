<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-12">
       
            <div class="container">
                <div class="row">
                  <div class="col-md-8">
                    @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  
@endif
                    <div class="card">
                      
                      <div class="card-header">New Services</div>
                      <div class="card-body">
                      <form action="{{url('update/Service/'.$services->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Service</label>
                          <input type="text" value="{{$services->service_name}}" class="form-control" name="service_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    
</x-app-layout>