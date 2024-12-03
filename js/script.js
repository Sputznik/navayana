$(document).ready(function () {
  $(".fa-search").click(function (event) {
    event.preventDefault();
    $(".searchform").slideToggle("slow");
  });
});
