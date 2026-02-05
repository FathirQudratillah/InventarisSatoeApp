<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello World</h1>
    <ol>
    @foreach ($posts as $post)
        <li>{{ $post['user_id'] }} --> {{ $post['username'] }} --> {{ $post['password'] }}</li>
    @endforeach
    </ol>


    <form action="{{ route('DataAkun.store') }}" method="post">
        @csrf
        <input type="text" placeholder="user_id" name="user_id">
        <input type="text" placeholder="username" name="username">
        <input type="text" placeholder="password" name="password">
        <button type="submit">Submit</button>
    </form>

    <ol>
    @foreach ($akuns as $akun)
        <li>{{ $akun['nis'] }} --> {{ $akun['id_kelas'] }} --> {{ $akun['user_id'] }} --> {{ $akun['nama'] }}</li>
    @endforeach
    </ol>

    <form action="{{ route('DataSiswa.store') }}" method="post">
        @csrf
        <input type="text" placeholder="nis" name="nis">
        <select name="id_kelas" id="id_kelas">
            @foreach ($kelass as $kelas )
                <option value="{{ $kelas['id_kelas'] }}">{{ $kelas['id_kelas'] }}</option>
            @endforeach
        </select>
        <input type="text" placeholder="user_id" name="user_id">
        <input type="text" placeholder="nama" name="nama">
        <input type="text" placeholder="email" name="email">
        <input type="text" placeholder="jenis_kelamin" name="jenis_kelamin">
        <input type="text" placeholder="no_kontak" name="no_kontak">
        <input type="text" placeholder="alamat" name="alamat">
        <button type="submit">Submit</button>
    </form>
    
    <ol>
    @foreach ($kelass as $kelas)
        <li>{{ $kelas['id_kelas'] }} --> {{ $kelas['id_jurusan'] }} --> {{ $kelas['angkatan'] }} --> {{ $kelas['kelas'] }}</li>
    @endforeach
    </ol>

    <form action="{{ route('DataKelas.store') }}" method="post">
        @csrf
        <input type="text" placeholder="id_kelas" name="id_kelas">
        <input type="text" placeholder="id_jurusan" name="id_jurusan">
        <input type="text" placeholder="angkatan" name="angkatan">
        <input type="text" placeholder="kelas" name="kelas">
        <input type="text" placeholder="subkelas" name="subkelas">
        <button type="submit">Submit</button>
    </form>

</body>
</html>