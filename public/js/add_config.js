window.addEventListener("load",
  function() {
    $(".nav-pills li").on("click",
      function() {
        $("li.active").removeClass("active");
        $(this).addClass("active");
        $(".search-type").val($(this).children("a").attr("class"));
      }
    );
    $('.alert-danger').delay(2000).fadeOut(2000);
  }
);