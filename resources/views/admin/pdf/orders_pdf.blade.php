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
     <th><h6 class="">Order id</h6></th>
	<th><h6 class="text-light">Product id</h6></th>
	<th><h6 class="text-light">Product Name</h6></th>
	<th><h6 class="text-light">User Name</h6></th>
	<th><h6 class="text-light">Mobile</h6></th>
	<th><h6 class="text-light">Delivery Charge</h6></th>
	<th><h6 class="text-light">Pickup Location</h6></th>
	<th><h6 class="text-light">Pickup Location</h6></th>
	<th><h6 class="text-light">Cod</h6></th>
	<th><h6 class="text-light">Wallet</h6></th>
	<th><h6 class="text-light">Admin Commision</h6></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($order as $item)

    <tr>
        <td>{{$item->id}}
        </td>
        <td>{{$item->product_id}}</td>
        <td>{{$item->product_name}}</td>
        <td>{{$item->UserName}}</td>
        <td>{{$item->Mobile}}</td>
        <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$item->Delivery_charge}}</td>
        <td>{{$item->Pickup_location}}</td>
        <td>{{$item->Drop_location}}</td>


        <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$item->Cod}}</td>
        <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$item->Wallet}}</td>
        <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$item->   Admin_commision}}</td>
       
    </tr>
    @endforeach
  </tbody>
</table>
