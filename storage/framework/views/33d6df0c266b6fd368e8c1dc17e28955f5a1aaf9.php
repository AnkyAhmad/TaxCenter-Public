<script src="/vendor/jquery/jquery.slim.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="/script/navbar-scroll.js"></script>
<script>
  AOS.init();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clamp-js/0.7.0/clamp.js"></script>
<script>
    const modules = document.querySelectorAll('.products-text');
    
    // Make sure our query found anything
    if(modules) {
        // Loop through each module and apply the clamping.
        modules.forEach((module, index) => {
        $clamp(module, {clamp: 2});
    });
}
</script><?php /**PATH /home/u1358072/public_html/laravel/resources/views/includes/script.blade.php ENDPATH**/ ?>