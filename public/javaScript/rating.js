$(document).ready(function() {
    $(".fa-star").click(function() {
      var starId = $(this).attr('id');
      var rating = parseInt(starId.substr(2));
      $("#rating").val(rating);
    
      $(".fa-star").css("color", "black");
      $("#" + starId).prevAll().addBack().css("color", "yellow");
    });
  });
  




// rating
// $(document).ready(function() {
//     $(".fa-star").click(function() {
//       var star = $(this);
//       var starIndex = star.index();
//       var profileCard = star.closest('.profile-card');
//       var freelancerId = profileCard.find('input[name="freelancerId"]').val();
//       var ratingInput = profileCard.find("#rating_" + freelancerId);
  
//       ratingInput.val(starIndex + 1);
  
//       profileCard.find(".fa-star").removeClass("fas").addClass("far");
//       star.prevAll().addBack().removeClass("far").addClass("fas");
//       star.nextAll().removeClass("fas").addClass("far");
//     });
//   });
  
  
  
// $(document).ready(function() {
//     $(".fa-star").click(function() {
//         var starId = $(this).attr('id');
//         var freelancerId = starId.split("_")[1];
//         var rating = starId.split("_")[0].substr(2);
//         $("#rating_" + freelancerId).val(rating);
  
//         $(".fa-star").css("color", "black");
//         $("#" + starId).prevAll().addBack().css("color", "yellow");
//     });
//   });