<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert your movie !</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
.mainform {
    display: flex;
    justify-content: center;
    border:2.5px solid black;
    width: 400px;
    height: 500px;
    margin: 30px auto;
}
.contentBox{
    margin: 10px 0px;
}
.boxDistance {
    margin-left: 10px;
    width: 20em;
}
.formLabel {
    display: block;
    float: left;
    width: 70px;
}
.buttonInsert button {
    margin-left: 6em;
    width: 100px;
    height: 25px;
}
.buttonTambah button {
    margin-left: 6em;
    margin-bottom: 10px;
    width: 150px;
    height: 25px;
}
.file_upload{
    margin: 10px 80px;
}
</style>
<body>

<div class="mainform">
    <form action="insertmovie_processs.php" method="POST" enctype="multipart/form-data">
        <div class="contentBox">
            <label class="formLabel">Judul: </label>  
            <input class="boxDistance" type="text" name="judul">
        </div>
        <div class="contentBox">
            <label class="formLabel">Rilis: </label>  
            <input class="boxDistance" type="date" name="rilis">
        </div>
        <div class="contentBox">
            <label class="formLabel">Skor: </label>   
            <input class="boxDistance" type="number" name="skor">
        </div>
        <div class="contentBox">
            <label class="formLabel">Sinopsis: </label>   
            <textarea class="boxDistance" name="sinopsis" rows="2.5"></textarea>
        </div>
        <div class="contentBox">
            <label class="formLabel">Serial: </label> 
            <input class="optional" type="radio" name="serial" value="1">Ya
            <input class="optional" type="radio" name="serial" value="0">Tidak
        </div>
        <div class="contentBox">
        <label class="formLabel">Genre: </label>
        <?php
		$mysqli = new mysqli("localhost", "root", "", "newmovie");
		$res = $mysqli->query("SELECT * FROM genre");
		while($row = $res->fetch_assoc()){
			echo "<label>
				<input type='checkbox' name='genre[]' value='".$row['idgenre']."'>".$row['nama']."</label>";
		}
		$mysqli->close();
	    ?>
	    <br><br>
        </div>
        <div class="contentBox">
            <label class="formLabel">Poster: </label>
            <div id="file_upload">
                <div>
                    <input class="boxDistance" type="file" name="poster" accept="image/jpeg" required>
				    <button type="button" class="btnHapus">Hapus</button>
                </div> 
			</div> 
        </div>
		<div class="containerTambah">
			<button type="button" id="tambahgambar">Tambah Gambar</button>
		</div><br>
        <div class="buttonInsert">
            <button type="submit" name="insert">Insert</button>
        </div>   
    </form>
</div>
<div class="containerControl">
    <label>Pemain: </label>
	<select id="selectPemain">
	    <option value="">Pilih Pemain</option>
	    <?php
            $mysqli = new mysqli("localhost", "root", "", "newmovie");
            $res = $mysqli->query("SELECT * FROM pemain");
            while ($row = $res->fetch_assoc()) {
                echo "<option value='".$row['idpemain']."'>".$row['nama']."</option>";
            }
        $mysqli->close();
        ?>
	</select>
    <select id="selectPeran">
        <option value="">Pilih Peran</option>
        <option value="Utama">Utama</option>
        <option value="Pembantu">Pembantu</option>
        <option value="Cameo">Cameo</option>
    </select>
    <button type="button" id="tambahPemain">Tambah Pemain</button>
</div>
<div class="containerTable">
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>Pemain</td>
                <td>Peran</td>
                <td>Aksi</td>
            </tr>        
        </thead>
        <tbody id="daftarPemain">
        
        </tbody>
    </table>
</div>
<script type="text/javascript">
$('body').on('click', '#tambahPemain', function() {
    var hasil = "<tr>";
        hasil = hasil + "<td>Robert";
        hasil = hasil + "<input type='hidden' name='idpemain' value='1'></td>";
        hasil = hasil + "<td>Utama";
        hasil = hasil + "<input type='hidden' name='peran' value='Utama'></td>";
        hasil = hasil + "<td><button class='hapusPemain'>Hapus</button></td>";
        hasil = hasil + "</tr>";
        $('#daftarPemain').append(hasil);
});
$ (document).ready(function() {
    $("#tambahgambar").click(function (){
        $("#file_upload").append('<div id="tambahan"><input type="file" name="poster" accept="image/jpeg" required>');
    });
});
$ (document).ready(function() {
    $(".btnHapus").click(function (){
        $("#tambahan").remove();
    });
});
</script>
</body>
</html>