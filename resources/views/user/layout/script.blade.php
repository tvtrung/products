@if(isset($ConfigsText['optimize']) && $ConfigsText['optimize'] != 1)
<script src="/style/user/custom/jquery/jquery-2.2.4.min.js"></script>
<script src="/style/user/custom/bootstrap-4.0.0/bootstrap.min.js"></script>
<script src="/style/user/custom/menu-mobile/js/webslidemenu.js"></script>
@if(false)
<script src="/style/user/custom/owl-carousel/owl.carousel.js"></script>
@endif
<script src="/style/user/custom/js/myscript.js"></script>
@else
<script type="text/javascript">
{!! file_get_contents(public_path('/style/user/custom/jquery/jquery-2.2.4.min.js')) !!}
{!! file_get_contents(public_path('/style/user/custom/bootstrap-4.0.0/bootstrap.min.js')) !!}
{!! file_get_contents(public_path('/style/user/custom/menu-mobile/js/webslidemenu.js')) !!}
@if(false)
{!! file_get_contents(public_path('/style/user/custom/owl-carousel/owl.carousel.js')) !!}
@endif
{!! file_get_contents(public_path('/style/user/custom/js/myscript.js')) !!}
</script>
@endif