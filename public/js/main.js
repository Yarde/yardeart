var baseUrl = "http://yardeart.pl/";
/*
|--------------------------------------------------------------------------
| Navbar
|--------------------------------------------------------------------------
|
*/
$(document).on("click", ".user_dropdown_toggle", function toggle() {
	$('.user_dropdown').toggle();

});
/*
|--------------------------------------------------------------------------
| quiz
|--------------------------------------------------------------------------
|
*/
function initialize_quiz_form() {
	$(document).on("click", ".next", function nextQuestion() {
		let question = $(this).parent();
		let id = question.attr('id');
		

			if(is_checked_question(question))
			{
				$("input[value=A][name="+id+"]").parent().find("div.border").addClass("correct");
				setTimeout(function(){
					question.addClass('hidden');
					question.next().removeClass('hidden');
				}, 2000);

			}
			else {
				showResponse("Trzeba cos zaznaczyc!")
			}

	});
	
	function is_checked_question(question) {
		if (!$(question.find("input:checked")).val()) {
			return false;
		} else {
			return true;
		}
	}
}
function sendPostDataOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function(e) { //$(document) na poczatku żeby dzialalo dla dynamicznych elementów
		e.preventDefault();
		var data = $(this).serialize();
		sendPostData(data, url);
		if (refresh) {
			$('.accept-response').addClass("refresh");
		} else {
			$('.accept-response').removeClass("refresh");
		}
	});
}
$(document).on("submit", '.quiz_form', function(e) {
	e.preventDefault();
	var data = $(this).serialize();
	
	$.ajax({
		url: baseUrl + 'Quiz/ajax_finish_quiz',
		type: 'POST',
		data: data,
		success: function(serverResponse) {
			if(serverResponse=='[QUIZ_FINISHED]')
			{
				window.location.replace(baseUrl + "quiz");
			}
			else{
				showResponse(serverResponse);
				$('.accept-response').on("click", function() {
					location.reload();
				});
				
			}
			
		},
		error: function() {
			showResponse('Blad zwiazany z wysylaniem danych.<br>Sprawdz swoje polaczenie internetowe.');
		}
	});
});
/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
|
*/
$(document).on("click", ".setting-img", function openSetting(){
	$('.setting').show();
});

$(document).on("click", ".close-setting", function openSetting(){
	var epoka = $('input[name=epoka]:checked').val();
	$.ajax({
		url: baseUrl + 'Quiz/setting',
		type: 'POST',
		data: ({epoka: epoka}),
		success: function(serverResponse) {
			$(".content").html(serverResponse);
		},
		error: function() {
			showResponse('Blad zwiazany z wysylaniem danych.<br>Sprawdz swoje polaczenie internetowe.');
		}
	});

	$('.setting').hide();
	
	
});

/*
|--------------------------------------------------------------------------
| Sizing images
|--------------------------------------------------------------------------
|
*/
let isSized;

$(document).on("click", function unsizeImage(){
	if(isSized){
		$('.blur').hide();
		$('.full').remove();
		isSized = 0;
	}
});

$(document).on("click", ".sizeable", function sizeImage(){
	$('.blur').show();
	let src = $(this).attr("src");
	setTimeout(()=>{isSized = 1},1);
	$("body").append('<img src="'+src+'" class="full"/>');
});

/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
|
*/
function showResponse(response) {
	$('.blur').show();
	$('.response').show();
	$('.response > .text').html(response);
	$('.accept-response').focus();
}

function hideResponse() {
	$('.blur').hide();
	$('.response').hide();
}

function sendPostData(data, url) {
	$.ajax({
		url: baseUrl + url,
		type: 'POST',
		data: data,
		success: function(serverResponse, refresh) {
			showResponse(serverResponse, refresh);
		},
		error: function() {
			showResponse('Blad zwiazany z wysylaniem danych.<br>Sprawdz swoje polaczenie internetowe.');
		}
	});
}



function sendPostDataOnSubmit(handler, url, refresh = false) {

	$(document).on("submit", handler, function(e) { //$(document) na poczatku żeby dzialalo dla dynamicznych elementów
		e.preventDefault();
		var data = $(this).serialize();
		sendPostData(data, url);
		if (refresh) {
			$('.accept-response').addClass("refresh");
		} else {
			$('.accept-response').removeClass("refresh");
		}
	});
}
$(function() {
	initialize_quiz_form();
	$('.accept-response').on("click", function() {
		if ($(this).hasClass('refresh')) {
			location.reload();
		} else {
			hideResponse();
		}
	});

	sendPostDataOnSubmit('.finish_quiz_form', 'quiz/ajax_finish_quiz', true);
});
