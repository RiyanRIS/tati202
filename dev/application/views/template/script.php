<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.js"></script>

<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

<script>
  $(async function() {

    var pathArray = window.location.pathname.split('/');
    var current = pathArray[2] ?? "home";

    $('#nav li a').each(function() {
      var $this = $(this);
      if ($this.attr('data-nav') == current) {
        $this.addClass('active');
      }
    })

    $('#datatable').DataTable();
    $("#myAlert").hide();

    $('#myForm, #myForm1, #myForm2, #myForm3, #myForm4, #myForm5, #myForm6, #myForm7').submit(function(e) {
      e.preventDefault()
      var dataToSend = new FormData(this)
      var formId = $(this)
      var formIdN = $(this).closest("form").attr('id')
      var submit = $(this).closest('form').find(':submit')
      var action = $(formId).attr('action')
      var url = $(formId).attr('data-url')
      var refresh = $(formId).attr('data-refresh')

      $('#modalnya .modal-footer #submit').prop('disabled', true)
      submit.prop('disabled', true)
      $(".is-invalid").removeClass("is-invalid");

      $.ajax({
        url: url,
        dataType: 'json',
        type: 'post',
        data: dataToSend,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: async function() {
          $('#loading').show()
        },
        complete: function() {
          $('#loading').hide()
          $('.overlay').remove()
          $("input[type='password']").val("")
          $('#modalnya .modal-footer #submit').prop('disabled', false)
          submit.prop('disabled', false)
        },
        error: function() {
          toastr.error("Terjadi Kesalahan Pada Server!", "Error");
        },
        success: async function(data) {
          if (data.status) {
            if (refresh) {
              window.location.href = data.url
            }
          } else {
            if (data.err_form) {
              data.err_form.forEach((v, i) => {
                $("input[name='" + v + "']").addClass('is-invalid')
                $("select[name='" + v + "']").addClass('is-invalid')
              })
            }

            $("#alertText").html(data.message)
            $("#myAlert").show(300);

            setTimeout(function() {
              $("#myAlert").hide(300);
            }, 5000);
          }
        }
      })
    })

    <?php if ($this->session->has_userdata('success')) { ?>
      await setTimeout(function() {
        Swal.fire("Berhasil!", "<?= $this->session->flashdata('success'); ?>", "success")
      }, 500);
    <?php } ?>

    <?php if ($this->session->has_userdata('error')) { ?>
      await setTimeout(function() {
        Swal.fire("Gagal!", "<?= $this->session->flashdata('success'); ?>", "error")
      }, 500);
    <?php } ?>
  })

  function hapus(url) {
    Swal.fire({
      title: "Konfirmasi",
      text: "Apakah anda yakin menghapus data ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Ya, Hapus",
      cancelButtonText: "Batal"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: url,
          dataType: 'json',
          type: 'get',
          error: function() {
            Swal.fire("Gagal!", "Terjadi kesalahan dari sisi server.", "error");
          },
          success: async function(data) {
            if (data.status) {
              await Swal.fire("Terhapus!", data.message, "success")
              window.location.href = data.url
            } else {
              Swal.fire("Gagal!", data.message, "error");
            }
          }
        });
      }
    });
  }
</script>