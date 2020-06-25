$(function () {
  $.getJSON("json/data.json", function (data) {
    console.log(data.person);
    data.error.forEach((element) => {
      M.toast({
        html: element.meldung,
        classes: "rounded red",
      });
    });
    var mtpl = $("#myTemplate").html();
    var html = Mustache.render(mtpl, data);
    $("main").append(html);
    $(".edit").click(function (e) {
      e.preventDefault();
      console.log("edit click");
    });
  });
  $(".datepicker").datepicker();
});
