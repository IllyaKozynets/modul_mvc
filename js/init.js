$(document).ready(function() {




	// $(".red-change").click(function () {
	// 	$(".navbar-inverse").css("background-image", "none");
	// 	$(".navbar-inverse").css("background-color", "red");
	// })
	//


	$(".hidden1").hide();
	var k0 = $(".0").text();
	var res0 = k0 * 0.9;

	var k2 = $(".2").text();
	var res2 = k2 * 0.9;

	var k3 = $(".3").text();
	var res3 = k3 * 0.9;

	var k4 = $(".4").text();
	var res4 = k4 * 0.9;

	$(".link-0").hover(function () {
		$(".0").text(res0);
		$(".hidden1").show(500);
	}, function () {
		$(".0").text(k0);
		$(".hidden1").hide(0);
	});

	$(".link-2").hover(function () {
		$(".2").text(res2);
		$(".hidden1").show(500);
	}, function () {
		$(".2").text(k2);
		$(".hidden1").hide(0);
	});

	$(".link-3").hover(function () {
		$(".3").text(res3);
		$(".hidden1").show(500);
	}, function () {
		$(".3").text(k3);
		$(".hidden1").hide(0);
	});

	$(".link-4").hover(function () {
		$(".4").text(res4);
		$(".hidden1").show(500);
	}, function () {
		$(".4").text(k4);
		$(".hidden1").hide(0);
	});

	////////////////////////////////////

	$(".hidden2").hide();
	var k1 = $(".1").text();
	var res1 = k1 * 0.9;

	var k5 = $(".5").text();
	var res5 = k5 * 0.9;

	var k6 = $(".6").text();
	var res6 = k6 * 0.9;

	var k7 = $(".7").text();
	var res7 = k7 * 0.9;

	$(".link-1").hover(function () {
		$(".1").text(res1);
		$(".hidden1").show(500);
	}, function () {
		$("1").text(k1);
		$(".hidden1").hide(0);
	});

	$(".link-5").hover(function () {
		$(".5").text(res5);
		$(".hidden1").show(500);
	}, function () {
		$(".5").text(k5);
		$(".hidden1").hide(0);
	});

	$(".link-6").hover(function () {
		$(".6").text(res6);
		$(".hidden1").show(500);
	}, function () {
		$(".6").text(k6);
		$(".hidden1").hide(0);
	});

	$(".link-7").hover(function () {
		$(".7").text(res7);
		$(".hidden1").show(500);
	}, function () {
		$(".7").text(k7);
		$(".hidden1").hide(0);
	});


$(document).mousemove(function(e) {

if(e.pageY <= 5)
{

// Launch MODAL BOX
$('#exit_content').modal({onOpen: modalOpen, onClose: simplemodal_close});
}

});

});

/**
 * When the open event is called, this function will be used to 'open'
 * the overlay, container and data portions of the modal dialog.
 *
 * onOpen callbacks need to handle 'opening' the overlay, container
 * and data.
 */
function modalOpen (dialog) {
	dialog.overlay.fadeIn('fast', function () {
		dialog.container.fadeIn('fast', function () {
			dialog.data.hide().slideDown('fast');
		});
	});
}

   /**
 * When the close event is called, this function will be used to 'close'
 * the overlay, container and data portions of the modal dialog.
 *
 * The SimpleModal close function will still perform some actions that
 * don't need to be handled here.
 *
 * onClose callbacks need to handle 'closing' the overlay, container
 * and data.
 */
function simplemodal_close (dialog) {
	dialog.data.fadeOut('fast', function () {
		dialog.container.hide('fast', function () {
			dialog.overlay.slideUp('fast', function () {
				$.modal.close();
			});
		});
	});


}