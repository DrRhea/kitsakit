<?php
    include('../../function.php');


    $id = $_GET['id'];
    $idRekamMedis = $_GET['idRekamMedis'];
    $page = $_GET['page'] . ".php";
    if ($id > 0) {
        $isDeleteSucceed = 0;

        if($page == "dokter.php")
            $isDeleteSucceed = deleteDokter($id);
        else if($page == "rekamMedis.php")
            $isDeleteSucceed = deleteRekamMedis($id);
        else if($page == "resepObat.php")
            $isDeleteSucceed = deleteResepObat($id);
        else if($page == "obat.php")
            $isDeleteSucceed = deleteObat($id);
    
        if($page == "resepObat.php")
            $page = "rekamMedis.php?id=" . $idRekamMedis . "#resepObat";
    
        if ($isDeleteSucceed > 0) {
            echo "
            <script>
                alert('Delete Success !');
                location.href = '../$page';
            </script>
            ";
            } else {
            echo "
            <script>
                alert('Delete Failed !');
                location.href = '../$page';
            </script>
            ";
        }
    }
?>
