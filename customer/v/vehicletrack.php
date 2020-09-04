


<!DOCTYPE html> 
<a href="javascript:window.open('some.html', 'yourWindowName', 'width=200,height=150');">Test</a>
<html> 
	<head> 
		<title>Javascript open link without click</title> 
		<style> 
			.gfg { 
				text-align:center; 
				font-size:40px; 
				font-weight:bold; 
				color:green; 
			} 
		</style> 
		<script> 
			function myFunction() { 
				window.open('https://www.geeksforgeeks.org', 
							' ', 'width=500, height=300'); 
			} 
		</script> 
	</head> 
	<body> 
		<div class = "gfg" onmouseover = "myFunction()"> 
			GeeksforGeeks 
		</div> 
	</body> 
</html> 