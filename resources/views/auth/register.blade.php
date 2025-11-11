<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="{{ route('register.proses') }}">
        @csrf
        <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required autofocus>
        </div> 
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" placeholder="Enter your alamat" required autofocus>
        </div>
        <div class="form-group">
            <label for="instansi">Instansi</label>
            <input type="text" id="instansi" name="instansi" placeholder="Enter your instansi" required autofocus>
        </div> 
        <div class="form-group">
            <label for="nomor_hp">Nomor Handphone</label>
            <input type="text" id="nomor_hp" name="nomor_hp" placeholder="Enter your nomor handphone" required autofocus>
        </div> 
        <div class="form-group">
            <label for="role">Jabatan</label>
            <select id="role" name="role">
                <option value="">-- Pilih Role --</option>
                <option value="administrator">Administrator</option>
                <option value="ppat">PPAT/PPATS</option>
                <option value="ktu">KTU</option>
                <option value="kepala_uptd">Kepala UPTD</option>
                <option value="kepala_badan">Kepala Badan</option>
                <option value="koordinator_survey">Koordinator Survey</option>
                <option value="anggota_survey">Anggota Survey</option>
            </select>
        </div> 
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn-login">
            Register
        </button>
    </form>
</body>
</html>