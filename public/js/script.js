var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})

$(function () {
  $('[data-toggle="tooltip"]').on('click',function(e){
    let $text = $(this).prop('title');
    console.log($text);
    $('#likert-selection').text("Your selection: " + $text);
  })
})