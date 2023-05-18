<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<h1> Data Tugas </h1>
<table id="customers">
  <tr>
    <th>No</th>
    <th>Title</th>
    <th>Status</th>
    <th>Deadline</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
    <td>{{ $no++}}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->status }}</td>
    <td>{{ $row->deadline->format('d M Y')}}</td>
  </tr>  
  @endforeach
  
  
</table>

</body>
</html>