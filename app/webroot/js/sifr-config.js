var sifReplace = {
  src: 'sifr.swf',
  fitExactly: true,
  transparent: true,
  wmode: 'transparent',
  css: [ "a { color: #53a6b8; text-decoration: none; }", "a:hover { text-decoration: underline; }", ".sIFR-root { letter-spacing: 0.3; }" ]
};

var isForcingReflow = false;

var forceReflow = function() {
	if (!isForcingReflow) {
		isForcingReflow = true;
		window.setTimeout(function() {
								   var footer = document.getElementById("footer");
								   footer.style.display = "none";
								   footer.style.display = "block";
		}, 100);
	}
};

sIFR.activate(sifReplace); // From revision 209 and onwards

jQuery(function() {
	sIFR.replace(sifReplace, {
	  selector: 'h1.hReplaced_red',
	  css: [ '.sIFR-root {color: #7b011d;}',
			'.sIFR-root a { color: #7b011d; text-decoration: none;}'
			],
	  onReplacement: forceReflow
	});
});