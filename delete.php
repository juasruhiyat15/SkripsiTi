<?php
include "koneksi.php";


if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM tbl_mahasiswa WHERE id_mahasiswa='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
?>
        <!-- <script type="text/javascript">
            // alert("Hapus Data Berhasil.");
            window.location = 'index.php';
            header("location: index.php");
        </script> -->
    <?php

        // $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        // exit(0);

    } else {
    ?>
        <!-- <script type="text/javascript">
            alert("Ada Kesalahan Pada Hapus Data.");
            window.location = 'index.php';
            header("location: index.php");
        </script> -->
<?php
        $_SESSION['message'] = "Student Not Deleted";
        // header("Location: index.php");
        // exit(0);
    }
}
?>
