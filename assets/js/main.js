;(function(){

			// Menu settings
			$('#menuToggle, .menu-close').on('click', function(){
				$('#menuToggle').toggleClass('active');
				$('body').toggleClass('body-push-toleft');
				$('#theMenu').toggleClass('menu-open');
			});

			var setupCanvas;
			var data = {
				labels : ["January","February","March","April","May","June","July"],
				datasets : [
					{
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						data : [65,59,-90,81,56,55,40,60]
					},
					{
						fillColor : "rgba(151,187,205,0.5)",
						strokeColor : "rgba(151,187,205,1)",
						pointColor : "rgba(151,187,205,1)",
						pointStrokeColor : "#fff",
						data : [28,48,40,19,96,27,100]
					}
				]
			}

			// setupCanvas = function(canvas) {
			//   var ctx, newWidth;
			//   canvas = $(canvas);
			//   newWidth = canvas.parent().width();
			//   canvas.prop({
			//     width: newWidth,
			//     height: 200
			//   });
			//   ctx = canvas.get(0).getContext("2d");
			//   return new Chart(ctx).Line(data);
			// };

			// (function(canvas) {
			//   setupCanvas(canvas);
			//   return $(window).resize(function() {
			//     return setupCanvas(canvas);
			//   });
			// })("#mycanvas");

			// //Get the context of the canvas element we want to select
			// var ctx = $("#myChart").get(0).getContext("2d");
			// //This will get the first returned node in the jQuery collection.
			// var myChart = new Chart(ctx).Line(data);
			// myChart.reDraw();

			// location.reload();


})(jQuery)