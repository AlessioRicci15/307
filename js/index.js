/* document ready */
$(function () {
  /* Get Json */
  $.getJSON("json/data.json", function (data) {
    /* Console */
    console.log(data.person);
    /* PopUp */
    data.error.forEach((element) => {
      M.toast({
        html: element.meldung,
        classes: "rounded red",
      });
    });
    /* Template render */
    var mtpl = $("#myTemplate").html();
    var html = Mustache.render(mtpl, data);
    /* Append */
    $("main").append(html);
    /* Add Function to btn */
    $(".edit").click(function (e) {
      e.preventDefault();
      console.log("edit click");
    });
  });
  /* Add Function Datepicker */
  $(".datepicker").datepicker();
});
