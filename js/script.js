$(document).ready(function () {

  // menghilangkan tombol cari
  $('#tombol-cari').hide();

  // add event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    // memunculkan ikon loading
    $(".load").show();

    // ajax menggunakan load
    // $("#container").load("ajax/siswa.php?keyword=" + $("#keyword").val());

    //$.get()
    $.get("ajax/siswa.php?keyword=" + $("#keyword").val(), function (data) {
      
        $("#container").html(data);
        $(".load").hide();

    });

  });

});
