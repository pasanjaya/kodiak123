
// hover toggle in catagory bar
$(".toggelButton").hover(function(){
    $(this).addClass("highlightedButton")
  }, function(){
    $(this).removeClass("highlightedButton")
  });


  // change categary divs 

  $(".toggelButton").click(function(){
    $(".catogeryPanel").hide();
    var panelId = $(this).attr("id") + "Panel";
    $("#"+panelId).show();
    
    $(".toggelButton").removeClass("catogeryactive");
    $(this).addClass("catogeryactive");
  });