    <script src="{{ asset ("public/assets/admin/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/admin-lte/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/admin-lte/plugins/iCheck/icheck.min.js") }}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>