/* Document readz function */
$(function () {
  /* Nav function */
  $(".sidenav").sidenav();
  /* Get all data */
  $.getJSON("/auto/data/auto.php", function (data) {
    /* Put in Table */
    newAuto(data);
  });
});

/* new Tablerow */
function newAuto(data) {
  /* Templat render */
  var mtpl = $("#myTemplate").html();
  var html = Mustache.render(mtpl, data);
  $("tbody").append(html);
/* init modal */
  $(".modal").modal();
/* function edit btn */
  $(".edit").click(function (e) {
    e.preventDefault();
    /* read data from tmp */
    const id = $(this).parent().attr("data-id");
    const name = $(this).parent().attr("data-Name");
    const farbe = $(this).parent().attr("data-Farbe");
    const bauart = $(this).parent().attr("data-Bauart");
    let kraftstoff = $(this).parent().attr("data-Kraftstoff");
    if (kraftstoff == "Benzin") kraftstoff = "b";
    if (kraftstoff == "Diesel") kraftstoff = "d";
    if (kraftstoff == "Elektro") kraftstoff = "e";
    if (kraftstoff == "Wasserstoff") kraftstoff = "w";
    /* Change modal content */
    $(".modal").modal();
    $("#modat_titel").html("Auto editieren von " + id);
    $("#modat_inhalt").load("/auto/sites/formular.html", function () {
      $("form").attr("action", "index.php?action=edit&id=" + id);
      $("#name").val(name);
      $("#farbe").val(farbe);
      $("#bauart").val(bauart);
      $("select").formSelect();
      $("input:radio").each(function () {
        if ($(this).val() == kraftstoff) {
          $(this).attr("checked", "checked");
        }
      });
      M.updateTextFields();
    });
    /* show modal */
    const mymodal = M.Modal.getInstance($(".modal"));
    mymodal.open();
  });
/* function tanken */
  $(".tanken").click(function (e) {
    e.preventDefault();
    /* get ID and tank from temp */
    var id = $(this).parent().attr("data-id");
    var tank = $($(this).parents()[1]).children(".tank");
    /* write url with ajax */
    $.ajax({
      url: "index.php?action=tanken&id=" + id + "&tank=" + tank.html(),
    });
    /* frontend change */
    tank.html(1 + parseInt(tank.html()));
  });
/* function delete */
  $(".delete").click(function (e) {
    e.preventDefault();
    /* get id from tmp */
    var id = $(this).parent().attr("data-id");
    /* write url with ajax */
    $.ajax({ 
      url: "index.php?action=delet&id=" + id 
    });
    /* frontend change */
    $(this).parent().parent().remove();
  });
/* function new */
  $(".new").click(function (e) {
    e.preventDefault();
    /* Change modal content */
    $("#modat_titel").html("Auto hinzufügen");
    $("#modat_inhalt").load("/auto/sites/formular.html", function () {
      /* change action */
      $("form").attr("action", "index.php?action=creat");
    });
    /* show modal */
    var mymodal = M.Modal.getInstance($(".modal"));
    mymodal.open();
  });
}
