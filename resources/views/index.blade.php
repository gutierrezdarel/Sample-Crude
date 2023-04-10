@extends('Layout')

@section('content')
<style>
    #update {
        display: none;
    }
</style>

<form action="{{route('saveTask')}}" method="POST" id="save">
    @csrf
    <div class="mb-3 d-flex gap-5">
        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
        <input type="text" class="form-control" placeholder="Todo List" name="taskname" required>
        
         <button type="submit" class="btn btn-primary">Submit</button>
    </div>
   
</form>

<form action="{{route('updateTask')}}" method="POST" id="update">
    @csrf
    <div class="mb-3 d-flex gap-5">
        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
        <input type="text" class="form-control" placeholder="Update Todo List" name="UpdateTask" id="UpdateTask">
        <input type="hidden" class="form-control" placeholder="Todo List" name="updateTask_id" id="updateTask_id" required value="">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
   
</form>
<table class="table w-50 ">
    <thead>
      <tr>

        <th scope="col">Task Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if($tasks)
        @foreach ($tasks as $task)
      <tr>
        <td id = "taskname-{{$task->id}}" >{{$task->task_name}}</td>
        <td><button type="button" onclick ="updateTask({{$task->id}})" class="btn btn-warning">Edit</button>
            {{-- <a href ="{{route('deleteTask', $task->id)}}" class="btn btn-primary" >
                DELETE
              </a> --}}
            <button  onclick ="deleteTask({{$task->id}})" type="button" class="btn btn-danger">Delete</button>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>

@endsection

<script>
        
        function deleteTask(id) {
    $.ajax({
        url: '/delete/' + id,
        type: 'GET',
        success: function(result) {
            if(result){
                location.reload();
            }
        },
        error: function(xhr, status, error) {
            // Handle error
        }
    });
}   

    function updateTask(id){
        $('#save').css('display', 'none');
        $('#update').css('display', 'flex');

        $('#UpdateTask').val($('#taskname-' + id).html())
        $('#updateTask_id').val(id);    
    }

</script>