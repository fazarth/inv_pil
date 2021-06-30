// $(function () {
//   $("#tbl_brg")
//     .DataTable({
//       responsive: true,
//       // lengthChange: false,
//       autoWidth: false,
//       buttons: ["excel", "pdf", "print", "colvis"],
//     })
//     .buttons()
//     .container()
//     .appendTo("#tbl_brg_wrapper .col-md-6:eq(0)");

//   $("#tbl_in")
//     .DataTable({
//       scrollX: true,
//       responsive: true,
//       lengthChange: false,
//       autoWidth: false,
//       buttons: ["excel", "pdf", "print", "colvis"],
//     })
//     .buttons()
//     .container()
//     .appendTo("#tbl_in_wrapper .col-md-6:eq(0)");

//   $('[data-toggle="tooltip"]').tooltip();

//   $("#tbl_last_brg, #tbl_last_in, #tbl_last_out").DataTable({
//     responsive: true,
//     lengthChange: false,
//     autoWidth: false,
//     searching: false,
//     paging: false,
//     ordering: false,
//     info: false,
//   });
// });

// $(document).ready(function () {
//   $("#id_satuan").select2({
//     placeholder: "Silahkan Pilih",
//   });
// });
// $(document).ready(function () {
//   $("#id_ktgr").select2({
//     placeholder: "Silahkan Pilih",
//   });
// });

// nambah RP. dan Titik
var harga_brg = document.getElementById("harga_brg");
harga_brg.addEventListener("keyup", function (e) {
  harga_brg.value = convertRupiah(this.value, "Rp. ");
});
harga_brg.addEventListener("keydown", function (event) {
  return isNumberKey(event);
});

var harga_brg_in = document.getElementById("harga_brg_in");
harga_brg_in.addEventListener("keyup", function (e) {
  harga_brg_in.value = convertRupiah(this.value, "Rp. ");
});
harga_brg_in.addEventListener("keydown", function (event) {
  return isNumberKey(event);
});

var harga_brg_out = document.getElementById("harga_brg_out");
harga_brg_out.addEventListener("keyup", function (e) {
  harga_brg_out.value = convertRupiah(this.value, "Rp. ");
});
harga_brg_out.addEventListener("keydown", function (event) {
  return isNumberKey(event);
});

function convertRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}

function isNumberKey(evt) {
  key = evt.which || evt.keyCode;
  if (
    key != 188 && // Comma
    key != 8 && // Backspace
    key != 17 &&
    (key != 86) & (key != 67) && // Ctrl c, ctrl v
    (key < 48 || key > 57) // Non digit
  ) {
    evt.preventDefault();
    return;
  }
}
