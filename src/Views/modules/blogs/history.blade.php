@extends('cms::layouts.dashboard')

@section('pageTitle') Blog History @stop

@section('content')

    @include('cms::modules.blogs.breadcrumbs', ['location' => [[$blog->title => url(config('cms.backend-route-prefix', 'cms').'/blog/'.$blog->id.'/edit')], 'history']])

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-striped">
                @foreach($blog->history() as $history)
                    <tr>
                        <td>{{ $history->created_at->format('M jS, Y') }} ({{ $history->created_at->diffForHumans() }})</td>
                        <td class="text-right">
                            <a class="btn btn-outline-warning btn-sm" href="{{ url(config('cms.backend-route-prefix', 'cms').'revert/'.$history->id) }}">Revert</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
