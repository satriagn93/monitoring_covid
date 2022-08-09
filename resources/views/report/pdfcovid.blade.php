<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>List Karyawan Positif Covid</h2>

<table>
  <tr>
    <th>Nama Karyawan</th>
    <th>Varian Covid</th>
    <th>Tanggal terkena</th>
  </tr>
  @foreach ($covid as $covids)
  <tr>
    <td>{{$covids->karyawan}}</td>
    <td>{{$covids->covid_name}}</td>
    <td>{{$covids->date}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>

