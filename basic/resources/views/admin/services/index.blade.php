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
                      <div class="card-header">All Services</div>
                    
                <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Service Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($services as $service)
    <tr>
      <th scope="row">{{ $services ->firstItem()+$loop ->index}}</th>
      <td>{{$service -> service_name}}</td>
      <td>{{$service -> user->name}}</td>
      <td>{{$service -> created_at->diffForHumans()}}</td>
      <td>
        <a href="{{url('/service/edit/'.$service->id)}}" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
     @endforeach
  </tbody>
</table>
{{$services -> links()}}
</div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">New Services</div>
                      <div class="card-body">
                      <form action="{{route('addServe')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Service</label>
                          <input type="text" class="form-control" name="service_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
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