<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Query Autocomplete</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<style type="text/css">
			ul {
				background-color: #eee;
				cursor:pointer;
			}
			li{
				padding: 12px;
			}
			input{
				width: 250px;
			}
		</style>
	</head>
	<body>
		<div class="container" style="width: 500px">
			<label>Localizar OBM:</label>
			<input type="text" id="searchBox" placeholder="Buscar..." class="form-control" />
			<div id="responseList"></div>

	
	
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<script  type="text/javascript">
				$(document).ready(function() {
					$("#searchBox").keyup(function() {
						var query = $(this).val();
						//console.log(query);
						//alert(query);
						if (query != '') {
							//console.log(query); // teste no console
							//alert(query);
							$.ajax(
								{
									url:'search.php',
									method: 'POST',
									data: {query:query},

									success: function(data)
									{
										//console.log(data); //colocava no console para teste
										$("#responseList").fadeIn();
										$("#responseList").html(data);
									}
										
								});
						}
						else{
								$("#responseList").fadeOut();
								$("#responseList").html("");
						}
					});
					$(document).on('click', 'li', function(){
						$('#searchBox').val($(this).text());
						$('#responseList').fadeOut();
					});
				});
			</script>
	</body>
</html>