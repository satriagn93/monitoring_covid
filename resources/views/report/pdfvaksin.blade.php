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

<h2>List Karyawan dan Keluarga yang sudah dan belum Vaksin</h2>
<p>List Karyawan</p>
<table>
  <tr>
    <th>Nama Karyawan</th>
    <th>Vaksin 1</th>
    <th>Vaksin 2</th>
    <th>Vaksin Boosting</th>
  </tr>
  @foreach ($vaksin as $vaksins)
  <tr>
    <td>{{$vaksins->karyawan}}</td>
    <td>{{$vaksins->vaksin1}}</td>
    <td>{{$vaksins->vaksin2}}</td>
    <td>{{$vaksins->vaksin_boosting}}</td>
  </tr>
  @endforeach
</table>

<p>List Keluarga Karyawan</p>
<table>
  <tr>
    <th>Nama Karyawan</th>
    <th>Nama Keluarga</th>
    <th>Hubungan</th>
    <th>Vaksin 1</th>
    <th>Vaksin 2</th>
    <th>Vaksin Boosting</th>
  </tr>
  @foreach ($vaksin_fam as $vaksin_fams)
  <tr>
    <td>{{$vaksin_fams->karyawan}}</td>
    <td>{{$vaksin_fams->fam_name}}</td>
    <td>{{$vaksin_fams->relationship}}</td>
    <td>{{$vaksin_fams->vaksin1}}</td>
    <td>{{$vaksin_fams->vaksin2}}</td>
    <td>{{$vaksin_fams->vaksin_boosting}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>

