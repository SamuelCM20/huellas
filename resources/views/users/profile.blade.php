	<x-app title="{{$user->name}}">
		<section>
			<Profile :users="{{$user}}" :post="{{$post}}"/>
		</section>
	</x-app>