@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading panel-title text-center">Links úteis</div>

				<div class="panel-body">
                    <ul class="list-group">
                        <a href="{{route('tcles.index')}}"><li class="list-group-item">TCLE - Anestesia final</li></a>
                        <a href="{{route('tcles.index')}}"><li class="list-group-item">TCLE - Cirurgia final</li></a>
                        <a href="{{route('tcles.index')}}"><li class="list-group-item">TCLE - Transfusão final</li></a>

                    </ul>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
