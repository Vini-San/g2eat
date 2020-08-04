				</div>
			</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; IIGD PIEDADe 2 - 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modfal-title" id="exampleModalLabel">Pronto pra sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" se deseja sair da presente sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="<?php echo base_url('/login/logout') ?>">Sair</a>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Bootstrap core JavaScript-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url('public/bigbencao/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('public/bigbencao/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('public/bigbencao/js/sb-admin-2.min.js') ?>"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url('public/bigbencao/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/bigbencao/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('public/bigbencao/js/fileupload/jquery.ui.widget.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/bigbencao/js/fileupload/jquery.iframe-transport.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/bigbencao/js/fileupload/jquery.fileupload.js') ?>" type="text/javascript"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('public/bigbencao/js/demo/datatables-demo.js') ?>"></script>

<script src="<?php echo base_url('public/bigbencao/js/site.js') ?>" type="text/javascript"></script>
 

<script type="text/javascript">
function Reset(){
	$('#progress .progress-bar').css('width', '0%');
}
	$(function () {
			$('#fileupload').fileupload({
					dataType: 'json',
					done: function (e, data) {
							window.setTimeout('Reset()', 2000);
					},
					progressall: function (e, data) {
							var progress = parseInt(data.loaded / data.total * 100, 10);
							$('#progress .progress-bar').css('width', progress + '%');
							
					}
			});
	});
	function fsClean() {
			$('#progress .progress-bar').css('width', '0%');

  }

  $(document).ready(function() {
    $('#orderpedidos').DataTable( {
      "order": [[2, "asc" ]],
      "deferRender": true
    } );
  } );

  $(document).ready(function() {
    $('#orderprodutos').DataTable( {
      "order": [[2, "desc" ]],
      "deferRender": true
    } );
  } );

  $(document).ready(function() {
    $('#datatableinicial').DataTable( {
      "order": [[0, "asc" ]],
      "deferRender": true
    } );
  } );
	
</script>
  
</body>
</html>