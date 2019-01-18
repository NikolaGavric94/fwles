@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @foreach($messages as $message)
                        <p>{{ $message->message }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            Echo.channel('chat')
                .listen('.chatroom', (e) => {
                    console.log(e.message);
                });
            console.info('loaded');
        });
    </script>
@endpush
@endsection
