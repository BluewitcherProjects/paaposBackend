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
      <th> <h6 class="text-light">Sub Category Id</h6></th>
      <th> <h6 class="text-light">Sub Category Name</h6></th>
      <th> <h6 class="text-light">Category Name</h6></th>
      
    </tr>
  </thead>
  <tbody>
      @foreach ($subcategorys as $category)
  <tr>

    <td>{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>{{ $category->catname }}</td>

    
  </tr>
  @endforeach
  </tbody>
</table>
