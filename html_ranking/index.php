<?php
  include_once('connect.php');

  $sql = "SELECT * FROM scores, students WHERE scores.student_id = students.id";
  $result = $conn->query($sql);
  $data = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ranking Siswa XI RPL</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body id="home">

    <!--navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow p-3 mb-2 bg-body rounded">
      <div class="container">
        <a class="navbar-brand fs-3 fw-bold text-primary" href="#">RANKING SISWA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
            <a class="nav-link" href="#input">Input</a>
            <a class="nav-link fw-bold text-primary" href="#">Hubungi Kami</a>
          </div>
        </div>
      </div>
    </nav>
    <!--jumbotron-->
    <div class="container">
      <h1 class="display-4 pt-5 pb-3">Selamat Datang</h1>
      <p class="lead">Website ini membantu menampilkan data nama dan nilai siswa kelas XI RPL dan juga membantu untuk menginput nama dan juga nilai siswa dengan simple dan aman. Kalau tidak percaya tanya aja sama Pak Haji hehe :)</p>
      <hr class="my-4">
      <p>Pelajari lebih lanjut klik di bawah ini !</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,32L48,64C96,96,192,160,288,165.3C384,171,480,117,576,117.3C672,117,768,171,864,170.7C960,171,1056,117,1152,96C1248,75,1344,85,1392,90.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,288L48,288C96,288,192,288,288,277.3C384,267,480,245,576,229.3C672,213,768,203,864,197.3C960,192,1056,192,1152,208C1248,224,1344,256,1392,272L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    
    <!--input data-->
    <section id="input">
      <div class="container my-2">
        <div class="row">
          <div class="col-md-4">
            <h1 class="py-3">Input Data Siswa</h1>
            <form action="proses_input.php" method="post">
              <div class="mb-3">
                <label for="exampleInputText" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa">
              </div>
              <div class="mb-3">
                <label for="exampleInputNumber" class="form-label">Nilai Siswa</label>
                <input type="number" class="form-control" name="nilai_siswa">
              </div>
              <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
          </div>

          <div class="col-md-8">
            <h1 class="py-3">Tabel Data Nilai Siswa</h1>
            <table class="table border border-3 table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col" class="text-center">Id.</th>
                  <th scope="col" class="text-center">Nama</th>
                  <th scope="col" class="text-center">Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $key => $d): ?>
                <tr>
                  <th class= "text-center"><?= $key + 1?></th>
                  <td class= "text-center"><?= $d['name'] ?></td>
                  <td class= "text-center"><?= $d['score'] ?></td>                  
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,218.7C672,224,768,160,864,133.3C960,107,1056,117,1152,133.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <!--footer-->
    <footer class="bg-primary text-white text-center pb-5">
      <p>&copy; Copyright by <a href="" class="text-white fw-bold">Esa Tegar Putra Utama</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>