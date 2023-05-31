@foreach($comments as $comment)
<table>
	<tbody>
		<tr>
			<td valign="top">
				{{--
				@if($comment->user->image == null)
					<img src="{{ asset('public/image/aa.png') }}" alt="" width="50" height="50">
				@else
					<img src="{{ $comment->user->image }}" alt="" width="50" height="50">
				@endif
				--}}
				<!-- <script src="https://www.avatarapi.com/js.aspx?email=rafliid123@gmail.com&size=50">
					
				</script> -->
				<img src="https://www.gravatar.com/avatar/{{ md5($comment->user->email) }}?s=50" alt="{{ $comment->user->name }}" title="{{ $comment->user->name }}">
			</td>
			<td valign="top" class="rep">
				<b>{{ $comment->user->name }}</b> <small>{{ date('D, j F Y', strtotime($comment->created_at)) }}</small>
				<p>{{ $comment->comment }}</p>
				<button class="btn btn-primary btn-sm reply">Reply</button>
				<div class="form-reply">
					@auth
						{{ Form::open(array('route' => ['user.album.comment', $album->slug], 'class' => 'form-control comment')) }}
							{{ Form::hidden('album_id', $album->id) }}
							{{ Form::hidden('parent_id', $comment->id) }}
							{{ Form::textarea('comment', null, array('class' => 'form-control', 'cols' => '10', 'rows' => '3', 'required' => '', 'placeholder' => 'Enter your comment...')) }}
							{{ Form::submit('Send', array('class' => 'btn btn-primary btn-sm float-sm-right mt-10px')) }}
						{{ Form::close() }}
					@else
						<p><b>You cannot enter your comment before login...</b></p>
					@endauth
				</div>
				@if($comment->replies)
					@include('partials.comment', ['comments' => $comment->replies])
				@endif
			</td>
		</tr>
	</tbody>
</table>
@endforeach