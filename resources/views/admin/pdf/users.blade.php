<style>
table {
  border-collapse: collapse;
}
table,th,td {
  border: 1px solid black;
}
</style>
    <table class="table table-bordered">
  <thead>
    <tr>
    <th> <h6 class="text-light">Id</h6></th>
    <th> <h6 class="text-light">User Name</h6></th>
    <th> <h6 class="text-light">Email</h6></th>
    <th> <h6 class="text-light">Phone</h6></th>
    <th> <h6 class="text-light">Store</h6></th>
    <th> <h6 class="text-light">Business</h6></th>
   <th> <h6 class="text-light">location</h6></th>
     <th> <h6 class="text-light">Verified</h6></th>
    
   </tr>
  </thead>
  <tbody>
     @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->mobile }}</td>
        <td>{{ $user->store }}</td>
        <td>{{ $user->business }}</td>
       
        <td>{{ $user->location }}</td>
        <td>@if ($user->verified == 'no')
          <a href="{{ route('statusupdate',$user->id) }}" class="btn btn-danger">Verify</a>
        @else
         <h2 class="btn btn-success">Verified</h2>
        @endif</td>

        
    </tr>
    @endforeach
  </tbody>
</table>
