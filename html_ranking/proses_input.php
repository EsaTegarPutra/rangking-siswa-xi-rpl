<?php
// Koneksi ke database
include_once('connect.php');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ambil data dari formnya
$student = $_POST['nama_siswa'];
$score = $_POST['nilai_siswa'];

// Masukkan data students ke tabel "students" ya teman teman hehehe
$sql_nama = "INSERT INTO students (name) VALUES ('$student')";
if (mysqli_query($conn, $sql_nama)) {
    // Jika data students berhasil dimasukkan, lalu ambil ID-nya ya teman teman
    $student_id = mysqli_insert_id($conn);

    // Masukkan data nilai beserta student_id-nya ke tabel "score"
    $sql_nilai = "INSERT INTO scores (student_id, score) VALUES ($student_id, $score)";
    if (mysqli_query($conn, $sql_nilai)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $sql_nilai . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql_nama . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!-- // maaf ya pak saya ngerjainnya inputnya dibantuin si gpt hehehe tapi saya udah ngerti dikit kok buat sekalian belajar di rumah pak:)