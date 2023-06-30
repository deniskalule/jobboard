<script>
    $(".register").hide();
    $(".employer-form").hide();
    $(".job-seeker-form").hide();

    $(".register_now").click(function (event) {
        event.preventDefault();

        $(".register").show();
        $(".login").hide();
    });

    $(".user-btn").click(function (e) {
        e.preventDefault();
        $(".job-seeker-form").show();
        $(".employer-form").hide();
        
    });
    $(".user-btn2").click(function (e) {
        e.preventDefault();
        $(".employer-form").show();
        $(".job-seeker-form").hide();
        
    });
</script>