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
     <th><h6 class="text-light">Product Id</h6></th>
    <th><h6 class="text-light">Name</th>
    <th><h6 class="text-light">Category</h6></th>
    <th><h6 class="text-light">Subcategory</h6></th>
    <th><h6 class="text-light">Price</h6></th>
    <th><h6 class="text-light">Quantity</h6></th>
    <th><h6 class="text-light">SKU</h6></th>
    <th><h6 class="text-light">Description</h6></th>
    <th><h6 class="text-light">In Stock</h6></th>
    <th><h6 class="text-light">Status</h6></th>
    
    </tr>
  </thead>
  <tbody>
    @foreach ($product as $product)
                                              
    <tr>
        <td>{{ $product->id }}</td>
       
        <td>{{ $product->name }}</td>
        <td>{{ $product->catname }}</td>
        <td>{{ $product->subcatname }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->sku }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->in_stock== '0' ? 'Sold' :'Available'  }}</td>
        <td>{{ $product->status == '0' ? 'Deactive' :'Active' }}</td>
        
    </tr>
    @endforeach
  </tbody>
</table>
