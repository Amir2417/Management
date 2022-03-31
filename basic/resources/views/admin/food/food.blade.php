<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">All Foods</div>
                            <div class="card-body">
                                @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($foods as $food)
                                        <tr>
                                            <th scope="row">{{$foods->firstItem()+$loop->index}}</th>
                                            <td>{{$food ->food_name}}</td>
                                            <td>{{$food ->user ->name}}</td>
                                            <td>{{$food ->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$foods -> links()}}
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Foods</div>
                        <div class="card-body">
                            <form action="{{url('addFood')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Food Name</label>
                                    <input type="text" name="food_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
