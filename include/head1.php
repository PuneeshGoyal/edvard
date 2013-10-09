<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="admin/js/validate_functions.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#orders').submit(function(){
			var validate = [];
			//Always start validate array from 0
			validate[1] = txt_required('first_name', 'Error: Please enter First Name.');
			validate[2] = txt_required('last_name', 'Error: Please enter Last Name.');
			validate[3] = txt_required('address', 'Error: Please enter Address.');
			validate[4] = txt_required('city', 'Error: Please enter City.');
			validate[5] = txt_required('state', 'Error: Please enter State.');
			validate[6] = txt_required('country', 'Error: Please select Country.');
		//	validate[7] = txt_required('zip', 'Error: Please enter Zip.');
			validate[8] = digit('zip', 'Error: Please enter only numeric Value in ZIP Code.')
			validate[9] = txt_required('phone', 'Error: Please enter Phone Number.');
			validate[10] = txt_required('email', 'Error: Please enter Email Id.');
			validate[11] = email('email', 'Error: Please enter correct Email Id');

			return show_error(validate);
		});
	});
</script>
<script type="text/javascript">
		function reload_win(){
			location.reload();
		}
		$(document).ready(function() {
			$("#mainchbx").click(function() {
				var checked_status = this.checked;
				var checkbox_name = this.name;
				$("input[name=" + checkbox_name + "[]]").each(function() {
					this.checked = checked_status;
				});
			});
			$("input[name='chk[]']").click(function() {
				$("#mainchbx").attr('checked', false);
			});
			setTimeout(function() {
				$('.success').fadeOut('fast');
			}, 3000);
			setTimeout(function() {
				$('.error').fadeOut('fast');
			}, 3000);
		});
</script>
<script type="text/javascript" language="javascript">// <![CDATA[
function showHide() {
    var ele = document.getElementById("showHideDiv");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}
// ]]></script>
<!-- Google tranlaor widget -->
<meta name="google-translate-customization" content="cd19669eb23fdf7e-62a9190d4e1b67d7-g81e86ec3d3feac7f-18"></meta>
        