<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<link href="/css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!--includ angular -->
    <script src="/bower_components/angular/angular.js"></script>

</head>
<body>

	@include('partials.navbar')

    @include('partials.confirm-delete-dialog')


    <div class="container">
        @include('flash::message')
    </div>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        function fnOpenNormalDialog() {
            $("#dialog-confirm").html("Deseja realmente excluir?");

            // Define the Dialog and its properties.
            $("#dialog-confirm").dialog({
                resizable: false,
                modal: true,
                title: "Confirmar",
                height: 250,
                width: 400,
                buttons: {
                    "Sim": function () {
                        $(this).dialog('close');
                        $('#form-delete').submit();
                    },
                    "Não": function () {
                        $(this).dialog('close');
                        return false;
                    }
                }
            });
        }

        $('.confirm-delete').click(fnOpenNormalDialog);

    });

</script>
</body>
</html>
