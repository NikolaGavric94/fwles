@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form id="messages-form" action="{{ route('messages.store') }}" method="POST">
                        <label for="message" class="sr-only">Message</label>
                        <input type="text" name="message" id="message" />
                    </form>
                    <div id="messages-wrapper">
                    @foreach($messages as $message)
                        <p>{{ $message->message }}</p>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).keydown(function(event) {
                if(event.keyCode === 13) {
                    event.preventDefault();
                    var form = $('#messages-form');
                    var message = $('#messages-form > input[name="message"]');
                    axios.post(form.attr('action'), {message: message.val()}).then(function(data) {
                        message.val("");
                    });
                    return false;
                }
            });

            Echo.channel('chat')
                .listen('.chatroom', (e) => {
                    $('#messages-wrapper').append("<p>" + e.message + "</p>");
                });
            console.info('loaded');
        });
    </script>
@endpush
@endsection
