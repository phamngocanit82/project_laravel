<script src="/templates/admin/js/jquery-3.5.1.min.js"></script>

<!-- feather icon js-->
<script src="/templates/admin/js/icons/feather-icon/feather.min.js"></script>
<script src="/templates/admin/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
@if(empty($page_type))
    <script src="/templates/admin/js/sidebar-menu.js"></script>
@endif

<script src="/templates/admin/js/config.js"></script>
<!-- Bootstrap js-->
<script src="/templates/admin/js/bootstrap/popper.min.js"></script>
<script src="/templates/admin/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="/templates/admin/js/range-slider/ion.rangeSlider.min.js"></script>
<script src="/templates/admin/js/range-slider/rangeslider-script.js"></script>
<script src="/templates/admin/js/touchspin/vendors.min.js"></script>
<script src="/templates/admin/js/touchspin/touchspin.js"></script>
<script src="/templates/admin/js/touchspin/input-groups.min.js"></script>
<script src="/templates/admin/js/owlcarousel/owl.carousel.js"></script>
<script src="/templates/admin/js/select2/select2.full.min.js"></script>
<script src="/templates/admin/js/select2/select2-custom.js"></script>
<script src="/templates/admin/js/tooltip-init.js"></script>
<script src="/templates/admin/js/product-tab.js"></script>
<script src="/templates/admin/js/photoswipe/photoswipe.min.js"></script>
<script src="/templates/admin/js/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="/templates/admin/js/photoswipe/photoswipe.js"></script>

<!-- SweetAlert2 -->
<script src="/templates/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/templates/admin/plugins/toastr/toastr.min.js"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/templates/admin/js/script.js"></script>
<script>
    var body_content = document.getElementById('body_content');
    setTimeout(function () { body_content.style.display = 'block'; body_content.style.visibility = 'visible';}, 1);
</script>
@yield('foot')
@yield('ajax')