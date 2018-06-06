$('.thumbnail').click(function(e){
  e.preventDefault();
  $('.modal-body').empty();
  var title = $(this).parent('a').attr("href");
  $('.high-res-link').attr('href', title);
  var myClone = $(this).closest('.small-gallery').clone();
  var theImg =  myClone.find('img');
  var newSrc = $(this).data('img-modal'); 
  theImg.removeClass('thumbnail').attr("src", newSrc);
  myClone.appendTo('.modal-body');
 $('#myModal').modal({show:true});
});