@foreach ($businesses as $business)
  <div class="row">
    <div class="col-md-1" style="max-width: 40px">
      @if ($businesses->currentPage() == 1)
        <h2>{{ $loop->index + 1 }}.</h2>
      @else
        @if ($loop->index == 9)
          <h2>{{$businesses->currentPage()}}0. </h2>
        @else
          <h2>{{$businesses->currentPage() - 1}}{{$loop->index + 1}}. </h2>
        @endif
      @endif
    </div>
    <div class="col-md-11">
      <h2>
        @if (Route::currentRouteName() == 'business.list')
          <a href="{{ route('business.edit', ['id' => $business->id]) }}">{{ $business->title }}</a>
        @else
          <a href="{{ route('business.detail', ['id' => $business->id]) }}">{{ $business->title }}</a>
        @endif

      </h2>
        @if(Route::currentRouteName() != 'business.list')
        <h4 style="font-family: Raleway">in
          @foreach ($business->categories as $c)
            <a href="#" class="business-category-link">{{$c->name}}</a>{{$loop->last ? '.' : ','}}
          @endforeach
        </h4>
      @endif
    </div>
  </div>
@endforeach
