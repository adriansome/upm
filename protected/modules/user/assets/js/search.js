$(document).ready(function() {
	$('input#User_searchTerm').keyup(function(){
	  submitSearch();
	  return false;
	});

	$('select#User_role').change(function(){
	  submitSearch();
	  return false;
	});

	function submitSearch(){
		$.fn.yiiListView.update('user-list', {
			data: $('input#User_searchTerm, select#User_role').serialize(),
		});
	}
});