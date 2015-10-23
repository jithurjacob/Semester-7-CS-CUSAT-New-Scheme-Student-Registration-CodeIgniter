<?php
$this->session->sess_destroy();
 header("Cache-Control", "no-cache, no-store, must-revalidate");

		echo "<script>document.location='".base_url()."';</script>"; ?>