$(document).ready(function() {
	$('input#Page_searchTerm').keyup(function(){
	  submitSearch();
	  return false;
	});

	function submitSearch(){
		$.fn.yiiListView.update('page-list', {
			data: $('input#Page_searchTerm').serialize(),
		});
	}
});