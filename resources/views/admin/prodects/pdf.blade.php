
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$prodect->Name_Prodect}}</td>

      <td>
{{$prodect->description}}</td>
      <td>
{{$prodect->price}}</td>

<td>{{$prodect->quantity}}</td>
<td>
{{$prodect->discount_price}}</td>
<td>
{{$prodect->Category->Name_Category}}</td>
    </tr>
    
  </tbody>
</table>



<img src="/item_images/{{$prodect->Name_Prodect}}/{{$prodect->image}}" style="width:300px">










@include('admin.js')
  

    
</body>
</html>